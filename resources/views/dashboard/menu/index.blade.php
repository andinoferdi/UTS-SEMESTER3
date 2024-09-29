@extends('dashboard.layouts.main', ['title' => 'Menu List'])

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Dashboard
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">Menu List</small>
                    </h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" style="margin-top: 40px;">
                        <h2>Daftar Menu</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('menu.create') }}" class="btn btn-primary mb-3">Tambah Menu</a>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Menu</th>
                                        <th>Nama URL</th>
                                        <th scope="col" style="width: 1%; white-space: nowrap; text-align: right;">Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menus as $menu)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $menu->nama_menu }}</td>
                                            <td>{{ $menu->link_menu }}</td>
                                            <td
                                                style="text-align: right; display: flex; justify-content: flex-end; gap: 10px;">
                                                <!-- Edit Button -->
                                                <a href="{{ route('menu.edit', $menu->id) }}"
                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"
                                                    title="Edit">
                                                    <span class="svg-icon svg-icon-3">
                                                        <i class="fa fa-pencil-alt text-info"></i>
                                                    </span>
                                                </a>
                                                <!-- Delete Button -->
                                                <form action="{{ route('menu.destroy', $menu->id) }}" method="POST"
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
