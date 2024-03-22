<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\ForgotStoreRequest;
use App\Http\Requests\RecoverStoreRequest;
use App\Services\AuthService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display the form.
     */
    public function index(): Factory|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()
                ->route('dashboards.index');
        }

        return view('auth.login');
    }

    /**
     * Check login authentication.
     */
    public function login(AuthRequest $request): Factory|RedirectResponse
    {
        $auth_service = new AuthService();

        $data = $auth_service->login($request);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->with('error', $data);
        }

        return redirect()
            ->route('dashboards.index');
    }

    /**
     * Display the forgot password.
     */
    public function forgot(): Factory
    {
        return view('auth.forgot');
    }

    /**
     * Refresh token.
     */
    public function refresh(): Factory|RedirectResponse
    {
        $auth_service = new AuthService();

        $data = $auth_service->refresh();

        if (is_string($data)) {
            return redirect()
                ->back()
                ->with('error', $data);
        }

        return redirect()
            ->route('dashboards.index');
    }

    /**
     * Recovered the specified remember token.
     */
    public function recover(string $remember_token): Factory|RedirectResponse
    {
        $auth_service = new AuthService();

        $data = $auth_service->recover($remember_token);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->with('error', $data);
        }

        return view('auth.recover', $data);
    }

    /**
     * Store a forgot password token.
     */
    public function forgotStore(ForgotStoreRequest $request): Factory|RedirectResponse
    {
        $auth_service = new AuthService();

        $data = $auth_service->forgotStore($request);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->with('error', $data);
        }

        return redirect()
            ->back()
            ->with('success', 'Please check your email and reset your password');
    }

    /**
     * Store a recover forgot.
     */
    public function recoverStore(RecoverStoreRequest $request): Factory|RedirectResponse
    {
        $auth_service = new AuthService();

        $data = $auth_service->recoverStore($request);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->with('error', $data);
        }

        return redirect()
            ->route('index')
            ->with('success', 'Password successfully recover');
    }

    /**
     * Logout session.
     */
    public function logout(Request $request): Factory|RedirectResponse
    {
        $auth_service = new AuthService();

        $data = $auth_service->logout($request);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->with('error', $data);
        }

        return redirect()
            ->route('index')
            ->with('success', 'Logout successfully');
    }
}
