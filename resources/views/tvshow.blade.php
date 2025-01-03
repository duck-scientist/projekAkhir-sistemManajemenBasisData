<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top 5 TV Shows</title>
</head>
<body>
    <h1>Top 5 TV Shows</h1>
    
    <table border="1">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Genres</th>
                <th>Year</th>
                <th>Rating</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $show)
                <tr>
                    <td>{{ $show->originalTitle }}</td>
                    <td>{{ $show->Description }}</td>
                    <td>{{ $show->Genres }}</td>
                    <td>{{ $show->Year }}</td>
                    <td>{{ $show->Rating }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
