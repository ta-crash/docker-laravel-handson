<?php

namespace App\Services\Admin;

use App\Models\Admin;
use App\Repositories\AdminRepository;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class AdminService
{
    private $adminRepo;

    public function __construct(AdminRepository $adminRepo)
    {
        $this->adminRepo = $adminRepo;
    }

    public function getAdmins(): Collection
    {
        return $this->adminRepo->getAdmins();
    }

    public function store(array $data)
    {
        \DB::transaction(function () use ($data) {
            $this->adminRepo->create($data);
        });
    }

    public function update(Admin $admin, array $data)
    {
        \DB::transaction(function () use ($admin, $data) {
            $data['password'] = $data['password'] ?? $admin->password;

            $this->adminRepo->update($admin, $data);
        });
    }

    public function destroy(Admin $admin)
    {
        \DB::transaction(function () use ($admin) {
            $this->adminRepo->destroy($admin);
        });
    }
}
