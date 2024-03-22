<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommercialRepresentativeRequest;
use App\Http\Requests\UpdateCommercialRepresentativeRequest;
use App\Services\CommercialRepresentativeService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;

class CommercialRepresentativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory
    {
        $commercial_representative = new CommercialRepresentativeService();

        $data = $commercial_representative->paginate();

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('commercial_representative.index', $data);
    }

    /**
     * Display a listing of the resource in trash.
     */
    public function trash(): Factory
    {
        $commercial_representative = new CommercialRepresentativeService();

        $data = $commercial_representative->paginate(true);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('commercial_representative.trash', $data);
    }

    /**
     * Recovered the specified resource in trash.
     */
    public function recover(string $id): RedirectResponse
    {
        $commercial_representative = new CommercialRepresentativeService();

        $data = $commercial_representative->recover($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('commercial_representative.trash')
            ->withInput()
            ->with('success', 'Business operation recovered successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory
    {
        $commercial_representative = new CommercialRepresentativeService();

        $data = $commercial_representative->create();

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('commercial_representative.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommercialRepresentativeRequest $request): RedirectResponse
    {
        $commercial_representative = new CommercialRepresentativeService();

        $data = $commercial_representative->store($request);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('commercial_representative.index')
            ->withInput()
            ->with('success', 'Business operation created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(mixed $id): Factory
    {
        $commercial_representative = new CommercialRepresentativeService();

        $data = $commercial_representative->show($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('commercial_representative.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mixed $id): Factory
    {
        $commercial_representative = new CommercialRepresentativeService();

        $data = $commercial_representative->edit($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('commercial_representative.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommercialRepresentativeRequest $request, mixed $id): Factory
    {
        $commercial_representative = new CommercialRepresentativeService();

        $data = $commercial_representative->update($request, $id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('commercial_representative.edit', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mixed $id): RedirectResponse
    {
        $commercial_representative = new CommercialRepresentativeService();

        $data = $commercial_representative->destroy($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('commercial_representative.index')
            ->withInput()
            ->with('success', 'Business operation updated successfully');
    }
}
