<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePointRequest;
use App\Services\ProfileService;
use Illuminate\Contracts\View\Factory;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function index(): Factory
    {
        $profile_service = new ProfileService();

        $data = $profile_service->show();

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('profiles.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mixed $id): Factory
    {
        $profile_service = new ProfileService();

        $data = $profile_service->edit($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('profiles.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePointRequest $request, mixed $id): Factory
    {
        $profile_service = new ProfileService();

        $data = $profile_service->update($request, $id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('profiles.edit', $data);
    }
}
