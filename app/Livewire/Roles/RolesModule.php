<?php

namespace App\Livewire\Roles;

use App\Jobs\CreateMailRole;
use App\Livewire\Forms\Roles\StoreRoleForm;
use App\Mail\RoleCreated;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class RolesModule extends Component
{
    use WithPagination;
    public $showModal = false;
    public $search;

//    public $roles;

    public StoreRoleForm $roleForm;

    public function mount()
    {
//        $this->roles = $this->getRoles();
    }

    public function render()
    {
        return view('livewire.roles.roles-module', [
            'roles' => $this->getRoles()
        ]);
    }

    public function saveRole()
    {

        $this->roleForm->save();
        $this->roles = $this->getRoles();
        $this->reset('showModal');
        session()->flash('success', 'Role created successfully');
//        CreateMailRole::dispatch();
    }

    #[On('role-updated')]
    public function getRoles()
    {
        return Role::orderBy('id', 'desc')
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);
    }
}
