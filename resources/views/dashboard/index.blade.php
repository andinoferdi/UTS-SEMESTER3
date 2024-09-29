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
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">

                <div class="row gy-5 g-xl-8">
                    <div class="col-xl-12">
                        <!--begin::Tables Widget 9-->
                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder fs-3 mb-1">Daftar User</span>
                                </h3>
                                <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-trigger="hover" title="Pergi ke pembuatan user">
                                    <a href="/dashboard/master/user" class="btn btn-sm btn-light btn-active-primary">
                                        CRUD User</a>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body py-3">
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr class="fw-bolder text-muted">
                                                <th class="min-w-25px">Foto</th>
                                                <th class="min-w-150px">Nama User</th>
                                                <th class="min-w-140px">Kontak</th>
                                                <th class="min-w-120px">Dibuat Oleh</th>
                                                <th class="min-w-120px">Role</th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-45px me-5">
                                                                <img
                                                                    src="{{ isset($user->foto) ? asset('storage/' . $user->foto) : asset('assets/media/avatars/blank.png') }}" />
                                                            </div>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                                class="text-dark fw-bolder text-hover-primary fs-6">{{ $user->name }}</a>
                                                            <span
                                                                class="text-muted fw-bold text-muted d-block fs-7">{{ $user->email }}</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="https://wa.me/+62{{ @$user->wa }}"
                                                            class="text-dark fw-bolder text-hover-primary d-block fs-6">WhatsApp
                                                            : {{ $user->wa }}</a>
                                                        <span class="text-muted fw-bold text-muted d-block fs-7">No Hp :
                                                            {{ $user->no_hp }}</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="d-flex flex-column w-100 me-2">
                                                            <div class="d-flex flex-stack mb-2">
                                                                <span
                                                                    class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $user->create_by }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="d-flex flex-column w-100 me-2">
                                                            <div class="d-flex flex-stack mb-2">
                                                                <span
                                                                    class="text-dark fw-bolder text-hover-primary d-block fs-6">
                                                                    <a
                                                                        class="btn btn-sm fw-bolder ms-2 fs-8 py-1 px-3
                                                            {{ $user->jenis_user_id == 1
                                                                ? 'btn-primary'
                                                                : ($user->jenis_user_id == 2
                                                                    ? 'btn-success'
                                                                    : ($user->jenis_user_id == 3
                                                                        ? 'btn-warning'
                                                                        : ($user->jenis_user_id == 4
                                                                            ? 'btn-danger'
                                                                            : ($user->jenis_user_id == 5
                                                                                ? 'btn-secondary'
                                                                                : '')))) }}">
                                                                        {{ $user->jenisUser->nama_jenis_user ?? 'Tidak Ada' }}
                                                                    </a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table container-->
                            </div>
                            <!--begin::Body-->
                        </div>
                        <!--end::Tables Widget 9-->
                    </div>
                    <!--end::Col-->
                </div>

                <div class="row gy-5 g-xl-8">
                    <div class="col-xxl-4">
                        <div class="card card-xxl-stretch">
                            <div class="card-header border-0 bg-danger py-5">
                                <h3 class="card-title fw-bolder text-white">Widget</h3>
                            </div>
                            <div class="card-body p-0">
                                <div class="mixed-widget-2-chart card-rounded-bottom bg-danger" data-kt-color="danger"
                                    style="height: 200px"></div>
                                <div class="card-p mt-n20 position-relative">
                                    <!--begin::Row-->
                                    <div class="row g-0">
                                        <!--begin::Col-->
                                        <div class="col bg-light-warning px-6 py-8 rounded-2 me-7 mb-7">
                                            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M12 2C6.48 2 2 6.48 2 12c0 3.11 1.46 5.88 3.73 7.67C7.28 21.53 9.56 22 12 22c2.44 0 4.72-.47 6.27-2.33C20.54 17.88 22 15.11 22 12c0-5.52-4.48-10-10-10zm-1 3a3 3 0 0 1 3 3c0 1.5-1.5 4-3 6-1.5-2-3-4.5-3-6a3 3 0 0 1 3-3zm0 8a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <a href="/dashboard/master/satuan" class="text-warning fw-bold fs-6">Master
                                                Satuan</a>
                                        </div>

                                        <div class="col bg-light-danger px-6 py-8 rounded-2 mb-7">
                                            <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path fill="#FF4842" fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 14.293c-.448 0-.809-.367-.809-.817s.361-.817.809-.817c.448 0 .809.367.809.817s-.361.817-.809.817zm-.898-5.672c-.107 0-.187.026-.267.068-.08.041-.155.1-.232.177-.18.18-.327.416-.444.668-.116.25-.189.532-.189.873 0 .342.073.624.19.873.116.252.263.488.444.668.077.077.152.136.232.177.08.042.16.068.267.068.107 0 .187-.026.267-.068.08-.041.155-.1.232-.177.18-.18.327-.416.444-.668.116-.249.189-.531.189-.873 0-.342-.073-.624-.19-.873-.117-.252-.264-.488-.444-.668-.077-.077-.152-.136-.232-.177-.08-.042-.16-.068-.267-.068z" />
                                                </svg>
                                            </span>
                                            <a href="/dashboard/aktivitas/error_aplikasi"
                                                class="text-danger fw-bold fs-6">Error aplikasi</a>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <div class="row g-0">
                                        <!--begin::Col-->
                                        <div class="col bg-light-primary px-6 py-8 rounded-2 me-7 mb-7">
                                            <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M12 2C6.48 2 2 6.48 2 12c0 3.11 1.46 5.88 3.73 7.67C7.28 21.53 9.56 22 12 22c2.44 0 4.72-.47 6.27-2.33C20.54 17.88 22 15.11 22 12c0-5.52-4.48-10-10-10zm-1 3a3 3 0 0 1 3 3c0 1.5-1.5 4-3 6-1.5-2-3-4.5-3-6a3 3 0 0 1 3-3zm0 8a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <a href="/dashboard/master/user" class="text-primary fw-bold fs-6">Master
                                                User</a>
                                        </div>

                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col bg-light-success px-6 py-8 rounded-2">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
                                            <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z"
                                                        fill="black" />
                                                    <path opacity="0.3"
                                                        d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <a href="/dashboard/master/menu" class="text-success fw-bold fs-6 mt-2">Create
                                                Menu</a>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Mixed Widget 2-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xxl-8">
                        <!--begin::List Widget 5-->
                        <div class="card card-xxl-stretch">
                            <!--begin::Header-->
                            <div class="card-header align-items-center border-0 mt-4">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="fw-bolder mb-2 text-dark">Aktivitas User</span>
                                </h3>
                            </div>
                            <div class="card-body pt-5">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama User</th>
                                                <th scope="col">Deskripsi</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Waktu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 0; @endphp
                                            @foreach ($activities as $activity)
                                                <tr>
                                                    <th scope="row">{{ ++$i }}</th>
                                                    <td>{{ $activity->user->name }}</td> <!-- Menampilkan nama pengguna -->
                                                    <td>{{ $activity->diskripsi }}</td>
                                                    <td
                                                        class="{{ $activity->status == 'Online' ? 'text-primary' : ($activity->status == 'Offline' ? 'text-danger' : 'text-success') }}">
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
            </div>
        </div>
    </div>
@endsection
