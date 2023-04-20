<x-layout>
    <div class="mx-auto max-w-screen-xl px-4 py-2">

        <a href="/" class="inline-block text-black ml-4 my-6"><i class="fa-solid fa-arrow-left"></i> Back
        </a>
        <article class="mx-4 py-12">
        <section>
            <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
                <div class="max-w-3xl">
                <h2 class="text-3xl font-bold sm:text-4xl pb-4">
                    {{ $listing->title }}
                </h2>
                <h3 class="text-xl font-bold sm:text-2xl">{{ $listing->company }}</h3>
                </div>

                <div class="mt-8 grid grid-cols-1 gap-8 lg:grid-cols-2 lg:gap-16">
                <div class="relative h-64 overflow-hidden sm:h-80 lg:h-full">
                    <img
                    class="absolute inset-0 h-1/2 w-1/2 object-cover"
                        src="{{ ($listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') ) }}"
                        alt=""
                        role="presentation"
                    />
                </div>

                <div class="lg:py-16">
                    <article class="space-y-4 text-gray-600">
                    <x-tags :tagsCsv="$listing->tags"/>
                    <div class="text-lg my-4 pb-4">
                        <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
                    </div>

                    {{ $listing->description }}

                    <div class="flex flex-row gap-4">
                        <a
                            href="mailto:{{ $listing->email }}"
                            class="block bg-green-600 text-white px-4 py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-envelope"></i>
                            Contact Employer
                        </a>
                        <a
                            href="{{ $listing->website }}"
                            target="_blank"
                            class="block bg-black text-white px-4 py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-globe"></i> Visit
                            Website
                        </a>
                    </div>
                    <x-card>
                        <a href="/listings/{{ $listing->id }}/edit">Edit listing</a>

                        <form method="POST" action="/listings/{{ $listing->id }}">
                            @csrf
                            @method('DELETE')
                            <button>Delete</button>
                        </form>
                    </x-card>
                    </article>
                </div>
                </div>
            </div>
        </section>

        </article>
        <section class="bg-white ">
            <div class="mx-auto max-w-screen-xl px-4 py-16 text-center lg:pt-24">
                <h3 class="text-xl font-bold text-green-900  sm:text-4xl">Not what you're looking for?</h3>
                <h4 class="mt-4 text-green-700 ">Search for other Central Texas jobs & projects.</h4>
                <div class="max-w-lg mx-auto pt-4">
                    @include('partials._search')
                </div>
            </div>
        </section>
    </div>
</x-layout>
