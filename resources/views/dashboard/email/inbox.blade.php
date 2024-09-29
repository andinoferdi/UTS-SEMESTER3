<!-- resources/views/inbox.blade.php -->

@extends('dashboard.layouts.main', ['title' => 'Inbox | Pengelolaan Email'])

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!-- Toolbar -->
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!-- Page Title -->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Inbox
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">Pesan Masuk</small>
                    </h1>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <!-- Card -->
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <h2 class="card-title">Daftar Pesan Masuk</h2>
                        <div class="card-toolbar">
                            <!-- Optional Toolbar Actions -->
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($inbox->isEmpty())
                            <p class="text-center">Tidak ada pesan masuk.</p>
                        @else
                            <table class="table align-middle table-row-dashed fs-6 gy-5">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th>Pengirim</th>
                                        <th>Nama Pesan</th>
                                        <th>Kategori</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-bold text-gray-600">
                                    @foreach ($inbox as $pesan)
                                        <tr>
                                            <td>{{ $pesan->pengirim }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($pesan->nama_pesan, 50) }}</td>
                                            <td>{{ $pesan->kategoriPesan->nama_kategori }}</td>
                                            <td>{{ $pesan->created_at->format('d-m-Y H:i') }}</td>
                                            <td>
                                                <a href="{{ route('inbox.show', $pesan->id) }}"
                                                    class="btn btn-info btn-sm">Detail</a>
                                                <form action="{{ route('inbox.destroy', $pesan->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Hapus pesan ini?')">Delete</button>
                                                </form>
                                            </td>
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
