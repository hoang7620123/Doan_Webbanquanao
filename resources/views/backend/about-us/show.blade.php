@extends('backend.layouts.master')
@section('main-content')
@section('title', 'Về chúng tôi')
<div class="card">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary float-left">Về chúng tôi</h6>
    </div>
    <div class="card-body">
        <form method="post" action="{{route('about-us.update') }}">
            @csrf <div class="form-group">
                <label for="description" class="col-form-label">Giới Thiệu<span class="text-danger"></span></label>
                <textarea class="form-control" id="description" name="description">{{ $data->description }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <button class="btn btn-success" type="submit">Cập nhật</button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/summernote/summernote.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{ asset('backend/summernote/summernote.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
    $(document).ready(function() {
        $('#description').summernote({
            placeholder: "Giới thiệu.....",
            tabsize: 2,
            height: 150
        });
    });
</script>
@endpush
