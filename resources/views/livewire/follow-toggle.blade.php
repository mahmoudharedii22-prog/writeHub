 <div>
     <button wire:click="toggleFollow"
         class="{{ auth()->user()->followings->contains($user_id) ? 'btn btn-danger btn-sm' : 'btn btn-primary btn-sm' }}">

         {{ auth()->user()->followings->contains($user_id) ? 'Unfollow' : 'Follow' }}

     </button>
 </div>
