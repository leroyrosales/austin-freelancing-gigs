<h1>{{ $heading }} in Austin</h1>

@foreach ($listings as $listing)
    <a href="/listings/{{ $listing['id'] }}">{{ $listing['title'] }}</a>
@endforeach