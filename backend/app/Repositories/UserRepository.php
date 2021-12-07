<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Collection;

class UserRepository extends AbstractRepository
{
    public function getModel()
    {
        return User::class;
    }

    public function getUsers(): Collection
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(User $user, array $data)
    {
        return $user->fill($data)->save();
    }

    public function destroy(User $user)
    {
        return $user->delete();
    }
}
