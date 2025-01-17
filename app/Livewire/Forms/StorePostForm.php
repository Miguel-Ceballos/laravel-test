<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class StorePostForm extends Form
{

    #[Rule('required')]
    public $title;

    #[Rule('required')]
    public $content;

    #[Rule('required')]
    public $country;

    public function storePost()
    {
        dd('hola');
    }
}
