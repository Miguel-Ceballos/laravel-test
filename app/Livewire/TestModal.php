<?php

namespace App\Livewire;

use App\Livewire\Forms\StorePostForm;
use Livewire\Component;

class TestModal extends Component
{
    public $showModal = false;

    public StorePostForm $formData;

    public function render()
    {
        return view('livewire.test-modal');
    }

    public function storePost()
    {
        $this->formData->validate();
        $this->formData->storePost();
    }
}
