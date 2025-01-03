<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procedure Page</title>
    <style>
        .container {
            display: flex;
            justify-content: space-between;
        }
        .box {
            width: 48%;
            border: 1px solid #ccc;
            padding: 10px;
            overflow: auto;
        }
    </style>
</head>
<body>
    <h1>Data from Database</h1>
    <div class="container">
        <div class="box">
            <h2>Episodes</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Duration</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($episodes as $episode)
                    <tr>
                        <td>{{ $episode->id }}</td>
                        <td>{{ $episode->name }}</td>
                        <td>{{ $episode->duration }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="box">
            <h2>Title Epnumbers</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Episode Number</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($title_epnumbers as $title_epnumber)
                    <tr>
                        <td>{{ $title_epnumber->id }}</td>
                        <td>{{ $title_epnumber->title }}</td>
                        <td>{{ $title_epnumber->epnumber }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="container">
        <div class="box">
            <h2>Title Akas</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Aka</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($title_akas as $title_aka)
                    <tr>
                        <td>{{ $title_aka->id }}</td>
                        <td>{{ $title_aka->title }}</td>
                        <td>{{ $title_aka->aka }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="box">
            <h2>Titles</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Year</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($titles as $title)
                    <tr>
                        <td>{{ $title->id }}</td>
                        <td>{{ $title->name }}</td>
                        <td>{{ $title->year }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
