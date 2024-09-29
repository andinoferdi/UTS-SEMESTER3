@extends('dashboard.layouts.main', ['title' => 'Postingan | Edit'])
@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Edit Postingan</h1>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Form Edit Postingan</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('postingan.update', $postingan->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama_postingan" class="form-label">Postingan</label>
                                <textarea class="form-control" id="nama_postingan" name="nama_postingan" rows="4" required>{{ $postingan->nama_postingan }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar (Kosongkan jika tidak ingin
                                    mengubah)</label>
                                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('postingan.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
