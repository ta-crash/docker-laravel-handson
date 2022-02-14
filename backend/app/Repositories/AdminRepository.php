<?php

namespace App\Repositories;

use App\Models\Admin;
use Illuminate\Support\Collection;

class AdminRepository extends AbstractRepository
{
    public function getModel()
    {
        return Admin::class;
    }

    public function getAdmins(): Collection
    {
        return $this->model->all();
    }

    public function getAdminByEmail(string $email): ?Admin
    {
        return $this->model
            ->where('email', $email)
            ->first();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(Admin $admin, array $data)
    {
        return $admin->fill($data)->save();
    }

    public function destroy(Admin $admin)
    {
        return $admin->delete();
    }
}
