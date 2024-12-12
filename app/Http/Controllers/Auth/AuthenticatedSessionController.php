<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        try {
            // Attempt to authenticate
            $request->authenticate();
            
            // Regenerate session to prevent session fixation
            $request->session()->regenerate();

            // Redirect to intended page after successful login
            return redirect()->intended(route('home', absolute: false));
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Catch authentication failure
            return back()
                ->withErrors(['email' => 'The provided credentials do not match our records.'])
                ->withInput($request->only('email', 'remember'));
        }
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

    // Check if the request expects JSON (AJAX logout)
    if ($request->expectsJson()) {
        return response()->json([
            'message' => 'Logout successful',
            'status' => true,
        ], 200);
    }

    // For non-AJAX requests, redirect with a success message
    return redirect('/login')
        ->with('success', 'Logout successful');
    }
}
