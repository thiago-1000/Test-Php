<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Usuario extends Model implements AuthenticatableContract, CanResetPasswordContract
{

	use Authenticatable, CanResetPassword;

	/**
	 * Regras de validação.
	 *
	 * @var array
	 */
	public static $rules = [
		'nome'	           => 'required|min:5',
		'email'	           => 'required|email|unique:usuarios',
		'password'         => 'required|min:6|confirmed'
	];

	/**
	 * Define a tabela usada pelo model.
	 *
	 * @var string
	 */
	protected $table = 'usuarios';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	 * Registra os dados na tabela usuarios.
	 *
	 * @param  array  $data
	 * @return boolean
	 */
	public function salvarUsuario(array $data, $id = null)
	{
		try {
			$usuario = (is_null($id)) ? new Usuario : $this->find($id);
			$usuario->nome = $data['nome'];
			$usuario->email = $data['email'];
			if (!empty($data['password'])){
			    $usuario->password = bcrypt($data['password']);
			}
			$usuario->save();
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

}
