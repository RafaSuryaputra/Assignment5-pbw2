<?php
// RAFA SURYAPUTRA - 6706223162
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
     * 
     * @return \Illuminate\Http\Response
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
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.registrasi');
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * 
     * @return \Illuminate\Http\Response
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
