@extends('dashboard.layouts.main', ['title' => 'Mencari Informasi Negara'])

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Dashboard
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">Mencari Informasi Negara</small>
                    </h1>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" style="margin-top: 40px;">
                        <h2>Mencari Informasi Negara</h2>
                    </div>
                    <div class="card-body">
                        <input type="text" id="countryInput" placeholder="Masukkan nama negara"
                            class="form-control mb-2">
                        <button id="searchButton" class="btn btn-primary">Cari</button>
                        <div class="loader" id="loader" style="display: none;">Memuat...</div>
                        <div id="result" class="country-info"></div>
                        <div id="error" class="error"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .form-control {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1em;
            outline: none;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }

        .btn {
            margin-top: 10px;
        }

        .loader {
            display: none;
            margin-top: 20px;
            text-align: center;
            font-size: 1.2em;
            color: #007bff;
        }

        .country-info {
            display: none;
            margin-top: 30px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .country-info img {
            max-width: 200px;
            /* Atur ukuran maksimum bendera */
            height: auto;
            margin-top: 20px;
        }

        .error {
            color: red;
            margin-top: 20px;
            text-align: center;
            font-size: 1.1em;
            font-weight: bold;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchButton').click(function() {
                var countryName = $('#countryInput').val().trim();
                if (countryName === "") {
                    $('#error').html("Silakan masukkan nama negara.");
                    return;
                }

                $('#result').empty().hide();
                $('#error').empty();
                $('#loader').show();

                $.ajax({
                    url: 'https://restcountries.com/v3.1/name/' + countryName,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#loader').hide();
                        if (data.status === 404) {
                            $('#error').html("Negara tidak ditemukan.");
                            return;
                        }

                        var country = data[0];
                        var html = '<h2>' + country.name.common + '</h2>';
                        html += '<img src="' + country.flags.svg + '" alt="Bendera ' + country
                            .name.common + '">';
                        html += '<p><strong>Wilayah:</strong> ' + country.region + '</p>';
                        html += '<p><strong>Subwilayah:</strong> ' + country.subregion + '</p>';
                        html += '<p><strong>Ibukota:</strong> ' + country.capital + '</p>';
                        html += '<p><strong>Populasi:</strong> ' + country.population
                            .toLocaleString() + '</p>';
                        html += '<p><strong>Bahasa:</strong> ' + Object.values(country
                            .languages).join(", ") + '</p>';
                        html += '<p><strong>Mata Uang:</strong> ' + Object.values(country
                            .currencies)[0].name + ' (' + Object.values(country.currencies)[
                            0].symbol + ')</p>';

                        $('#result').html(html).show();
                    },
                    error: function() {
                        $('#loader').hide();
                        $('#error').html('Terjadi kesalahan saat mengambil data negara.');
                    }
                });
            });
        });
    </script>
@endsection
