@extends('_layouts.admins._master')

@section('title', 'Chỉnh Sửa Sản Phẩm')

@section('content-body')
<div class="container border mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>Chỉnh Sửa Sản Phẩm</h1>
                </div>
                <div class="card-body">
                    <!-- Form chỉnh sửa sản phẩm -->
                    <form action="{{ route('natadmin.natsanpham.natEditSubmit', $natsanpham->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <!-- Mã sản phẩm -->
                        <div class="mb-3">
                            <label for="natMaSanPham" class="form-label">Mã sản phẩm</label>
                            <input type="text" name="natMaSanPham" class="form-control" value="{{ old('natMaSanPham', $natsanpham->natMaSanPham) }}">
                            @error('natMaSanPham')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tên sản phẩm -->
                        <div class="mb-3">
                            <label for="natTenSanPham" class="form-label">Tên sản phẩm</label>
                            <input type="text" name="natTenSanPham" class="form-control" value="{{ old('natTenSanPham', $natsanpham->natTenSanPham) }}">
                            @error('natTenSanPham')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Hình ảnh sản phẩm -->
                        <div class="mb-3">
                            <label for="natHinhAnh" class="form-label">Hình ảnh</label>
                            <input type="file" name="natHinhAnh" class="form-control">
                            @if($natsanpham->natHinhAnh)
                                <img src="{{ asset('storage/' . $natsanpham->natHinhAnh) }}" alt="Sản phẩm {{ $natsanpham->natMaSanPham }}" width="200" class="mt-2">
                            @endif
                            @error('natHinhAnh')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Số lượng -->
                        <div class="mb-3">
                            <label for="natSoLuong" class="form-label">Số lượng</label>
                            <input type="number" name="natSoLuong" class="form-control" value="{{ old('natSoLuong', $natsanpham->natSoLuong) }}">
                            @error('natSoLuong')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Đơn giá -->
                        <div class="mb-3">
                            <label for="natDonGia" class="form-label">Đơn giá</label>
                            <input type="number" name="natDonGia" class="form-control" value="{{ old('natDonGia', $natsanpham->natDonGia) }}">
                            @error('natDonGia')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Mã Loại -->
                        <div class="mb-3">
                            <label for="natMaLoai" class="form-label">Loại Danh Muc</label>
                            <select name="natMaLoai" id="natMaLoai" class="form-control">
                                @foreach ($natloaisanpham as $item)
                                    <option value="{{ $item->id }}" 
                                        {{ old('natMaLoai', $natsanpham->natMaLoai) == $item->id ? 'selected' : '' }}>
                                        {{ $item->natTenLoai }}
                                    </option>
                                @endforeach
                            </select>
                            @error('natMaLoai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- Trạng thái -->
                        <div class="mb-3">
                            <label for="natTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="natTrangThai1" name="natTrangThai" value="1" {{ old('natTrangThai', $natsanpham->natTrangThai) == 1 ? 'checked' : '' }} />
                                <label for="natTrangThai1">Khóa</label>
                                &nbsp;
                                <input type="radio" id="natTrangThai0" name="natTrangThai" value="0" {{ old('natTrangThai', $natsanpham->natTrangThai) == 0 ? 'checked' : '' }} />
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
                    <!-- Nút quay lại danh sách sản phẩm -->
                    <a href="{{ route('natadims.natsanpham') }}" class="btn btn-secondary">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection