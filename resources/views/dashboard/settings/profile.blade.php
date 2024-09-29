@extends('dashboard.layouts.main', ['title' => 'Profile -'])
@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Dashboard</h1>
                    <span class="h-20px border-gray-200 border-start mx-4"></span>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <li class="breadcrumb-item text-muted">Profile</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card mb-5 mb-xl-10">
                    <div class="card-body pt-9 pb-0">
                        <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                            <div class="me-7 mb-4">
                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                    <img
                                        src="{{ isset(auth()->user()->foto) ? asset('storage/' . auth()->user()->foto) : asset('assets/media/avatars/blank.png') }}" />
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <div class="d-flex flex-column">
                                        <div class="d-flex align-items-center mb-2">
                                            <a
                                                class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{ auth()->user()->name }}</a>
                                            <span class="text-dark fw-bolder text-hover-primary d-block fs-6">
                                                <a
                                                    class="btn btn-sm fw-bolder ms-2 fs-8 py-1 px-3
                                            {{ auth()->user()->jenis_user_id == 1
                                                ? 'btn-primary'
                                                : (auth()->user()->jenis_user_id == 2
                                                    ? 'btn-success'
                                                    : (auth()->user()->jenis_user_id == 3
                                                        ? 'btn-warning'
                                                        : (auth()->user()->jenis_user_id == 4
                                                            ? 'btn-danger'
                                                            : (auth()->user()->jenis_user_id == 5
                                                                ? 'btn-secondary'
                                                                : '')))) }}">
                                                    {{ auth()->user()->jenis_user_id == 1
                                                        ? 'Admin'
                                                        : (auth()->user()->jenis_user_id == 2
                                                            ? 'User'
                                                            : (auth()->user()->jenis_user_id == 3
                                                                ? 'Mahasiswa'
                                                                : (auth()->user()->jenis_user_id == 4
                                                                    ? auth()->user()->jenisUser->nama_jenis_user
                                                                    : (auth()->user()->jenis_user_id == 5
                                                                        ? auth()->user()->jenisUser->nama_jenis_user
                                                                        : 'Tidak Ada')))) }}
                                                </a>
                                            </span>
                                        </div>
                                        <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                            <a href="#"
                                                class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                                <span class="svg-icon svg-icon-4 me-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3"
                                                            d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                                            fill="black" />
                                                        <path
                                                            d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                {{ auth()->user()->email }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_profile_details" aria-expanded="true"
                        aria-controls="kt_account_profile_details">
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Profile Details</h3>
                        </div>
                    </div>
                    <div id="kt_account_profile_details" class="collapse show">
                        <form id="kt_account_profile_details_form" class="form" method="POST"
                            action="{{ route('profile.update', auth()->user()->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body border-top p-9">

                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Profil</label>
                                    <div class="col-lg-8">
                                        <div class="image-input image-input-outline" data-kt-image-input="true">
                                            <div class="image-input-wrapper w-125px h-125px"
                                                style="background-image: url({{ asset('storage/' . auth()->user()->foto) }})">
                                            </div>
                                            <label
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                title="Change avatar">
                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                <input type="file" name="foto" accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="avatar_remove" value="0" />
                                            </label>
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                title="Cancel avatar">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                title="Remove avatar">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                        </div>
                                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                    </div>
                                </div>

                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Nama</label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="name"
                                            class="form-control form-control-lg form-control-solid" placeholder="Nama user"
                                            value="{{ auth()->user()->name }}" />
                                    </div>
                                </div>

                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Email</label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="email" name="email"
                                            class="form-control form-control-lg form-control-solid" placeholder="Email"
                                            value="{{ auth()->user()->email }}" />
                                    </div>
                                </div>

                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                                        <span class="required">Nomor Handphone</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Phone number must be active"></i>
                                    </label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="tel" name="no_hp"
                                            class="form-control form-control-lg form-control-solid" placeholder="Nomor HP"
                                            value="{{ auth()->user()->no_hp }}" />
                                    </div>
                                </div>

                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">WhatsApp</label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="wa"
                                            class="form-control form-control-lg form-control-solid" placeholder="WhatsApp"
                                            value="{{ auth()->user()->wa }}" />
                                    </div>
                                </div>

                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">PIN</label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="pin"
                                            class="form-control form-control-lg form-control-solid" placeholder="PIN"
                                            value="{{ auth()->user()->pin }}" />
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="submit" class="btn btn-primary"
                                    id="kt_account_profile_details_submit">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get the remove button
            const removeButton = document.querySelector('[data-kt-image-input-action="remove"]');
            // Get the hidden input for removing avatar
            const avatarRemoveInput = document.querySelector('input[name="avatar_remove"]');

            removeButton.addEventListener("click", function() {
                // Set the hidden input value to true
                avatarRemoveInput.value = "1";
                // Optionally clear the avatar input
                document.querySelector('input[name="foto"]').value = "";
                // Optionally change the preview image to default
                document.querySelector('.image-input-wrapper').style.backgroundImage =
                    "url('path/to/default/image.png')";
            });
        });
    </script>
@endsection
