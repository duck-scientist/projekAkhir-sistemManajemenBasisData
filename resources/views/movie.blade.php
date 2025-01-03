<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies by Genre</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Top 5 Movies</h2>

        <!-- Genre Selection Form -->
        <form method="GET" action="{{ route('movie.movee') }}">
            <div class="mb-3">
                <label for="genre" class="form-label">Select Genre</label>
                <select name="genre" id="genre" class="form-select">
                    <option value="Action" {{ $genre == 'Action' ? 'selected' : '' }}>Action</option>
                    <option value="Drama" {{ $genre == 'Drama' ? 'selected' : '' }}>Drama</option>
                    <option value="Comedy" {{ $genre == 'Comedy' ? 'selected' : '' }}>Comedy</option>
                    <option value="Horror" {{ $genre == 'Horror' ? 'selected' : '' }}>Horror</option>
                    <option value="Sci-Fi" {{ $genre == 'Sci-Fi' ? 'selected' : '' }}>Sci-Fi</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Show Movies</button>
        </form>

        <!-- Movies List -->
        <div class="mt-4">
            @if(count($movies) > 0)
                <ul class="list-group">
                    @foreach ($movies as $movie)
                        <li class="list-group-item">
                            <strong>{{ $movie->originalTitle }}</strong> ({{ $movie->startYear }})
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No movies found for the selected genre.</p>
            @endif
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
