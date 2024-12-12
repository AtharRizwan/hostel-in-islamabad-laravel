<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use Illuminate\Support\Facades\Log;

class AddReview extends Controller
{
    public function add(Request $request):RedirectResponse
    {
        Log::info('AddReview::add');
        $request->validate([
            'review' => 'required|string|min:100|max:300',
            'url' => 'required|url',
        ]);
        Log::info('AddReview::add validated');

        $review = new Review();
        $review->name = Auth::user()->name;

        Log::info('AddReview::add Auth::user()->name: ' . Auth::user()->name);

        $review->text = $request->input('review');
        $review->website = $request->input('url');
        $review->position = 'member';
        $review->username = Auth::user()->email;
        $review->user_id = Auth::user()->id;
        $review->save();

        return redirect()->back()->with('success', 'Review added successfully');
    }
    public function delete($id):RedirectResponse
    {
        // Find the review by ID
        $review = Review::find($id);

        // Check if the review exists and belongs to the current user
        if (!$review || $review->user_id !== Auth::user()->id) {
            return redirect()->back()->with('error', 'You are not authorized to delete this review.');
        }

        // Delete the review
        $review->delete();

        return redirect()->back()->with('success', 'Review deleted successfully!');
    }
}
