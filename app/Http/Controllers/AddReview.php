<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use Illuminate\Support\Facades\Log;

class AddReview extends Controller
{
    public function add(Request $request)
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
        $review->save();

        return redirect()->back()->with('success', 'Review added successfully');
    }
}
