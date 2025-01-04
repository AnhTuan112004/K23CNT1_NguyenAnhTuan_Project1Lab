@extends('_layouts.admins._master')
@section('title','Create Loại Sản Phẩm')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{route('natadmin.natloaisanpham.natCreateSunmit')}}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới loại sản phẩm</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="natMaLoai" class="form-label">Mã Loại</label>
                                <input type="text" class="form-control" id="natMaLoai" name="natMaLoai" value="{{ old('natMaLoai') }}" >
                                @error('natMaLoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="natTenLoai" class="form-label">Tên Loại</label>
                                <input type="text" class="form-control" id="natTenLoai" name="natTenLoai" value="{{ old('natTenLoai') }}" >
                                @error('natTenLoai')
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
                            <a href="{{route('natadmins.natloaisanpham')}}" class="btn btn-primary"> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection