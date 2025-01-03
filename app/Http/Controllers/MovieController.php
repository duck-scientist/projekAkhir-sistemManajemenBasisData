<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function movee(Request $request)
    {
        // Default genre is 'Action', but it can be changed based on the user's input
        $genre = $request->input('genre', 'Action');

        // Query to fetch the top 5 movies for the selected genre
        $movies = DB::select(
            "SELECT DISTINCT 
                t.originalTitle, 
                t.startYear
            FROM title t
            JOIN title_genres tg ON t.tconst = tg.tconst
            JOIN genre g ON g.genreId = tg.genreId
            WHERE t.titleType NOT IN ('tvSpecial', 'tvPilot', 'tvShort', 'tvMiniSeries', 'tvSeries')
              AND g.genres = ? 
            ORDER BY t.startYear DESC
            OFFSET 5 ROWS FETCH NEXT 5 ROWS ONLY",
            [$genre]
        );

        // Pass the data to the view
        return view('movie', ['movies' => $movies, 'genre' => $genre]);
    }

    public function tvs(Request $request)
    {
        // Query untuk mendapatkan data
        $tvShows = DB::select(
            "SELECT DISTINCT TOP 7 t.originalTitle, s.overview AS Description, g.genres AS Genres, t.startYear AS Year, CONCAT(tr.averageRating, '/10.0') AS Rating
            FROM TITLE t
            JOIN BASDATSEM3.DBO.title_ratings tr ON t.tconst = tr.tconst
            JOIN entertainment e ON tr.tconst = e.tconst
            JOIN shows s ON e.show_id = s.show_id
            JOIN title_genres tg ON tg.tconst = t.tconst
            JOIN genre g ON g.genreId = tg.genreId
            WHERE t.titleType NOT IN ('tvMovie', 'movie', 'videoGame', 'video') AND s.overview IS NOT NULL
            ORDER BY Rating DESC;"
        );

        // Mengirim data ke view
        return view('topTvShows', ['tvShows' => $tvShows]);
    }

    public function elpi()
    {
        $shows = DB::select("WITH FilteredTitles AS (
            SELECT 
                t.tconst, 
                t.originalTitle, 
                t.startYear, 
                tr.averageRating, 
                s.overview, 
                STRING_AGG(g.genres, ', ') AS Genres
            FROM title t
            JOIN title_ratings tr ON t.tconst = tr.tconst
            JOIN entertainment e ON tr.tconst = e.tconst
            JOIN shows s ON e.show_id = s.show_id
            JOIN title_genres tg ON tg.tconst = t.tconst
            JOIN genre g ON g.genreId = tg.genreId
            WHERE t.titleType IN ('tvMovie', 'movie', 'videoGame', 'video') AND s.overview IS NOT NULL
            GROUP BY t.tconst, t.originalTitle, t.startYear, tr.averageRating, s.overview
        )
            SELECT TOP 3 
                originalTitle, 
                overview AS Description, 
                Genres, 
                startYear AS Year, 
                CONCAT(averageRating, '/10.0') AS Rating
            FROM FilteredTitles
            ORDER BY averageRating DESC;");

        $orang = DB::select("WITH PopularityCount AS (
            SELECT 
                p.primaryName, 
                COUNT(kf.tconst) AS Popularity
            FROM person p
            JOIN known_for_titles kf ON kf.nconst = p.nconst
            GROUP BY p.primaryName
        )
            SELECT TOP 5 
            primaryName, 
            Popularity
            FROM PopularityCount
            ORDER BY Popularity DESC;");

        return view('landingpage', [
            'elpi' => $shows,
            'orang' => $orang
        ]);
    }

        public function lofo()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Daftar username, password, dan role
        $credentials = [
            'saskrra' => ['password' => 'L0223043', 'role' => 'producer'],
            'njmahum' => ['password' => 'L0223033', 'role' => 'adminCelebrity'],
            'pieromuharoja' => ['password' => 'L0223035', 'role' => 'executive'],
        ];

        // Validasi username dan password
        if (isset($credentials[$username]) && $credentials[$username]['password'] === $password) {
            $role = $credentials[$username]['role'];

            // Redirect berdasarkan role
            switch ($role) {
                case 'adminCelebrity':
                    return redirect()->route('adminCelebrity');
                case 'executive':
                    return redirect()->route('executive');
                case 'producer':
                    return redirect()->route('producer.index');
                default:
                    return back()->with('error', 'Role not found');
            }
        } else {
            return back()->with('error', 'Invalid username or password');
        }
    }

        public function akt()
    {
        // Query for Top 5 Actors
        $topActors = DB::select
            ("SELECT TOP 5 
                p.primaryName AS ActorName,
                COUNT(kf.tconst) AS TitleCount
            FROM person p
            JOIN person_profession pp ON pp.nconst = p.nconst
            JOIN profession prof ON prof.professionId = pp.professionId 
            JOIN known_for_titles kf ON p.nconst = kf.nconst
            WHERE prof.primaryProfession = 'actor'
            GROUP BY p.primaryName
            ORDER BY TitleCount DESC
        ");

        // Query for Top 5 Actresses
        $topActresses = DB::select
            ("SELECT TOP 5 
                p.primaryName AS ActressName,
                COUNT(kf.tconst) AS TitleCount
            FROM person p
            JOIN person_profession pp ON pp.nconst = p.nconst
            JOIN profession prof ON prof.professionId = pp.professionId 
            JOIN known_for_titles kf ON p.nconst = kf.nconst
            WHERE prof.primaryProfession = 'actress'
            GROUP BY p.primaryName
            ORDER BY TitleCount DESC
        ");

        // Query for Genres in Movies
        $movieGenres = DB::select
            ("SELECT
                g.genres AS Genre,
                COUNT(t.tconst) AS TitleCount
            FROM title t
            JOIN title_genres tg ON t.tconst = tg.tconst
            JOIN genre g ON tg.genreId = g.genreId
            WHERE t.titleType IN ('tvMovie', 'movie', 'short', 'videoGame', 'video')
            GROUP BY g.genres
            ORDER BY TitleCount DESC
        ");

        // Query for Genres in TV Shows
        $tvGenres = DB::select
            ("SELECT
                g.genres AS Genre,
                COUNT(t.tconst) AS TitleCount
            FROM title t
            JOIN title_genres tg ON t.tconst = tg.tconst
            JOIN genre g ON tg.genreId = g.genreId
            WHERE t.titleType NOT IN ('tvMovie', 'movie', 'short', 'videoGame', 'video')
            GROUP BY g.genres
            ORDER BY TitleCount DESC
        ");

        return view('executive', compact('topActors', 'topActresses', 'movieGenres', 'tvGenres'));
    }

    public function index()
    {
        // Query untuk mengambil data dari tabel
        $episodes = DB::select("SELECT TOP 50 * FROM episodes ORDER BY episodeId DESC;");
        $titleEpNumbers = DB::select("SELECT TOP 50 * FROM title_epnumbers;");
        $titleAkas = DB::select("SELECT TOP 50 * FROM title_akas;");
        $titles = DB::select("SELECT TOP 50 * FROM title;");

        // Mengirim data ke view
        return view('producer.index', [
            'episodes' => $episodes,
            'titleEpNumbers' => $titleEpNumbers,
            'titleAkas' => $titleAkas,
            'titles' => $titles,
        ]);
    }

    // CREATE: Menampilkan form tambah data
    public function create()
    {
        return view('producer.create');
    }

    // STORE: Menyimpan data baru ke database
    public function store(Request $request)
    {
        $data = $request->validate([
            'episodeId' => 'required',
            'tconst' => 'required', // Ganti dengan kolom sebenarnya
            'parenttconst' => 'required',
        ]);

        DB::insert("INSERT INTO episodes (episodeId, tconst, parenttconst) VALUES (?, ?, ?)", [
            $data['episodeId'],
            $data['tconst'],
            $data['parenttconst'],
        ]);

        return redirect()->route('producer.index')->with('success', 'Data berhasil ditambahkan!');
    }

    // EDIT: Menampilkan form edit data
    public function edit($id)
    {
        $episode = DB::selectOne("SELECT * FROM episodes WHERE episodeId = ?", [$id]);
        return view('producer.edit', compact('episode'));
    }

    // UPDATE: Menyimpan perubahan data ke database
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'tconst' => 'required', // Ganti dengan kolom sebenarnya
            'parenttconst' => 'required',
        ]);

        DB::update("UPDATE episodes SET tconst = ?, parenttconst = ? WHERE episodeId = ?", [
            $data['tconst'],
            $data['parenttconst'],
            $id,
        ]);

        return redirect()->route('producer.index')->with('success', 'Data berhasil diupdate!');
    }

    // DELETE: Menghapus data dari database
    public function destroy($id)
    {
        DB::delete("DELETE FROM episodes WHERE episodeId = ?", [$id]);
        return redirect()->route('producer.index')->with('success', 'Data berhasil dihapus!');
    }

}