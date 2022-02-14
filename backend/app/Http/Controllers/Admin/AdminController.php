<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminCreateRequest;
use App\Http\Requests\Admin\AdminUpdateRequest;
use App\Models\Admin;
use App\Services\Admin\AdminService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index()
    {
        return view('admin.admin.index', [
            'admins' => $this->adminService->getAdmins()
        ]);
    }

    public function create()
    {
        return view('admin.admin.create');
    }

    public function store(AdminCreateRequest $request)
    {
        $this->adminService->store($request->all());

        session()->regenerateToken();

        return redirect()
            ->route('admin.admin.index');
    }

    public function edit(Admin $admin)
    {
        return view('admin.admin.edit', [
            'admin' => $admin
        ]);
    }

    public function update(Admin $admin, AdminUpdateRequest $request)
    {
        $this->adminService->update($admin, $request->all());

        session()->regenerateToken();

        return redirect()
            ->route('admin.admin.index');
    }

    public function destroy(Admin $admin)
    {
        $this->adminService->destroy($admin);

        session()->regenerateToken();

        return redirect()
            ->route('admin.admin.index');
    }
}
