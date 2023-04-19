<x-layout>
    @include('partials._header')
    <section class="mx-auto max-w-screen-xl px-4 pb-12">
            @unless(count($listings) == 0)
                <h2 class="text-2xl font-bold text-green-800 pb-8">Latest Gigs</h2>
                <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 pb-8">
                    @foreach ($listings as $listing)
                        <x-card>
                            <x-listing-card :listing="$listing" />
                        </x-card>
                    @endforeach
                </div>
                {{ $listings->links() }}
            @else
                <p>No listings found.</p>
            @endunless
    </section>

</x-layout>