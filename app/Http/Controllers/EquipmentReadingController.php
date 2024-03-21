<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEquipmentReadingRequest;
use App\Http\Requests\UpdateEquipmentReadingRequest;
use App\Services\EquipmentReadingService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;

class EquipmentReadingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory
    {
        $equipment_reading_service = new EquipmentReadingService();

        $data = $equipment_reading_service->paginate();

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('equipment_readings.index', $data);
    }

    /**
     * Display a listing of the resource in trash.
     */
    public function trash(): Factory
    {
        $equipment_reading_service = new EquipmentReadingService();

        $data = $equipment_reading_service->paginate(true);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('equipment_readings.trash', $data);
    }

    /**
     * Recovered the specified resource in trash.
     */
    public function recover(string $id): RedirectResponse
    {
        $equipment_reading_service = new EquipmentReadingService();

        $data = $equipment_reading_service->recover($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('equipment_readings.trash')
            ->withInput()
            ->with('success', 'Business operation recovered successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory
    {
        $equipment_reading_service = new EquipmentReadingService();

        $data = $equipment_reading_service->create();

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('equipment_readings.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEquipmentReadingRequest $request): RedirectResponse
    {
        $equipment_reading_service = new EquipmentReadingService();

        $data = $equipment_reading_service->store($request);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('equipment_readings.index')
            ->withInput()
            ->with('success', 'Business operation created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(mixed $id): Factory
    {
        $equipment_reading_service = new EquipmentReadingService();

        $data = $equipment_reading_service->show($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('equipment_readings.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mixed $id): Factory
    {
        $equipment_reading_service = new EquipmentReadingService();

        $data = $equipment_reading_service->edit($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('equipment_readings.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEquipmentReadingRequest $request, mixed $id): Factory
    {
        $equipment_reading_service = new EquipmentReadingService();

        $data = $equipment_reading_service->update($request, $id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('equipment_readings.edit', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mixed $id): RedirectResponse
    {
        $equipment_reading_service = new EquipmentReadingService();

        $data = $equipment_reading_service->destroy($id);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return redirect()
            ->route('equipment_readings.index')
            ->withInput()
            ->with('success', 'Business operation updated successfully');
    }
}
