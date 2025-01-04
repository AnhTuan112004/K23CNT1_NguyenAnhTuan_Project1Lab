@extends('_layouts.admins._master')
@section('title', 'Thêm Quản Trị Viên')

@section('content-body')
    <div class="container">
        <form action="{{ route('natadmin.natquantri.natCreateSubmit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="natTaiKhoan">Tài Khoản</label>
                <input type="text" class="form-control" id="natTaiKhoan" name="natTaiKhoan" required>
                @error('natTaiKhoan') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="natMatKhau">Mật Khẩu</label>
                <input type="password" class="form-control" id="natMatKhau" name="natMatKhau" required>
                @error('natMatKhau') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="natTrangThai">Trạng Thái</label>
                <select name="natTrangThai" id="natTrangThai" class="form-control" required>
                    <option value="0">Cho Phép Đăng Nhập</option>
                    <option value="1">Khóa</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Thêm Quản Trị Viên</button>
        </form>
    </div>
@endsection