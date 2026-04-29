<x-app-layout>

    <div class="container py-4" style="max-width: 800px;">

        <!-- Header -->
        <div class="mb-4">
            <h5>Search Results</h5>

            @if ($query)
                <small class="text-muted">
                    Results for: "{{ $query }}"
                </small>
            @endif
        </div>

        <!-- Posts -->

        <livewire:feed-component :query="$query" />
    </div>

</x-app-layout>
