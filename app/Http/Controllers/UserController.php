<?php

namespace App\Http\Controllers;

use App\Core\Business\UsuarioBusiness;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected $usuarioBusiness;

    public function __construct(UsuarioBusiness  $usuarioBusiness)
    {
        $this->usuarioBusiness = $usuarioBusiness;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = $this->usuarioBusiness->index();
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
            //return $data;
            return view('usuario.usuario.index', [
                'usuarios' => $data['usuarios']
            ]);
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $respuesta = $this->usuarioBusiness->create();
        if ($respuesta['success'])
        {
            $data = $respuesta['data'];
//            return $data;
            return view('usuario.usuario.create', [
                'roles' => $data['roles'],
                'permisos' => $data['permisos'],
                'docentesSinRegistrar' => $data['docentesSinRegistrar'],
                'administrativosSinRegistrar' => $data['administrativosSinRegistrar']
            ]);
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request;
        $respuesta = $this->usuarioBusiness->store($request);
        if ($respuesta['success'])
        {
            return redirect()->route('usuarios.index');
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $respuesta = $this->usuarioBusiness->show($id);
        if ($respuesta['success'])
        {
//            return $respuesta;
            $data = $respuesta['data'];
            return view('usuario.usuario.show', [
                'usuario' => $data['usuario'],
                'persona' => $data['persona']
            ]);
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $respuesta = $this->usuarioBusiness->edit($id);
        if ($respuesta['success'])
        {
//            return $respuesta;
            $data = $respuesta['data'];
            return view('usuario.usuario.edit', [
                'usuario' => $data['usuario'],
                'roles' => $data['roles'],
                'permisos' => $data['permisos']
            ]);
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        return $request;
        $respuesta = $this->usuarioBusiness->update($request,$id);
        if ($respuesta['success'])
        {
            return redirect()->route('usuarios.index');
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $respuesta = $this->usuarioBusiness->destroy($id);
        if ($respuesta['success'])
        {
            return redirect()->route('usuarios.index');
        }
        return back()->withErrors($respuesta['error']);
    }

    /**
     * API method's
     */

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password')))
        {
            try {
                /**
                 * @var User $user
                 */
                $user = Auth::user();
                $token = $user->createToken('app')->accessToken;

                return response([
                    'success' => true,
                    'message' => 'login success',
                    'token' => $token,
                    'user' => $user
                ]);
            } catch (\Exception $exception)
            {
                return response([
                    'message' => $exception->getMessage()
                ],400);
            }
        }

        return response([
            'message' => 'Invalid username/password'
        ],401);
    }

    public function user()
    {
        return Auth::user();
    }

    /**
     * metodo para cerrar sesion de cualquier usuario
     * Nota.- necesita que le pasen por el Headers una llave: Authorization, con el valor: Bearer userToken
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function logout()
    {
        try {
            if (Auth::check()) {
//            Auth::user()->AauthAcessToken()->delete(); //borra la tupla del token(no permite tener un registro de las veces que inicio sesion)
                Auth::user()->token()->revoke();
                return response([
                    'success' => true,
                    'message' => 'logged out'
                ],200);
            }
        } catch (\Exception $exception)
        {
            return response([
                'success' => false,
                'message' => 'authentication is required'
            ],401);
        }
    }
}
