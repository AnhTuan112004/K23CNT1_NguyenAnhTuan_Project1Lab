@extends('_layouts.admins._master')

@section('title', 'Create Tin Tức')

@section('content-body')
<div class="container border">
    <div class="row">
        <div class="col">
            <form action="{{ route('natadmin.nattintuc.natCreateSubmit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h1>Thêm Mới Tin Tức</h1>
                    </div>
                    <div class="card-body">
                        <!-- Mã Tin Tức -->
                        <div class="mb-3">
                            <label for="natMaTT" class="form-label">Mã Tin Tức</label>
                            <input type="text" class="form-control" id="natMaTT" name="natMaTT" value="{{ old('natMaTT') }}">
                            @error('natMaTT')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tiêu đề tin tức -->
                        <div class="mb-3">
                            <label for="natTieuDe" class="form-label">Tiêu đề tin tức</label>
                            <input type="text" class="form-control" id="natTieuDe" name="natTieuDe" value="{{ old('natTieuDe') }}">
                            @error('natTieuDe')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Mô tả tin tức -->
                        <div class="mb-3">
                            <label for="natMoTa" class="form-label">Mô tả tin tức</label>
                            <input type="text" class="form-control" id="natMoTa" name="natMoTa" value="{{ old('natMoTa') }}">
                            @error('natMoTa')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Nội dung tin tức -->
                        <div class="mb-3">
                            <label for="natNoiDung" class="form-label">Nội dung tin tức</label>
                            <textarea class="form-control" id="natNoiDung" name="natNoiDung" rows="5">{{ old('natNoiDung') }}</textarea>
                            @error('natNoiDung')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Hình ảnh tin tức -->
                        <div class="mb-3">
                            <label for="natHinhAnh" class="form-label">Hình Ảnh</label>
                            <input type="file" class="form-control" id="natHinhAnh" name="natHinhAnh" accept="image/*">
                            @error('natHinhAnh')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Ngày đăng tin -->
                        <div class="mb-3">
                            <label for="natNgayDangTin" class="form-label">Ngày Đăng</label>
                            <input type="datetime-local" class="form-control" id="natNgayDangTin" name="natNgayDangTin" value="{{ old('natNgayDangTin') }}">
                            @error('natNgayDangTin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Ngày cập nhật -->
                        <div class="mb-3">
                            <label for="natNgayCapNhap" class="form-label">Ngày Cập Nhật</label>
                            <input type="datetime-local" class="form-control" id="natNgayCapNhap" name="natNgayCapNhap" value="{{ old('natNgayCapNhap') }}">
                            @error('natNgayCapNhap')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Trạng thái -->
                        <div class="mb-3">
                            <label for="natTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="natTrangThai1" name="natTrangThai" value="0" checked/>
                                <label for="natTrangThai1"> Hiển Thị</label>
                                &nbsp;
                                <input type="radio" id="natTrangThai0" name="natTrangThai" value="1"/>
                                <label for="natTrangThai0">Khóa</label>
                            </div>
                            @error('natTrangThai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success">Create</button>
                        <a href="{{ route('natadmins.nattintuc') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection