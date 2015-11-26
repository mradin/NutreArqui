<?php namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;

use Auth;

class UsuariosController extends Controller {

    /**
     * The Guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\Guard
    */
    protected $auth;

    public function __construct()
    {
    // No podrán ver ninguna página si no están autenticados
    $this->middleware('auth');
    }

    /**
     * Muestra la vista con todos los usuarios
     *
     * @return vista usuarios
     */
    public function index()
    {
        $usuarios = User::all();

        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Elimina un usuario
     *
     * @param  int  $id
     * @return redirect a usuarios
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect('usuarios');
    }

}
