@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">THÊM TAG BÀI VIẾT</h5>
    <div class="card-body">
      <form method="post" action="{{route('post-tag.store')}}">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Tag</label>
          <input id="inputTitle" type="text" name="title" placeholder="Nhập tag"  value="{{old('title')}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="status" class="col-form-label">Trạng thái</label>
          <select name="status" class="form-control">
              <option value="active">Hoạt động</option>
              <option value="inactive">Không hoạt động</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Làm lại</button>
           <button class="btn btn-success" type="submit">Thêm</button>
        </div>
      </form>
    </div>
</div>

@endsection
