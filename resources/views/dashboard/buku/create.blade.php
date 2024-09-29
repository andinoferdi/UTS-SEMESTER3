@extends('dashboard.layouts.main', ['title' => 'Buku | Create -'])
@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Dashboard
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">Tambah Buku</small>
                    </h1>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" style="margin-top: 40px;">
                        <h2>Tambah Buku</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('buku.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="kode_buku">Kode Buku</label>
                                <input type="text" class="form-control" id="kode_buku" name="kode_buku" required>
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul" required>
                            </div>
                            <div class="form-group">
                                <label for="pengarang">Pengarang</label>
                                <input type="text" class="form-control" id="pengarang" name="pengarang" required>
                            </div>
                            <div class="form-group">
                                <label for="kategori_buku_id">Kategori</label>
                                <div class="custom-select" style="width:100%;">
                                    <select name="kategori_buku_id" id="kategori_buku_id" class="form-control" required>
                                        @foreach ($kategori_buku as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">
                                <i class="fa fa-save"></i> Simpan
                            </button>
                            <a href="{{ route('buku.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
