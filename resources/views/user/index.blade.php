@extends('user.layouts.master')

@section('main-content')
<div class="container-fluid">
    @include('user.layouts.notification')
    <!-- Page Heading -->
    <div class="row padding-row" style="justify-content: center;">
        <div class="col-lg-2 col-4">
           <div class="small-box bg-light hover-custom">
              <div class="inner">
                <img src="{{asset('images/profile.png')}}" class="img-user" alt="">
              </div>
              <div class="icon">
                 <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('user-profile')}}" class="small-box-footer">Cập nhật thông tin <i class="fas fa-arrow-circle-right"></i></a>
           </div>
        </div>
        <div class="col-lg-1 col-1"></div>
        <div class="col-lg-2 col-4">
           <div class="small-box bg-light hover-custom">
              <div class="inner">
                <img src="{{asset('images/dashbord.png')}}" class="img-user" alt="">
              </div>
              <div class="icon">
                 <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('dashbord')}}" class="small-box-footer">Nhà của tôi <i class="fas fa-arrow-circle-right"></i></a>
           </div>
        </div>
        <div class="col-lg-1 col-1"></div>
        <div class="col-lg-2 col-4">
            <div class="small-box bg-warning hover-custom">
               <div class="inner">
                 <img src="{{asset('images/order.png')}}" class="img-user" alt="">
               </div>
               <div class="icon">
                  <i class="ion ion-warning"></i>
               </div>
               <a href="{{route('user.order.index')}}" class="small-box-footer">Đặt hàng <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div> 
    </div>     
    <div class="row" style="justify-content: center;">
             <div class="col-lg-2 col-4">
            <div class="small-box bg-info hover-custom">
               <div class="inner">
                 <img src="{{asset('images/review.png')}}" class="img-user" alt="">
               </div>
               <div class="icon">
                  <i class="ion ion-bag"></i>
               </div>
               <a href="{{route('user.productreview.index')}}" class="small-box-footer">Đánh giá  <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div>
         <div class="col-lg-2 col-2"></div>
         <div class="col-lg-2 col-4">
            <div class="small-box bg-teal hover-custom">
               <div class="inner">
                 <img src="{{asset('images/comments.png')}}" class="img-user" alt="">
               </div>
               <div class="icon">
                  <i class="ion ion-bag"></i>
               </div>
               <a href="{{route('user.post-comment.index')}}" class="small-box-footer">Bình luận <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div>
    </div>    
    
</div>
@endsection