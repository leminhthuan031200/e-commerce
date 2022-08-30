@extends('user.layouts.master')

@section('main-content')
 <!-- DataTales Example -->
 <section class="shop checkout section">
   <div class="container">
      <div class="card-header">
        <h4><span class="badge badge-warning right"><b><i class="nav-icon fas fa-address-card"></i></i> CẬP NHẬT THÔNG TIN</b></span></h4>
      </div>
           <form class="form" method="POST" action="{{route('cart.order')}}">
               @csrf
               <div class="row"> 
                  
                   <div class="col-14">
                       <div class="checkout-form">
                           <p>Vui lòng cập nhật thông tin để thanh toán nhanh hơn</p>
                           <!-- Form -->
                           <div class="row">
                               <div class="col-lg-6 col-md-6 col-12">
                                   <div class="form-group">
                                       <label>Họ <span>*</span></label>
                                       <input type="text" name="first_name" placeholder="" value="{{old('first_name')}}" value="{{old('first_name')}}">
                                       @error('first_name')
                                           <span class='text-danger'>{{$message}}</span>
                                       @enderror
                                   </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-12">
                                   <div class="form-group">
                                       <label>Tên <span>*</span></label>
                                       <input type="text" name="last_name" placeholder="" value="{{old('lat_name')}}">
                                       @error('last_name')
                                           <span class='text-danger'>{{$message}}</span>
                                       @enderror
                                   </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-12">
                                   <div class="form-group">
                                       <label>Địa chỉ mail <span>*</span></label>
                                       <input type="email" name="email" placeholder="" value="{{old('email')}}">
                                       @error('email')
                                           <span class='text-danger'>{{$message}}</span>
                                       @enderror
                                   </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-12">
                                   <div class="form-group">
                                       <label>Số điện thoại <span>*</span></label>
                                       <input type="number" name="phone" placeholder="" required value="{{old('phone')}}">
                                       @error('phone')
                                           <span class='text-danger'>{{$message}}</span>
                                       @enderror
                                   </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-12">
                                   <div class="form-group">
                                       <label>Khu vực<span>*</span></label>
                                   </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-12">
                                   <div class="form-group">
                                       <label>Địa chỉ đường 1<span>*</span></label>
                                       <input type="text" name="address1" placeholder="" value="{{old('address1')}}">
                                       @error('address1')
                                           <span class='text-danger'>{{$message}}</span>
                                       @enderror
                                   </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-12">
                                   <div class="form-group">
                                       <label>Địa chỉ đường 2</label>
                                       <input type="text" name="address2" placeholder="" value="{{old('address2')}}">
                                       @error('address2')
                                           <span class='text-danger'>{{$message}}</span>
                                       @enderror
                                   </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-12">
                                   <div class="form-group">
                                       <label>Mã bưu điện</label>
                                       <input type="text" class="form-control" name="post_code" placeholder="" value="{{old('post_code')}}">
                                       @error('post_code')
                                           <span class='text-danger'>{{$message}}</span>
                                       @enderror
                                   </div>
                                   
                               </div>
                           </div>
                           <div class="single-widget get-button col-3">
                              <div class="content">
                                  <div class="button">
                                      <button type="submit" class="btn btn-primary">CẬP NHẬT</button>
                                  </div>
                              </div>
                          </div>
                           <!--/ End Form -->
                       </div>
                   </div>
               </div>
               
           </form>
   </div>
</section>
<!--/ End Checkout -->
@endsection


