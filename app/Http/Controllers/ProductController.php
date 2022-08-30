<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToolsModel;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use PHPExcel; 
use PHPExcel_IOFactory;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::getAllProduct();
        // return $products;
       $brand=Brand::get();
        $category=Category::where('is_parent',1)->get();
        return view('backend.product.index')->with('products',$products)->with('brands',$brand)
                    ->with('categories',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand=Brand::get();
        $category=Category::where('is_parent',1)->get();
        // return $category;
        return view('backend.product.create')->with('categories',$category)->with('brands',$brand);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'title'=>'string|required',
            'summary'=>'string|required',
            'description'=>'string|nullable',
            'photo'=>'string|required',
            'size'=>'nullable',
            'stock'=>"required|numeric",
            'cat_id'=>'required|exists:categories,id',
            'brand_id'=>'nullable|exists:brands,id',
            'child_cat_id'=>'nullable|exists:categories,id',
            'is_featured'=>'sometimes|in:1',
            'status'=>'required|in:active,inactive',
            'condition'=>'required|in:default,new,hot',
            'price'=>'required|numeric',
            'discount'=>'nullable|numeric'
        ]);

        $data=$request->all();
        $slug=Str::slug($request->title);
        $count=Product::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug']=$slug;
        $data['is_featured']=$request->input('is_featured',0);
        $size=$request->input('size');
        if($size){
            $data['size']=implode(',',$size);
        }
        else{
            $data['size']='';
        }
        // return $size;
        // return $data;
        $status=Product::create($data);
        if($status){
            request()->session()->flash('success','Sản phẩm được thêm thành công');
        }
        else{
            request()->session()->flash('error','Vui lòng thử lại!!');
        }
        return redirect()->route('product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand=Brand::get();
        $product=Product::findOrFail($id);
        $category=Category::where('is_parent',1)->get();
        $items=Product::where('id',$id)->get();
        // return $items;
        return view('backend.product.edit')->with('product',$product)
                    ->with('brands',$brand)
                    ->with('categories',$category)->with('items',$items);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::findOrFail($id);
        $this->validate($request,[
            'title'=>'string|required',
            'summary'=>'string|required',
            'description'=>'string|nullable',
            'photo'=>'string|required',
            'size'=>'nullable',
            'stock'=>"required|numeric",
            'cat_id'=>'required|exists:categories,id',
            'child_cat_id'=>'nullable|exists:categories,id',
            'is_featured'=>'sometimes|in:1',
            'brand_id'=>'nullable|exists:brands,id',
            'status'=>'required|in:active,inactive',
            'condition'=>'required|in:default,new,hot',
            'price'=>'required|numeric',
            'discount'=>'nullable|numeric'
        ]);

        $data=$request->all();
        $data['is_featured']=$request->input('is_featured',0);
        $size=$request->input('size');
        if($size){
            $data['size']=implode(',',$size);
        }
        else{
            $data['size']='';
        }
        // return $data;
        $status=$product->fill($data)->save();
        if($status){
            request()->session()->flash('success','Sản phẩm được cập nhật thành công');
        }
        else{
            request()->session()->flash('error','Vui lòng thư lại!!');
        }
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        $status=$product->delete();
        
        if($status){
            request()->session()->flash('success','Xóa sản phẩm thành công');
        }
        else{
            request()->session()->flash('error','Xẩy ra lỗi trong quá trình xóa sản phẩm');
        }
        return redirect()->route('product.index');
    }
    public function importProduct(Request $request)
        {
            $spreadsheet = PHPExcel_IOFactory::load(request()->file('file-excel'));
            $worksheet =$spreadsheet ->getActiveSheet();
            $highestRow = $worksheet->getHighestRow(); // e.g. 10
            $imgfile="";
            $this->validate($request,[ 'cat_id'=>'required|exists:categories,id',
                                    'child_cat_id'=>'nullable|exists:categories,id'
                                ]);
            $cat_id=$request->input('cat_id');
            $child_cat_id=$request->input('child_cat_id');
            for ($row = 2; $row <= $highestRow; ++$row) {
                    $i=0;
                    $title=$worksheet->getCell('A' . $row)->getValue() ;
                    $summary='<p><span style="font-family: &quot;Open Sans&quot;
                            , Arial, sans-serif; font-size: 14px; text-align: justify;">'.
                            $worksheet->getCell('B' . $row)->getValue().'</span><br></p>';
                    $description=$worksheet->getCell('C' . $row)->getValue();
                    $is_featured=$worksheet->getCell('D' . $row)->getValue();
                    $size=$worksheet->getCell('H' . $row)->getValue();
                    $stock=$worksheet->getCell('K' . $row)->getValue();
                    $status=$worksheet->getCell('M' . $row)->getValue();
                    $condition=$worksheet->getCell('I' . $row)->getValue();
                    $price=$worksheet->getCell('F' . $row)->getValue();
                    $discount=$worksheet->getCell('G' . $row)->getValue();
                    //$cat_id=$worksheet->getCell('F' . $row)->getValue();
                    //$child_cat_id=$worksheet->getCell('C' . $row)->getValue();
                    $brand_id=$worksheet->getCell('J' . $row)->getValue();
                   // $slug=$worksheet->getCell('' . $row)->getValue();
                foreach ( $worksheet->getDrawingCollection() as $drawing) {
                    if ($drawing instanceof MemoryDrawing) {
                        ob_start();
                        call_user_func(
                            $drawing->getRenderingFunction(),
                            $drawing->getImageResource()
                        );
                        $imageContents = ob_get_contents();
                        ob_end_clean();
                        switch ($drawing->getMimeType()) {
                            case MemoryDrawing::MIMETYPE_PNG :
                                $extension = 'png';
                                break;
                            case MemoryDrawing::MIMETYPE_GIF:
                                $extension = 'gif';
                                break;
                            case MemoryDrawing::MIMETYPE_JPEG :
                                $extension = 'jpg';
                                break;
                        }
                    } else {
                        $zipReader = fopen($drawing->getPath(), 'r');
                        $imageContents = '';
                        while (!feof($zipReader)) {
                            $imageContents .= fread($zipReader, 1024);
                        }
                        fclose($zipReader);
                        $extension = $drawing->getExtension();
                    }
                    
                        $myFileName = time() .++$i. '.' . $extension;
                        $imgfile='/storage/photos/1/Products/'. $myFileName;
                        file_put_contents('storage/photos/1/Products/'. $myFileName , $imageContents);
                }
                    $data=$request->all();
                    $slug=Str::slug($title);
                    $count=Product::where('slug',$slug)->count();
                    if($count>0){
                        $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
                    }
                    $status=Product::create([
                        'title'=>$title,
                        'slug'=>$slug,
                        'summary'=>$summary,
                        'description'=>$description,
                        'photo'=>$imgfile,
                        'size'=>$size,
                        'stock'=>$stock,
                        'cat_id'=>$cat_id,
                        'is_featured'=>$is_featured,
                        'brand_id'=>$brand_id,
                        'status'=>$status,
                        'condition'=>$condition,
                        'price'=>$price,
                        'discount'=>$discount
                    ]);
                
                    if($status){
                       
                        request()->session()->flash('success','Nhập file sản phẩm thành công');
                    }
                    else{
                        request()->session()->flash('error','Vui lòng thử lại!!');
                    }
        }
                return redirect()->route('product.index');
                
    }
}