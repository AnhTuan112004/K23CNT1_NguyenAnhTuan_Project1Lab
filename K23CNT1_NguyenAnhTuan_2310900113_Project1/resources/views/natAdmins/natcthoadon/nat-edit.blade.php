@extends('_layouts.admins._master')
@section('title','Chỉnh Sửa Chi Tiết Hóa Đơn')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{ route('natadmin.natcthoadon.natEditSubmit', $natcthoadon->id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card">
                        <div class="card-header">
                            <h1>Chỉnh Sửa Chi Tiết Hóa Đơn</h1>
                        </div>

                        <div class="mb-3">
                            <label for="natHoaDonID" class="form-label">Mã Hóa Đơn</label>
                            <select name="natHoaDonID" id="natHoaDonID" class="form-control">
                                @foreach ($nathoadon as $item)
                                    <option value="{{ $item->id }}" {{ $natcthoadon->natHoaDonID == $item->id ? 'selected' : '' }}>{{ $item->natMaHoaDon }}</option>
                                @endforeach
                            </select>
                            @error('natHoaDonID')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="natSanPhamID" class="form-label">Mã Sản Phẩm</label>
                            <select name="natSanPhamID" id="natSanPhamID" class="form-control">
                                @foreach ($natsanpham as $item)
                                    <option value="{{ $item->id }}" {{ $natcthoadon->natSanPhamID == $item->id ? 'selected' : '' }}>{{ $item->natMaSanPham }}</option>
                                @endforeach
                            </select>
                            @error('natSanPhamID')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="natSoLuongMua" class="form-label">Số Lượng Mua</label>
                            <input type="number" class="form-control" id="natSoLuongMua" name="natSoLuongMua" value="{{ old('natSoLuongMua', $natcthoadon->natSoLuongMua) }}" min="1" oninput="calculateThanhTien()">
                            @error('natSoLuongMua')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="natDonGiaMua" class="form-label">Đơn Giá Mua</label>
                            <input type="number" class="form-control" id="natDonGiaMua" name="natDonGiaMua" value="{{ old('natDonGiaMua', $natcthoadon->natDonGiaMua) }}" oninput="calculateThanhTien()">
                            @error('natDonGiaMua')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="natThanhTien" class="form-label">Thành Tiền</label>
                            <input type="number" class="form-control" id="natThanhTien" name="natThanhTien" value="{{ old('natThanhTien', $natcthoadon->natThanhTien) }}" readonly>
                            @error('natThanhTien')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="natTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="natTrangThai0" name="natTrangThai" value="0" {{ $natcthoadon->natTrangThai == 0 ? 'checked' : '' }} />
                                <label for="natTrangThai0">Hoàn Thành</label>
                                &nbsp;
                                <input type="radio" id="natTrangThai1" name="natTrangThai" value="1" {{ $natcthoadon->natTrangThai == 1 ? 'checked' : '' }} />
                                <label for="natTrangThai1">Trả Lại</label>
                                &nbsp;
                                <input type="radio" id="natTrangThai2" name="natTrangThai" value="2" {{ $natcthoadon->natTrangThai == 2 ? 'checked' : '' }} />
                                <label for="natTrangThai2">Xóa</label>
                            </div>
                            @error('natTrangThai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-success">Cập Nhật</button>
                            <a href="{{ route('natadmins.natcthoadon') }}" class="btn btn-primary">Quay lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Hàm tính Thành Tiền
        function calculateThanhTien() {
            var quantity = parseFloat(document.getElementById('natSoLuongMua').value);
            var unitPrice = parseFloat(document.getElementById('natDonGiaMua').value);
            var thanhTien = quantity * unitPrice;
            document.getElementById('natThanhTien').value = thanhTien.toFixed(2);  // Làm tròn đến 2 chữ số thập phân
        }
    </script>
@endsection