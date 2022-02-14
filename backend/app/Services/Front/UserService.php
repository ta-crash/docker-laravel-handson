<?php

namespace App\Services\Front;

use App\Enums\BloodType;
use App\Enums\Gender;
use App\Enums\Prefecture;
use App\Models\User;
use App\Repositories\PlanRepository;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class UserService
{
    private $userRepo;

    private $planRepo;

    public function __construct(
        UserRepository $userRepo,
        PlanRepository $planRepo
    ) {
        $this->userRepo = $userRepo;
        $this->planRepo = $planRepo;
    }

    public function getUsers(): Collection
    {
        return $this->userRepo->getUsers();
    }

    public function getConfigs(): array
    {
        return [
            'genders' => Gender::toSelectArray(),
            'bloodTypes' => BloodType::toSelectArray(),
            'prefectures' => Prefecture::toSelectArray(),
            'plans' => $this->planRepo->getPlans()
        ];
    }

    public function store(array $data)
    {
        \DB::transaction(function () use ($data) {
            $birthday = Carbon::parse($data['birth_year'] . '-' . $data['birth_month'] . '-' . $data['birth_date'])->format('Y-m-d');
            $offerCount = $this->planRepo->find($data['plan_id'])->offer_count;

            $data = array_merge($data, [
                'birthday' => $birthday,
                'offer_left' => $offerCount
            ]);

            $this->userRepo->create($data);
        });
    }

    public function update(User $user, array $data)
    {
        \DB::transaction(function () use ($user, $data) {
            $data['password'] = $data['password'] ?? $user->password;
            $birthday = Carbon::parse($data['birth_year'] . '-' . $data['birth_month'] . '-' . $data['birth_date'])->format('Y-m-d');
            $offerCount = $user->plan_id === $data['plan_id'] ? $user->offer_left : $this->planRepo->find($data['plan_id'])->offer_count;

            $data = array_merge($data, [
                'birthday' => $birthday,
                'offer_left' => $offerCount
            ]);

            $this->userRepo->update($user, $data);
        });
    }

    public function destroy(User $user)
    {
        \DB::transaction(function () use ($user) {
            $this->userRepo->destroy($user);
        });
    }
}
