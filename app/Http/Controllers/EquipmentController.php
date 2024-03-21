<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEquipmentRequest;
use App\Http\Requests\UpdateEquipmentRequest;
use App\Services\EquipmentService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory
    {
        $equipment_service = new EquipmentService();

        $data = $equipment_service->paginate();

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('equipments.index', $data);
    }

    /**
     * Display a listing of the resource in trash.
     */
    public function trash(): Factory
    {
        $equipment_service = new EquipmentService();

        $data = $equipment_service->paginate(true);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('equipments.trash', $data);
    }

    /**
     * Recovered the specified resource in trash.
     */
    public function recover(string $id): RedirectResponse
    {
        $equipment_service = new EquipmentService();

        $data = $equipment_service->recover($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('equipments.trash')
            ->withInput()
            ->with('success', 'Business operation recovered successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory
    {
        $equipment_service = new EquipmentService();

        $data = $equipment_service->create();

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('equipments.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEquipmentRequest $request): RedirectResponse
    {
        $equipment_service = new EquipmentService();

        $data = $equipment_service->store($request);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('equipments.index')
            ->withInput()
            ->with('success', 'Business operation created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(mixed $id): Factory
    {
        $equipment_service = new EquipmentService();

        $data = $equipment_service->show($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('equipments.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mixed $id): Factory
    {
        $equipment_service = new EquipmentService();

        $data = $equipment_service->edit($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('equipments.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEquipmentRequest $request, mixed $id): Factory
    {
        $equipment_service = new EquipmentService();

        $data = $equipment_service->update($request, $id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('equipments.edit', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mixed $id): RedirectResponse
    {
        $equipment_service = new EquipmentService();

        $data = $equipment_service->destroy($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('equipments.index')
            ->withInput()
            ->with('success', 'Business operation updated successfully');
    }
}
