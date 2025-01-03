<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>
<body>
    <h1>Edit Data Episode</h1>
    <form action="{{ route('producer.update', $episode->episodeId) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="tconst">tconst:</label>
        <input type="text" name="tconst" id="tconst" value="{{ $episode->tconst }}" required>
        <br>
        <label for="parenttconst">parenttconst:</label>
        <input type="text" name="parenttconst" id="parenttconst" value="{{ $episode->parenttconst }}" required>
        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
