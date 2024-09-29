@extends('dashboard.layouts.main', ['title' => 'Kirim Pesan | Pengelolaan Email'])

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <h2 class="card-title">Kirim Pesan Baru</h2>
                    </div>
                    <div class="card-body pt-0">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('sent.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="penerima" class="form-label">Penerima</label>
                                <select name="penerima" id="penerima" class="form-select" required>
                                    <option value="">Pilih Penerima</option>
                                    @foreach ($users as $potentialRecipient)
                                        @if ($potentialRecipient->email !== $user->email)
                                            <!-- Gunakan variabel $user yang sudah dikirim -->
                                            <option value="{{ $potentialRecipient->email }}">{{ $potentialRecipient->name }}
                                                ({{ $potentialRecipient->email }})
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nama_pesan" class="form-label">Nama Pesan</label>
                                <textarea name="nama_pesan" class="form-control" id="nama_pesan" rows="4" required>{{ old('nama_pesan') }}</textarea>
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
                            <button type="submit" class="btn btn-success">Kirim Pesan</button>
                            <a href="{{ route('sent') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>
@endsection
