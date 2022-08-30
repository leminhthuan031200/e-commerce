<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3>Đặt hàng H2T Shop</h3>
                    @php $cart=DB::table('carts')->where('order_id', null)->where('user_id',auth()->user()->id)->groupby('product_id')->get(); @endphp
                    {{-- {{dd($cart)}} --}}
                    <p>Bạn đã đặt sản phẩm 
                        @foreach($cart as $item)
                        @php $products=DB::table('products')->where('id', $item->product_id)->get(); @endphp
                          @foreach($products as $item1)
                          <span class="badge badge-primary">{{ $item1->title.", "}} </span> 
                          @endforeach
                        @endforeach
                    có mà đặt hàng là: {{$code_order}} , tổng giá: {{$total_amount}} VND 
                    
                    </p>
                    <p>Cảm ơn bạn đã mua sản phẩm của chúng tôi</p>
                </div>
            </div>
        </div>
    </div>
</div>
