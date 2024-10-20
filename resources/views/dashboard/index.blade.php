@extends('dashboard.layouts.main')
@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Dashboard
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">Home</small>
                    </h1>
                </div>
            </div>
        </div>

        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="row gy-5 g-xl-8">
                    <div class="col-xl-12">
                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder fs-3 mb-1">Daftar User</span>
                                </h3>
                                <div class="card-toolbar" data-bs-toggle="tooltip" title="Pergi ke pembuatan user">
                                    <a href="/dashboard/user" class="btn btn-sm btn-light btn-active-primary">CRUD
                                        User</a>
                                </div>
                            </div>

                            <div class="card-body py-3">
                                <div class="table-responsive">
                                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                        <thead>
                                            <tr class="fw-bolder text-muted">
                                                <th class="min-w-25px">Foto</th>
                                                <th class="min-w-150px">Nama User</th>
                                                <th class="min-w-140px">Kontak</th>
                                                <th class="min-w-120px">Dibuat Oleh</th>
                                                <th scope="col"
                                                    style="width: 1%; white-space: nowrap; text-align: right;">Role
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-45px me-5">
                                                                <img
                                                                    src="{{ $user->foto ? asset('storage/' . $user->foto) : asset('assets/media/avatars/blank.png') }}" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                                class="text-dark fw-bolder text-hover-primary fs-6">{{ $user->name }}</a>
                                                            <span
                                                                class="text-muted fw-bold d-block fs-7">{{ $user->email }}</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="https://wa.me/+62{{ $user->wa }}"
                                                            class="text-dark fw-bolder d-block fs-6">WhatsApp:
                                                            {{ $user->wa }}</a>
                                                        <span class="text-muted fw-bold d-block fs-7">No Hp:
                                                            {{ $user->no_hp }}</span>
                                                    </td>
                                                    <td class="text-end">{{ $user->create_by }}</td>
                                                    <td class="text-end">
                                                        <a
                                                            class="btn btn-sm fw-bolder fs-8 py-1 px-3 {{ $user->jenis_user_id == 1 ? 'btn-primary' : ($user->jenis_user_id == 2 ? 'btn-success' : ($user->jenis_user_id == 3 ? 'btn-warning' : 'btn-secondary')) }}">
                                                            {{ $user->jenisUser->nama_jenis_user ?? 'Tidak Ada' }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row gy-5 g-xl-8">
                    <div class="col-xxl-4">
                        <div class="card card-xxl-stretch">
                            <div class="card-header border-0 bg-danger py-5">
                                <h3 class="card-title fw-bolder text-white">Widget</h3>
                            </div>
                            <div class="card-body p-0">
                                <div class="mixed-widget-2-chart card-rounded-bottom bg-danger"
                                    style="height: 200px; pointer-events: none;"></div>
                                <div class="card-p mt-n20 position-relative">
                                    <div class="row row-cols-2 g-4">
                                        <div class="col">
                                            <div class="bg-light-primary px-6 py-8 rounded-2">
                                                <a href="/dashboard/jenis_user" class="text-primary fw-bold fs-6">Jenis
                                                    User</a>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="bg-light-danger px-6 py-8 rounded-2">
                                                <a href="/dashboard/aktivitas/error_aplikasi"
                                                    class="text-danger fw-bold fs-6">Error Aplikasi</a>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="bg-light-danger px-6 py-8 rounded-2">
                                                <a href="/dashboard/postingan/create" class="text-danger fw-bold fs-6">Buat
                                                    Postingan</a>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="bg-light-success px-6 py-8 rounded-2">
                                                <a href="/dashboard/menu" class="text-success fw-bold fs-6">Create Menu</a>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="bg-light-warning px-6 py-8 rounded-2">
                                                <a href="/dashboard/inbox" class="text-warning fw-bold fs-6">Inbox</a>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="bg-light-info px-6 py-8 rounded-2">
                                                <a href="/dashboard/user" class="text-info fw-bold fs-6">User</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-xxl-8">
                        <div class="card card-xxl-stretch">
                            <div class="card-header align-items-center border-0 mt-4">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="fw-bolder mb-2 text-dark">Aktivitas User</span>
                                </h3>
                            </div>
                            <div class="card-body pt-5">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama User</th>
                                                <th>Deskripsi</th>
                                                <th>Status</th>
                                                <th>Waktu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 0; @endphp
                                            @foreach ($activities as $activity)
                                                <tr>
                                                    <th>{{ ++$i }}</th>
                                                    <td>{{ $activity->user->name }}</td>
                                                    <td>{{ $activity->diskripsi }}</td>
                                                    <td
                                                        class="{{ $activity->status == 'Online' ? 'text-primary' : 'text-danger' }}">
                                                        {{ $activity->status }}
                                                    </td>
                                                    <td>{{ $activity->stand }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row gy-5 g-xl-8">
                    <div class="col-xxl-6 col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h3 class="card-title text-white">Prakiraan Cuaca Terkini</h3>
                            </div>
                            <div class="card-body">
                                @if ($cuaca)
                                    <h4>{{ $cuaca['weather_desc'] }}</h4>
                                    <p><strong>Wilayah:</strong> Airlangga, Surabaya</p>
                                    <p><strong>Suhu:</strong> {{ $cuaca['t'] }} °C</p>
                                    <p><strong>Kelembapan:</strong> {{ $cuaca['hu'] }}%</p>
                                    <p><strong>Kecepatan Angin:</strong> {{ $cuaca['ws'] }} m/s</p>

                                    <img src="{{ $cuaca['image'] }}" class="img-fluid mb-3" alt="Gambar Cuaca">
                                @else
                                    <p>Data cuaca tidak tersedia saat ini.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Row: Peta Lokasi -->
                    <div class="col-xxl-6 col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header bg-warning">
                                <h3 class="card-title text-white">Peta Lokasi Anda</h3>
                            </div>
                            <div class="card-body">
                                <div id="map" style="height: 400px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row: Info Gempa -->
                <div class="row gy-5 g-xl-8">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-header bg-danger">
                                <h3 class="card-title text-white">Info Gempa Terkini</h3>
                            </div>
                            <div class="card-body">
                                @if ($gempa)
                                    <p><strong>Waktu:</strong> {{ $gempa['Tanggal'] }} - {{ $gempa['Jam'] }}</p>
                                    <p><strong>Magnitude:</strong> {{ $gempa['Magnitude'] }}</p>
                                    <p><strong>Kedalaman:</strong> {{ $gempa['Kedalaman'] }}</p>
                                    <p><strong>Wilayah:</strong> {{ $gempa['Wilayah'] }}</p>
                                    <p><strong>Potensi:</strong> {{ $gempa['Potensi'] }}</p>
                                    <img src="https://data.bmkg.go.id/DataMKG/TEWS/{{ $gempa['Shakemap'] }}"
                                        class="img-fluid" alt="Shakemap Gempa">
                                @else
                                    <p>Tidak ada data gempa terbaru.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const apiKey = "{{ $geoapifyApiKey }}";
                const map = L.map('map').setView([-7.2730647592, 112.7577903407], 13); // Default ke Surabaya

                // Tambahkan tile layer dari Geoapify
                L.tileLayer(`https://maps.geoapify.com/v1/tile/osm-carto/{z}/{x}/{y}.png?apiKey=${apiKey}`, {
                    maxZoom: 19,
                }).addTo(map);

                // Periksa apakah browser mendukung Geolocation API
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        function(position) {
                            const lat = position.coords.latitude;
                            const lon = position.coords.longitude;

                            // Set peta ke lokasi pengguna
                            map.setView([lat, lon], 13);

                            // Tambahkan marker di lokasi pengguna
                            L.marker([lat, lon]).addTo(map)
                                .bindPopup('Lokasi Anda Sekarang')
                                .openPopup();
                        },
                        function(error) {
                            console.error('Error mendapatkan lokasi:', error.message);
                            alert('Tidak bisa mendapatkan lokasi. Menggunakan lokasi default.');
                        }
                    );
                } else {
                    alert('Geolocation tidak didukung di browser Anda. Menggunakan lokasi default.');
                }
            });
        </script>

        <style>
            #map {
                height: 400px;
                width: 100%;
            }
        </style>
    @endsection
