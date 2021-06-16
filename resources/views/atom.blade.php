<?xml version="1.0" encoding="utf-8"?>
<feed xmlns="http://www.w3.org/2005/Atom">
    <id>{{ $id }}</id>
    <title type="text">{{ config('statamic.rss.title') }}</title>
    <subtitle type="text">{{ config('statamic.rss.description') }}</subtitle>
    <link rel="alternate" type="text/html" hreflang="en" href="{{ config('app.url') }}"/>
    <link rel="self" type="application/atom+xml" xmlns="http://www.w3.org/2005/Atom" href="{{ config('app.url') }}{{ config('statamic.rss.routes.atom') }}"/>
    @if ($updated)<updated>{{ $updated->toRfc3339String() }}</updated>@endif

    @foreach ($entries as $entry)
<entry>
        <title type="html">{{ htmlentities($entry->title) }}</title>
        <link href="{{ $entry->uri }}"/>
        <id>{{ $entry->uri }}</id>
        <published>{{ $entry->published->toRfc3339String() }}</published>
        <updated>{{ $entry->updated->toRfc3339String() }}</updated>
        @if ($entry->summary)<summary type="html">{{ htmlentities($entry->summary) }}</summary>@endif

        <content src="{{ $entry->uri }}" type="text/html"></content>
        @if ($entry->author)<author>
            <name>{{ $entry->author->name() }}</name>@if (config('statamic.rss.author.email'))<email>{{ $entry->author->email() }}</email>@endif

        </author>@endif

    </entry>
    @endforeach

</feed>