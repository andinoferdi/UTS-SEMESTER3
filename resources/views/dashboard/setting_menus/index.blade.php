@extends('dashboard.layouts.main', ['title' => 'Daftar Pengaturan Menu'])

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Dashboard
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">Daftar Pengaturan Menu</small>
                    </h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" style="margin-top: 40px;">
                        <h2>Daftar Pengaturan Menu</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('setting_menus.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Tambah Pengaturan Menu
                        </a>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Jenis User</th>
                                        <th scope="col" style="width: 10%; white-space: nowrap; text-align: right;">Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jenis_user as $user)
                                        <!-- Sesuaikan nama variabel dengan yang ada di controller -->
                                        <tr>
                                            <td>{{ $user->nama_jenis_user }}</td>
                                            <td style="text-align: right;">
                                                <a href="{{ route('setting_menus.edit', $user->id) }}"
                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"
                                                    title="Edit">
                                                    <span class="svg-icon svg-icon-3">
                                                        <i class="fa fa-pencil-alt text-info"></i>
                                                    </span>
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
    </div>
@endsection
