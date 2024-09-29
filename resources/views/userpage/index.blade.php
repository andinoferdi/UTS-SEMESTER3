@extends('userpage.layouts.main')
@section('content')
    <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
        <div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
            @auth
                <h1 class="text-white lh-base fw-bolder fs-2x fs-lg-3x mb-15">Anda sudah login mari jelajahi website kami jika
                    dirasa sudah cukup
                    <br />Silahkan
                    <span
                        style="background: linear-gradient(to right, #fd0000 0%, #ee3d1e 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                        <span id="kt_landing_hero_text">Logout</span>
                    </span>
                </h1>
            @else
                <h1 class="text-white lh-base fw-bolder fs-2x fs-lg-3x mb-15">Ini adalah tampilan user
                    <br />Silahkan
                    <span
                        style="background: linear-gradient(to right, #0083fd 0%, #00c1fc 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                        <span id="kt_landing_hero_text">Login</span>
                    </span>
                </h1>
            @endauth
        </div>
    </div>
    </div>
    <div class="landing-curve landing-dark-color mb-10 mb-lg-20">
        <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                fill="currentColor"></path>
        </svg>
    </div>
    </div>

    <div class="py-10 py-lg-20">
        <div class="container">
            <div class="text-center mb-12">
                <h3 class="fs-2hx text-dark mb-5" id="team" data-kt-scroll-offset="{default: 100, lg: 150}">
                    Yang mengerjakan project ini</h3>
                <div class="fs-5 text-muted fw-bold">Saya Andino Ferdiansah mengerjakan project ini sepenuh hati saya 😁
                </div>
            </div>

            <div class="tns tns-default">

                <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000"
                    data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true" data-tns-nav="false"
                    data-tns-items="1" data-tns-center="false" data-tns-dots="false"
                    data-tns-prev-button="#kt_team_slider_prev" data-tns-next-button="#kt_team_slider_next"
                    data-tns-responsive="{1200: {items: 3}, 992: {items: 2}}">

                    <div class="text-center">
                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                            style="background-image: url('{{ asset('assets/media/avatars/blank.png') }}')"></div>
                        <div class="mb-0">
                            <a href="#" class="text-dark fw-bolder text-hover-primary fs-3">Andino Ferdiansah</a>
                            <div class="text-muted fs-6 fw-bold mt-1">Front end Development</div>
                        </div>
                    </div>

                    <div class="text-center">
                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                            style="background-image: url('{{ asset('assets/media/avatars/blank.png') }}')"></div>
                        <div class="mb-0">
                            <a href="#" class="text-dark fw-bolder text-hover-primary fs-3">Andino Ferdiansah</a>
                            <div class="text-muted fs-6 fw-bold mt-1">Back end Development</div>
                        </div>
                    </div>

                    <div class="text-center">
                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                            style="background-image: url('{{ asset('assets/media/avatars/blank.png') }}')"></div>
                        <div class="mb-0">
                            <a href="#" class="text-dark fw-bolder text-hover-primary fs-3">Andino Ferdiansah</a>
                            <div class="text-muted fs-6 fw-bold mt-1">Database Development</div>
                        </div>
                    </div>
                </div>

                <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev">
                    <span class="svg-icon svg-icon-3x">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z"
                                fill="black" />
                        </svg>
                    </span>
                </button>
                <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next">
                    <span class="svg-icon svg-icon-3x">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z"
                                fill="black" />
                        </svg>
                    </span>
                </button>
            </div>
        </div>
    </div>

    <div class="mt-20 mb-n20 position-relative z-index-2">
        <div class="container">
            <div class="text-center mb-17">
                <h3 class="fs-2hx text-dark mb-5" id="clients" data-kt-scroll-offset="{default: 125, lg: 150}">
                    Apa yang pekerja kami katakan</h3>
            </div>

            <div class="row g-lg-10 mb-10 mb-lg-20">

                <div class="col-lg-4">
                    <div class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
                        <div class="mb-7">
                            <div class="rating mb-6">
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                            </div>
                            <div class="fs-2 fw-bolder text-dark mb-3">Mantap!!
                            </div>
                            <div class="text-gray-500 fw-bold fs-4">Sebagai Front End Developer, saya dapat mengonfirmasi
                                bahwa saya menghabiskan lebih banyak waktu untuk memilih warna biru yang sempurna untuk
                                tombol daripada seluruh pendidikan perguruan tinggi saya.Dan
                                ibu saya akan bangga. 😅</div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-circle symbol-50px me-5">
                                <img src="{{ asset('assets/media/avatars/blank.png') }}" alt="" />
                            </div>
                            <div class="flex-grow-1">
                                <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Andino
                                    Ferdiansah</a>
                                <span class="text-muted d-block fw-bold">Front-End Developer</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
                        <div class="mb-7">
                            <div class="rating mb-6">
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                            </div>
                            <div class="fs-2 fw-bolder text-dark mb-3">keren!!
                            </div>
                            <div class="text-gray-500 fw-bold fs-4">Keajaiban backend terjadi di sini! Sementara
                                orang-orang di bagian front-end sibuk memilih warna, saya memastikan data mengalir seperti
                                sungai di musim semi. Ini template ini membuat pekerjaan saya sangat lancar, seperti mentega
                                di atas wajan panas. 🚀</div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-circle symbol-50px me-5">
                                <img src="{{ asset('assets/media/avatars/blank.png') }}" alt="" />
                            </div>
                            <div class="flex-grow-1">
                                <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Andino
                                    Ferdiansah</a>
                                <span class="text-muted d-block fw-bold">Back-End Developer</span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
                        <div class="mb-7">
                            <div class="rating mb-6">
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                            </div>
                            <div class="fs-2 fw-bolder text-dark mb-3">Hebat!!
                            </div>
                            <div class="text-gray-500 fw-bold fs-4">Siapa yang membutuhkan Marie Kondo ketika Anda memiliki
                                database yang terstruktur dengan baik? Templat ini sangat terorganisir, bahkan kueri SQL
                                saya sudah mulai mengatakan 'tolong' dan 'terima kasih'. </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-circle symbol-50px me-5">
                                <img src="{{ asset('assets/media/avatars/blank.png') }}" alt="" />
                            </div>
                            <div class="flex-grow-1">
                                <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Andino
                                    Ferdiansah</a>
                                <span class="text-muted d-block fw-bold">Database Developer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
