@extends('layouts.app')

@section('content')
<section class="bg-white rounded-xl p-8 shadow-sm border border-blue-100 mb-8">
    <h1 class="text-3xl font-bold text-blue-900">Medical Concierge & Cross-Border Stewardship</h1>
    <p class="mt-4 text-slate-600 leading-relaxed">
        Led by Dr. Zhang (Tokyo Medical and Dental University), Tenu International provides discreet,
        premium healthcare concierge, real estate stewardship, and medical trading support for high-net-worth clients.
    </p>
</section>

<section class="mb-10">
    <h2 class="text-2xl font-semibold text-blue-900 mb-4">Our Services</h2>
    <div class="grid md:grid-cols-3 gap-4">
        @forelse($services as $service)
            <a href="{{ route('service.show', $service->slug) }}" class="bg-white p-5 rounded-xl border border-blue-100 hover:shadow transition">
                <p class="text-sm text-blue-700">{{ $service->icon }}</p>
                <h3 class="font-semibold text-lg mt-2">{{ $service->title }}</h3>
                <p class="text-slate-600 mt-2 text-sm">{{ $service->summary }}</p>
            </a>
        @empty
            <p class="text-slate-500">No services are available yet.</p>
        @endforelse
    </div>
</section>

<section>
    <h2 class="text-2xl font-semibold text-blue-900 mb-4">Latest News</h2>
    <div class="space-y-3">
        @forelse($latestPosts as $post)
            <a class="block bg-white border border-blue-100 rounded-lg p-4 hover:shadow" href="{{ route('news.show', $post->slug) }}">
                <h3 class="font-semibold">{{ $post->title }}</h3>
                <p class="text-xs text-slate-500 mt-1">{{ optional($post->published_at)->format('Y-m-d') }}</p>
            </a>
        @empty
            <p class="text-slate-500">No news published yet.</p>
        @endforelse
    </div>
</section>
@endsection
