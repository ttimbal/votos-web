<?php

namespace App\Http\Controllers;

use App\Core\Business\MunicipioBusiness;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $municipioBusiness;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MunicipioBusiness $municipioBusiness)
    {
        $this->middleware('auth');
        $this->municipioBusiness=$municipioBusiness;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // return $this->municipioBusiness->index();
        return view('home');
    }
}
