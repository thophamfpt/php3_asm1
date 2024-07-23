@extends('layouts.admin')

@section('content')
    <div class="card my-5">
        <h4 class="card-header">Cập nhật thông tin bài viết</h4>
        <div class="card-body">
            <form action="{{ route('baiviet.update', $baiViet->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUt')
                <div class="mb-3">
                    <label class="form-label">Tiêu đề</label>
                    <input type="text" name="tieu_de" class="form-control" value="{{ $baiViet->tieu_de }}"
                        placeholder="Nhập tiêu đề">
                    @error('tieu_de')
                        <p class="text text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Hình ảnh</label>
                    <input type="file" name="img_bai_viet" class="form-control">
                </div>
                <img src="{{ Storage::url($baiViet->hinh_anh) }}" width="200" alt="">

                <div class="mb-3">
                    <label class="form-label">Ngày đăng</label>
                    <input type="date" name="ngay_dang" class="form-control" value="{{ $baiViet->ngay_dang }}">
                    @error('ngay_dang')
                        <p class="text text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Nội dung</label>
                    <textarea class="form-control" rows="3" name="noi_dung" placeholder="Nhập nội dung">{{ $baiViet->noi_dung }}</textarea>
                </div>

                <div class="mb-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-warning">Chỉnh sửa</button>
                </div>
            </form>
        </div>
    @endsection
