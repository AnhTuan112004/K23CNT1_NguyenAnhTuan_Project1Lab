@extends('_layouts.admins._master')
@section('title','Sửa Loại Sản Phẩm')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <!-- Update the form action route to pass the natMaLoai as a parameter -->
                <form action="{{ route('natadmin.natloaisanpham.natEditSubmit') }}" method="POST">
                    @csrf
                    <!-- Hidden input for the ID -->
                    <input type="hidden" name="id" value="{{ $natloaisanpham->id }}">

                    <div class="card">
                        <div class="card-header">
                            <h1>Sửa loại sản phẩm</h1>
                        </div>
                        <div class="card-body">
                            <!-- Mã Loại (disabled) -->
                            <div class="mb-3">
                                <label for="natMaLoai" class="form-label">Mã Loại</label>
                                <input type="text" class="form-control" id="natMaLoai" name="natMaLoai" value="{{ $natloaisanpham->natMaLoai }}" >
                                @error('natMaLoai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>

                            <!-- Tên Loại -->
                            <div class="mb-3">
                                <label for="natTenLoai" class="form-label">Tên Loại</label>
                                <input type="text" class="form-control" id="natTenLoai" name="natTenLoai" value="{{ old('natTenLoai', $natloaisanpham->natTenLoai) }}" >
                                @error('natTenLoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Trạng Thái -->
                            <div class="mb-3">
                                <label for="natTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="natTrangThai1" name="natTrangThai" value="1" {{ old('natTrangThai', $natloaisanpham->natTrangThai) == 1 ? 'checked' : '' }} />
                                    <label for="natTrangThai1">Khóa</label>
                                    &nbsp;
                                    <input type="radio" id="natTrangThai0" name="natTrangThai" value="0" {{ old('natTrangThai', $natloaisanpham->natTrangThai) == 0 ? 'checked' : '' }} />
                                    <label for="natTrangThai0">Hiển Thị</label>
                                </div>
                                @error('natTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <!-- Change button label to "Cập nhật" (Update) -->
                            <button class="btn btn-success" type="submit">Cập nhật</button>
                            <a href="{{ route('natadmins.natloaisanpham') }}" class="btn btn-primary">Trở lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection