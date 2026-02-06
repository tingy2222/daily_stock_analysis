@extends('layouts.app')

@section('content')
<article class="bg-white rounded-xl p-8 border border-blue-100 shadow-sm">
    <h1 class="text-3xl font-bold text-blue-900">{{ $service->title }}</h1>
    <p class="text-slate-600 mt-3">{{ $service->summary }}</p>

    <div class="prose max-w-none mt-6">
        {!! $service->content !!}
    </div>

    @php
        $pricingRows = is_array($service->price_table) ? $service->price_table : [];
    @endphp

    @if (!empty($pricingRows))
        <h2 class="text-2xl font-semibold text-blue-900 mt-8 mb-3">Pricing Plans</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full border border-blue-100 text-sm">
                <thead class="bg-blue-50">
                    <tr>
                        <th class="text-left px-4 py-2 border-b">Plan</th>
                        <th class="text-left px-4 py-2 border-b">Price</th>
                        <th class="text-left px-4 py-2 border-b">Details</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($pricingRows as $row)
                    <tr>
                        <td class="px-4 py-2 border-b">{{ $row['plan'] ?? '-' }}</td>
                        <td class="px-4 py-2 border-b">{{ $row['price'] ?? '-' }}</td>
                        <td class="px-4 py-2 border-b">{{ $row['details'] ?? '-' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
</article>
@endsection
