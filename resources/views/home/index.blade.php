<x-app-layout>

    <div class="container py-4" style="max-width: 600px;">

        <!-- Create Post -->
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="#">
                    @csrf

                    <textarea name="content" class="form-control mb-2" placeholder="What's on your mind?"></textarea>

                    <button class="btn btn-primary btn-sm">
                        Post
                    </button>
                </form>
            </div>
        </div>

        <!-- Livewire Infinite Scroll Feed -->
        <livewire:feed-component />

    </div>

</x-app-layout>
