<?php

// RAFA SURYAPUTRA - 6706223162

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Http\Requests\UpdateCollectionRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\CollectionsDataTable;
use Illuminate\Support\Facades\DB;


class CollectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CollectionsDataTable $dataTable)
    {
        return $dataTable->render('koleksi.daftarKoleksi');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("koleksi.registrasi");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaKoleksi' => ['required', 'string', 'max:100', 'unique:collections'],
            'jenisKoleksi' => ['required', 'numeric', 'in:1,2,3'],
            'jumlahKoleksi' => ['required', 'integer'],
        ],
    [
        'nama.unique' => 'Nama koleksi sudah ada'
    ]);
    
        $collection = Collection::create([
            'namaKoleksi' => $request->namaKoleksi,
            'jenisKoleksi' => $request->jenisKoleksi,
            'JumlahAwal' => $request->jumlahKoleksi,
            'JumlahSisa' => $request->jumlahKoleksi,
            'JumlahKeluar' => 0
        ]);
        DB::table('collections')->insert($collection);
        return redirect('/koleksi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Collection $collection)
    {
        return view("koleksi.infoKoleksi", compact('collection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collection $collection)
    {
        //
    }

    /**
     * Reza M. Akbar 6706223125
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'jenisKoleksi' => ['required', 'numeric', 'in:1,2,3'],
            'jumlahSisa' => ['required', 'integer'],
            'jumlahKeluar' => ['required', 'integer'],
    ]);
    Collection::where('id', $request->id)
        ->update([
            'jenisKoleksi' => $request->jenisKoleksi,
            'JumlahSisa' => $request->jumlahSisa,
            'JumlahKeluar' => $request->jumlahKeluar,
        ]);

        return redirect('/koleksi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collection $collection)
    {
        //
    }
}
