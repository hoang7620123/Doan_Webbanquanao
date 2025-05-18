@extends('backend.layouts.master')
@section('title','E-SHOP || Nhà Cung Cấp')
@section('main-content')

<div class="card">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Cập Nhật Nhà Cung Cấp</h6>
    </div>
    <div class="card-body">
      <form method="post" action="{{route('supplier.update',$supplier->id)}}">
        @csrf
        @method('PATCH')
        <div class="row">
          <div class="col-4">
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Tên nhà cung cấp<span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="tenncc" placeholder="Nhập tên nhà cung cấp"  value="{{$supplier->tenncc}}" class="form-control">
        @error('title')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
          </div>
          <div class="col-4">
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Địa chỉ<span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="diachi" placeholder="Nhập địa chỉ"  value="{{$supplier->diachi}}" class="form-control">
        @error('address')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
          </div>
          <div class="col-4">
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Điện thoại<span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="phone" placeholder="Nhập số điện thoại"  value="{{$supplier->phone}}" class="form-control">
        @error('phone')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Email<span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="email" placeholder="Nhập email"  value="{{$supplier->email}}" class="form-control">
        @error('email')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
          </div>
          <div class="col-4">
        <div class="form-group">
          <label for="status" class="col-form-label">Trạng thái <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="1">{{_('Hoạt Động')}}</option>
              <option value="0">{{_('Ngừng Hoạt Động')}}</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
          </div>
        </div>

        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Cập nhật</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#description').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });
</script>
@endpush
