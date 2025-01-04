@extends('_layouts.admins._master')
@section('title','Create  Sản Phẩm')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{route('natadmin.natsanpham.natCreateSubmit')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới sản phẩm</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="natMaSanPham" class="form-label">Mã sản phẩm</label>
                                <input type="text" class="form-control" id="natMaSanPham" name="natMaSanPham" value="{{ old('natMaSanPham') }}" >
                                @error('natMaSanPham')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="natTenSanPham" class="form-label">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="natTenSanPham" name="natTenSanPham" value="{{ old('natTenSanPham') }}" >
                                @error('natTenSanPham')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="natHinhAnh" class="form-label">Hình Ảnh</label>
                                <input type="file" class="form-control" id="natHinhAnh" name="natHinhAnh" accept="image/*">
                                @error('natHinhAnh')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            

                            <div class="mb-3">
                                <label for="natSoLuong" class="form-label">Số Lượng</label>
                                <input type="number" class="form-control" id="natSoLuong" name="natSoLuong" value="{{ old('natSoLuong') }}" >
                                @error('natSoLuong')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="natDonGia" class="form-label">Đơn Giá</label>
                                <input type="number" class="form-control" id="natDonGia" name="natDonGia" value="{{ old('natDonGia') }}" >
                                @error('natDonGia')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="natMaLoai" class="form-label">Loại Danh Muc</label>
                                <select name="natMaLoai" id="natMaLoai" class="form-control">
                                    @foreach ($natloaisanpham as $item)
                                        <option value="{{ $item->id }}">{{ $item->natTenLoai }}</option>
                                    @endforeach
                                </select>
                                @error('natMaLoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            

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
                            <a href="{{route('natadims.natsanpham')}}" class="btn btn-primary"> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection