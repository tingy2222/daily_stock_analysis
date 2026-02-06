<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    /**
     * List inquiries for administrators.
     */
    public function index(): View
    {
        $inquiries = Inquiry::query()->latest()->paginate(20);

        return view('admin.inquiries.index', compact('inquiries'));
    }

    /**
     * Display inquiry details.
     */
    public function show(Inquiry $inquiry): View
    {
        return view('admin.inquiries.show', compact('inquiry'));
    }

    /**
     * Update inquiry note.
     */
    public function update(Request $request, Inquiry $inquiry): RedirectResponse
    {
        $validated = $request->validate([
            'admin_note' => ['nullable', 'string', 'max:5000'],
        ]);

        $inquiry->update($validated);

        return redirect()->route('admin.inquiries.show', $inquiry)
            ->with('success', 'Inquiry notes updated successfully.');
    }

    /**
     * Update inquiry communication status.
     */
    public function updateStatus(Request $request, Inquiry $inquiry): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:new,read,replied'],
        ]);

        $inquiry->update(['status' => $validated['status']]);

        return redirect()->route('admin.inquiries.index')
            ->with('success', 'Inquiry status updated successfully.');
    }
}
