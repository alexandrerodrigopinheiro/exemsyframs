<?php

namespace App\Http\Controllers;

use App\Services\DynamicService;
use Illuminate\Contracts\View\Factory;

class DynamicController extends Controller
{
    /**
     * Get business operations managers by franchise.
     */
    public function getBusinessesOperationsByFranchise(bool $with_trashed = false): Factory
    {
        $dynamic_service = new DynamicService();

        $data = $dynamic_service->getBusinessesOperationsByFranchise($with_trashed);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('profiles.show', $data);
    }

    /**
     * Get operation managers by franchise.
     */
    public function getOperationsManagersByFranchise(bool $with_trashed = false): Factory
    {
        $dynamic_service = new DynamicService();

        $data = $dynamic_service->getOperationsManagersByFranchise($with_trashed);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('profiles.edit', $data);
    }

    /**
     * Get operation managers by business operation.
     */
    public function getOperationsManagersByBusinessOperation(bool $with_trashed = false): Factory
    {
        $dynamic_service = new DynamicService();

        $data = $dynamic_service->getOperationsManagersByBusinessOperation($with_trashed);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('profiles.edit', $data);
    }

    /**
     * Get regions by operation manager.
     */
    public function getRegionsByOperationsManager(bool $with_trashed = false): Factory
    {
        $dynamic_service = new DynamicService();

        $data = $dynamic_service->getRegionsByOperationsManager($with_trashed);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('profiles.edit', $data);
    }

    /**
     * Get points by region.
     */
    public function getPointsByRegion(bool $with_trashed = false): Factory
    {
        $dynamic_service = new DynamicService();

        $data = $dynamic_service->getPointsByRegion($with_trashed);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('profiles.edit', $data);
    }

    /**
     * Get point by point.
     */
    public function getPointByPoint(bool $with_trashed = false): Factory
    {
        $dynamic_service = new DynamicService();

        $data = $dynamic_service->getPointsByRegion($with_trashed);

        if (is_string($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $data);
        }

        return view('profiles.edit', $data);
    }
}
