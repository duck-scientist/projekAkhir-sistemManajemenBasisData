<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Website Header</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            background-color:rgb(4, 16, 29);
        }
        .navbar-brand img {
            height: 60px;
        }
        .navbar-nav .nav-link {
            color: white !important;
        }
        .form-control {
            max-width: 500px; /* Memperpanjang search bar */
            margin: 0 auto; /* Memindahkan search bar ke tengah */
        }
        .btn-login {
            background-color:rgb(25, 25, 26);
            color: white; /* Mengubah teks menjadi putih */
            border: 1px solid white;
        }
        .btn-login:hover {
            background-color: white;
            color: black;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="E:\laragon\www\MailMovie\public/logomail.png" alt="Logo"> <!-- Pastikan mengganti path ke file logo lokal -->
            </a>

            <!-- Navbar Links -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/movie') }}">Movie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/tvshow') }}">TV Show</a>
                    </li>
                </ul>

                <!-- Search Bar -->
                <form class="d-flex me-3 w-100">
                    <input class="form-control mx-auto" type="search" placeholder="Search..." aria-label="Search">
                </form>

                <!-- Login Button -->
                <a href="{{ url('/login') }}" class="btn btn-login" style="color: white;">Login</a>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
