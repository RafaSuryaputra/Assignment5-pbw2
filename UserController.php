<?php

// RAFA SURYAPUTRA - 6706223162
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index() {
        return view('user.daftarPengguna');
    }

    public function create() {
        return view('user.registrasi');
    }

    public function store(Request $request) {
        $request->validate([
            'username'      => ['required', 'string', 'max:255', 'unique:users'],
            'fullname'      => ['required', 'string', 'max:255'],
            'email'         => ['email'],
            'password'      => ['required', 'confirmed', Password::defaults()],
            'address'       => ['required', 'string'],
            'birthDate'     => ['required', 'date', 'before:today'],
            'phoneNumber'   => ['required']
        ],
        [
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username telah digunakan',
            'birthDate.before' => 'Tanggal lahir harus sebelum hari ini'
        ]);

        $user = User::create([
            'username'  => $request->username,
            'fullname'  => $request->fullname,
            'email'  => $request->email,
            'password'  => Hash::make($request->password),
            'address'  => $request->address,
            'birthdate'  => $request->birthDate,
            'phoneNumber'  => $request->phoneNumber,
        ]);

        return view('user.daftarPengguna');
    }

    public function show(User $user) {
        return view('user.infoPengguna', compact('user'));
    }

    public function getAllUsers() {
        $users = DB::table('users')
            ->select(
                'id as id',
                'fullname as fullname',
                'address as address',
                'birthdate as birthdate',
                'phoneNumber as phoneNumber')
            ->orderBy('id', 'asc')
            ->get();

            return DataTables::of($users)
            ->addColumn('action', function($user) {
                $html = '
                <a class="btn btn-info" href="/userView/'.$user->id.'">Edit</a>
                ';
                return $html;
            })
            ->make(true);
    }

    public function update(Request $request)
    {
        $request->validate([
            'fullname'      => ['required', 'string', 'max:255'],
            'password'      => ['required'],
            'address'       => ['required', 'string'],
            'phoneNumber'   => ['required'],
        ]);

        $affected = DB::table('users')
        ->where('id', $request->id)
        ->update([
            'fullname'  => $request->fullname,
            'password'  => Hash::make($request->password),
            'address'  => $request->address,
            'phoneNumber'  => $request->phoneNumber,
        ]);

        return view('user.daftarPengguna');
    }
}
