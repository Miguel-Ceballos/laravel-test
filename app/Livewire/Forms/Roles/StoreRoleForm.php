<?php

namespace App\Livewire\Forms\Roles;

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
        Role::create(['name' => $attributes['name'], 'guard_name' => $attributes['area']]);
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'area' => ['required']
        ];
    }
}
