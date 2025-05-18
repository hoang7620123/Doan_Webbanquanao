@extends('backend.layouts.master')

@section('title','Order Detail')

@section('main-content')
<div class="card">
  <h5 class="card-header">Cập Nhật Đơn Hàng</h5>
  <div class="card-body">
    <form action="{{route('order.update',$order->id)}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="status">Trạng Thái :</label>
        <select name="trangthaitt" id="" class="form-control">
          <option value="1"   {{(($order->trangthaitt=='1')? 'selected' : '')}}>Chờ Tiếp Nhận</option>
          <option value="2"  {{(($order->trangthaitt=='2')? 'selected' : '')}}>Đã Tiếp Nhận</option>
          <option value="3"   {{(($order->trangthaitt=='3')? 'selected' : '')}}>Đang Giao</option>
          <option value="4"  {{(($order->trangthaitt=='4')? 'selected' : '')}}>Đã Giao</option>
          <option value="0"  {{(($order->trangthaitt=='0')? 'selected' : '')}}>Đã Hủy</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Cập Nhật</button>
    </form>
  </div>
</div>
@endsection

@push('styles')
<style>
    .order-info,.shipping-info{
        background:#ECECEC;
        padding:20px;
    }
    .order-info h4,.shipping-info h4{
        text-decoration: underline;
    }

</style>
@endpush
