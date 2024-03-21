<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSettlementRequest;
use App\Http\Requests\UpdateSettlementRequest;
use App\Services\SettlementService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;

class SettlementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory
    {
        $settlement_service = new SettlementService();

        $data = $settlement_service->paginate();

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('settlements.index', $data);
    }

    /**
     * Display a listing of the resource in trash.
     */
    public function trash(): Factory
    {
        $settlement_service = new SettlementService();

        $data = $settlement_service->paginate(true);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('settlements.trash', $data);
    }

    /**
     * Recovered the specified resource in trash.
     */
    public function recover(string $id): RedirectResponse
    {
        $settlement_service = new SettlementService();

        $data = $settlement_service->recover($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('settlements.trash')
            ->withInput()
            ->with('success', 'Business operation recovered successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory
    {
        $settlement_service = new SettlementService();

        $data = $settlement_service->create();

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('settlements.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSettlementRequest $request): RedirectResponse
    {
        $settlement_service = new SettlementService();

        $data = $settlement_service->store($request);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('settlements.index')
            ->withInput()
            ->with('success', 'Business operation created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(mixed $id): Factory
    {
        $settlement_service = new SettlementService();

        $data = $settlement_service->show($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('settlements.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mixed $id): Factory
    {
        $settlement_service = new SettlementService();

        $data = $settlement_service->edit($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('settlements.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSettlementRequest $request, mixed $id): Factory
    {
        $settlement_service = new SettlementService();

        $data = $settlement_service->update($request, $id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('settlements.edit', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mixed $id): RedirectResponse
    {
        $settlement_service = new SettlementService();

        $data = $settlement_service->destroy($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('settlements.index')
            ->withInput()
            ->with('success', 'Business operation updated successfully');
    }
}
