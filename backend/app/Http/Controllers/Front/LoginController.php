<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\LoginRequest;
use App\Services\Front\LoginService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function index(Request $request)
    {
        $session = $request->session();
        if ($session->has('user')) {
            $session->forget('user');
            $session->regenerateToken();
        }

        return view('front.login.index');
    }

    public function login(LoginRequest $request)
    {
        $result = $this->loginService->login($request->all());
        if ($result['success']) {
            $request->session()->put([
                'user' => $result['user']
            ]);

            return redirect()
                ->route('front.user.index');
        }

        return redirect()
            ->route('front.login.index')
            ->withInput()
            ->with('errorMessage', $result['errorMessage']);
    }

    public function logout(Request $request)
    {
        $session = $request->session();
        if ($session->has('user')) {
            $session->forget('user');
            $session->regenerateToken();
        }

        return redirect()->route('front.login.index');
    }
}
