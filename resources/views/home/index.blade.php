<x-app-layout>

    <div class="container py-4" style="max-width: 1000px;">

        <livewire:search />
        <livewire:create-post-toggle />
        <livewire:create-post />
        <livewire:feed-component :type="'home'" />

    </div>

</x-app-layout>
