@extends('dashboard.layouts.main', ['title' => 'Edit Setting Menu'])

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Dashboard
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">Edit Setting Menu</small>
                    </h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if (isset($settingMenu) && count($settingMenu) > 0)
                            <form action="{{ route('setting_menus.update', $settingMenu[0]->jenis_user_id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')

                                <!-- Pemilihan Jenis User -->
                                <div class="mb-3">
                                    <label for="jenis_user_id" class="form-label">Jenis User</label>
                                    <select class="form-control" id="jenis_user_id" name="jenis_user_id"
                                        {{ isset($settingMenu[0]->jenis_user_id) ? 'disabled' : '' }} required>
                                        @foreach ($jenisUsers as $jenisUser)
                                            <option value="{{ $jenisUser->id }}"
                                                {{ $jenisUser->id == $settingMenu[0]->jenis_user_id ? 'selected' : '' }}>
                                                {{ $jenisUser->nama_jenis_user }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <!-- Checkbox untuk Memilih Menu -->
                                <div class="mb-3">
                                    <label for="menus" class="form-label">Pilih Menu</label>
                                    @foreach ($menus as $menu)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="menu_id[]"
                                                value="{{ $menu->id }}"
                                                {{ in_array($menu->id, $selectedMenus) ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ $menu->nama_menu }}</label>
                                        </div>
                                    @endforeach
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        @else
                            <div class="alert alert-warning">Setting menu not found.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
