<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\ActivityLog;

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
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();


        ActivityLog::create([
            'activity_type' => 'login',
            'description' => 'Login ke sistem',
            'user_id' => Auth::id(),
        ]);


        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->intended(route('products.index'));
        } elseif ($user->role === 'cashier') {
            return redirect()->intended(route('orders.index'));
        }

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {

        ActivityLog::create([
            'activity_type' => 'logout',
            'description' => 'Logout dari sistem',
            'user_id' => Auth::id(),
        ]);

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
