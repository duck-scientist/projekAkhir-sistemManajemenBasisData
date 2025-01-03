<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producer Page</title>
    <style>
        <style>
        /* Mengatur background halaman */
        body {
            background-color:rgb(0, 0, 0);
            color: #fff;
            font-family: 'Arial', sans-serif;
        }

        /* Mengatur container agar kontennya di tengah */
        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        /* Mengatur tabel agar tetap responsif dan berada di tengah */
        .table-container {
            width: 80%;
            overflow-x: auto;
            margin-bottom: 20px;
            background-color:rgb(255, 255, 255);
            border-radius: 8px;
            padding: 20px;
        }

        /* Mengatur tabel agar berada di tengah */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
        }

        /* Mengatur warna border, padding, dan teks */
        th, td {
            border: 1px solid #444;
            padding: 12px;
            text-align: left;
        }

        /* Mengatur background header */
        th {
            background-color:rgb(194, 206, 213);
        }

        /* Menambahkan warna untuk tombol CRUD */
        .crud-buttons {
            margin-bottom: 15px;
        }

        .btn {
            padding: 10px 20px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-create {
            background-color: #4CAF50;
            color: white;
        }

        .btn-update {
            background-color: #FF9800;
            color: white;
        }

        .btn-delete {
            background-color: #f44336;
            color: white;
        }

        /* Mengatur style untuk judul */
        h1, h2 {
            text-align: center;
            color: #000;
        }

    </style>
    </style>
</head>
<body>
    <h1>Producer Page</h1>
    <div class="container">
        <div class="table-container">
            <h2>Episodes</h2>
            <div class="crud-buttons">
            <a href="{{ route('producer.create') }}" class="btn btn-create" title="Tambah Data">➕ Tambah</a>
            </div>

            @if(count($episodes) > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Episode Id</th>
                            <th>Tconst</th>
                            <th>ParentTconst</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($episodes as $episode)
                            <tr>
                                <td>{{ $episode->episodeId }}</td>
                                <td>{{ $episode->tconst }}</td>
                                <td>{{ $episode->parenttconst }}</td>
                                <td>
                                    <!-- Edit Button -->
                                    <a href="{{ route('producer.edit', $episode->episodeId) }}" class="btn btn-update">✏ Edit</a>
                                    <!-- Delete Button -->
                                    <form action="{{ route('producer.destroy', $episode->episodeId) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">❌ Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Data episodes tidak tersedia.</p>
            @endif
        


        <!-- Title Episode Numbers Table -->
        <div class="table-container">
            <h2>Title Episode Numbers</h2>
            <div class="crud-buttons">
                <button class="btn btn-create" title="Tambah Data" onclick="openModal('create')">➕ Tambah</button>
            </div>

            <table>
                <thead>
                    <tr>
                        @if(count($titleEpNumbers) > 0)
                            @foreach(array_keys((array) $titleEpNumbers[0]) as $column)
                                <th>{{ $column }}</th>
                            @endforeach
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($titleEpNumbers as $row)
                        <tr>
                            @foreach((array) $row as $value)
                                <td>{{ $value }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Title Akas Table -->
        <div class="table-container">
            <h2>Title Akas</h2>
            <div class="crud-buttons">
                <button class="btn btn-create" title="Tambah Data" onclick="openModal('create')">➕ Tambah</button>
            </div>

            <table>
                <thead>
                    <tr>
                        @if(count($titleAkas) > 0)
                            @foreach(array_keys((array) $titleAkas[0]) as $column)
                                <th>{{ $column }}</th>
                            @endforeach
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($titleAkas as $row)
                        <tr>
                            @foreach((array) $row as $value)
                                <td>{{ $value }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Titles Table -->
        <div class="table-container">
            <h2>Titles</h2>
            <div class="crud-buttons">
                <button class="btn btn-create" title="Tambah Data" onclick="openModal('create')">➕ Tambah</button>
            </div>

            <table>
                <thead>
                    <tr>
                        @if(count($titles) > 0)
                            @foreach(array_keys((array) $titles[0]) as $column)
                                <th>{{ $column }}</th>
                            @endforeach
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($titles as $row)
                        <tr>
                            @foreach((array) $row as $value)
                                <td>{{ $value }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
