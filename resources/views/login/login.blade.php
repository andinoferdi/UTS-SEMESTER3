<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="{{ asset('assets2/css/login.css') }}" rel="stylesheet">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
</head>

<body>
    <h2>Login & Register Page</h2>
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form action="/login" method="post">
                @csrf
                <h1>Log In</h1>
                <input type="email" placeholder="Email" name="email" id="email" autocomplete="off" />
                <input type="password" placeholder="Password" name="password" id="password" />
                <button type="submit" value="login">Log In</button>
            </form>
        </div>
        <div class="form-container sign-up-container">
            <form action="/register" method="post">
                @csrf
                <h1>Buat Akun</h1>
                <input type="text" placeholder="Name" name="name" id="name" autocomplete="off" />
                <input type="email" placeholder="Email" name="email" id="email_register" autocomplete="off" />
                <input type="password" placeholder="Password" name="password" id="password_register" />
                <input type="password" placeholder="Konfirmasi Password" name="password_confirmation"
                    id="password_confirmation" />
                <button type="submit" id="btn_register">Register</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Selamat datang</h1>
                    <p>Jika anda sudah membuat akun bisa memencet tombol dibawah ini</p>
                    <button class="ghost" id="signIn">Log In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Halo</h1>
                    <p>Terimakasi sudah membuat akun , untuk yang belum membuat bisa memencet tomnbol dibawah ini</p>
                    <button class="ghost" id="signUp">Register</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets2/js/login.js') }}"></script>
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        // Script untuk menangani SweetAlert setelah submit registrasi
        document.getElementById('btn_register').onclick = function() {
            Swal.fire({
                title: "Regristrasi Berhasil!",
                text: "Silahkan!",
                icon: "success",
                timer: 5000, // waktu dalam milidetik (5 detik)
            });
        }

        @if ($errors->any())
            Swal.fire({
                title: "Login Gagal",
                text: "{{ $errors->first('email') }}",
                icon: "error"
            });
        @endif
    </script>
</body>

</html>
