@extends('dashboard.layouts.main', ['title' => 'Sent | Pengelolaan Email'])

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!-- Toolbar -->
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!-- Page Title -->
                <div class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="text-dark fw-bolder fs-3 my-1">Sent</h1>
                    <small class="text-muted fs-7 fw-bold my-1 ms-1">Pesan Terkirim</small>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <!-- Card -->
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <h2 class="card-title">Daftar Pesan Terkirim</h2>
                        <div class="card-toolbar">
                            <!-- Tombol Kirim Pesan Baru -->
                            <a href="{{ route('sent.create') }}" class="btn btn-primary">Kirim Pesan Baru</a>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Daftar Pesan Terkirim -->
                        @if ($sent->isEmpty())
                            <p class="text-center">Tidak ada pesan terkirim.</p>
                        @else
                            <table class="table align-middle table-row-dashed fs-6 gy-5">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th>Penerima</th>
                                        <th>Nama Pesan</th>
                                        <th>Kategori</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-bold text-gray-600">
                                    @foreach ($sent as $pesan)
                                        <tr>
                                            <td>{{ $pesan->penerima }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($pesan->nama_pesan, 50) }}</td>
                                            <td>{{ $pesan->kategoriPesan->nama_kategori }}</td>
                                            <td>{{ $pesan->created_at->format('d-m-Y H:i') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>
@endsection
