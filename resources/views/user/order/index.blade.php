@extends('user.layouts.master')

@section('main-content')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
            @include('user.layouts.notification')
         </div>
     </div>
     <div class="card-header">
      <h2 class="card-title "><span class="badge badge-warning right"><b><i class="nav-icon fas fa-edit"></i> Đặt hàng</b></span></h2>
   </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($orders)>0)
        <table class="table table-bordered" id="order-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>S.N.</th>
              <th>Mã đặt hàng</th>
              <th>Tên hàng</th>
              <th>Size</th>
              <th>Tên</th>
              <th>Email</th>
              <th>Số lượng</th>
              <th>Giá giao hàng</th>
              <th>Tổng giá</th>
              <th>Trạng thái</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>S.N.</th>
              <th>Mã đặt hàng</th>
              <th>Tên</th>
              <th>Size</th>
              <th>Email</th>
              <th>Số lượng</th>
              <th>Giá giao hàng</th>
              <th>Tổng giá</th>
              <th>Trạng thái</th>
              <th>Hành động</th>
              <th>Mã hàng</th>
              </tr>
          </tfoot>
          <tbody>
            @foreach($orders as $order)
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
                     </td>
                    <td>{{$order->first_name}} {{$order->last_name}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->shipping->price}} VND</td>
                    <td>{{number_format($order->total_amount,2)}} VND</td>
                    <td>
                        @if($order->status=='new')
                        <span class="badge badge-primary">Đơn mới</span>
                      @elseif($order->status=='process')
                        <span class="badge badge-warning">Đã xử lý</span>
                      @elseif($order->status=='delivered')
                        <span class="badge badge-success">Đã giao hàng</span>
                      @else
                        <span class="badge badge-danger">Hủy đơn</span>
                      @endif
                    </td>
                    <td>
                      <a href="{{route('user.order.show',$order->id)}}" class="btn btn-warning btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="view" data-placement="bottom"><i class="fas fa-eye"></i></a>
                      @if($order->status=='new')
                        <form method="POST" action="{{route('user.order.delete',[$order->id])}}">
                          @csrf
                          @method('delete')
                              <button class="btn btn-danger btn-sm dltBtn" data-id={{$order->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        @endif
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
  <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>
      div.dataTables_wrapper div.dataTables_paginate{
          display: none;
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

      $('#order-dataTable').DataTable( {
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[8]
                }
            ]
        } );

        // Sweet alert

        function deleteData(id){

        }
  </script>
  <script>
      $(document).ready(function(){
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
                    title: "Bạn có chắc không?",
                    text: "Sau khi xóa, bạn sẽ không thể khôi phục dữ liệu này!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                       form.submit();
                    } else {
                        swal("Dữ liệu của bạn được an toàn!");
                    }
                });
          })
      })
  </script>
@endpush
