<?php

namespace App\Repositories;

abstract class AbstractRepository
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract function getModel();

    private function setModel(): void
    {
        $this->model = app()->make($this->getModel());
    }
}