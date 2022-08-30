@extends('user.layouts.master')

@section('title','Admin Profile')

@section('main-content')

<div class="card shadow mb-4">
    <div class="row">
        <div class="col-md-12">
           @include('backend.layouts.notification')
        </div>
    </div>
   <div class="card-header py-3">
        <h4><span class="badge badge-warning right"><b><i class="nav-icon fas fa-address-card"></i></i> CẬP NHẬT THÔNG TIN</b></span></h4>
     <ul class="breadcrumbs">
         <li><a href="{{route('admin')}}" style="color:#999">Nhà của tôi</a></li>
         <li><a href="" class="active text-primary">Trang thông tin</a></li>
     </ul>
   </div>
   <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="image">
                        @if($profile->photo)
                        <img class="card-img-top img-fluid roundend-circle mt-4" style="border-radius:50%;height:80px;width:80px;margin:auto;" src="{{$profile->photo}}" alt="profile picture">
                        @else 
                        <img class="card-img-top img-fluid roundend-circle mt-4" style="border-radius:50%;height:80px;width:80px;margin:auto;" src="{{asset('backend/img/avatar.png')}}" alt="profile picture">
                        @endif
                    </div>
                    <div class="card-body mt-4 ml-2">
                      <h5 class="card-title text-left"><small><i class="fas fa-user"></i> {{$profile->name}}</small></h5>
                      <p class="card-text text-left"><small><i class="fas fa-envelope"></i> {{$profile->email}}</small></p>
                      <p class="card-text text-left"><small class="text-muted"><i class="fas fa-hammer"></i> {{$profile->role}}</small></p>
                    </div>
                  </div>
            </div>
            <div class="col-md-8">
                <form class="border px-4 pt-2 pb-3" method="POST" action="{{route('user-profile-update',$profile->id)}}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label for="inputTitle" class="col-form-label">Họ và Tên <span>*</span></label>
                                <input id="inputTitle" type="text" name="name" placeholder="Enter name"  value="{{$profile->name}}" class="form-control">
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label for="inputEmail" class="col-form-label">Email</label>
                                <input id="inputEmail" disabled type="email" name="email" placeholder="Enter email"  value="{{$profile->email}}" class="form-control">
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                             </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label for="inputEmail" class="col-form-label">Số điện thoại</label>
                                <input id="inputnum_phone" type="sdt" name="number_phone" placeholder="Nhập số điện thoại"  value="{{$profile->number_phone}}" class="form-control">
                                @error('number_phone')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                             </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label for="inputPhoto" class="col-form-label">Ảnh</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i>Chọn
                                        </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$profile->photo}}">
                                 </div>
                                @error('photo')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                {{-- <label for="inputEmail" class="col-form-label">Địa chỉ 2</label>
                                <input id="inputEmail" type="textarea" name="email" placeholder="Enter email"  value="{{$profile->email}}" class="form-control"> --}}
                                <div class="mb-0">
                                    <label for="inputaddr1">Địa chỉ 1</label>
                                    <textarea class="form-control" name='address_1' placeholder="Nhập địa chỉ 1" id="exampleFormControlTextarea1" rows="3" value="{{$profile->address_1}}">{{$profile->address_1}}</textarea>
                                </div>
                                @error('address_1')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                             </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                {{-- <label for="inputEmail" class="col-form-label">Địa chỉ 2</label>
                                <input id="inputEmail" type="textarea" name="email" placeholder="Enter email"  value="{{$profile->email}}" class="form-control"> --}}
                                <div class="mb-0">
                                    <label for="inputaddr2">Địa chỉ 2</label>
                                    <textarea class="form-control" name='address_2' placeholder="Nhập địa chỉ 2" id="exampleFormControlTextarea2" rows="3" value="{{$profile->address_2}}">{{$profile->address_2}}</textarea>
                                </div>
                                @error('address_2')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                             </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label for="role" class="col-form-label">Quyền</label> <br>
                                <span class="badge badge-warning right"><b>
                                    {{-- <i class="nav-icon fas fa-customer"></i>  --}}
                                    <label name="role" class="col-form-label">--Khách hàng--</label></b>
                                    </span>
                                
                                {{-- <select name="role" class="form-control">
                                    <option value="">-----Chọn quyền-----</option>
                                        <option value="admin" {{(($profile->role=='admin')? 'selected' : '')}}>Admin</option>
                                        <option value="user" {{(($profile->role=='user')? 'selected' : '')}}>User</option>
                                </select> --}}
                                @error('role')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12"></div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <button type="submit" class="btn btn-success btn-sm">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
   </div>
</div>

@endsection

<style>
    .breadcrumbs{
        list-style: none;
    }
    .breadcrumbs li{
        float:left;
        margin-right:10px;
    }
    .breadcrumbs li a:hover{
        text-decoration: none;
    }
    .breadcrumbs li .active{
        color:red;
    }
    .breadcrumbs li+li:before{
      content:"/\00a0";
    }
    .image{
        background:url('{{asset('backend/img/background.jpg')}}');
        height:150px;
        background-position:center;
        background-attachment:cover;
        position: relative;
    }
    .image img{
        position: absolute;
        top:55%;
        left:35%;
        margin-top:30%;
    }
    i{
        font-size: 14px;
        padding-right:8px;
    }
  </style> 

@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>
@endpush