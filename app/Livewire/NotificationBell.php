<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class NotificationBell extends Component
{
    public $notifications = [];

    public $unreadCount = 0;

    public function mount()
    {
        $this->load();
    }

    public function markAllAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();

        $this->load();
    }

    #[On('refreshNotifications')]
    public function load()
    {
        $user = Auth::user();

        $this->notifications = $user->notifications()
            ->latest()
            ->take(10)
            ->get();

        $this->unreadCount = $user->unreadNotifications()->count();
    }

    public function render()
    {
        return view('livewire.notification-bell');
    }
}
