@extends('_layouts.frontend.user1')

@section('title', 'Trang Chủ')

@section('content-body')
<form action="{{ route('natuser.tt.natEditSubmit', ['id' => $natuser->id]) }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $natuser->id }}">

    <div class="card">
        <div class="card-header text-center">
            <h1 class="mb-0">Sửa Thông Tin bản thân</h1>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="natMaKhachHang" class="form-label">Mã Khách Hàng</label>
                <input type="text" class="form-control" id="natMaKhachHang" name="natMaKhachHang" value="{{ $natuser->natMaKhachHang }}" readonly>
                @error('natMaKhachHang')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="natHoTenKhachHang" class="form-label">Họ Tên </label>
                <input type="text" class="form-control" id="natHoTenKhachHang" name="natHoTenKhachHang" value="{{ old('natHoTenKhachHang', $natuser->natHoTenKhachHang) }}">
                @error('natHoTenKhachHang')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="natEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="natEmail" name="natEmail" value="{{ old('natEmail', $natuser->natEmail) }}">
                @error('natEmail')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="natMatKhau" class="form-label">Mật Khẩu</label>
                <input type="password" class="form-control" id="natMatKhau" name="natMatKhau" value="{{ old('natMatKhau', '') }}" >
                @error('natMatKhau')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            

            <div class="mb-3">
                <label for="natDienThoai" class="form-label">Điện Thoại</label>
                <input type="tel" class="form-control" id="natDienThoai" name="natDienThoai" value="{{ old('natDienThoai', $natuser->natDienThoai) }}">
                @error('natDienThoai')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="natDiaChi" class="form-label">Địa Chỉ</label>
                <input type="text" class="form-control" id="natDiaChi" name="natDiaChi" value="{{ old('natDiaChi', $natuser->natDiaChi) }}">
                @error('natDiaChi')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="natNgayDangKy" class="form-label">Ngày Đăng Ký</label>
                <input type="date" class="form-control" id="natNgayDangKy" name="natNgayDangKy" value="{{ old('natNgayDangKy', $natuser->natNgayDangKy) }}">
                @error('natNgayDangKy')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="natTrangThai" class="form-label">Trạng Thái</label>
                <select name="natTrangThai" id="natTrangThai" class="form-control" required>
                    <option value="" disabled {{ old('natTrangThai') == '' ? 'selected' : '' }}>Chọn trạng thái</option>
                    <option value="0" {{ old('natTrangThai', $natuser->natTrangThai) == 0 ? 'selected' : '' }}>Hoạt Động</option>
                    <option value="1" {{ old('natTrangThai', $natuser->natTrangThai) == 1 ? 'selected' : '' }}>Tạm Khóa</option>
                    <option value="2" {{ old('natTrangThai', $natuser->natTrangThai) == 2 ? 'selected' : '' }}>Khóa</option>
                </select>
                @error('natTrangThai')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            

        </div>
        <div class="card-footer text-center">
            <button class="btn btn-success" type="submit">Cập nhật</button>
            <a href="{{ route('natuser.home1') }}" class="btn btn-primary">Trở lại</a>
          
        </div>
    </div>
</form>
@endsection 