<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>
    <h1>Tambah Data Episode</h1>
    <form action="{{ route('producer.store') }}" method="POST">
        @csrf
        <label for="">episodeId:</label>
        <input type="text" name="episodeId" id="episodeId" required>
        <br>
        <label for="tconst">tconst:</label>
        <input type="text" name="tconst" id="tconst" required>
        <br>
        <label for="parenttconst">tconst:</label>
        <input type="text" name="parenttconst" id="parenttconst" required>
        <br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
