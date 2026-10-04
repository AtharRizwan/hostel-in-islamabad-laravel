<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use App\Models\Review;

class AddReview extends Controller
{
    public function add(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|alpha_dash|max:30',
            'url' => 'required|url:http,https|max:255',
            'review' => 'required|string|min:100|max:300',
        ]);

        // Send the user back to the form (it sits at the bottom of the page) to see the errors
        if ($validator->fails()) {
            return redirect(route('services').'#add-review')->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        Review::create([
            'user_id' => $request->user()->id,
            'name' => $request->user()->name,
            'username' => $validated['username'],
            'website' => $validated['url'],
            'text' => $validated['review'],
            'position' => 'member',
        ]);

        return redirect(route('services').'#reviews')->with('success', 'Review added successfully.');
    }

    public function delete(Request $request, Review $review): RedirectResponse
    {
        // Only the review's author or an admin may delete it
        if (! $review->canBeDeletedBy($request->user())) {
            return redirect(route('services').'#reviews')->with('error', 'You are not authorized to delete this review.');
        }

        $review->delete();

        return redirect(route('services').'#reviews')->with('success', 'Review deleted successfully!');
    }
}
