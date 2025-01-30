<?php

namespace App\Livewire\Forms\Roles;

use App\Events\Roles\RoleCreated;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Spatie\Permission\Models\Role;

class StoreRoleForm extends Form
{
    public $name;
    public $area;

    public function save()
    {
        $attributes = $this->validate();
//        dd($attributes);
        $role =Role::create(['name' => $attributes['name'], 'guard_name' => $attributes['area']]);
        RoleCreated::dispatch($role);
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'area' => ['required']
        ];
    }
}
