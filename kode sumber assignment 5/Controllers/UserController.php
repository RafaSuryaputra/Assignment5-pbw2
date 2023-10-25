<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
    //     $users = User::all();
    //     return view('user.daftarPengguna', compact('users'));
    // }
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('user.daftarPengguna');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user.registrasi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //RAFA SURYAPUTRA - 6706223162
        $request->validate([
            'username' => ['required', 'string', 'max:100'],
            'fullname' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => ['required', 'string', 'max:1000'],
            'birthdate' => ['required', 'date'],
            'phoneNumber' => ['required', 'string', 'max:20'],
            'religion' => ['required', 'string', 'max:20'],
            'gender' => ['required', 'integer', 'max:4'],
        ]);
    
       
        User::create([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'birthdate' => $request->birthdate,
            'phoneNumber' => $request->phoneNumber,
            'religion' => $request->religion,
            'gender' => $request->gender,
        ]);
    
        
        return redirect('/user');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        return view('user.infoPengguna', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //RAFA SURYAPUTRA - 6706223162
        $request->validate([
            'fullname' => ['required', 'string', 'max:100'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => ['required', 'string', 'max:1000'],
            'phoneNumber' => ['required', 'string', 'max:20'],
            'religion' => ['required', 'string', 'max:20'],
            'gender' => ['required', 'integer', 'max:4'],
    ]);
    User::where('id', $request->id)
        ->update([
            'fullname' => $request->fullname,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
            'religion' => $request->religion,
        ]);

        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
