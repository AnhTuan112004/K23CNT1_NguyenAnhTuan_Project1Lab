<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Đăng Ký</title>
    <style>
        body {
            background-color: #f8f9fa; /* Light background for the entire page */
        }
        .form-container {
            background-color: #ffffff; /* White background for the form */
            border-radius: 8px; /* Rounded corners for the form */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for the form */
            padding: 30px; /* Padding inside the form */
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group .is-invalid {
            border-color: #e74a3b;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="form-container">
        <h2 class="text-center mb-4">Đăng Ký</h2>

        <!-- Display errors from backend if validation fails -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('natuser.natsignupSubmit') }}">
            @csrf

            <div class="form-group mb-3">
                <label for="natHoTenKhachHang">Họ và Tên</label>
                <input type="text" class="form-control @error('natHoTenKhachHang') is-invalid @enderror" 
                       id="natHoTenKhachHang" name="natHoTenKhachHang" value="{{ old('natHoTenKhachHang') }}" required>
                @error('natHoTenKhachHang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="natEmail">Email</label>
                <input type="email" class="form-control @error('natEmail') is-invalid @enderror" 
                       id="natEmail" name="natEmail" value="{{ old('natEmail') }}" required>
                @error('natEmail')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="natMatKhau">Mật Khẩu</label>
                <input type="password" class="form-control @error('natMatKhau') is-invalid @enderror" 
                       id="natMatKhau" name="natMatKhau" required>
                @error('natMatKhau')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="natDienThoai">Số Điện Thoại</label>
                <input type="text" class="form-control @error('natDienThoai') is-invalid @enderror" 
                       id="natDienThoai" name="natDienThoai" value="{{ old('natDienThoai') }}" required>
                @error('natDienThoai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="natDiaChi">Địa Chỉ</label>
                <input type="text" class="form-control @error('natDiaChi') is-invalid @enderror" 
                       id="natDiaChi" name="natDiaChi" value="{{ old('natDiaChi') }}" required>
                @error('natDiaChi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-lg w-100">Đăng Ký</button>
        </form>

        <div class="mt-3 text-center">
            <p>Đã có tài khoản? <a href="{{ route('natuser.login') }}">Đăng nhập</a></p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>