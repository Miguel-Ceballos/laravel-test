<?php

namespace App\Livewire\Forms;

use App\Events\PostCreated;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Form;

class StorePostForm extends Form
{

    #[Rule('required')]
    public $title;

    #[Rule('required')]
    public $content;

    public function storePost()
    {
        $attributes = $this->validate();
        $attributes['user_id'] = Auth::user()->id;
        $attributes['image'] = 'test';
        $post = Post::create($attributes);
        PostCreated::dispatch($post);
    }
}
