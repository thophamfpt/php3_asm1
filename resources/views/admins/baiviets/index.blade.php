@extends('layouts.admin')

@section('content')
    <div class="card my-5">
        <h4 class="card-header">Danh sách bài viết</h4>
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <a href="{{ route('baiviet.create') }}"><button class="btn btn-success">Thêm bài viết</button></a>
                <form action="{{ route('baiviet.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" value="{{ request('search') }}"
                            placeholder="Tìm kiếm">
                        <button class="btn btn-secondary">Tìm kiếm</button>
                    </div>
                </form>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <th>#</th>
                    <th>Hình ảnh</th>
                    <th>Tiêu đề</th>
                    <th>Ngày đăng</th>
                    <th>Nội dung</th>
                    <th>Thao tác</th>
                </thead>
                <tbody>
                    @foreach ($listBaiViet as $item => $baiViet)
                        <tr>
                            <td>{{ $item + 1 }}</td>
                            <td><img src="{{ 'storage/' . $baiViet->hinh_anh }}" alt="Hình ảnh bài viết" width="150px">
                            </td>
                            <td>{{ $baiViet->tieu_de }}</td>
                            <td>{{ $baiViet->ngay_dang }}</td>
                            <td>{{ $baiViet->noi_dung }}</td>
                            <td>
                                <a href="{{ route('baiviet.edit', $baiViet->id) }}" class="btn btn-warning">Sửa</a>
                                <form action="{{ route('baiviet.destroy', $baiViet->id) }}" method="POST"
                                    onsubmit="return confirm('Ban co dong y xoa khong')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $listBaiViet->links('pagination::bootstrap-5') }}

        </div>
    @endsection
