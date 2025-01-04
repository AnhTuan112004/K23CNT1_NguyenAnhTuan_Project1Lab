@extends('_layouts.frontend.user1')

@section('title', 'Hóa Đơn')

@section('content-body')
<div class="container" >
    <h1 style="color: black">Mua Sản Phẩm: {{ $sanPham->natTenSanPham }}</h1>

    <form action="{{ route('hoadon.store', ['sanPham' => $sanPham->id]) }}" method="POST">
        @csrf
        <!-- Các trường khách hàng -->
        <div class="mb-3">
            <label for="natMaKhachHang" class="form-label" style="color: black">Mã Khách Hàng</label>
            <input type="text" name="natMaKhachHang" value="{{ Session::get('natMaKhachHang', '') }}" class="form-control" required readonly>
        </div>

        <div class="mb-3">
            <label for="natHoTenKhachHang" class="form-label" style="color: black">Họ Tên Khách Hàng</label>
            <input type="text" name="natHoTenKhachHang" value="{{ Session::get('username1', '') }}" class="form-control" required readonly>
        </div>

        <div class="mb-3">
            <label for="natEmail" class="form-label" style="color: black">Email</label>
            <input type="email" name="natEmail" value="{{ Session::get('natEmail', '') }}" class="form-control" required readonly>
        </div>

        <div class="mb-3">
            <label for="natDienThoai" class="form-label" style="color: black">Số Điện Thoại</label>
            <input type="text" name="natDienThoai" value="{{ Session::get('natDienThoai', '') }}" class="form-control" required readonly>
        </div>

        <div class="mb-3">
            <label for="natDiaChi" class="form-label" style="color: black">Địa Chỉ</label>
            <input type="text" name="natDiaChi" value="{{ Session::get('natDiaChi', '') }}" class="form-control" required readonly>
        </div>

        <!-- Chọn sản phẩm và số lượng -->
        <input type="hidden" name="natSanPhamId" value="{{ $sanPham->id }}" required>
        <div class="mb-3">
            <label for="natSoLuong" class="form-label" style="color: black">Số Lượng</label>
            <input type="number" name="natSoLuong" value="1" min="1" max="{{ $sanPham->natSoLuong }}" class="form-control" required>
        </div>

        <!-- Nút Mua -->
        <button type="submit" class="btn btn-primary">Mua Sản Phẩm</button>
        
    </form>
</div>
@endsection