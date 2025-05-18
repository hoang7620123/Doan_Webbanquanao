@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Cập Nhật Sản Phẩm</h6>
    </div>
    <div class="card-body">
      <form method="post" action="{{route('product.update',$product->id)}}">
        @csrf
        @method('PATCH')
        <div class="row">
          <div class="col-4">
              <div class="form-group">
                  <label for="name">Tên Sản Phẩm</label>
                  <input class="form-control" id="title" type="text" name="title"
                      value="{{$product->title}}">
                  @error('title')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
          </div>
          <div class="col-4">
              <div class="form-group">
                  <label for="price">Giá</label>
                  <input class="form-control" id="price" type="number" name="price"
                      value="{{ $product->price }}">
                  @error('price')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
          </div>
          <div class="col-4">
              <div class="form-group">
                  <label for="quantity">Số Lượng</label>
                  <input class="form-control" id="quantity" type="number" name="stock"
                      value="{{ $product->stock }}">
                  @error('stock')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
          </div>
      </div>
      <div class="row">

          <div class="col-3">
              <div class="form-group">
                  <label for="is_featured">Sản Phẩm Đặc Biệt</label><br>
                  <input type="checkbox" name='is_featured' id='is_featured' value='{{$product->is_featured}}' {{(($product->is_featured) ? 'checked' : '')}}> Yes
              </div>
          </div>

          <div class="col-3">
            <div class="form-group">
                <label for="id_nhacungcap">Nhà cung cấp <span class="text-danger">*</span></label>
                <select name="id_nhacungcap" id="id_nhacungcap" class="form-control">
                    <option value="">--Chọn nhà cung cấp--</option>
                    @foreach ($nhacungcap as $key => $data)
                        <option value='{{ $data->id }}' {{(($product->id_nhacungcap==$data->id)? 'selected'  : '')}}>{{ $data->tenncc }}</option>
                    @endforeach
                </select>
            </div>
        </div>

          <div class="col-3">
              <div class="form-group">
                  <label for="cat_id">Danh mục <span class="text-danger">*</span></label>
                  <select name="cat_id" id="cat_id" class="form-control">
                    <option value="">--Select any category--</option>
                    @foreach($categories as $key=>$cat_data)
                        <option value='{{$cat_data->id}}' {{(($product->cat_id==$cat_data->id)? 'selected' : '')}}>{{$cat_data->title}}</option>
                    @endforeach
                </select>
              </div>
          </div>

          <div class="col-3">
              <div class="form-group d-none" id="child_cat_div">
                  <label for="child_cat_id">Danh Mục Con</label>
                  <select name="child_cat_id" id="child_cat_id" class="form-control">
                      <option value="">--Select any category--</option>
                  </select>
              </div>
          </div>

      </div>

      <div class="row">

        <div class="col-4">
          <div class="form-group">
            <label for="discount" class="col-form-label">Khuyến mãi(%)</label>
            <input id="discount" type="number" name="discount" min="0" max="100" placeholder="Enter discount"  value="{{$product->discount}}" class="form-control">
            @error('discount')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
        </div>

        <div class="col-4">
          <div class="form-group">
            <label for="discount" class="col-form-label">Size</label>
            <select name="size[]" class="form-control selectpicker"  multiple data-live-search="true">
              <option value="">--Select any size--</option>
              @foreach($items as $item)              
                @php 
                $data=explode(',',$item->size);
                // dd($data);
                @endphp
              <option value="S"  @if( in_array( "S",$data ) ) selected @endif>Small</option>
              <option value="M"  @if( in_array( "M",$data ) ) selected @endif>Medium</option>
              <option value="L"  @if( in_array( "L",$data ) ) selected @endif>Large</option>
              <option value="XL"  @if( in_array( "XL",$data ) ) selected @endif>Extra Large</option>
              @endforeach
          </select>
          </div>
        </div>

      <div class="col-4">
        <div class="form-group">
          <label for="brand_id" class="col-form-label">Thương hiệu</label>
          <select name="brand_id" class="form-control">
              <option value="">--Chọn thương hiệu--</option>
              @foreach($brands as $brand)
              <option value="{{$brand->id}}" {{(($product->brand_id==$brand->id)? 'selected':'')}}>{{$brand->title}}</option>
             @endforeach
          </select>
        </div>
      </div>
      </div>

      <div class="form-group">
        <label for="summary" class="col-form-label">Chi tiết sản phẩm<span class="text-danger">*</span></label>
        <textarea class="form-control" id="summary" name="summary">{{$product->summary}}</textarea>
        @error('summary')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>

      <div class="form-group">
        <label for="description" class="col-form-label">Hướng dẫn bảo quản</label>
        <textarea class="form-control" id="description" name="description">{{$product->description}}</textarea>
        @error('description')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>

  <div class="row">

    <div class="col-4">
      <div class="form-group">
        <label for="condition">Tình trạng</label>
        <select name="condition" class="form-control">
            <option value="">--Chọn tình trạng--</option>
          
              <option value="0" {{(($product->condition=='0')? 'selected':'')}}>Mặc Định</option>
              <option value="1" {{(($product->condition=='1')? 'selected':'')}}>Mới</option>
              <option value="2" {{(($product->condition=='2')? 'selected':'')}}>Hot</option>
        </select>
      </div>
    </div>

    <div class="col-4">
      <div class="form-group">
        <label for="inputPhoto" class="col-form-label">Hình Ảnh {{_('(Kích Thước Ảnh 400X266)')}}<span class="text-danger">*</span></label>
        <div class="input-group">
            <span class="input-group-btn">
                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                <i class="fa fa-picture-o"></i>Chọn ảnh
                </a>
            </span>
        <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$product->photo}}">
      </div>
      <div id="holder" style="margin-top:15px;max-height:100px;"></div>
        @error('photo')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
    </div>

    <div class="col-4">
      <div class="form-group">
        <label for="status" class="col-form-label">Trạng thái <span class="text-danger">*</span></label>
        <select name="status" class="form-control">
            <option value="1" {{(($product->status=='1')? 'selected' : '')}}>Kinh Doanh</option>
            <option value="0" {{(($product->status=='0')? 'selected' : '')}}>Ngừng Kinh Doanh</option>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#summary').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });
    $(document).ready(function() {
      $('#description').summernote({
        placeholder: "Write detail Description.....",
          tabsize: 2,
          height: 150
      });
    });
    $(document).ready(function() {
      $('#specifications').summernote({
        placeholder: "Write detail Description.....",
          tabsize: 2,
          height: 150
      });
    });
</script>

<script>
  var  child_cat_id='{{$product->child_cat_id}}';
        // alert(child_cat_id);
        $('#cat_id').change(function(){
            var cat_id=$(this).val();

            if(cat_id !=null){
                // ajax call
                $.ajax({
                    url:"/admin/category/"+cat_id+"/child",
                    type:"POST",
                    data:{
                        _token:"{{csrf_token()}}"
                    },
                    success:function(response){
                        if(typeof(response)!='object'){
                            response=$.parseJSON(response);
                        }
                        var html_option="<option value=''>--Select any one--</option>";
                        if(response.status){
                            var data=response.data;
                            if(response.data){
                                $('#child_cat_div').removeClass('d-none');
                                $.each(data,function(id,title){
                                    html_option += "<option value='"+id+"' "+(child_cat_id==id ? 'selected ' : '')+">"+title+"</option>";
                                });
                            }
                            else{
                                console.log('no response data');
                            }
                        }
                        else{
                            $('#child_cat_div').addClass('d-none');
                        }
                        $('#child_cat_id').html(html_option);

                    }
                });
            }
            else{

            }

        });
        if(child_cat_id!=null){
            $('#cat_id').change();
        }
</script>
@endpush
