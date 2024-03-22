<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;

class ServiceTermsController extends Controller
{
    /**
     * Display the resources.
     */
    public function index(): Factory
    {
        $data = [];

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('service_terms.show', $data);
    }
}
