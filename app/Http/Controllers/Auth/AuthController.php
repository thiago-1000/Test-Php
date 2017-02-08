<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function postLogin(Request $request)
	{
		$rules = ['email' => 'required', 'password' => 'required'];
		$messages = ['email.required' => 'O campo E-mail é obrigatório.', 'password.required' => 'O campo Senha é obrigatório.'];

		if (env('CAPTCHA')) {
			$rules = $rules + ['g-recaptcha-response' => 'required'];
			$messages = $messages + ['g-recaptcha-response.required' => 'O campo Captcha é obrigatório.'];
		}

		$this->validate($request, $rules, $messages);
		$credentials = $request->only('email', 'password');

		if ($this->auth->attempt($credentials, $request->has('remember'))) {
			return redirect()->intended($this->redirectPath());
		}

		return redirect($this->loginPath())
			->withInput($request->only('email', 'remember'))
			->withErrors(['email' => $this->getFailedLoginMessage()]);
	}

	/**
	 * Mensagem de credenciais erradas
	 *
	 * @return string
	 */
	protected function getFailedLoginMessage()
	{
		return 'Login e/ou Senha incorretos.';
	}

}
