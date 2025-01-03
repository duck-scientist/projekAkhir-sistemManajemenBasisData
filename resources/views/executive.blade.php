<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Executive Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            width: 45%;
            height: 300px;
            margin: 0 auto;
        }
        .row {
            display: flex;
            justify-content: space-between;
        }
        .chart-container canvas {
            max-height: 100%;
            max-width: 100%;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h2 class="text-center mb-4">Top 5 Actors and Actresses</h2>

        <!-- Actors and Actresses Charts Side by Side -->
        <div class="row mb-5">
            <div class="chart-container">
                <h3 class="text-center">Top 5 Actors</h3>
                <canvas id="actorsChart"></canvas>
            </div>
            <div class="chart-container">
                <h3 class="text-center">Top 5 Actresses</h3>
                <canvas id="actressesChart"></canvas>
            </div>
        </div>

        <!-- Movie Genres and TV Show Genres Charts Side by Side -->
        <div class="row">
            <div class="chart-container">
                <h3 class="text-center">Movie Genres</h3>
                <canvas id="movieGenresChart"></canvas>
            </div>
            <div class="chart-container">
                <h3 class="text-center">TV Show Genres</h3>
                <canvas id="tvGenresChart"></canvas>
            </div>
        </div>

        <script>
            // Top 5 Actors Chart
            const actorsData = @json($topActors);
            const actorNames = actorsData.map(actor => actor.ActorName);
            const actorTitleCounts = actorsData.map(actor => actor.TitleCount);

            const actorsChart = new Chart(document.getElementById('actorsChart'), {
                type: 'bar',
                data: {
                    labels: actorNames,
                    datasets: [{
                        label: 'Title Count',
                        data: actorTitleCounts,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Top 5 Actresses Chart
            const actressesData = @json($topActresses);
            const actressNames = actressesData.map(actress => actress.ActressName);
            const actressTitleCounts = actressesData.map(actress => actress.TitleCount);

            const actressesChart = new Chart(document.getElementById('actressesChart'), {
                type: 'bar',
                data: {
                    labels: actressNames,
                    datasets: [{
                        label: 'Title Count',
                        data: actressTitleCounts,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Movie Genres Chart (Pastel Colors)
            const movieGenresData = @json($movieGenres);
            const movieGenres = movieGenresData.map(genre => genre.Genre);
            const movieTitleCounts = movieGenresData.map(genre => genre.TitleCount);

            const movieGenresChart = new Chart(document.getElementById('movieGenresChart'), {
                type: 'pie',
                data: {
                    labels: movieGenres,
                    datasets: [{
                        label: 'Title Count',
                        data: movieTitleCounts,
                        backgroundColor: ['#FFB3BA', '#FFDFBA', '#FFFFBA', '#BAFFB3', '#BAE1FF'],
                        borderColor: ['#FFB3BA', '#FFDFBA', '#FFFFBA', '#BAFFB3', '#BAE1FF'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // TV Show Genres Chart (Pastel Colors)
            const tvGenresData = @json($tvGenres);
            const tvGenres = tvGenresData.map(genre => genre.Genre);
            const tvTitleCounts = tvGenresData.map(genre => genre.TitleCount);

            const tvGenresChart = new Chart(document.getElementById('tvGenresChart'), {
                type: 'pie',
                data: {
                    labels: tvGenres,
                    datasets: [{
                        label: 'Title Count',
                        data: tvTitleCounts,
                        backgroundColor: ['#FFB3BA', '#FFDFBA', '#FFFFBA', '#BAFFB3', '#BAE1FF'],
                        borderColor: ['#FFB3BA', '#FFDFBA', '#FFFFBA', '#BAFFB3', '#BAE1FF'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });
        </script>
    </div>
</body>
</html>
