<?php

namespace App\Repositories;

use App\Models\Plan;
use Illuminate\Support\Collection;

class PlanRepository extends AbstractRepository
{
    public function getModel()
    {
        return Plan::class;
    }

    public function getPlans(): Collection
    {
        return $this->model->all();
    }

    public function find(int $id): Plan
    {
        return $this->model->find($id);
    }
}
