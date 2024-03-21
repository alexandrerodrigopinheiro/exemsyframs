<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Services\SettingService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory
    {
        $setting_service = new SettingService();

        $data = $setting_service->paginate();

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('Settings.index', $data);
    }

    /**
     * Display a listing of the resource in trash.
     */
    public function trash(): Factory
    {
        $setting_service = new SettingService();

        $data = $setting_service->paginate(true);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('Settings.trash', $data);
    }

    /**
     * Recovered the specified resource in trash.
     */
    public function recover(string $id): RedirectResponse
    {
        $setting_service = new SettingService();

        $data = $setting_service->recover($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('Settings.trash')
            ->withInput()
            ->with('success', 'Business operation recovered successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory
    {
        $setting_service = new SettingService();

        $data = $setting_service->create();

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('Settings.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSettingRequest $request): RedirectResponse
    {
        $setting_service = new SettingService();

        $data = $setting_service->store($request);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('Settings.index')
            ->withInput()
            ->with('success', 'Business operation created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(mixed $id): Factory
    {
        $setting_service = new SettingService();

        $data = $setting_service->show($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('Settings.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mixed $id): Factory
    {
        $setting_service = new SettingService();

        $data = $setting_service->edit($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('Settings.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSettingRequest $request, mixed $id): Factory
    {
        $setting_service = new SettingService();

        $data = $setting_service->update($request, $id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('Settings.edit', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mixed $id): RedirectResponse
    {
        $setting_service = new SettingService();

        $data = $setting_service->destroy($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('Settings.index')
            ->withInput()
            ->with('success', 'Business operation updated successfully');
    }
}
