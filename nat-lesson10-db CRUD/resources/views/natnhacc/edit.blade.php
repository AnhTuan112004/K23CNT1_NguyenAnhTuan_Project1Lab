<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sửa Thông Tin Nhà Cung Cấp</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <section class="container my-3">
        <div class="card">
            <div class="card-header">
                <h3>Sửa thông tin Nhà Cung Cấp</h3>
            </div>
            <div class="card-body">
                <!-- Form Edit Nhà Cung Cấp -->
                <form action="{{ route('natnhacc.nateditsubmit', $natnhacc->natMaNCC) }}" method="POST">
                    @csrf

                    <!-- Mã Nhà Cung Cấp (disabled) -->
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="mancc">Mã Nhà Cung Cấp</span>
                        <input type="text" class="form-control" aria-describedby="mancc" name="mancc" value="{{ $natnhacc->natMaNCC }}" disabled>
                    </div>

                    <!-- Tên Nhà Cung Cấp -->
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="tenncc">Tên Nhà Cung Cấp</span>
                        <input type="text" class="form-control" aria-describedby="tenncc" name="tenncc" value="{{ old('tenncc', $natnhacc->natTenNCC) }}">
                        @error('tenncc')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Đơn Vị Tính -->
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="diachi">Địa Chỉ</span>
                        <input type="text" class="form-control" aria-describedby="diachi" name="diachi" value="{{ old('diachi', $natnhacc->natDiachi) }}">
                        @error('diachi')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Phần Trăm -->
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="dienthoai">Điện Thoại</span>
                        <input type="text" class="form-control" aria-describedby="dienthoai" name="dienthoai" value="{{ old('dienthoai', $natnhacc->natDienthoai) }}">
                        @error('dienthoai')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="status">Status</span>
                        <input type="text" class="form-control" aria-describedby="status" name="status" value="{{ old('status', $natnhacc->natstatus) }}">
                        @error('status')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                      <!-- Đơn Vị Tính -->
                      <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="email">Email</span>
                        <input type="email" class="form-control" aria-describedby="email" name="email" value="{{ old('email', $natnhacc->natemail) }}">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary" value="Cập nhật">
                        <a href="/natnhacc" class="btn btn-secondary">Trở lại</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
