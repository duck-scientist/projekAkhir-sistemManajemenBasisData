<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies by Genre</title>
    <!-- Bootstrap CSS -->
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
            border-radius: 10px;
        }

        .hero {
            background: url('https://pixflow.net/blog/wp-content/uploads/2020/06/Fight-club.jpg') no-repeat center center/cover;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .hero h1, .hero p {
            font-weight: bold;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);
            color: white;
        }

        .card {
            background-color: #333;
            color: white;
            border-radius: 10px;
            border: none;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-body {
            padding: 20px;
        }

        .card-footer {
            background-color: #444;
            border-top: 1px solid #555;
            padding: 10px;
            text-align: center;
        }

        .dropdown {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero">
        <div>
            <h1>Movie Section</h1>
            <p>All about movies here!</p>
        </div>
    </section>

    <!-- Dropdown for Genre Selection -->
    <section class="container my-5">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Select Genre
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Comedy</a></li>
                <li><a class="dropdown-item" href="#">Drama</a></li>
                <li><a class="dropdown-item" href="#">Horror</a></li>
                <li><a class="dropdown-item" href="#">Sci-Fi</a></li>
            </ul>
        </div>
    </section>

    <!-- Movie Section -->
    <section class="container my-5">
        <h2 class="mb-4" style="color: white; display: flex; align-items: center;">
            <span style="color: yellow; font-weight: bold; margin-right: 8px;">|</span>
            Top 5 Movies
        </h2>

        <div class="row">
            @foreach ($movies as $movie)
                <div class="col-md-4 mb-4">
                    <div class="card movie-card">
                        <img src="https://via.placeholder.com/300x300" alt="Movie Image" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $movie->originalTitle }}</h5>
                            <p class="card-text" style="font-size: 0.9rem;">{{ $movie->Description }}</p>
                        </div>
                        <div class="card-footer">
                            <p><strong>Year:</strong> {{ $movie->Year }}</p>
                            <p><strong>Rating:</strong> {{ $movie->Rating }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
