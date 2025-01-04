@extends('_layouts.admins._master')

@section('title', 'Chỉnh Sửa Tin Tức')

@section('content-body')
<div class="container border mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>Chỉnh Sửa Tin Tức</h1>
                </div>
                <div class="card-body">
                    <!-- Form chỉnh sửa tin tức -->
                    <form action="{{ route('natadmin.nattintuc.natEditSubmit', $nattinTuc->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <!-- Tiêu đề tin tức -->
                        <div class="mb-3">
                            <label for="natTieuDe" class="form-label">Tiêu đề tin tức</label>
                            <input type="text" name="natTieuDe" class="form-control" value="{{ old('natTieuDe', $nattinTuc->natTieuDe) }}">
                            @error('natTieuDe')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Mô tả tin tức -->
                        <div class="mb-3">
                            <label for="natMoTa" class="form-label">Mô tả tin tức</label>
                            <input type="text" name="natMoTa" class="form-control" value="{{ old('natMoTa', $nattinTuc->natMoTa) }}">
                            @error('natMoTa')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nội dung tin tức -->
                        <div class="mb-3">
                            <label for="natNoiDung" class="form-label">Nội dung tin tức</label>
                            <textarea name="natNoiDung" class="form-control" rows="5">{{ old('natNoiDung', $nattinTuc->natNoiDung) }}</textarea>
                            @error('natNoiDung')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Hình ảnh tin tức -->
                        <div class="mb-3">
                            <label for="natHinhAnh" class="form-label">Hình ảnh</label>
                            <input type="file" name="natHinhAnh" class="form-control">
                            @if($nattinTuc->natHinhAnh)
                                <img src="{{ asset('storage/' . $nattinTuc->natHinhAnh) }}" alt="Tin tức {{ $nattinTuc->natTieuDe }}" width="200" class="mt-2">
                            @endif
                            @error('natHinhAnh')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Ngày đăng -->
                        <div class="mb-3">
                            <label for="natNgayDangTin" class="form-label">Ngày Đăng</label>
                            <input type="datetime-local" name="natNgayDangTin" class="form-control" value="{{ old('natNgayDangTin', $nattinTuc->natNgayDangTin) }}">
                            @error('natNgayDangTin')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Ngày cập nhật -->
                        <div class="mb-3">
                            <label for="natNgayCapNhap" class="form-label">Ngày Cập Nhật</label>
                            <input type="datetime-local" name="natNgayCapNhap" class="form-control" value="{{ old('natNgayCapNhap', $nattinTuc->natNgayCapNhap) }}">
                            @error('natNgayCapNhap')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Trạng thái -->
                        <div class="mb-3">
                            <label for="natTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="natTrangThai1" name="natTrangThai" value="1" {{ old('natTrangThai', $nattinTuc->natTrangThai) == 1 ? 'checked' : '' }} />
                                <label for="natTrangThai1">Khóa</label>
                                &nbsp;
                                <input type="radio" id="natTrangThai0" name="natTrangThai" value="0" {{ old('natTrangThai', $nattinTuc->natTrangThai) == 0 ? 'checked' : '' }} />
                                <label for="natTrangThai0">Hiển Thị</label>
                            </div>
                            @error('natTrangThai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Nút lưu -->
                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    </form>
                </div>
                <div class="card-footer">
                    <!-- Nút quay lại danh sách tin tức -->
                    <a href="{{ route('natadmins.nattintuc') }}" class="btn btn-secondary">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection