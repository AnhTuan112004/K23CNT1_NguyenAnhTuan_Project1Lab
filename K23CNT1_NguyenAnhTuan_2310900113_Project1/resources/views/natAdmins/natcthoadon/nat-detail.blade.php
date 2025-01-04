@extends('_layouts.admins._master')
@section('title','Xem THông Tin Chi Tiết Hóa Đơn')
    
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
                                <b>Hóa Đơn ID:</b>
                                {{$natcthoadon->natHoaDonID	}}
                            </p>
                            <p class="card-text">
                                <b>Sản Phầm ID:</b>
                                {{$natcthoadon->natSanPhamID}}
                            </p>
                            <p class="card-text">
                                <b>Số Lượng Mua:</b>
                                {{$natcthoadon->natSoLuongMua}}
                            </p>

                            <p class="card-text">
                                <b>Đơn Giá Mua:</b>
                 
                                {{ number_format($natcthoadon->natDonGiaMua, 0, ',', '.') }} VND
                            </p>

                            <p class="card-text">
                                <b>Thành Tiền:</b>
                                {{ number_format($natcthoadon->natThanhTien, 0, ',', '.') }} VND
                            </p>

                            
                            <p class="card-text">
                                <b>Trạng Thái:</b>
                                {{$natcthoadon->natTrangThai}}
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('natadmins.natcthoadon')}}" class="btn btn-primary"> Back</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection