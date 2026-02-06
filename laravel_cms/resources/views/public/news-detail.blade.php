@extends('layouts.app')

@section('content')
<article class="bg-white rounded-xl p-8 border border-blue-100 shadow-sm">
    <h1 class="text-3xl font-bold text-blue-900">{{ $post->title }}</h1>
    <p class="text-xs text-slate-500 mt-2">{{ optional($post->published_at)->format('Y-m-d H:i') }}</p>

    @if($post->image_path)
        <img class="rounded-lg mt-6" src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}">
    @endif

    <div class="prose max-w-none mt-6">
        {!! $post->content !!}
    </div>
</article>
@endsection
