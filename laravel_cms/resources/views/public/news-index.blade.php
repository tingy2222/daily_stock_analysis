@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold text-blue-900 mb-6">News</h1>
<div class="space-y-4">
    @forelse($posts as $post)
        <a class="block bg-white border border-blue-100 rounded-lg p-5 hover:shadow" href="{{ route('news.show', $post->slug) }}">
            <h2 class="font-semibold text-lg">{{ $post->title }}</h2>
            <p class="text-xs text-slate-500 mt-1">{{ optional($post->published_at)->format('Y-m-d H:i') }}</p>
        </a>
    @empty
        <p class="text-slate-500">No published posts found.</p>
    @endforelse
</div>

<div class="mt-6">
    {{ $posts->links() }}
</div>
@endsection
