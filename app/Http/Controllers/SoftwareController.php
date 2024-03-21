<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSoftwareRequest;
use App\Http\Requests\UpdateSoftwareRequest;
use App\Services\SoftwareService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;

class SoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory
    {
        $software_service = new SoftwareService();

        $data = $software_service->paginate();

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('softwares.index', $data);
    }

    /**
     * Display a listing of the resource in trash.
     */
    public function trash(): Factory
    {
        $software_service = new SoftwareService();

        $data = $software_service->paginate(true);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('softwares.trash', $data);
    }

    /**
     * Recovered the specified resource in trash.
     */
    public function recover(string $id): RedirectResponse
    {
        $software_service = new SoftwareService();

        $data = $software_service->recover($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('softwares.trash')
            ->withInput()
            ->with('success', 'Business operation recovered successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory
    {
        $software_service = new SoftwareService();

        $data = $software_service->create();

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('softwares.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSoftwareRequest $request): RedirectResponse
    {
        $software_service = new SoftwareService();

        $data = $software_service->store($request);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('softwares.index')
            ->withInput()
            ->with('success', 'Business operation created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(mixed $id): Factory
    {
        $software_service = new SoftwareService();

        $data = $software_service->show($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('softwares.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mixed $id): Factory
    {
        $software_service = new SoftwareService();

        $data = $software_service->edit($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('softwares.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSoftwareRequest $request, mixed $id): Factory
    {
        $software_service = new SoftwareService();

        $data = $software_service->update($request, $id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('softwares.edit', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mixed $id): RedirectResponse
    {
        $software_service = new SoftwareService();

        $data = $software_service->destroy($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('softwares.index')
            ->withInput()
            ->with('success', 'Business operation updated successfully');
    }
}
