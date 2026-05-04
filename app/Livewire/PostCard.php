<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

class PostCard extends Component
{
    public $showComments = false;

    public Post $post;

    public bool $isEditing = false;

    public string $title = '';

    public string $content = '';

    protected $rules = [
        'title' => 'required|min:3|max:100',
        'content' => 'required|min:3|max:1000',
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    #[On('likeUpdated')]
    public function refreshPost()
    {
        $this->post->refresh();
    }

    public function editPost()
    {
        $this->isEditing = true;

        $this->title = $this->post->title;
        $this->content = $this->post->content;
    }

    public function updatePost()
    {
        $this->validate();

        $this->post->update([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->isEditing = false;

        $this->dispatch('postUpdated');
    }

    public function deletePost()
    {
        $this->post->delete();
        $this->dispatch('postUpdated');
    }

    public function render()
    {
        return view('livewire.post-card');
    }
}
