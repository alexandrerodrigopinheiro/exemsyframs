<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOperationsManagerRequest;
use App\Http\Requests\UpdateOperationsManagerRequest;
use App\Services\OperationsManagerService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;

class OperationsManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory
    {
        $operations_manager_service = new OperationsManagerService();

        $data = $operations_manager_service->paginate();

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('operations_managers.index', $data);
    }

    /**
     * Display a listing of the resource in trash.
     */
    public function trash(): Factory
    {
        $operations_manager_service = new OperationsManagerService();

        $data = $operations_manager_service->paginate(true);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('operations_managers.trash', $data);
    }

    /**
     * Recovered the specified resource in trash.
     */
    public function recover(string $id): RedirectResponse
    {
        $operations_manager_service = new OperationsManagerService();

        $data = $operations_manager_service->recover($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('operations_managers.trash')
            ->withInput()
            ->with('success', 'Business operation recovered successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory
    {
        $operations_manager_service = new OperationsManagerService();

        $data = $operations_manager_service->create();

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('operations_managers.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOperationsManagerRequest $request): RedirectResponse
    {
        $operations_manager_service = new OperationsManagerService();

        $data = $operations_manager_service->store($request);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('operations_managers.index')
            ->withInput()
            ->with('success', 'Business operation created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(mixed $id): Factory
    {
        $operations_manager_service = new OperationsManagerService();

        $data = $operations_manager_service->show($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('operations_managers.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mixed $id): Factory
    {
        $operations_manager_service = new OperationsManagerService();

        $data = $operations_manager_service->edit($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('operations_managers.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOperationsManagerRequest $request, mixed $id): Factory
    {
        $operations_manager_service = new OperationsManagerService();

        $data = $operations_manager_service->update($request, $id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('operations_managers.edit', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mixed $id): RedirectResponse
    {
        $operations_manager_service = new OperationsManagerService();

        $data = $operations_manager_service->destroy($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('operations_managers.index')
            ->withInput()
            ->with('success', 'Business operation updated successfully');
    }
}
