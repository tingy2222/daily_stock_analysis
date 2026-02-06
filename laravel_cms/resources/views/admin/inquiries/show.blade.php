@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold text-blue-900 mb-6">Inquiry Detail</h1>
<div class="bg-white rounded-xl border border-blue-100 p-6 space-y-3">
    <p><strong>Name:</strong> {{ $inquiry->name }}</p>
    <p><strong>Contact:</strong> {{ $inquiry->contact_info }}</p>
    <p><strong>Status:</strong> <span class="capitalize">{{ $inquiry->status }}</span></p>
    <p><strong>Message:</strong></p>
    <p class="whitespace-pre-wrap text-slate-700">{{ $inquiry->message }}</p>
</div>

<form action="{{ route('admin.inquiries.update', $inquiry) }}" method="POST" class="mt-6 bg-white rounded-xl border border-blue-100 p-6">
    @csrf
    @method('PUT')
    <label for="admin_note" class="block text-sm font-medium text-slate-700">Admin Note</label>
    <textarea name="admin_note" id="admin_note" rows="5" class="mt-1 w-full rounded border-slate-300">{{ old('admin_note', $inquiry->admin_note) }}</textarea>
    <button type="submit" class="mt-3 bg-blue-800 text-white px-4 py-2 rounded">Save Note</button>
</form>
@endsection
