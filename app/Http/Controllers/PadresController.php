<?php namespace App\Http\Controllers;

use App\Padre;
use App\Http\Requests;
use App\Http\Requests\PadreRequest;
use App\Http\Controllers\Controller;

use Request;

use Auth;

class PadresController extends Controller {

    /**
     * Muestra la vista con todos los tags
     *
     * @return vista categories
     */
    public function index()
    {
        if(Auth::user()){
            $padres = Padre::orderBy('created_at', 'DESC')->get();

            return view('padres.index', compact('padres'));
        }else{
            // Can not enter if there is not an authenticated user
            $this->middleware('auth');
        }
    }

    /**
     * Muestra la vista para crear un tag
     *
     * @return Response
     */
    public function create()
    {
        return view('padres.create');
    }

    /**
     * Guarda un nuevo tag
     *
     * @param PadreRequest $request
     * @return Response
     */
    public function store(PadreRequest $request)
    {
        $padre = new Padre;
        $padre->nombre = $request->get('nombre');
        $padre->apellidos = $request->get('apellidos');
        $padre->curp = $request->get('curp');
        $padre->tipo = $request->get('tipo');
        $padre->save();

        return redirect('padres');
    }

    /**
     * Edita un padre
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $padre = Padre::findOrFail($id);

        return view('padres.edit', compact('id','padre'));
    }

    /**
     * Actualiza un padre
     *
     * @param PadreRequest $request
     * @param  int  $id
     * @return Response
     */
    public function update($id, PadreRequest $request)
    {
        $padre = Padre::findOrFail($id);

        $padre->nombre = $request->get('nombre');
        $padre->apellidos = $request->get('apellidos');
        $padre->curp = $request->get('curp');
        $padre->tipo = $request->get('tipo');
        $padre->save();

        return redirect('padres');
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
     * Borrar padre
     *
     * @param PadreRequest $request
     * @return Response
     */
    public function getBorrado(PadreRequest $request)
    {
        $id_padre = $request->id_padre;

        $padre = Padre::findOrFail($id_padre);
        $padre->delete();

        return('Borrado exitoso!');
    }

}
