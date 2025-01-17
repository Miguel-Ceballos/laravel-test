<?php

namespace App\Livewire\Roles;

use App\Livewire\Forms\Roles\StoreRoleForm;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class RolesModule extends Component
{

    public $showModal = false;

    public $roles;

    public StoreRoleForm $roleForm;

    public function render()
    {
        return view('livewire.roles.roles-module');
    }

    public function mount()
    {
        $this->roles = Role::all()->toArray();
    }

    public function saveRole()
    {
        $this->roleForm->save();
        $this->reset('showModal');
        $this->getRoles();
    }

    public function getRoles()
    {
        $this->roles = Role::all()->toArray();
    }
}
