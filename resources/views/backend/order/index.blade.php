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
      <h6><span class="badge badge-warning right"><b><i class="nav-icon fas fa-address-card"></i></i> DANH SÁCH ĐẶT HÀNG</b></span></h6>
      <div class="row">
      <div class="col-md-3 form-group">
        <label for="status">Lọc theo Trạng thái :</label>
        <select name="status" id="" class="form-control" onchange="location = this.value;">
                  <option value="{{route('order.index')}}" >Tất cả</option>
                  <option value="{{route('filter.status',['status'=>'new'])}}"
                    {{($key=='delivered' || $key=="process" || $key=="cancel") ?  : ''}} 
                    {{(($key=='new')? 'selected' : '')}}>Đơn mới</option>
                  <option value="{{route('filter.status',['status'=>'process'])}}"
                    {{($key=='delivered' || $key=="cancel") ?  : ''}} 
                    {{(($key=='process')? 'selected' : '')}}>Chờ xử lý</option>
                  <option value="{{route('filter.status',['status'=>'delivered'])}}"
                    {{( $key=="cancel") ?  : ''}} 
                    {{(($key=='delivered')? 'selected' : '')}}>Đã giao hàng</option>
                  <option value="{{route('filter.status',['status'=>'cancel'])}}"
                    {{($key=='delivered') ?  : ''}} 
                    {{(($key=='cancel')? 'selected' : '')}}>Đã hủy</option>
        </select>
      </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($orders)>0)
        <table class="table table-bordered" id="order-dataTable" width="100%" cellspacing="0">
           
          <thead>
            <tr>
              <th>STT</th>
              <th>Mã đặt hàng</th>
              <th>Tên hàng</th>
              <th>Kích thước</th>
              <th>Tên</th>
              <th>Email</th>
              <th>Số lượng</th>
              <th>Giao hàng</th>
              <th>Tổng tiền</th>
              <th>Trang thái</th>
              <th>Ngày cập nhật</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>STT</th>
              <th>Mã đặt hàng</th>
              <th>Tên hàng</th>
              <th>Kích thước</th>
              <th>Tên</th>
              <th>Email</th>
              <th>Số lượng</th>
              <th>Giao hàng</th>
              <th>Tổng tiền</th>
              <th>Trang thái</th>
              <th>Ngày cập nhật</th>
              <th>Hành động</th>
              </tr>
          </tfoot>
          <tbody>
            @foreach($orders as $order)  
            @php
                $shipping_charge=DB::table('shippings')->where('id',$order->shipping_id)->pluck('price');
            @endphp 
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
                    <td>@foreach($shipping_charge as $data)  {{number_format($data,2)}} VND @endforeach</td>
                    <td>{{number_format($order->total_amount,2)}} VND</td>
                    <td>
                        @if($order->status=='new')
                          <span class="badge badge-primary">Đơn mới</span>
                        @elseif($order->status=='process')
                          <span class="badge badge-warning">Chờ xử lý</span>
                        @elseif($order->status=='delivered')
                          <span class="badge badge-success">Đã giao hàng</span>
                        @else
                          <span class="badge badge-danger">Hủy đơn</span>
                        @endif
                    </td>
                    <td>{{$order->updated_at}}</td>
                    <td>
                        <a href="{{route('order.show',$order->id)}}" class="btn btn-warning btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="view" data-placement="bottom"><i class="fas fa-eye"></i></a>
                        <a href="{{route('order.edit',$order->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                        <form method="POST" action="{{route('order.destroy',[$order->id])}}">
                          @csrf 
                          @method('delete')
                              <button class="btn btn-danger btn-sm dltBtn" data-id={{$order->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>  
            @endforeach
          </tbody>
        </table>
        <span style="float:right">{{$orders->links()}}</span>
        @else
          <h6 class="text-center">Không tìm thấy đơn đặt hàng !!! Vui lòng đặt một số sản phẩm</h6>
        @endif
      </div>
    </div>
</div>
@endsection

@push('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>
      div.dataTables_wrapper div.dataTables_paginate{
          display: none;
      }
  </style>
@endpush

@push('scripts')

  <!-- Page level plugins -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
      
  
  </script>
  <script>
      $(document).ready(function(){
        $('#order-dataTable').DataTable();
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
@endpush