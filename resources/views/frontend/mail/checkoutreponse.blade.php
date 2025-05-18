<div>
    <p>CHÚC MỪNG QUÝ KHÁCH ĐÃ ĐẶT HÀNG THÀNH CÔNG</p>
    <p>Bạn đã đặt hàng thành công với mã {{$donhang['mahd']}}  trị giá {{number_format($donhang['tongtien']),2}}đ </p>
    <p>@if($donhang['trangthaitt']=='1')
        Trạng thái: Chờ xác nhận
        @elseif($donhang['trangthaitt']=='2')
        Trạng thái: Đã xác nhận đơn
        @elseif($donhang['trangthaitt']=='3')
        Trạng thái: Đang giao hàng
        @else
        Trạng thái: Đã giao
        @endif
    <p>Sau khi shop xác nhận đơn hàng sản phẩm sẽ được giao đến địa chỉ {{$donhang['diachi']}} trong thời gian 3-4 ngày</p>
    <p>Gillee Shop rất hân hạnh được phục vụ bạn,</p>
</div>