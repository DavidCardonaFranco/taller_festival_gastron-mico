<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name', 'asc')->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->type != 'admin') {
            Session::flash('failure', 'El usuario no tiene permisos para crear otros usuarios.');

            return redirect(route('home'));
        }

        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        if (Auth::user()->type != 'admin') {
            Session::flash('failure', 'El usuario no tiene permisos para crear otros usuarios. ');

            return redirect(route('home'));
        }

        $input = $request->all();
        $user = new User();
        $user->fill($input);
        $password = $input['password'];
        Hash::make($password);
        $user->password = $password;

        $user->save();

        Session::flash('success', 'Usuario creado exitosamente');

        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $users = User::orderBy('name', 'asc')->get();
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserRequest $request, User $user)
    {
        $input = $request->all();

        $user->fill($input);
        $user->save();

        Session::flash('success', 'Usuario editado exitosamente');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->restaurants->isNotEmpty())
        {
            Session::flash('failure', 'Error: No fue posible eliminar el usuario ya que el usuario es dueño de restaurantes');
            return redirect(route('users.index'));
        }
        $user->delete();

        Session::flash('success', 'Usuario eliminado exitosamente');

        return redirect(route('users.index'));
    }
}
