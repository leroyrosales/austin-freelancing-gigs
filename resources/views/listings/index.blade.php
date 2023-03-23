<x-layout>

@include('partials._hero')
@include('partials._search')

<section class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

@unless(count($listings) == 0)
    @foreach ($listings as $listing)
        <x-card>
            <x-listing-card :listing="$listing" />
        </x-card>
    @endforeach
@else
    <p>No listings found.</p>
@endunless

</section>

<div class="pt-12">{{ $listings->links() }}</div>

</x-layout>