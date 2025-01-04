@extends('_layouts.admins._master')
@section('title','Sửa Loại Khách Hàng')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <!-- Update the form action route to pass the natMaKhachHang as a parameter -->
                <form action="{{ route('natadmin.natkhachhang.natEditSubmit', ['id' => $natkhachhang->id]) }}" method="POST">
                    @csrf
                    <!-- Hidden input for the ID -->
                    <input type="hidden" name="id" value="{{ $natkhachhang->id }}">

                    <div class="card">
                        <div class="card-header">
                            <h1>Sửa loại Khách Hàng</h1>
                        </div>
                        <div class="card-body">
                            <!-- Mã Loại (disabled) -->
                            <div class="mb-3">
                                <label for="natMaKhachHang" class="form-label">Mã Khách Hàng</label>
                                <input type="text" class="form-control" id="natMaKhachHang" name="natMaKhachHang" value="{{ $natkhachhang->natMaKhachHang }}" >
                                @error('natMaKhachHang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>

                            <!-- Tên Loại -->
                            <div class="mb-3">
                                <label for="natHoTenKhachHang" class="form-label">Họ Tên Khách Hàng</label>
                                <input type="text" class="form-control" id="natHoTenKhachHang" name="natHoTenKhachHang" value="{{ old('natHoTenKhachHang', $natkhachhang->natHoTenKhachHang) }}" >
                                @error('natHoTenKhachHang')
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="natEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="natEmail" name="natEmail" value="{{ old('natEmail', $natkhachhang->natEmail) }}" >
                                @error('natEmail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="natMatKhau" class="form-label">Mật Khẩu</label>
                                <input type="password" class="form-control" id="natMatKhau" name="natMatKhau" value="{{ old('natMatKhau', $natkhachhang->natMatKhau) }}" >
                                @error('natMatKhau')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="natDienThoai" class="form-label">Điện Thoại</label>
                                <input type="tel" class="form-control" id="natDienThoai" name="natDienThoai" value="{{ old('natDienThoai', $natkhachhang->natDienThoai) }}" >
                                @error('natDienThoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="natDiaChi" class="form-label">Địa Chỉ</label>
                                <input type="text" class="form-control" id="natDiaChi" name="natDiaChi" value="{{ old('natDiaChi', $natkhachhang->natDiaChi) }}" >
                                @error('natDiaChi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="natNgayDangKy" class="form-label">Ngày Đăng Ký</label>
                                <input type="date" class="form-control" id="natNgayDangKy" name="natNgayDangKy" value="{{ old('natNgayDangKy', $natkhachhang->natNgayDangKy) }}" >
                                @error('natNgayDangKy')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Trạng Thái -->
                            <div class="mb-3">
                                <label for="natTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="natTrangThai0" name="natTrangThai" value="0" {{ old('natTrangThai', $natkhachhang->natTrangThai) == 0 ? 'checked' : '' }} />
                                    <label for="natTrangThai0">Hoạt Động</label>
                                    &nbsp;
                                    <input type="radio" id="natTrangThai1" name="natTrangThai" value="1" {{ old('natTrangThai', $natkhachhang->natTrangThai) == 1 ? 'checked' : '' }} />
                                    <label for="natTrangThai1">Tạm Khóa</label>
                           
                                    &nbsp;
                                    <input type="radio" id="natTrangThai2" name="natTrangThai" value="2" {{ old('natTrangThai', $natkhachhang->natTrangThai) == 2 ? 'checked' : '' }} />
                                    <label for="natTrangThai0">Khóa</label>
                                </div>
                                @error('natTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <!-- Change button label to "Cập nhật" (Update) -->
                            <button class="btn btn-success" type="submit">Cập nhật</button>
                            <a href="{{ route('natadmins.natkhachhang') }}" class="btn btn-primary">Trở lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection