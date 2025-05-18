@extends('backend.layouts.master')

@section('main-content')
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Thêm Mới Khuyến Mãi</h6>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('coupon.store') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="inputTitle" class="col-form-label">Tên Khuyến Mãi<span
                                    class="text-danger">*</span></label>
                            <input id="inputTitle" type="text" name="title" placeholder="Enter Coupon Code"
                                value="{{ old('title') }}" class="form-control">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-4">

                        <div class="form-group">
                            <label for="inputTitle" class="col-form-label">Mã Giảm Giá<span
                                    class="text-danger">*</span></label>
                            <input id="inputTitle" type="text" name="code" placeholder="Mã giảm giá"
                                value="{{ old('code') }}" class="form-control">
                            @error('code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="inputTitle" class="col-form-label">Giá Khuyến Mãi<span
                                    class="text-danger">*</span></label>
                            <input id="inputTitle" type="number" name="value" placeholder="Enter Coupon value"
                                value="{{ old('value') }}" class="form-control">
                            @error('value')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="" class="col-form-label">Ngày Bắt Đầu</label>
                            <input class="form-control" type="datetime-local" id="birthdaytime" name="ngaybatdau"
                                value="{{ old('ngaybatdau') }}">
                            @error('ngaybd')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="" class="col-form-label">Ngày Kết Thúc</label>
                            <input class="form-control" type="datetime-local" id="birthdaytime" name="ngayketthuc"
                                value="{{ old('ngayketthuc') }}">
                            @error('ngaykt')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="status" class="col-form-label">Trạng thái <span
                                    class="text-danger">*</span></label>
                            <select name="status" class="form-control">
                                <option value="1">Hoạt Động</option>
                                <option value="0">Không Hoạt Động</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <button type="reset" class="btn btn-warning">Làm mới</button>
                    <button class="btn btn-success" type="submit">Lưu</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/summernote/summernote.min.css') }}">
@endpush
@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="{{ asset('backend/summernote/summernote.min.js') }}"></script>
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
    <script>
        $('#lfm').filemanager('image');

        $(document).ready(function() {
            $('#summary').summernote({
                placeholder: "Mô tả về chương trình khuyến mãi.....",
                tabsize: 2,
                height: 120
            });
        });
    </script>
@endpush
