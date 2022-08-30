@extends('backend.layouts.master')

@section('main-content')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
            @include('backend.layouts.notification')
         </div>
     </div>
    <div class="card-header py-3">
      <h4><span class="badge badge-warning right"><b><i class="nav-icon fas fa-address-card"></i></i> DANH SÁCH SẢN PHẨM</b></span></h4>
      <a href="{{route('product.create')}}" class="m-1 btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Product</a>
      <button class="m-1 btn btn-success btn-sm float-right btnImport">Nhập Excel</button>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($products)>0)
        <table class="table table-bordered" id="product-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tiêu đề</th>
              <th>Danh mục</th>
              <th>Loại danh mục</th>
              <th>Giá</th>
              <th>Giá đã giảm</th>
              <th>Kích thước</th>
              <th>Điều kiện</th>
              <th>Hiệu</th>
              <th>Số lượng kho</th>
              <th>Ảnh</th>
              <th>Trạng thái</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tbody>

            @foreach($products as $product)
              @php
              $sub_cat_info=DB::table('categories')->select('title')->where('id',$product->child_cat_id)->get();
              // dd($sub_cat_info);
              $brands=DB::table('brands')->select('title')->where('id',$product->brand_id)->get();
              @endphp
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->cat_info['title']}}
                      <sub>
                          {{$product->sub_cat_info->title ?? ''}}
                      </sub>
                    </td>
                    <td>{{(($product->is_featured==1)? 'Cha': 'Con')}}</td>
                    <td>{{$product->price}} VND</td>
                    <td>  {{$product->discount}}% sale OFF</td>
                    <td>{{$product->size}}</td>
                    <td>{{$product->condition}}</td>
                    <td> {{ucfirst($product->brand->title)}}</td>
                    <td>
                      @if($product->stock>0)
                      <span class="badge badge-primary">{{$product->stock}}</span>
                      @else
                      <span class="badge badge-danger">{{$product->stock}}</span>
                      @endif
                    </td>
                    <td>
                        @if($product->photo)
                            @php
                              $photo=explode(',',$product->photo);
                              // dd($photo);
                            @endphp
                            @foreach($photo as $ph)
                            <img src="{{$ph}}" class="img-fluid zoom" style="max-width:30px" alt="{{$ph}}">
                            @endforeach
                        @else
                            <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid" style="max-width:80px" alt="avatar.png">
                        @endif
                    </td>
                    <td>
                        @if($product->status=='active')
                            <span class="badge badge-success">{{$product->status}}</span>
                        @else
                            <span class="badge badge-warning">{{$product->status}}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                    <form method="POST" action="{{route('product.destroy',[$product->id])}}">
                      @csrf
                      @method('delete')
                          <button class="btn btn-danger btn-sm dltBtn" data-id={{$product->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
        <span style="float:right">{{$products->links()}}</span>
        @else
          <h6 class="text-center">No Products found!!! Please create Product</h6>
        @endif
      </div>
    </div>
    <form method="post" action="{{route('product-import')}}"
      enctype="multipart/form-data">
    <div class="modal fade" id="importGiangVien">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Import sản phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>  
                </div>
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Chọn file (*.xlsx) hoặc Tải về
                                <a target="_blank" href="{{asset('excel-mau/product.xlsx')}}">
                                    file mẫu
                                </a>
                            </label>
                            <input accept=".xlsx" name="file-excel" type="file" class="form-control" required>
                            <br>
                        </div>
                        {{-- <div class="col-md-12">
                          <div class="form-group">
                            <label for="brand_id">Brand</label>
                            <select name="" class="form-control">
                                <option value="">--Select Brand--</option>
                                @foreach($brands as $brand =>$brand_data)
                                  <option value="">{{$brand_data->title}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div> --}}
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="cat_id">Category <span class="text-danger">*</span></label>
                            <select name="cat_id" id="cat_id" class="form-control" required>
                                <option value="">--Select any category--</option>
                                @foreach($categories as $key=>$cat_data)
                                    <option value='{{$cat_data->id}}'>{{$cat_data->title}}</option>
                                @endforeach
                            </select>
                          </div>
                  
                          <div class="form-group d-none" id="child_cat_div">
                            <label for="child_cat_id">Sub Category</label>
                            <select name="child_cat_id" id="child_cat_id" class="form-control">
                                <option value="">--Select any category--</option>
                                {{-- @foreach($parent_cats as $key=>$parent_cat)
                                    <option value='{{$parent_cat->id}}'>{{$parent_cat->title}}</option>
                                @endforeach --}}
                            </select>
                          </div>
                        </div>
                      
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary luuTT">Tải lên</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection

@push('styles')
  <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>
      div.dataTables_wrapper div.dataTables_paginate{
          display: none;
      }
      .zoom {
        transition: transform .2s; /* Animation */
      }

      .zoom:hover {
    transform: scale(5);
    border-color: #b7b9cc;
    border-width: 1.5px;
    border-style: solid;
    /* padding: 0px; */
    }
  </style>
@endpush

@push('scripts')

  <!-- Page level plugins -->
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
  <script>

      $('#product-dataTable').DataTable( {
        "scrollX": false
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[10,11,12]
                }
            ]
        } );

        // Sweet alert

        function deleteData(id){

        }
  </script>
  <script>
      $(document).ready(function(){
        $('#product-dataTable').DataTable();
        $('.btnImport').click(function (){
                $('#importGiangVien').modal('show');
            })
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
          $('.dltBtn').click(function(e){
            var form=$(this).closest('form');
              var dataID=$(this).data('id');
              // alert(dataID);
              e.preventDefault();
              swal({
                    title: "  Bạn có chắc không?",
                    text: "Sau khi xóa, bạn sẽ không thể khôi phục dữ liệu này!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                       form.submit();
                    } else {
                        swal("Dữ liệu của bạn an toàn!");
                    }
                });
          })
      })
  </script>
  <script>
    $('#cat_id').change(function(){
      var cat_id=$(this).val();
      // alert(cat_id);
      if(cat_id !=null){
        // Ajax call
        $.ajax({
          url:"/admin/category/"+cat_id+"/child",
          data:{
            _token:"{{csrf_token()}}",
            id:cat_id
          },
          type:"POST",
          success:function(response){
            if(typeof(response) !='object'){
              response=$.parseJSON(response)
            }
            // console.log(response);
            var html_option="<option value=''>----Select sub category----</option>"
            if(response.status){
              var data=response.data;
              // alert(data);
              if(response.data){
                $('#child_cat_div').removeClass('d-none');
                $.each(data,function(id,title){
                  html_option +="<option value='"+id+"'>"+title+"</option>"
                });
              }
              else{
              }
            }
            else{
              $('#child_cat_div').addClass('d-none');
            }
            $('#child_cat_id').html(html_option);
          }
        });
      }
      else{
      }
    })
  </script>
@endpush
