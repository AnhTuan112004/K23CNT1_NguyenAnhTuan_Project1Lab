@extends('_layouts.admins._master')
@section('title', 'Danh Sách Tin Tức')

@section('content-body')
    <section class="container border my-3">
        <h1 class="mb-4">Danh Sách Tin Tức</h1>

        <!-- Thông báo thành công -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Mã Tin Tức</th>
                    <th>Tiêu Đề</th>
                    <th>Mô Tả</th>
                    <th>Nội Dung</th>
                    <th>Ngày Đăng</th>
                    <th>Ngày Cập Nhật</th>
                    <th>Hình Ảnh</th>
                    <th>Trạng Thái</th>
                    <th>Chức Năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nattinTucs as $item)
                    <tr>
                        <td>{{ ($nattinTucs->currentPage() - 1) * $nattinTucs->perPage() + $loop->index + 1 }}</td>
                        <td>{{ $item->natMaTT }}</td>
                        <td>{{ $item->natTieuDe }}</td>
                        <td>{{ Str::limit($item->natMoTa, 50) }}</td>
                        <td>{{ Str::limit($item->natNoiDung, 50) }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->natNgayDangTin)->format('d/m/Y H:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->natNgayCapNHap)->format('d/m/Y H:i') }}</td>
                        <td style="text-align: center;">
                            <img src="{{ asset('storage/' . $item->natHinhAnh) }}" alt="Tin tức {{ $item->natMaTT }}" width="100" height="100">
                        </td>
                        <td>
                            @if($item->natTrangThai == 0)
                                <span class="badge bg-success">Hiển Thị</span>
                            @else
                                <span class="badge bg-danger">Khóa</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a href="{{ route('natadmin.nattintuc.natDetail', $item->id) }}" class="btn btn-success btn-sm">
                                    <i class="fa-solid fa-eye"></i> Xem
                                </a>
                                <a href="{{ route('natadmin.nattintuc.natedit', $item->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fa-solid fa-pen"></i> Chỉnh sửa
                                </a>
                                <a href="{{ route('natadmin.nattintuc.natdelete', $item->id) }}" class="btn btn-danger btn-sm"
                                   onclick="return confirm('Bạn muốn xóa Tin Tức này không? Mã: {{ $item->natMaTT }}');">
                                    <i class="fa-regular fa-trash-can"></i> Xóa
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Phân trang -->
        <div class="d-flex justify-content-center mt-3">
            {{ $nattinTucs->links('pagination::bootstrap-5') }}
        </div>

        <!-- Thêm mới Tin Tức -->
        <div class="text-end mt-3">
            <a href="{{ route('natadmin.nattintuc.natcreate') }}" class="btn btn-success">
                <i class="fa-solid fa-plus"></i> Thêm Mới Tin Tức
            </a>
        </div>
    </section>
@endsection