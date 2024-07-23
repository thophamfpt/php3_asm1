@extends('layouts.admin')

@section('content')
    <div class="card my-5">
        <h4 class="card-header">Thêm mới bài viết</h4>
        <div class="card-body">
            <form action="{{ route('baiviet.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Tiêu đề</label>
                    <input type="text" name="tieu_de" class="form-control" placeholder="Nhập tiêu đề">
                    @error('tieu_de')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Hình ảnh</label>
                    <input type="file" name="img_bai_viet" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Ngày đăng</label>
                    <input type="date" name="ngay_dang" class="form-control">
                    @error('ngay_dang')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Nội dung</label>
                    <textarea class="form-control" rows="3" name="noi_dung" placeholder="Nhập nội dung"></textarea>
                </div>

                <div class="mb-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Thêm mới</button>
                </div>
            </form>
        </div>
    @endsection
