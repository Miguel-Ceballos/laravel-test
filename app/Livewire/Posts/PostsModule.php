<?php

namespace App\Livewire\Posts;

use App\Livewire\Forms\StorePostForm;
use Livewire\Component;

class PostsModule extends Component
{

    public StorePostForm $formData;

    public $is_disabled = false;

    public $showModal = false;

    public function render()
    {
        return view('livewire.posts.posts-module');
    }
}
