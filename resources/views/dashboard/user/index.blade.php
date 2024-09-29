@extends('dashboard.layouts.main', ['title' => 'User -'])
@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Dashboard
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">User</small>
                    </h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" style="margin-top: 40px;">
                        <h2>Daftar User</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('user.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Tambah user
                        </a>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" style="text-align: center;">No</th>
                                        <th scope="col">Nama user</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">No_hp</th>
                                        <th scope="col">Whatsapp</th>
                                        <th scope="col">PIN</th>
                                        <th scope="col">Dibuat Oleh</th>
                                        <th scope="col">Dibuat Pada</th>
                                        <th scope="col">DiUpdate Oleh</th>
                                        <th scope="col">DiUpdate Pada</th>
                                        <th scope="col">Role</th>
                                        <th scope="col" style="width: 1%; white-space: nowrap; text-align: right;">Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 0; @endphp
                                    @foreach ($users as $user)
                                        <tr>
                                            <th scope="row" style="text-align: center;">{{ ++$i }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->no_hp }}</td>
                                            <td>{{ $user->wa }}</td>
                                            <td>{{ $user->pin }}</td>
                                            <td>{{ $user->create_by }}</td>
                                            <td>{{ $user->create_date }}</td>
                                            <td>{{ $user->update_by }}</td>
                                            <td>{{ $user->update_date }}</td>
                                            <td>
                                                <span class="text-dark fw-bolder text-hover-primary d-block fs-6">
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

                                            </td>
                                            <td
                                                style="text-align: right; display: flex; justify-content: flex-end; gap: 10px;">
                                                <!-- Edit Button -->
                                                <a href="{{ route('user.edit', $user->id) }}"
                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"
                                                    title="Edit">
                                                    <span class="svg-icon svg-icon-3">
                                                        <i class="fa fa-pencil-alt text-info"></i>
                                                    </span>
                                                </a>
                                                <!-- Delete Button -->
                                                <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                                    class="d-inline" title="Delete">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm">
                                                        <span class="svg-icon svg-icon-3">
                                                            <i class="fa fa-trash text-danger"></i>
                                                        </span>
                                                    </button>
                                                </form>
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
