<x-layout>

<section class="lg:grid lg:grid-cols-2 gap-16 space-y-4 md:space-y-0 mx-4 lg:mx-16 lg:pt-16">
    <div class="flex flex-col">
        <h1 class="text-7xl font-bold text-green-800 lg:pt-48">Austin Freelance Gigs</h1>
        <p class="text-2xl font-bold my-4 text-green-700">
            Find or post Central Texas jobs & projects.
        </p>
        @include('partials._search')
    </div>
    <div>
        @unless(count($listings) == 0)
            <h2 class="text-5xl font-bold text-green-800 pb-8">Newest gigs</h2>
            @foreach ($listings as $listing)
                <x-card>
                    <x-listing-card :listing="$listing" />
                </x-card>
            @endforeach
            <div class="pt-12">{{ $listings->links() }}</div>
        @else
            <p>No listings found.</p>
        @endunless
    </div>
</section>

</x-layout>