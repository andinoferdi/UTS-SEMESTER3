@extends('dashboard.layouts.main', ['title' => 'Create Menu'])

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Dashboard
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">Create Menu</small>
                    </h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('menu.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_menu" class="form-label">Nama Menu</label>
                                <input type="text" class="form-control" id="nama_menu" autocomplete="off"
                                    name="nama_menu" required value="{{ old('nama_menu') }}">
                            </div>
                            <div class="mb-3">
                                <label for="link_menu" class="form-label">Nama URL</label>
                                <input type="text" class="form-control" id="link_menu" autocomplete="off"
                                    name="link_menu" required value="{{ old('link_menu') }}">
                            </div>
                            <div class="mb-3">
                                <label for="icon_menu" class="form-label">Icon</label>
                                <input type="text" class="form-control" id="icon_menu" name="icon_menu"
                                    value="{{ old('icon_menu') }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
