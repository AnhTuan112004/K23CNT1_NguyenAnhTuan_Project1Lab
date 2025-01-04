@extends('_layouts.admins._master')
@section('title','Xem THông Tin Khách Hàng')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <div class="card">
                        <div class="card-header">
                            <h1>Chi Tiết Hóa Đơn</h1>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <b>Mã Hóa Đơn:</b>
                                {{$nathoadon->natMaHoaDon}}
                            </p>

                            <p class="card-text">
                                <b>Mã Khách Hàng:</b>
                                {{$nathoadon->natMaKhachHang}}
                            </p>

                            <p class="card-text">
                                <b>Ngày Hóa Đơn:</b>
                                {{$nathoadon->natNgayHoaDon}}
                            </p>

                            <p class="card-text">
                                <b>Ngày Nhận:</b>
                                {{$nathoadon->natNgayNhan}}
                            </p>


                            <p class="card-text">
                                <b>Họ Tên Khách Hàng:</b>
                                {{$nathoadon->natHoTenKhachHang}}
                            </p>
                            <p class="card-text">
                                <b>Email:</b>
                                {{$nathoadon->natEmail}}
                            </p>


                            <p class="card-text">
                                <b>Điện Thoại:</b>
                                {{$nathoadon->natDienThoai}}
                            </p>

                            <p class="card-text">
                                <b>Địa Chỉ:</b>
                                {{$nathoadon->natDiaChi}}
                            </p>

                            <p class="card-text">
                                <b>Tổng Giá Trị:</b>
                                {{ number_format($nathoadon->natTongGiaTri, 0, ',', '.') }} VND
                            </p>

                            <p class="card-text">
                                <b>Trạng Thái:</b>
                                {{$nathoadon->natTrangThai}}
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('natadmins.nathoadon')}}" class="btn btn-primary"> Back</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection