<?php

namespace App\Livewire\Roles;

use App\Jobs\CreateMailRole;
use App\Livewire\Forms\Roles\StoreRoleForm;
use App\Mail\RoleCreated;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class RolesModule extends Component
{

    public $showModal = false;
    public $search;

    public StoreRoleForm $roleForm;

    public function render()
    {
        $roles = $this->getRoles();
        return view('livewire.roles.roles-module', [
            'roles' => $roles,
        ]);
    }

    public function saveRole()
    {
        $this->roleForm->save();
        $this->reset('showModal');
        session()->flash('success', 'Role created successfully');
        CreateMailRole::dispatch();
    }

    public function getRoles()
    {
        return Role::orderBy('id', 'desc')
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->get();
    }
}
