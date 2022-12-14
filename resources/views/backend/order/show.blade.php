@extends('backend.layouts.master')

@section('title','Order Detail')

@section('main-content')
<div class="card">
<h5 class="card-header">Đặt hàng <a href="{{route('order.pdf',$order->id)}}" class=" btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-download fa-sm text-white-50"></i> Xuất PDF</a>
  </h5>
  <div class="card-body">
    @if($order)
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>STT</th>
          <th>MÃ đặt hàng</th>
          <th>Tên hàng</th>
          <th>Kích thước</th>
          <th>Tên</th>
          <th>Email</th>
          <th>Số lượng</th>
          <th>Giáo giao hàng</th>
          <th>Tổng tiền</th>
          <th>Trang thái</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody>
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->order_number}}</td>
            @php $cart=DB::table('carts')->where('order_id', $order->id)->groupby('product_id')->get(); @endphp
            <td>
              @foreach($cart as $item)
              @php $products=DB::table('products')->where('id', $item->product_id)->get(); @endphp
                @foreach($products as $item1)
                <span class="badge badge-primary">{{ $item1->title}} </span>
                <td> {{ $item->size}}</td>
                @endforeach
              @endforeach
            <td>{{$order->first_name}} {{$order->last_name}}</td>
            <td>{{$order->email}}</td>
            <td>{{$order->quantity}}</td>
            <td>{{$order->shipping->price}} VND</td>
            <td>{{number_format($order->total_amount,2)}} VND</td>
            <td>
                @if($order->status=='new')
                  <span class="badge badge-primary">Mới</span>
                @elseif($order->status=='process')
                  <span class="badge badge-warning">Đã xác nhận</span>
                @elseif($order->status=='delivered')
                  <span class="badge badge-success">Đã giao hàng</span>
                @else
                  <span class="badge badge-danger">Đã hủy</span>
                @endif
            </td>
            <td>
                <a href="{{route('order.edit',$order->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                <form method="POST" action="{{route('order.destroy',[$order->id])}}">
                  @csrf
                  @method('delete')
                      <button class="btn btn-danger btn-sm dltBtn" data-id={{$order->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>

        </tr>
      </tbody>
    </table>

    <section class="confirmation_part section_padding">
      <div class="order_boxes">
        <div class="row">
          <div class="col-lg-6 col-lx-4">
            <div class="order-info">
              <h4 class="text-center pb-4">THÔNG TIN ĐẶT HÀNG</h4>
              <table class="table">
                    <tr class="">
                        <td>Mã đơn đặt hàng</td>
                        <td> : {{$order->order_number}}</td>
                    </tr>
                    <tr>
                      <td>Tên hàng</td>
                      @php $cart=DB::table('carts')->where('order_id', $order->id)->groupby('product_id')->get(); @endphp
                      <td> 
                        @foreach($cart as $item)
                        @php $products=DB::table('products')->where('id', $item->product_id)->get(); @endphp
                          @foreach($products as $item1)
                          : {{ $item1->title}}
                          @endforeach
                        @endforeach
                    </tr>
                    <tr>
                        <td>Ngày đặt</td>
                        <td> : {{$order->created_at->format('D d M, Y')}} at {{$order->created_at->format('g : i a')}} </td>
                    </tr>
                    <tr>
                        <td>Số lượng</td>
                        <td> : {{$order->quantity}}</td>
                    </tr>
                    <tr>
                        <td>Trạng thái</td>
                        <td> : {{$order->status}}</td>
                    </tr>
                    <tr>
                        <td>Giá giao hàng</td>
                        <td> : {{$order->shipping->price}} VND</td>
                    </tr>
                    <tr>
                      <td>Giảm giá</td>
                      <td> : {{number_format($order->coupon,2)}} VND</td>
                    </tr>
                    <tr>
                        <td>Total Amount</td>
                        <td> : {{number_format($order->total_amount,2)}} VNd</td>
                    </tr>
                    <tr>
                        <td>Phương thức thanh toán</td>
                        <td> : @if($order->payment_method=='cod') Cash on Delivery @else Paypal @endif</td>
                    </tr>
                    <tr>
                        <td>Trang thái thanh toán</td>
                        <td> : {{$order->payment_status}}</td>
                    </tr>
              </table>
            </div>
          </div>

          <div class="col-lg-6 col-lx-4">
            <div class="shipping-info">
              <h4 class="text-center pb-4">THÔNG TIN GIAO HÀNG</h4>
              <table class="table">
                    <tr class="">
                        <td>Họ và tên</td>
                        <td> : {{$order->first_name}} {{$order->last_name}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td> : {{$order->email}}</td>
                    </tr>
                    <tr>
                        <td>Số điện thoại.</td>
                        <td> : {{$order->phone}}</td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td> : {{$order->address1}}, {{$order->address2}}</td>
                    </tr>
                    <tr>
                        <td>Thành phố</td>
                        <td> : {{$order->country}}</td>
                    </tr>
                    <tr>
                        <td>Mã bưu điện</td>
                        <td> : {{$order->post_code}}</td>
                    </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endif

  </div>
</div>
@endsection

@push('styles')
<style>
    .order-info,.shipping-info{
        background:#ECECEC;
        padding:20px;
    }
    .order-info h4,.shipping-info h4{
        text-decoration: underline;
    }

</style>
@endpush
