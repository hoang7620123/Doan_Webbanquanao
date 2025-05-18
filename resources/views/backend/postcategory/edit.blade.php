@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Cập Nhật Loại Bài Viết</h6>
    </div>
    <div class="card-body">
      <form method="post" action="{{route('post-category.update',$postCategory->id)}}">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Tên Loại Bài Viết</label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{$postCategory->title}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="status" class="col-form-label">Trạng Thái</label>
          <select name="status" class="form-control">
            <option value="1" {{(($postCategory->status=='1') ? 'selected' : '')}}>{{_('Hoạt Động')}}</option>
            <option value="0" {{(($postCategory->status=='0') ? 'selected' : '')}}>{{_('Ngừng Hoạt Động')}}</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Cập nhật</button>
        </div>
      </form>
    </div>
</div>

@endsection
