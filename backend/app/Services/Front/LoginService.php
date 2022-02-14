<?php

namespace App\Services\Front;

use App\Repositories\UserRepository;

class LoginService
{
    private $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function login(array $data): array
    {
        $user = $this->userRepo->getUserByEmail($data['email']);
        $password = $user->password;

        if ($password !== $data['password']) {
            return [
                'success' => false,
                'errorMessage' => 'メールアドレスまたはパスワードが誤っています。'
            ];
        }

        return [
            'success' => true,
            'user' => $user
        ];
    }
}
