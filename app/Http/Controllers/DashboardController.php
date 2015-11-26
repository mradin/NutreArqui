<?php namespace App\Http\Controllers;

use App\Http\Requests;

use Request;

class DashboardController extends Controller {

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
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        $texto1 = '';

        return view('dashboard.index')
            ->with('texto1', $texto1);
    }

}
