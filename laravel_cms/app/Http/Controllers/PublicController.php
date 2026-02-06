<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Display the homepage.
     */
    public function home(): View
    {
        $services = Service::query()->latest()->get();
        $latestPosts = Post::query()
            ->where('is_published', true)
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('public.home', compact('services', 'latestPosts'));
    }

    /**
     * Display a single service by slug.
     */
    public function showService(string $slug): View
    {
        $service = Service::query()->where('slug', $slug)->firstOrFail();

        return view('public.service-detail', compact('service'));
    }

    /**
     * Display the paginated news list.
     */
    public function newsIndex(): View
    {
        $posts = Post::query()
            ->where('is_published', true)
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->paginate(10);

        return view('public.news-index', compact('posts'));
    }

    /**
     * Display one published news post.
     */
    public function newsShow(string $slug): View
    {
        $post = Post::query()
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('public.news-detail', compact('post'));
    }

    /**
     * Show the contact form.
     */
    public function contact(): View
    {
        return view('public.contact');
    }

    /**
     * Store customer inquiry in CRM table.
     */
    public function storeInquiry(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'contact_info' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        Inquiry::query()->create($validated + ['status' => Inquiry::STATUS_NEW]);

        return redirect()
            ->route('contact')
            ->with('success', 'Thank you. Your message has been received.');
    }
}
