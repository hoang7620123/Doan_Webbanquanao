@extends('backend.layouts.master')

@section('main-content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="row">

        </div>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Danh sách đơn hàng</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if (count($orders) > 0)
                    <table class="table table-bordered" id="order-dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Mã Đơn</th>
                                <th>Họ Tên</th>
                                <th>Email</th>
                                <th>Điện Thoại</th>
                                <th>Địa chỉ</th>
                                <th>Hình Thức</th>
                                <th>Tổng Tiền</th>
                                <th>Trạng thái</th>
                                <th>Tùy chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                @php
                                    $shipping_charge = DB::table('shippings')
                                        ->where('id', $order->shipping_id)
                                        ->pluck('price');
                                @endphp
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->mahd }}</td>
                                    <td>{{ $order->hoten }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->diachi }}</td>
                                    <td>
                                        @if ($order->httt == 1)
                                            Tiền Mặt
                                        @elseif($order->httt == 2)
                                            MoMo
                                        @elseif($order->httt == 3)
                                            PayPal
                                        @else
                                            ZaloPay
                                        @endif
                                    </td>
                                    <td>{{ number_format($order->tongtien), 2 }}VNĐ</td>
                                    <td>
                                        @if ($order->trangthaitt == '1')
                                            <span class="badge badge-danger">{{ _('Chờ Tiếp Nhận') }}</span>
                                        @elseif($order->trangthaitt == '2')
                                            <span class="badge badge-primary">{{ _('Đã Tiếp Nhận') }}</span>
                                        @elseif($order->trangthaitt == '3')
                                            <span class="badge badge-warning">{{ _('Đang Giao Hàng') }}</span>
                                        @elseif($order->trangthaitt == '4')
                                            <span class="badge badge-success">{{ _('Đã Giao') }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ _('Đã Hủy') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm float-left mr-1"
                                            style="height:30px; width:30px;border-radius:50%" data-toggle="modal"
                                            data-target="#exampleModalLong-{{ $order->id }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        {{-- <a href="{{ route('order.show', $order->id) }}"
                                            class="btn btn-warning btn-sm float-left mr-1"
                                            style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip"
                                            title="view" data-placement="bottom"><i class="fas fa-eye"></i></a> --}}
                                        <a href="{{ route('order.edit', $order->id) }}"
                                            class="btn btn-primary btn-sm float-left mr-1"
                                            style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip"
                                            title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                        <form method="POST" action="{{ route('order.destroy', [$order->id]) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm dltBtn" data-id={{ $order->id }}
                                                style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip"
                                                data-placement="bottom" title="Delete"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <span style="float:right"></span>
                @else
                    <h6 class="text-center">Không có dữ liệu</h6>
                @endif
            </div>
        </div>
    </div>

 
    @foreach ($orders as $data)
        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong-{{ $data->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết đơn hàng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered" id="order-dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Giá</th>
                                    <th>Số Lượng</th>
                                    <th>Thành Tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order_details as $orderDetail)
                                    @if ($data->id == $orderDetail->id_donhang)
                                        <tr>
                                            <td>{{$orderDetail->product_info['title']}}</td>
                                            <td>{{ number_format($orderDetail->giaban),2}} VNĐ</td>
                                            <td>{{$orderDetail->soluong}}</td>
                                            <td>{{ number_format($orderDetail->thanhtien),2 }} VNĐ</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection

@push('styles')
    <link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <style>
        div.dataTables_wrapper div.dataTables_paginate {
            display: none;
        }
    </style>
@endpush

@push('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('backend/js/demo/datatables-demo.js') }}"></script>
    <script>
        $('#order-dataTable').DataTable({
            "columnDefs": [{
                "orderable": false,
                "targets": [8]
            }]
        });

        // Sweet alert

        function deleteData(id) {

        }
    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.dltBtn').click(function(e) {
                var form = $(this).closest('form');
                var dataID = $(this).data('id');
                // alert(dataID);
                e.preventDefault();
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this data!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        } else {
                            swal("Your data is safe!");
                        }
                    });
            })
        })
    </script>
@endpush
