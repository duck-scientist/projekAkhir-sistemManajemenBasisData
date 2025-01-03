<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Data</title>
</head>
<body>
    <h1>Hapus Data Episode</h1>
    <p>Apakah Anda yakin ingin menghapus data berikut?</p>
    <ul>
        <li>Kolom 1: {{ $episode->column1 }}</li>
        <li>Kolom 2: {{ $episode->column2 }}</li>
    </ul>
    <form action="{{ route('producer.delete', $episode->episodeId) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Hapus</button>
        <a href="{{ route('producer.index') }}">Batal</a>
    </form>
</body>
</html>
