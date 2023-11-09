<?php

// RAFA SURYAPUTRA - 6706223162
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CollectionController extends Controller
{
    public function index() {
        return view('koleksi.daftarKoleksi');
    }

    public function create() {
        return view('koleksi.registrasi');
    }

    public function show(Collection $collection) {
        return view('koleksi.infoKoleksi', compact('collection'));
    }

    public function getAllCollections() {
            $collections = DB::table('collections')
            ->select(
                'id as id',
                'nama as judul',
                DB::raw('
                    (CASE
                    WHEN jenis="1" THEN "Buku"
                    WHEN jenis="2" THEN "Majalah"
                    WHEN jenis="3" THEN "Cakram Digital"
                    END) AS jenis
                    '),
                'jumlahSisa as jumlahSisa',
                'jumlahAwal as jumlahAwal',
                'jumlahKeluar as jumlahKeluar')
            ->orderBy('nama', 'asc')
            ->get();

            return DataTables::of($collections)
            ->addColumn('action', function($collection) {
                $html = '
                <a class="btn btn-info" href="'.url('koleksiView')."/".$collection->id.'">Edit</a>
                ';
                return $html;
            })
            ->make(true);
    }

    public function store(Request $request) 
    {
        $request->validate([
            'nama'      => ['required', 'string', 'max:255', 'unique:collections'],
            'jenis'     => ['required', 'gt:0'],
            'jumlahAwal'    => ['required', 'gt:0']
        ],
        [
            'nama.unique'   => 'Nama koleksi tersebut sudah ada'
        ]);

        $koleksi = [
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'jumlahAwal' => $request->jumlahAwal,
            'jumlahSisa' => $request->jumlahAwal,
            'jumlahKeluar' => 0,
        ];

        DB::table('collections')->insert($koleksi);
        return view('koleksi.daftarKoleksi');
    }

    public function update(Request $request)
    {
        $request->validate([
            'jenis'     => ['required', 'gt:0'],
            'jumlahSisa'     => ['required', 'gt:0'],
            'jumlahKeluar'     => ['required', 'gt:0'],
        ]);

        $affected = DB::table('collections')
        ->where('id', $request->id)
        ->update([
            'jenis' => $request->jenis,
            'jumlahSisa' => $request->jumlahSisa,
            'jumlahKeluar' => $request->jumlahKeluar,
        ]);

        return view('koleksi.daftarKoleksi');
    }
}
