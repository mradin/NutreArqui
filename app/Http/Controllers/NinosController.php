<?php namespace App\Http\Controllers;

use App\Padre;
use App\Nino;
use App\Comunidad;
use App\Http\Requests;
use App\Http\Requests\PadreRequest;
use App\Http\Controllers\Controller;

use Request;
use Carbon\Carbon;
use Auth;

class NinosController extends Controller {

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
     * @return vista ninos
     */
    public function index()
    {
        $ninos = Nino::orderBy('created_at', 'DESC')->get();

        return view('ninos.index', compact('ninos'));
    }

    /**
     *
     *
     * @return Response
     */
    public function create()
    {
        $padres = Padre::lists('apellidos', 'id_padre');
        $comunidades = Comunidad::lists('nombre', 'id_comunidad');

        return view('ninos.create', compact('padres', 'comunidades'));
    }

    /**
     *
     *
     * @param PadreRequest $request
     * @return Response
     */
    public function store(PadreRequest $request)
    {
        $nino = new Nino;
        $nino->nombre = $request->get('nombre');
        $nino->apellidos = $request->get('apellidos');
        $nino->curp = $request->get('curp');
        $nino->edad = $request->get('edad');
        $nino->padre_id = $request->get('padre_id');
        $nino->comunidad_id = $request->get('comunidad_id');
        $nino->save();

        return redirect('ninos');
    }

    /**
     * Edita un nino
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $nino = Nino::findOrFail($id);
        $padres = Padre::lists('apellidos', 'id_padre');

        return view('ninos.edit')
            ->with('id', $id)
            ->with('nino', $nino)
            ->with('padres', $padres);
    }

    /**
     * Actualiza un nino
     *
     * @param PadreRequest $request
     * @param  int  $id
     * @return Response
     */
    public function update($id, PadreRequest $request)
    {
        $nino = Nino::findOrFail($id);

        $nino->nombre = $request->get('nombre');
        $nino->apellidos = $request->get('apellidos');
        $nino->edad = $request->get('edad');
        $nino->curp = $request->get('curp');
        $nino->save();

        return redirect('ninos');
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
        $id_nino = $request->id_nino;

        $nino = Nino::findOrFail($id_nino);
        $nino->delete();

        return('Borrado exitoso!');
    }

}
