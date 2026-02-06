<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Post;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard metrics.
     */
    public function index(): View
    {
        $newInquiryCount = Inquiry::query()->where('status', Inquiry::STATUS_NEW)->count();
        $totalPostCount = Post::query()->count();

        return view('admin.dashboard', compact('newInquiryCount', 'totalPostCount'));
    }
}
