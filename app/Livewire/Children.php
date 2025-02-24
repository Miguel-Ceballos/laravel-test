<?php

namespace App\Livewire;

use App\Livewire\Forms\UpdateRoleForm;
use Livewire\Attributes\Modelable;
use Livewire\Component;

class Children extends Component
{
    public $role;
    public $showModalUpdate = false;
    public UpdateRoleForm $updateRole;

    public function render()
    {
        return view('livewire.children');
    }

    public function getRole()
    {
        $this->updateRole->name = $this->role->name;
        $this->updateRole->area = $this->role->guard_name;
        $this->updateRole->role = $this->role;
        $this->showModalUpdate = true;
    }

    public function updateRoleCaca()
    {
        $this->updateRole->save();
        $this->dispatch('saved');
        $this->reset('showModalUpdate', 'role');
        $this->updateRole->reset();
        session()->flash('success', 'Role updated successfully');
    }
}
