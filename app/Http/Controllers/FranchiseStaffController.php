<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFranchiseStaffRequest;
use App\Http\Requests\UpdateFranchiseStaffRequest;
use App\Services\FranchiseStaffService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;

class FranchiseStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory
    {
        $franchise_staff_service = new FranchiseStaffService();

        $data = $franchise_staff_service->paginate();

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('franchise_staffs.index', $data);
    }

    /**
     * Display a listing of the resource in trash.
     */
    public function trash(): Factory
    {
        $franchise_staff_service = new FranchiseStaffService();

        $data = $franchise_staff_service->paginate(true);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('franchise_staffs.trash', $data);
    }

    /**
     * Recovered the specified resource in trash.
     */
    public function recover(string $id): RedirectResponse
    {
        $franchise_staff_service = new FranchiseStaffService();

        $data = $franchise_staff_service->recover($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('franchise_staffs.trash')
            ->withInput()
            ->with('success', 'Business operation recovered successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory
    {
        $franchise_staff_service = new FranchiseStaffService();

        $data = $franchise_staff_service->create();

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('franchise_staffs.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFranchiseStaffRequest $request): RedirectResponse
    {
        $franchise_staff_service = new FranchiseStaffService();

        $data = $franchise_staff_service->store($request);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('franchise_staffs.index')
            ->withInput()
            ->with('success', 'Business operation created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(mixed $id): Factory
    {
        $franchise_staff_service = new FranchiseStaffService();

        $data = $franchise_staff_service->show($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('franchise_staffs.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mixed $id): Factory
    {
        $franchise_staff_service = new FranchiseStaffService();

        $data = $franchise_staff_service->edit($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('franchise_staffs.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFranchiseStaffRequest $request, mixed $id): Factory
    {
        $franchise_staff_service = new FranchiseStaffService();

        $data = $franchise_staff_service->update($request, $id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('franchise_staffs.edit', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mixed $id): RedirectResponse
    {
        $franchise_staff_service = new FranchiseStaffService();

        $data = $franchise_staff_service->destroy($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('franchise_staffs.index')
            ->withInput()
            ->with('success', 'Business operation updated successfully');
    }
}
