<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Attraction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['attraction', 'user'])->latest()->get();
        return view('admin.pages.reviews.index', compact('reviews'));
    }

   public function store(Request $request)
{
    $request->validate([
        'attraction_id' => 'nullable|exists:attractions,id',
        'zone_id' => 'nullable|exists:zones,id',
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'nullable|string',
        'visitor_name' => 'nullable|string|max:255',
        'visitor_email' => 'nullable|email|max:255',
        'user_id' => 'nullable|exists:users,id'
    ]);

   Review::create([
    'attraction_id' => $request->attraction_id,
    'zone_id' => $request->zone_id,
    'user_id' => $request->user_id,
    'visitor_name' => $request->visitor_name,
    'visitor_email' => $request->visitor_email,
    'rating' => $request->rating,
    'comment' => $request->comment,
    'is_approved' => 0,
]);

    return redirect()->back()->with('success', 'Review submitted successfully. It will be visible after approval.');
}

    public function approve(Review $review)
    {
        $review->update(['is_approved' => true]);
        return redirect()->route('admin.reviews.index')->with('success', 'Review approved successfully');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully');
    }
}
