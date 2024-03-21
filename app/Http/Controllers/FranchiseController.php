<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFranchiseRequest;
use App\Http\Requests\UpdateFranchiseRequest;
use App\Services\FranchiseService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;

class FranchiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory
    {
        $franchise_service = new FranchiseService();

        $data = $franchise_service->paginate();

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('franchises.index', $data);
    }

    /**
     * Display a listing of the resource in trash.
     */
    public function trash(): Factory
    {
        $franchise_service = new FranchiseService();

        $data = $franchise_service->paginate(true);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('franchises.trash', $data);
    }

    /**
     * Recovered the specified resource in trash.
     */
    public function recover(string $id): RedirectResponse
    {
        $franchise_service = new FranchiseService();

        $data = $franchise_service->recover($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('franchises.trash')
            ->withInput()
            ->with('success', 'Business operation recovered successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory
    {
        $franchise_service = new FranchiseService();

        $data = $franchise_service->create();

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('franchises.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFranchiseRequest $request): RedirectResponse
    {
        $franchise_service = new FranchiseService();

        $data = $franchise_service->store($request);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('franchises.index')
            ->withInput()
            ->with('success', 'Business operation created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(mixed $id): Factory
    {
        $franchise_service = new FranchiseService();

        $data = $franchise_service->show($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('franchises.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mixed $id): Factory
    {
        $franchise_service = new FranchiseService();

        $data = $franchise_service->edit($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('franchises.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFranchiseRequest $request, mixed $id): Factory
    {
        $franchise_service = new FranchiseService();

        $data = $franchise_service->update($request, $id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('franchises.edit', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mixed $id): RedirectResponse
    {
        $franchise_service = new FranchiseService();

        $data = $franchise_service->destroy($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('franchises.index')
            ->withInput()
            ->with('success', 'Business operation updated successfully');
    }
}
