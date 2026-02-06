@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold text-blue-900 mb-6">Admin Dashboard</h1>
<div class="grid md:grid-cols-2 gap-4">
    <div class="bg-white p-6 rounded-xl border border-blue-100">
        <p class="text-sm text-slate-500">New Inquiries</p>
        <p class="text-3xl font-bold text-blue-900 mt-2">{{ $newInquiryCount }}</p>
    </div>
    <div class="bg-white p-6 rounded-xl border border-blue-100">
        <p class="text-sm text-slate-500">Total Posts</p>
        <p class="text-3xl font-bold text-blue-900 mt-2">{{ $totalPostCount }}</p>
    </div>
</div>
@endsection
