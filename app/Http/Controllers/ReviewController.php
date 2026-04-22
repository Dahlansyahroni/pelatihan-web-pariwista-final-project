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
        'attraction_id' => 'required|exists:attractions,id',
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'nullable|string',
        'visitor_name' => 'nullable|string|max:255',
        'visitor_email' => 'nullable|email|max:255',
    ]);

   Review::create([
    'attraction_id' => $request->attraction_id,
    'user_id' => $request->user_id ? $request->user_id : 1,
    'visitor_name' => $request->visitor_name,
    'visitor_email' => $request->visitor_email,
    'rating' => $request->rating,
    'comment' => $request->comment,
    'is_approved' => 0,
]);

    return redirect()->back()->with('success', 'Review submitted successfully.');
}

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully');
    }
}
