<x-layout>

@include('partials._hero')
@include('partials._search')

<section class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
@foreach ($listings as $listing)
    <x-card>
        <x-listing-card :listing="$listing" />
    </x-card>
@endforeach
</section>

</x-layout>