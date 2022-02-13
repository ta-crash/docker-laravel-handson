<?php

namespace App\Services;

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
            $plan = $this->planRepo->find($data['plan_id']);

            $data = array_merge($data, [
                'birthday' => $birthday,
                'offer_left' => $plan->offer_count
            ]);

            $this->userRepo->create($data);
        });
    }

    public function update(User $user, array $data)
    {
        \DB::transaction(function () use ($user, $data) {
            $birthday = Carbon::parse($data['birth_year'] . '-' . $data['birth_month'] . '-' . $data['birth_date'])->format('Y-m-d');

            if ($user->plan_id === $data['plan_id']) {
                $offerCount = $user->offer_left;
            } else {
                $plan = $this->planRepo->find($data['plan_id']);
                $offerCount = $plan->offer_count;
            }

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
