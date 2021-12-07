<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Collection;

class UserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUsers(): Collection
    {
        return $this->userRepository->getUsers();
    }

    public function store(array $data)
    {
        \DB::transaction(function () use ($data) {
            $this->userRepository->create($data);
        });
    }

    public function update(User $user, array $data)
    {
        \DB::transaction(function () use ($user, $data) {
            $this->userRepository->update($user, $data);
        });
    }

    public function destroy(User $user)
    {
        \DB::transaction(function () use ($user) {
            $this->userRepository->destroy($user);
        });
    }
}
