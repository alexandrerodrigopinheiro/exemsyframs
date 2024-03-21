<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDebtCollectorRequest;
use App\Http\Requests\UpdateDebtCollectorRequest;
use App\Services\DebtCollectorService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;

class DebtCollectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory
    {
        $debt_collector_service = new DebtCollectorService();

        $data = $debt_collector_service->paginate();

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('debt_collectors.index', $data);
    }

    /**
     * Display a listing of the resource in trash.
     */
    public function trash(): Factory
    {
        $debt_collector_service = new DebtCollectorService();

        $data = $debt_collector_service->paginate(true);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('debt_collectors.trash', $data);
    }

    /**
     * Recovered the specified resource in trash.
     */
    public function recover(string $id): RedirectResponse
    {
        $debt_collector_service = new DebtCollectorService();

        $data = $debt_collector_service->recover($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('debt_collectors.trash')
            ->withInput()
            ->with('success', 'Business operation recovered successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory
    {
        $debt_collector_service = new DebtCollectorService();

        $data = $debt_collector_service->create();

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('debt_collectors.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDebtCollectorRequest $request): RedirectResponse
    {
        $debt_collector_service = new DebtCollectorService();

        $data = $debt_collector_service->store($request);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('debt_collectors.index')
            ->withInput()
            ->with('success', 'Business operation created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(mixed $id): Factory
    {
        $debt_collector_service = new DebtCollectorService();

        $data = $debt_collector_service->show($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('debt_collectors.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mixed $id): Factory
    {
        $debt_collector_service = new DebtCollectorService();

        $data = $debt_collector_service->edit($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('debt_collectors.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDebtCollectorRequest $request, mixed $id): Factory
    {
        $debt_collector_service = new DebtCollectorService();

        $data = $debt_collector_service->update($request, $id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('debt_collectors.edit', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mixed $id): RedirectResponse
    {
        $debt_collector_service = new DebtCollectorService();

        $data = $debt_collector_service->destroy($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('debt_collectors.index')
            ->withInput()
            ->with('success', 'Business operation updated successfully');
    }
}
