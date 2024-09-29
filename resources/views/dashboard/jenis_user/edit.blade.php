@extends('dashboard.layouts.main', ['title' => 'Jenis User | Edit -'])
@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div class="container-fluid d-flex flex-stack">
                <div class="page-title d-flex align-items-center text-dark fw-bolder fs-3 my-1">
                    <h1>Edit Jenis User</h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Jenis User</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('jenis_user.update', $jenis_user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama_jenis_user">Nama Jenis User:</label>
                                <input type="text" class="form-control" id="nama_jenis_user" name="nama_jenis_user"
                                    value="{{ $jenis_user->nama_jenis_user }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
