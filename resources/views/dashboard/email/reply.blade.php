@extends('dashboard.layouts.main', ['title' => 'Balas Pesan | Pengelolaan Email'])

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!-- Toolbar -->
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!-- Page Title -->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Balas Pesan
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">Menanggapi Pesan</small>
                    </h1>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <!-- Card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Balas Pesan dari {{ $pesan->pengirim }}</h3>
                        <div class="card-toolbar">
                            <a href="{{ route('inbox') }}" class="btn btn-secondary">Kembali ke Inbox</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Detail Pesan yang Dibalas -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <strong>Pesan Asli:</strong>
                            </div>
                            <div class="card-body">
                                <p>{{ $pesan->nama_pesan }}</p>
                                @if ($pesan->file)
                                    <div class="mb-4">
                                        <strong>Lampiran:</strong>
                                        <a href="{{ asset('storage/' . $pesan->file) }}" target="_blank">Download
                                            Lampiran</a>
                                    </div>
                                @endif
                                <p><strong>Tanggal:</strong> {{ $pesan->created_at->format('d-m-Y H:i') }}</p>
                            </div>
                        </div>

                        <!-- Form Balas Pesan -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('inbox.sendReply', $pesan->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="penerima" class="form-label">Penerima</label>
                                <input type="email" name="penerima" class="form-control" id="penerima"
                                    value="{{ $pesan->pengirim }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="nama_pesan" class="form-label">Pesan</label>
                                <textarea name="nama_pesan" class="form-control" id="nama_pesan" rows="5" required>{{ old('nama_pesan') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="kategori_pesan_id" class="form-label">Kategori Pesan</label>
                                <select name="kategori_pesan_id" id="kategori_pesan_id" class="form-select" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($kategori as $kat)
                                        <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="file" class="form-label">Lampiran (Opsional)</label>
                                <input type="file" name="file" class="form-control" id="file">
                            </div>
                            <button type="submit" class="btn btn-success">Kirim Balasan</button>
                            <a href="{{ route('inbox') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>
@endsection
