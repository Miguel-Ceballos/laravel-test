<?php

namespace App\Livewire\Posts;

use App\Livewire\Forms\StorePostForm;
use App\Models\Post;
use Livewire\Component;

class PostsModule extends Component
{

    public StorePostForm $formData;

    public $is_disabled = false;

    public $showModal = false;

    public function render()
    {
        $posts = $this->getPosts();
        return view('livewire.posts.posts-module', compact('posts'));
    }

    public function getPosts()
    {
        return Post::paginate(10);
    }

    public function savePost()
    {
        $this->formData->storePost();
        session()->flash('success', 'Post created successfully');
    }
}
