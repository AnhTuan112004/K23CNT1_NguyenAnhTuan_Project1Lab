@extends('_layouts.admins._master')
@section('title','Create Khách Hàng')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{route('natadmin.natkhachhang.natCreateSubmit')}}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới Khách Hàng</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="natMaKhachHang" class="form-label">Mã Khách Hàng</label>
                                <input type="text" class="form-control" id="natMaKhachHang" name="natMaKhachHang" value="{{ old('natMaKhachHang') }}" >
                                @error('natMaKhachHang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="natHoTenKhachHang" class="form-label">Họ Tên Khách Hàng</label>
                                <input type="text" class="form-control" id="natHoTenKhachHang" name="natHoTenKhachHang" value="{{ old('natHoTenKhachHang') }}" >
                                @error('natHoTenKhachHang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="natEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="natEmail" name="natEmail" value="{{ old('natEmail') }}" >
                                @error('natEmail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="natMatKhau" class="form-label">Mật Khẩu</label>
                                <input type="password" class="form-control" id="natMatKhau" name="natMatKhau" value="{{ old('natMatKhau') }}" >
                                @error('natMatKhau')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="natDienThoai" class="form-label">Điện Thoại</label>
                                <input type="tel" class="form-control" id="natDienThoai" name="natDienThoai" value="{{ old('natDienThoai') }}" >
                                @error('natDienThoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="natDiaChi" class="form-label">Địa Chỉ</label>
                                <input type="text" class="form-control" id="natDiaChi" name="natDiaChi" value="{{ old('natDiaChi') }}" >
                                @error('natDiaChi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="natNgayDangKy" class="form-label">Ngày Đăng Ký</label>
                                <input type="date" class="form-control" id="natNgayDangKy" name="natNgayDangKy" value="{{ old('natNgayDangKy') }}" >
                                @error('natNgayDangKy')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="natTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="natTrangThai0" name="natTrangThai" value="0" checked/>
                                    <label for="natTrangThai1"> Hoạt Động</label>
                                    &nbsp;
                                    <input type="radio" id="natTrangThai1" name="natTrangThai" value="1"/>
                                    <label for="natTrangThai0">Tạm Khóa</label>
                                    &nbsp;
                                    <input type="radio" id="natTrangThai2" name="natTrangThai" value="2"/>
                                    <label for="natTrangThai0">Khóa</label>
                                </div>
                                @error('natTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">Create</button>
                            <a href="{{route('natadmins.natkhachhang')}}" class="btn btn-primary"> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection