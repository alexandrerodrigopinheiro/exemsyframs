<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOfficeStaffRequest;
use App\Http\Requests\UpdateOfficeStaffRequest;
use App\Services\OfficeStaffService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;

class OfficeStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory
    {
        $office_staff = new OfficeStaffService();

        $data = $office_staff->paginate();

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('office_staff.index', $data);
    }

    /**
     * Display a listing of the resource in trash.
     */
    public function trash(): Factory
    {
        $office_staff = new OfficeStaffService();

        $data = $office_staff->paginate(true);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('office_staff.trash', $data);
    }

    /**
     * Recovered the specified resource in trash.
     */
    public function recover(string $id): RedirectResponse
    {
        $office_staff = new OfficeStaffService();

        $data = $office_staff->recover($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('office_staff.trash')
            ->withInput()
            ->with('success', 'Business operation recovered successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory
    {
        $office_staff = new OfficeStaffService();

        $data = $office_staff->create();

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('office_staff.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOfficeStaffRequest $request): RedirectResponse
    {
        $office_staff = new OfficeStaffService();

        $data = $office_staff->store($request);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('office_staff.index')
            ->withInput()
            ->with('success', 'Business operation created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(mixed $id): Factory
    {
        $office_staff = new OfficeStaffService();

        $data = $office_staff->show($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('office_staff.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mixed $id): Factory
    {
        $office_staff = new OfficeStaffService();

        $data = $office_staff->edit($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('office_staff.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOfficeStaffRequest $request, mixed $id): Factory
    {
        $office_staff = new OfficeStaffService();

        $data = $office_staff->update($request, $id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('office_staff.edit', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mixed $id): RedirectResponse
    {
        $office_staff = new OfficeStaffService();

        $data = $office_staff->destroy($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('office_staff.index')
            ->withInput()
            ->with('success', 'Business operation updated successfully');
    }
}
