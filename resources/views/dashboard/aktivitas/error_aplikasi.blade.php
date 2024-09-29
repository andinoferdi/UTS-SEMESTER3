@extends('dashboard.layouts.main', ['title' => 'Error Aplikasi -'])
@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Dashboard
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">Error Aplikasi</small>
                    </h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" style="margin-top: 40px;">
                        <h2>Error Aplikasi</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama User</th>
                                        <th scope="col">Modul</th>
                                        <th scope="col">Kontroler</th>
                                        <th scope="col">Fungsi</th>
                                        <th scope="col">Pesan Error</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 0; @endphp
                                    @foreach ($errors as $error)
                                        <tr>
                                            <th scope="row">{{ ++$i }}</th>
                                            <td>{{ $error->user->name }}</td>
                                            <td>{{ $error->module }}</td>
                                            <td>{{ $error->controller }}</td>
                                            <td>{{ $error->function }}</td>
                                            <td>{{ $error->error_message }}</td>
                                            <td class="{{ $error->status == '1' ? 'text-danger' : 'text-success' }}">
                                                {{ $error->status == '1' ? 'Error' : 'Resolved' }}
                                            </td>
                                            <td>{{ $error->create_time }}</td>
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
