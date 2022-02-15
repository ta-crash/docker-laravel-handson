<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\UserCreateRequest;
use App\Http\Requests\Front\UserSearchRequest;
use App\Http\Requests\Front\UserUpdateRequest;
use App\Models\User;
use App\Services\Front\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(UserSearchRequest $request)
    {
        $allRequest = $request->all();
        $users = $this->userService->getUsersByConditions($allRequest);

        return view('front.user.index', [
            'configs' => $this->userService->getConfigs(),
            'conditions' => $allRequest,
            'usersCount' => $users->count(),
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('front.user.create', [
            'configs' => $this->userService->getConfigs()
        ]);
    }

    public function store(UserCreateRequest $request)
    {
        $this->userService->store($request->all());

        session()->regenerateToken();

        return redirect()
            ->route('front.user.index');
    }

    public function edit(User $user)
    {
        return view('front.user.edit', [
            'user' => $user,
            'configs' => $this->userService->getConfigs()
        ]);
    }

    public function update(User $user, UserUpdateRequest $request)
    {
        $this->userService->update($user, $request->all());

        session()->regenerateToken();

        return redirect()
            ->route('front.user.index');
    }

    public function destroy(User $user)
    {
        $this->userService->destroy($user);

        session()->regenerateToken();

        return redirect()
            ->route('front.user.index');
    }
}
