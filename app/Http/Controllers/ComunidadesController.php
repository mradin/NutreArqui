<?php namespace App\Http\Controllers;

use App\Comunidad;
use App\Http\Requests;
use App\Http\Requests\PadreRequest;
use App\Http\Controllers\Controller;

use Request;

use Auth;

class ComunidadesController extends Controller {

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
     *
     *
     * @return vista comunidades
     */
    public function index()
    {
        $comunidades = Comunidad::orderBy('created_at', 'DESC')->get();

        return view('comunidades.index', compact('comunidades'));
    }

    /**
     * Muestra la vista para crear una comunidad
     *
     * @return Response
     */
    public function create()
    {

        return view('comunidades.create');
    }

    /**
     * Guarda una nueva comunidad
     *
     * @param PadreRequest $request
     * @return Response
     */
    public function store(PadreRequest $request)
    {
        $comunidad = new Comunidad;
        $comunidad->nombre = $request->get('nombre');
        $comunidad->estado = $request->get('estado');
        $comunidad->save();

        return redirect('comunidades');
    }

    /**
     * Edita una comunidad
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $comunidad = Comunidad::findOrFail($id);

        return view('comunidades.edit', compact('id','comunidad'));
    }

    /**
     * Actualiza una comunidad
     *
     * @param PadreRequest $request
     * @param  int  $id
     * @return Response
     */
    public function update($id, PadreRequest $request)
    {
        $comunidad = Comunidad::findOrFail($id);

        $comunidad->nombre = $request->get('nombre');
        $comunidad->estado = $request->get('estado');
        $comunidad->save();

        return redirect('comunidades');
    }

    /**
     *
     *
     * @param  int  $id
     * @return redirect a tags
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Borrar comunidades
     *
     * @param PadreRequest $request
     * @return Response
     */
    public function getBorrado(PadreRequest $request)
    {
        $id_comunidad = $request->id_comunidades;

        $padre = Comunidad::findOrFail($id_comunidad);
        $padre->delete();

        return('Borrado exitoso!');
    }

}
