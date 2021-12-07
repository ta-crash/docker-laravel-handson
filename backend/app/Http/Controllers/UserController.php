<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('user.index', [
            'users' => $this->userService->getUsers()
        ]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $this->userService->store($request->all());

        session()->regenerateToken();

        return redirect()
            ->route('user.index');
    }

    public function edit(User $user)
    {
        return view('user.edit', [
            'user' => $user
        ]);
    }

    public function update(User $user, Request $request)
    {
        $this->userService->update($user, $request->all());

        session()->regenerateToken();

        return redirect()
            ->route('user.index');
    }

    public function destroy(User $user)
    {
        $this->userService->destroy($user);

        session()->regenerateToken();

        return redirect()
            ->route('user.index');
    }
}
