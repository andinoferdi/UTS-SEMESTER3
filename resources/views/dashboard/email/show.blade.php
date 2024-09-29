@extends('dashboard.layouts.main', ['title' => 'Detail Pesan | Pengelolaan Email'])

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!-- Toolbar -->
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!-- Page Title -->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Detail Pesan
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">Informasi Lengkap Pesan</small>
                    </h1>
                </div>
            </div>
        </div>

        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Detail Pesan</h3>
                        <div class="card-toolbar">
                            <a href="{{ route('inbox.reply', $pesan->id) }}" class="btn btn-primary">Balas Pesan</a>
                            <a href="{{ route('inbox') }}" class="btn btn-secondary">Kembali ke Inbox</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Pengirim:</strong> {{ $pesan->pengirim }}
                        </div>
                        <div class="mb-3">
                            <strong>Penerima:</strong> {{ $pesan->penerima }}
                        </div>
                        <div class="mb-3">
                            <strong>Kategori:</strong> {{ $pesan->kategoriPesan->nama_kategori }}
                        </div>
                        <div class="mb-3">
                            <strong>Pesan:</strong>
                            <p>{{ $pesan->nama_pesan }}</p>
                        </div>
                        @if ($pesan->file)
                            <div class="mb-3">
                                <strong>Lampiran:</strong>
                                <img src="{{ asset('storage/' . $pesan->file) }}" alt="Lampiran Gambar"
                                    style="max-width: 100%; height: auto;">
                            </div>
                        @endif
                        <div class="mb-3">
                            <strong>Tanggal:</strong> {{ $pesan->created_at->format('d-m-Y H:i') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
