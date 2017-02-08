<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class UsuarioController extends Controller
{
        public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Carrega todos os registros e exibe na lista.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		try
		{
			if (\Auth::user()->perfil_id == 1) {
				$data = Usuario::where('excluido', 0)
						->where('id', '<>', \Auth::user()->id)
						->orderBy('nome')
						->paginate(10);

				return \View::make('usuarios.index')->with('usuarios', $data);
			} else {
				return \Redirect::to('/');
			}
		}
                catch (Exception $e)
                {
	            return \View::make('errors.503');
		}
	}

	/**
	 * Exibe o formulário de criação.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
	}

	/**
	 * Criação do registro do model.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
            try{
                $data = $request->all();
                $validator = \Validator::make($data, Usuario::$rules);
                if ($validator->fails()){
                     
                        $validator->getMessageBag()->add('cadastro', 'erro_cadastro');
                        return \Redirect::to('auth/login')
                                ->withErrors($validator)
                                ->withInput();
                }else{
                    $usuario = new Usuario;
                    if ($usuario->salvarUsuario($data)){
                        if ($this->auth->attempt($request->only('email', 'password'))) {
                          return \Redirect::to('home');
                        }
                    }else{
                        return \Redirect::back()->withErrorMessage('Something went wrong');
                    }
                }
            }
            catch (Exception $e)
            {
                return \View::make('errors.503');
            }
	}

	/**
	 * Exibe os dados detalhados.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
	}

	/**
	 * Exibe o formulário de edição.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
	}

	/**
	 * Atualização dos dados do model.
	 *
	 * @param  int  $id
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function update($id, Request $request)
	{
	}

	/**
	 * Deleta logicamente o registro no banco.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
	}
  
}
