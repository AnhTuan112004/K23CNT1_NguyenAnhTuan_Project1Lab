@extends('_layouts.admins._master')
@section('title','Xem THông Tin Khách Hàng')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <div class="card">
                        <div class="card-header">
                            <h1>Chi Tiết Khách Hàng</h1>
                        </div>
                        <div class="card-body">

                            <p class="card-text">
                                <b>Mã Khách Hàng:</b>
                                {{$natkhachhang->natMaKhachHang}}
                            </p>
                            <p class="card-text">
                                <b>Họ Tên Khách Hàng:</b>
                                {{$natkhachhang->natHoTenKhachHang}}
                            </p>
                            <p class="card-text">
                                <b>Email:</b>
                                {{$natkhachhang->natEmail}}
                            </p>

                            <p class="card-text">
                                <b>Mật Khẩu:</b>
                                {{$natkhachhang->natMatKhau}}
                            </p>

                            <p class="card-text">
                                <b>Điện Thoại:</b>
                                {{$natkhachhang->natDienThoai}}
                            </p>

                            <p class="card-text">
                                <b>Địa Chỉ:</b>
                                {{$natkhachhang->natDiaChi}}
                            </p>

                            <p class="card-text">
                                <b>Ngày Đăng Ký:</b>
                                {{$natkhachhang->natNgayDangKy}}
                            </p>

                            <p class="card-text">
                                <b>Trạng Thái:</b>
                                {{$natkhachhang->natTrangThai}}
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('natadmins.natkhachhang')}}" class="btn btn-primary"> Back</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection