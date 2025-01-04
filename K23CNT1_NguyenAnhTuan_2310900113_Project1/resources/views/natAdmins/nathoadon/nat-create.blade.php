@extends('_layouts.admins._master')
@section('title','Create Hóa Đơn')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{route('natadmin.nathoadon.natCreateSubmit')}}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới Hóa Đơn</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="natMaHoaDon" class="form-label">Mã Hóa Đơn</label>
                                <input type="text" class="form-control" id="natMaHoaDon" name="natMaHoaDon" value="{{ old('natMaHoaDon') }}" >
                                @error('natMaHoaDon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="natMaKhachHang" class="form-label">Khách Hàng</label>
                                <select name="natMaKhachHang" id="natMaKhachHang" class="form-control">
                                    @foreach ($natkhachhang as $item)
                                        <option value="{{ $item->id }}">{{ $item->natHoTenKhachHang }}</option>
                                    @endforeach
                                </select>
                                @error('natMaKhachHang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="natNgayHoaDon" class="form-label">Ngày Hóa Đơn</label>
                                <input type="date" class="form-control" id="natNgayHoaDon" name="natNgayHoaDon" value="{{ old('natNgayHoaDon') }}" >
                                @error('natNgayHoaDon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="natNgayNhan" class="form-label">Ngày Nhận</label>
                                <input type="date" class="form-control" id="natNgayNhan" name="natNgayNhan" value="{{ old('natNgayNhan') }}" >
                                @error('natNgayNhan')
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
                                <input type="Email" class="form-control" id="natEmail" name="natEmail" value="{{ old('natEmail') }}" >
                                @error('natEmail')
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
                                <label for="natTongGiaTri" class="form-label">Tổng Giá Trị</label>
                                <input type="number" class="form-control" id="natTongGiaTri" name="natTongGiaTri" value="{{ old('natTongGiaTri') }}" >
                                @error('natTongGiaTri')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="natTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="natTrangThai0" name="natTrangThai" value="0" checked/>
                                    <label for="natTrangThai1">Chờ Sử Lý</label>
                                    &nbsp;
                                    <input type="radio" id="natTrangThai1" name="natTrangThai" value="1"/>
                                    <label for="natTrangThai0">Đang Sử Lý</label>
                                    &nbsp;
                                    <input type="radio" id="natTrangThai2" name="natTrangThai" value="2"/>
                                    <label for="natTrangThai0">Đã hoàn Thành</label>
                                </div>
                                @error('natTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">Create</button>
                            <a href="{{route('natadmins.nathoadon')}}" class="btn btn-primary"> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection