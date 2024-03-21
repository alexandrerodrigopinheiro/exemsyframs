<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBusinessOperationRequest;
use App\Http\Requests\UpdateBusinessOperationRequest;
use App\Services\BusinessOperationService;
use Illuminate\Contracts\View\Factory;

class BusinessOperationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory
    {
        $business_operation_service = new BusinessOperationService();

        $data = $business_operation_service->paginate();

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('business_operations.index', $data);
    }

    /**
     * Display a listing of the resource in trash.
     */
    public function trash(): Factory
    {
        $business_operation_service = new BusinessOperationService();

        $data = $business_operation_service->paginate(true);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('business_operations.trash', $data);
    }

    /**
     * Recovered the specified resource in trash.
     */
    public function recover(string $id)
    {
        $business_operation_service = new BusinessOperationService();

        $data = $business_operation_service->recover($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('business_operations.trash')
            ->withInput()
            ->with('success', 'Business operation recovered successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $business_operation_service = new BusinessOperationService();

        $data = $business_operation_service->create();

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('business_operations.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBusinessOperationRequest $request)
    {
        $business_operation_service = new BusinessOperationService();

        $data = $business_operation_service->store($request);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('business_operations.index')
            ->withInput()
            ->with('success', 'Business operation created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(mixed $id)
    {
        $business_operation_service = new BusinessOperationService();

        $data = $business_operation_service->show($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('business_operations.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mixed $id)
    {
        $business_operation_service = new BusinessOperationService();

        $data = $business_operation_service->edit($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('business_operations.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBusinessOperationRequest $request, mixed $id)
    {
        $business_operation_service = new BusinessOperationService();

        $data = $business_operation_service->update($request, $id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('business_operations.edit', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mixed $id)
    {
        $business_operation_service = new BusinessOperationService();

        $data = $business_operation_service->destroy($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('business_operations.index')
            ->withInput()
            ->with('success', 'Business operation updated successfully');
    }
}
