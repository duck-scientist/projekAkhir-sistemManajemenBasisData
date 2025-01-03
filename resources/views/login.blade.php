<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to MailMovie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Background halaman */
        body {
            background-image: url('https://studio.mrngroup.co/storage/app/media/Prambors/cropped-images/Bioskop-20210909043612.jpg?tr=w-600'); /* Ganti URL dengan gambar yang kamu inginkan */
            background-size: cover; /* Menyesuaikan gambar dengan ukuran layar */
            background-position: center; /* Memastikan gambar berada di tengah */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(13, 13, 13, 0.5); /* Transparansi hitam */
            z-index: 1; /* Menempatkan overlay di bawah konten */
        }

        /* Card Login */
        .login-card {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 2;
        }

        /* Judul Login */
        .login-card h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        /* Label dan Input Field */
        .form-label {
            color: #555; /* Warna abu tua untuk label */
        }

        .form-control {
            border-radius: 5px;
            margin-bottom: 20px;
        }

        /* Tombol Login */
        .btn-login {
            width: 100%;
            background-color: rgb(3, 28, 54); /* Biru tua */
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
        }

        .btn-login:hover {
            background-color: #003366; /* Biru tua lebih gelap saat hover */
        }
    </style>
</head>
<body>

    <!-- Card Login -->
    <div class="login-card">
        <h2>Login to MailMovie</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <!-- Username -->
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <!-- Login Button -->
            <button type="submit" class="btn-login">Login</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
