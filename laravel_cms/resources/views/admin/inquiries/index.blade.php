@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-blue-900">Inquiry Management</h1>
</div>

<div class="bg-white rounded-xl border border-blue-100 overflow-hidden">
    <table class="min-w-full text-sm">
        <thead class="bg-blue-50 text-slate-700">
            <tr>
                <th class="px-4 py-3 text-left">Name</th>
                <th class="px-4 py-3 text-left">Contact</th>
                <th class="px-4 py-3 text-left">Status</th>
                <th class="px-4 py-3 text-left">Created</th>
                <th class="px-4 py-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($inquiries as $inquiry)
                <tr class="border-t">
                    <td class="px-4 py-3">{{ $inquiry->name }}</td>
                    <td class="px-4 py-3">{{ $inquiry->contact_info }}</td>
                    <td class="px-4 py-3 capitalize">{{ $inquiry->status }}</td>
                    <td class="px-4 py-3">{{ $inquiry->created_at->format('Y-m-d H:i') }}</td>
                    <td class="px-4 py-3 space-x-2">
                        <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="text-blue-700 hover:underline">View</a>

                        <form class="inline" method="POST" action="{{ route('admin.inquiries.status', $inquiry) }}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="read">
                            <button type="submit" class="text-amber-700 hover:underline">Mark Read</button>
                        </form>

                        <form class="inline" method="POST" action="{{ route('admin.inquiries.status', $inquiry) }}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="replied">
                            <button type="submit" class="text-green-700 hover:underline">Mark Replied</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-4 py-8 text-center text-slate-500">No inquiries found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $inquiries->links() }}
</div>
@endsection
