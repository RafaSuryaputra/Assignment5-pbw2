<?php
// RAFA SURYAPUTRA - 6706223162

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Collection;
use App\Models\DetailTransaction;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    public function index() {
        return view('transaction.daftarTransaksi');
    }

    public function create() {
        $users = User::get();
        $collections = Collection::where('jumlahSisa', '>', 0)->get();
        return view('transaction.transaksiTambah', compact('collections', 'users'));
    }

    public function show(Transaction $transaction) {
        $transactions = DB::table('transactions')
        ->select(
            'transactions.id as id',
            'u1.fullname as fullnamePeminjam',
            'u2.fullname as fullnamePetugas',
            'tanggalPinjam as tanggalPinjam',
            'tanggalSelesai as tanggalSelesai',
        )
        ->join('users as u1', 'userIdPeminjam', '=', 'u1.id')
        ->join('users as u2', 'userIdPetugas', '=', 'u2.id')
        ->where('transactions.id', '=', $transaction->id)
        ->orderBy('tanggalPinjam', 'asc')
        ->first();
        return view('transaction.transaksiView', compact('transactions'));
    }

    public function getAllTransactions() {
            $transactions = DB::table('transactions')
            ->select(
                'transactions.id as id',
                'u1.fullname as peminjam',
                'u2.fullname as petugas',
                'tanggalPinjam as tanggalPinjam',
                'tanggalSelesai as tanggalSelesai',
            )
            ->join('users as u1', 'userIdPeminjam', '=', 'u1.id')
            ->join('users as u2', 'userIdPetugas', '=', 'u2.id')
            ->orderBy('tanggalPinjam', 'asc')
            ->get();

            return DataTables::of($transactions)
            ->addColumn('action', function($transaction) {
                $html = '
                <a class="btn btn-info" href="'.url('transaksiView')."/".$transaction->id.'">Edit</a>
                ';
                return $html;
            })
            ->make(true);
    }

    public function store(Request $request) 
    {
        $request->validate([
            'idPeminjam'      => ['required', 'integer', 'gt:0'],
            'koleksi1'     => ['required', 'integer', 'gt:0']
        ],
        [
            'idPeminjam.gt'   => 'Pilih satu Species',
            'koleksi1.gt'   => 'Pilih jenis item'
        ]);

        // membuat 1 object transaction dan simpan kedalam table transactions
        $transaction = new Transaction;
        $transaction->userIdPeminjam = $request->idPeminjam;
        $transaction->userIdPetugas = auth()->user()->id;
        $transaction->tanggalPinjam = Carbon::now()->toDateString(); 
        $transaction->save();
        // mengambil last transaction id untuk digunakan
        // pada proses insert detail transaction
        $lastTransactionIdStored = $transaction->id;

        // Membuat object detail transaction dan simpan kedalam table detail_transactions

        // Peminjaman koleksi 1
        $detilTransaksi1 = new DetailTransaction;
        $detilTransaksi1->transactionId = $lastTransactionIdStored;
        $detilTransaksi1->collectionId = $request->koleksi1;
        $detilTransaksi1->status = 1;
        $detilTransaksi1->save();
        //Mengurangi jumlah stok
        DB::table('collections')->where('id', '=', $request->koleksi1)->decrement('jumlahSisa');
        DB::table('collections')->where('id', '=', $request->koleksi1)->increment('jumlahKeluar');
        
        // Peminjaman koleksi 2
        if($request->koleksi2 > 0) {
            $detilTransaksi2 = new DetailTransaction;
            $detilTransaksi2->transactionId = $lastTransactionIdStored;
            $detilTransaksi2->collectionId = $request->koleksi2;
            $detilTransaksi2->status = 1;
            $detilTransaksi2->save();
            //Mengurangi jumlah stok
            DB::table('collections')->where('id', '=', $request->koleksi2)->decrement('jumlahSisa');
            DB::table('collections')->where('id', '=', $request->koleksi2)->increment('jumlahKeluar');
        }
        // Peminjaman koleksi 3
        if($request->koleksi3 > 0) {
            $detilTransaksi3 = new DetailTransaction;
            $detilTransaksi3->transactionId = $lastTransactionIdStored;
            $detilTransaksi3->collectionId = $request->koleksi3;
            $detilTransaksi3->status = 1;
            $detilTransaksi3->save();
            //Mengurangi jumlah stok
            DB::table('collections')->where('id', '=', $request->koleksi3)->decrement('jumlahSisa');
            DB::table('collections')->where('id', '=', $request->koleksi3)->increment('jumlahKeluar');
        }

        return redirect()->route('transaksi')->with('status','Peminjaman berhasil');
    }

    public function update(Request $request)
    {
        $request->validate([
            'jenis'     => ['required', 'gt:0'],
            'jumlahSisa'     => ['required', 'gt:0'],
            'jumlahKeluar'     => ['required', 'gt:0'],
        ]);

        $affected = DB::table('transactions')
        ->where('id', $request->id)
        ->update([
            'jenis' => $request->jenis,
            'jumlahSisa' => $request->jumlahSisa,
            'jumlahKeluar' => $request->jumlahKeluar,
        ]);

        return view('koleksi.daftarKoleksi');
    }
}