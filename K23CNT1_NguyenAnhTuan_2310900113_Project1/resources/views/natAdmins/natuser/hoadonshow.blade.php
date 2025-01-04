    <!-- resources/views/natuser/hoadonshow.blade.php -->

    @extends('_layouts.frontend.user1')  <!-- Hoặc layout của bạn -->

    @section('title', 'Thông Tin Hóa Đơn')

    @section('content-body')
    <div class="container">
        <h1>Thông Tin Hóa Đơn</h1>
        
        <div class="card">
            <div class="card-header">
                <h3>Hóa Đơn ID: {{ $hoaDon->natMaHoaDon }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Tên Khách Hàng:</strong> {{ $hoaDon->natHoTenKhachHang }}</p>
                <p><strong>Email:</strong> {{ $hoaDon->natEmail }}</p>
                <p><strong>Số Điện Thoại:</strong> {{ $hoaDon->natDienThoai }}</p>
                <p><strong>Địa Chỉ:</strong> {{ $hoaDon->natDiaChi }}</p>
                <p><strong>Tổng Giá Trị:</strong> {{ number_format($hoaDon->natTongGiaTri, 0, ',', '.') }} VND</p>
                <p><strong>Ngày Hóa Đơn:</strong> {{ $hoaDon->natNgayHoaDon }}</p>
                <p><strong>Ngày Nhận:</strong> {{ $hoaDon->natNgayNhan }}</p>
                <p><strong>Trạng Thái:</strong> 
                    @if ($hoaDon->natTrangThai == 0)
                        Chưa Thanh Toán
                    @elseif ($hoaDon->natTrangThai == 1)
                        Đã Thanh Toán
                    @endif
                </p>
            </div>
            <a href="{{ route('cthoadon.create', ['hoaDonId' => $hoaDon->id, 'sanPhamId' => $sanPham->id]) }}">Tạo chi tiết hóa đơn</a>

        </div>
    </div>

    @endsection