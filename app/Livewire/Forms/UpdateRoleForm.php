<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class UpdateRoleForm extends Form
{
    public $name;
    public $area;
    public $role;

    public function save()
    {
        $attributes = $this->validate();
        $this->role->update(['name' => $attributes['name'], 'guard_name' => $attributes['area']]);
//        $this->dispatch('role-updated');
    }

    public function rules()
    {
        return [
            'name' => [ 'required' ],
            'area' => [ 'required' ]
        ];
    }
}
