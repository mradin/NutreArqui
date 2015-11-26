<?php namespace App\Http\Controllers;

use App\Comunidad;
use App\Visita;
use App\Http\Requests;
use App\Http\Requests\SimpleRequest;
use App\Http\Requests\PadreRequest;
use App\Http\Controllers\Controller;

use Request;
use Carbon\Carbon;
use Auth;

class VisitasController extends Controller {

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
     * @return vista visitas
     */
    public function index()
    {
        $visitas = Visita::orderBy('created_at', 'DESC')->get();

        return view('visitas.index', compact('visitas'));
    }

    /**
     *
     *
     * @return Response
     */
    public function create()
    {
        $comunidades = Comunidad::lists('nombre', 'id_comunidad');

        return view('visitas.create', compact('comunidades'));
    }

    /**
     *
     *
     * @param SimpleRequest $request
     * @return Response
     */
    public function store(SimpleRequest $request)
    {
        $visita = new Visita;
        $visita->comunidad_id = $request->get('comunidad_id');
        $visita->save();

        return redirect('visitas');
    }

    /**
     * Edita una visita
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $visita = Visita::findOrFail($id);
        $comunidades = Comunidad::lists('nombre', 'id_comunidad');

        return view('visitas.edit')
            ->with('id', $id)
            ->with('visita', $visita)
            ->with('comunidades', $comunidades);
    }

    /**
     * Actualiza una visita
     *
     * @param SimpleRequest $request
     * @param  int  $id
     * @return Response
     */
    public function update($id, SimpleRequest $request)
    {
        $visita = Visita::findOrFail($id);

        $visita->comunidad_id = $request->get('comunidad_id');
        $visita->save();

        return redirect('visitas');
    }

    /**
     *
     *
     * @param  int  $id
     * @return redirect
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Borrar nino
     *
     * @param PadreRequest $request
     * @return Response
     */
    public function getBorrado(PadreRequest $request)
    {
        $id_visita = $request->id_visita;

        $visita = Visita::findOrFail($id_visita);
        $visita->delete();

        return('Borrado exitoso!');
    }

}
