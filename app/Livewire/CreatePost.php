<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;

    public $image = null;

    public $title;

    public $content;

    public $open = false;

    protected $rules = [
        'title' => 'required|min:3|max:100',
        'content' => 'required|min:10',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ];

    protected $listeners = [
        'postFormToggled' => 'setOpen',
    ];

    public function setOpen($value)
    {
        $this->open = (bool) $value;
    }

    public function createPost()
    {
        $this->validate();

        $imagePath = null;

        if ($this->image) {
            $imagePath = $this->image->store('posts', 'public');
        }

        Post::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'content' => $this->content,
            'image' => $imagePath,
        ]);

        $this->reset(['title', 'content']);

        $this->open = false;

        $this->dispatch('postCreated');
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
