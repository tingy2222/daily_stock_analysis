@extends('layouts.app')

@section('content')
<section class="max-w-3xl mx-auto bg-white p-8 rounded-xl border border-blue-100 shadow-sm">
    <h1 class="text-3xl font-bold text-blue-900">Contact Us</h1>
    <p class="text-slate-600 mt-2">Submit your request and our concierge team will contact you discreetly.</p>

    <form action="{{ route('contact.store') }}" method="POST" class="space-y-5 mt-6">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-slate-700">Name</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" required
                   class="mt-1 w-full rounded border-slate-300 focus:border-blue-500 focus:ring-blue-500">
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="contact_info" class="block text-sm font-medium text-slate-700">WeChat / Phone</label>
            <input id="contact_info" name="contact_info" type="text" value="{{ old('contact_info') }}" required
                   class="mt-1 w-full rounded border-slate-300 focus:border-blue-500 focus:ring-blue-500">
            @error('contact_info')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="message" class="block text-sm font-medium text-slate-700">Message</label>
            <textarea id="message" name="message" rows="6" required
                      class="mt-1 w-full rounded border-slate-300 focus:border-blue-500 focus:ring-blue-500">{{ old('message') }}</textarea>
            @error('message')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-800 text-white px-5 py-2 rounded hover:bg-blue-700">
            Send Message
        </button>
    </form>
</section>
@endsection
