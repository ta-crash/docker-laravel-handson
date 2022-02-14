<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Services\Admin\LoginService;
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
        if ($session->has('admin')) {
            $session->forget('admin');
            $session->regenerateToken();
        }

        return view('admin.login.index');
    }

    public function login(LoginRequest $request)
    {
        $result = $this->loginService->login($request->all());
        if ($result['success']) {
            $request->session()->put([
                'admin' => $result['admin']
            ]);

            return redirect()
                ->route('admin.admin.index');
        }

        return redirect()
            ->route('admin.login.index')
            ->withInput()
            ->with('errorMessage', $result['errorMessage']);
    }

    public function logout(Request $request)
    {
        $session = $request->session();
        if ($session->has('admin')) {
            $session->forget('admin');
            $session->regenerateToken();
        }

        return redirect()->route('admin.login.index');
    }
}
