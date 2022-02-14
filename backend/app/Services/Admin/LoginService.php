<?php

namespace App\Services\Admin;

use App\Repositories\AdminRepository;

class LoginService
{
    private $adminRepo;

    public function __construct(AdminRepository $adminRepo)
    {
        $this->adminRepo = $adminRepo;
    }

    public function login(array $data): array
    {
        $admin = $this->adminRepo->getAdminByEmail($data['email']);
        $password = $admin->password;

        if ($password !== $data['password']) {
            return [
                'success' => false,
                'errorMessage' => 'メールアドレスまたはパスワードが誤っています。'
            ];
        }

        return [
            'success' => true,
            'admin' => $admin
        ];
    }
}
