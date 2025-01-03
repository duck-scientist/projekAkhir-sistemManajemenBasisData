<!DOCTYPE html>
<html lang="en">
    <!-- Include Header -->
    @include('header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgb(20, 20, 21);
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .movie-card img {
            height: 300px;
            object-fit: cover;
            border-radius: 10px; /* Menambahkan radius untuk tampilan lebih lembut */
        }

        .hero {
            background: url('https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p3/75/2024/11/17/film-wicked-2016647098.jpg') no-repeat center center/cover;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            filter: none; 
            image-rendering: auto;
            -webkit-backface-visibility: hidden;
        }

        .hero h1, .hero p {
            font-weight: bold; /* Membuat teks menjadi tebal */
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6); /* Menambahkan shadow pada teks */
            color: white; /* Warna teks putih */
            margin: 0; /* Menghapus margin default */
        }

        .hero h1 {
            font-size: 3rem; /* Ukuran font untuk judul */
        }

        .hero p {
            font-size: 1.9rem; /* Ukuran font untuk paragraf */
            margin-top: 10px; /* Jarak antara paragraf dan elemen sebelumnya */
        }
    </style>

</head>
<body>
    <!-- Hero Section -->
    <section class="hero">
        <div>
            <h1>Welcome to MailMovie</h1>
            <p>Your gateway to top-rated movies!</p>
        </div>
    </section>

    <!-- Featured Movie Section -->
    <section class="container my-5">
    <h2 class="mb-4" style="color: white; display: flex; align-items: center;">
        <span style="color: yellow; font-weight: bold; margin-right: 8px;">|</span>
        Featured Movies
    </h2>
    <div class="row">
        @foreach ($elpi as $fm)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $fm->originalTitle }}</h5>
                        <p class="card-text">{{ $fm->Description }}</p>
                        <p><strong>Genre:</strong> {{ $fm->Genres }} | <strong>Year:</strong> {{ $fm->Year }}</p>
                        <p><strong>Rating:</strong> {{ $fm->Rating }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </section>

    <div class="container my-5">
    <h2 class="mb-4 text-center" style="color: white; display: flex; align-items: center;">
        <span style="color: yellow; font-weight: bold; margin-right: 8px;">|</span> Top Celebrities
    </h2>
    <div class="row justify-content-center">
        @foreach ($orang as $celeb)
            <div class="col-3 mb-4 text-center">
                <div class="celebrity-card">
                    <p style="font-size: 20px; font-weight: bold; color: white;">{{ $celeb->primaryName }}</p>
                    <p style="font-size: 18px; color: white;">({{ $celeb->Popularity }})</p>
                </div>
            </div>
        @endforeach
    </div>
    </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @include('footer')
</body>
</html>
