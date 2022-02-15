<?php

namespace App\Repositories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class UserRepository extends AbstractRepository
{
    public function getModel()
    {
        return User::class;
    }

    public function getUsersByConditions(array $conditions): Collection
    {
        $today = new Carbon();
        $query = $this->model->query();

        if (isset($conditions['age_from'])) {
            $ageFrom = $today->copy()->subYear($conditions['age_from'])->format('Y-m-d');
            $query->where('birthday', '<=', $ageFrom);
        }

        if (isset($conditions['age_to'])) {
            $ageTo = $today->copy()->subYear($conditions['age_to'] + 1)->format('Y-m-d');
            $query->where('birthday', '>', $ageTo);
        }

        if (isset($conditions['prefectures'])) {
            $query->where(function ($query) use ($conditions) {
                foreach ($conditions['prefectures'] as $prefecture) {
                    $query->orWhere('prefecture', $prefecture);
                }
            });
        }

        return $query->get();
    }

    public function getUserByEmail(string $email): ?User
    {
        return $this->model
            ->where('email', $email)
            ->first();
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
