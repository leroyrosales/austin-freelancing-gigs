@props(['listing'])


<article title="" class="group relative block h-full bg-white before:absolute before:inset-0 before:rounded-lg before:border-2 before:border-dashed before:border-gray-900">
    <div class="rounded-lg border-2 border-gray-900 bg-white transition group-hover:-translate-x-2 group-hover:-translate-y-2 h-full">
        <div class="p-6">
            <img class="hidden w-12 h-12 mr-6 md:block rounded-full" src="{{ ($listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') ) }}" alt="" role="presentation"/>
            <h2 class="my-4 text-lg font-medium text-gray-900"><a href="/listings/{{ $listing->id }}">{{ $listing->title }}</a></h2>
            <h3 class="text-base font-bold mb-4">{{ $listing->company }}</h3>
            <p class="my-2 text-gray-700 text-sm">8 Components</p>
            <span class="text-xs"><i class="fa-solid fa-location-dot"></i> {{ $listing->location }}</span>
            <x-tags :tagsCsv="$listing->tags" />
        </div>
    </div>
</article>

