@extends('dashboard.layouts.main', ['title' => 'Tambah Setting Menu'])

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Dashboard
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">Tambah Setting Menu</small>
                    </h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" style="margin-top: 40px;">
                        <h2>Tambah Setting Menu</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('setting_menus.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="jenis_user_id" class="form-label">Jenis User</label>
                                <select name="jenis_user_id" id="jenis_user_id" class="form-select" required>
                                    <option value="" disabled selected>Pilih Jenis User</option>
                                    @foreach ($jenisUsers as $jenisUser)
                                        <option value="{{ $jenisUser->id }}">{{ $jenisUser->nama_jenis_user }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Menu</label>
                                <div>
                                    @foreach ($menus as $menu)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="menu_id[]"
                                                value="{{ $menu->id }}" id="menu_{{ $menu->id }}">
                                            <label class="form-check-label" for="menu_{{ $menu->id }}">
                                                {{ $menu->nama_menu }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('setting_menus.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
