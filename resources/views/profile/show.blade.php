<x-app-layout>

  
    <div class="container py-3" style="max-width: 800px;">
        <livewire:profile-header :user="$user" />
    </div>


    <div class="container py-3" style="max-width: 800px;">
        <livewire:tab-converter :user="$user" />
    </div>

</x-app-layout>
