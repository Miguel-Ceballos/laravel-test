<?php

namespace App\Livewire\Posts;

use Livewire\Component;

class PostsModule extends Component
{
    public $showModal = false;

    public function render()
    {
        return view('livewire.posts.posts-module');
    }
}
