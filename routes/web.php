<?php

use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)
    ->group(
        function () {
            Route::get('', 'index')->name('index');
            Route::get('login', 'index')->name('index');
            Route::post('login', 'login')->name('login');
            Route::get('forgot', 'forgot')->name('forgot');
            Route::post('forgot', 'forgotStore')->name('forgot.store');
            Route::get('recover/{remember_token}', 'recover')->name('recover');
            Route::post('recover', 'recoverStore')->name('recover.store');
        }
    );

Route::controller(AuthController::class)
    ->middleware([
        'access.level',
        'server.manager',
    ])
    ->group(
        function () {
            Route::get('logout', 'logout')->name('logout');
        }
    );

Route::controller(ProfileController::class)
    ->middleware([
        'access.level',
        'server.manager',
    ])
    ->prefix('profiles')
    ->group(
        function () {
            Route::get('', 'index')->name('profiles.index');
            Route::get('edit/{id}', 'edit')->name('profiles.edit');
            Route::post('update', 'update')->name('profiles.update');
        }
    );

Route::controller(DashboardController::class)
    ->middleware([
        'access.level',
        'server.manager',
    ])
    ->prefix('dashboards')
    ->group(
        function () {
            Route::get('', 'index')->name('dashboards.index');
            Route::post('update', 'update')->name('dashboards.update');
        }
    );

Route::controller(FinancialController::class)
    ->middleware([
        'access.level',
        'server.manager',
    ])
    ->prefix('financials')
    ->group(
        function () {
            Route::get('', 'index')->name('financials.index');
            Route::get('pdf', 'pdf')->name('financials.pdf');
            Route::get('print', 'print')->name('financials.print');
            Route::get('operations', 'operations')->name('financials.operations');
            Route::get('operations_managers', 'operations_managers')->name('financials.operations_managers');
            Route::get('regions', 'regions')->name('financials.regions');
            Route::get('sale-points', 'sale_points')->name('financials.sale_points');
        }
    );

Route::controller(ResultController::class)
    ->middleware([
        'access.level',
        'server.manager',
    ])
    ->prefix('results')
    ->group(
        function () {
            Route::get('', 'index')->name('results.index');
            Route::get('create', 'create')->name('results.create');
            Route::post('store', 'store')->name('results.store');
        }
    );

Route::controller(FranchiseController::class)
    ->middleware([
        'access.level',
        'server.manager',
    ])
    ->prefix('franchises')
    ->group(
        function () {
            Route::get('', 'index')->name('franchises.index');
            Route::get('trash', 'trash')->name('franchises.trash');
            Route::post('recover/{id}', 'recover')->name('franchises.recover');
            Route::get('create', 'create')->name('franchises.create');
            Route::post('store', 'store')->name('franchises.store');
            Route::get('show/{id}', 'show')->name('franchises.show');
            Route::get('edit/{id}', 'edit')->name('franchises.edit');
            Route::post('update', 'update')->name('franchises.update');
            Route::post('destroy/{id}', 'destroy')->name('franchises.destroy');
        }
    );

Route::controller(ServiceTermsController::class)
    ->middleware([
        'access.level',
        'server.manager',
    ])
    ->prefix('service_terms')
    ->group(
        function () {
            Route::get('', 'index')->name('service_terms.index');
        }
    );

Route::controller(PartnerController::class)
    ->middleware([
        'access.level',
        'server.manager',
    ])
    ->prefix('partners')
    ->group(
        function () {
            Route::get('', 'index')->name('partners.index');
            Route::get('trash', 'trash')->name('partners.trash');
            Route::post('recover/{id}', 'recover')->name('partners.recover');
            Route::get('create', 'create')->name('partners.create');
            Route::post('store', 'store')->name('partners.store');
            Route::get('show/{id}', 'show')->name('partners.show');
            Route::get('edit/{id}', 'edit')->name('partners.edit');
            Route::post('update', 'update')->name('partners.update');
            Route::post('destroy/{id}', 'destroy')->name('partners.destroy');
        }
    );

Route::controller(FranchiseStaffController::class)
    ->middleware([
        'access.level',
        'server.manager',
    ])
    ->prefix('franchises-staff')
    ->group(
        function () {
            Route::get('', 'index')->name('franchises_staff.index');
            Route::get('trash', 'trash')->name('franchises_staff.trash');
            Route::post('recover/{id}', 'recover')->name('franchises_staff.recover');
            Route::get('create', 'create')->name('franchises_staff.create');
            Route::post('store', 'store')->name('franchises_staff.store');
            Route::get('show/{id}', 'show')->name('franchises_staff.show');
            Route::get('edit/{id}', 'edit')->name('franchises_staff.edit');
            Route::post('update', 'update')->name('franchises_staff.update');
            Route::post('destroy/{id}', 'destroy')->name('franchises_staff.destroy');
        }
    );

Route::controller(BusinessOperationController::class)
    ->middleware([
        'access.level',
        'server.manager',
    ])
    ->prefix('business-operations')
    ->group(
        function () {
            Route::get('', 'index')->name('business_operations.index');
            Route::get('trash', 'trash')->name('business_operations.trash');
            Route::post('recover/{id}', 'recover')->name('business_operations.recover');
            Route::get('create', 'create')->name('business_operations.create');
            Route::post('store', 'store')->name('business_operations.store');
            Route::get('show/{id}', 'show')->name('business_operations.show');
            Route::get('edit/{id}', 'edit')->name('business_operations.edit');
            Route::post('update', 'update')->name('business_operations.update');
            Route::post('destroy/{id}', 'destroy')->name('business_operations.destroy');
        }
    );

Route::controller(OperationsManagerController::class)
    ->middleware([
        'access.level',
        'server.manager',
    ])
    ->prefix('operations_managers')
    ->group(
        function () {
            Route::get('', 'index')->name('operations_managers.index');
            Route::get('trash', 'trash')->name('operations_managers.trash');
            Route::post('recover/{id}', 'recover')->name('operations_managers.recover');
            Route::get('create', 'create')->name('operations_managers.create');
            Route::post('store', 'store')->name('operations_managers.store');
            Route::get('show/{id}', 'show')->name('operations_managers.show');
            Route::get('edit/{id}', 'edit')->name('operations_managers.edit');
            Route::post('update', 'update')->name('operations_managers.update');
            Route::post('destroy/{id}', 'destroy')->name('operations_managers.destroy');
        }
    );

Route::controller(BusinessOperationStaffController::class)
    ->middleware([
        'access.level',
        'server.manager',
    ])
    ->prefix('business-operations-staff')
    ->group(
        function () {
            Route::get('', 'index')->name('business_operations_staff.index');
            Route::get('trash', 'trash')->name('business_operations_staff.trash');
            Route::post('recover/{id}', 'recover')->name('business_operations_staff.recover');
            Route::get('create', 'create')->name('business_operations_staff.create');
            Route::post('store', 'store')->name('business_operations_staff.store');
            Route::get('show/{id}', 'show')->name('business_operations_staff.show');
            Route::get('edit/{id}', 'edit')->name('business_operations_staff.edit');
            Route::post('update', 'update')->name('business_operations_staff.update');
            Route::post('destroy/{id}', 'destroy')->name('business_operations_staff.destroy');
        }
    );

Route::controller(DebtCollectorController::class)
    ->middleware([
        'access.level',
        'server.manager',
    ])
    ->prefix('debt-collectors')
    ->group(
        function () {
            Route::get('', 'index')->name('debt_collectors.index');
            Route::get('trash', 'trash')->name('debt_collectors.trash');
            Route::post('recover/{id}', 'recover')->name('debt_collectors.recover');
            Route::get('create', 'create')->name('debt_collectors.create');
            Route::post('store', 'store')->name('debt_collectors.store');
            Route::get('show/{id}', 'show')->name('debt_collectors.show');
            Route::get('edit/{id}', 'edit')->name('debt_collectors.edit');
            Route::post('update', 'update')->name('debt_collectors.update');
            Route::post('destroy/{id}', 'destroy')->name('debt_collectors.destroy');
        }
    );

Route::controller(RegionController::class)
    ->middleware([
        'access.level',
        'server.manager',
    ])
    ->prefix('regions')
    ->group(
        function () {
            Route::get('', 'index')->name('regions.index');
            Route::get('trash', 'trash')->name('regions.trash');
            Route::post('recover/{id}', 'recover')->name('regions.recover');
            Route::get('create', 'create')->name('regions.create');
            Route::post('store', 'store')->name('regions.store');
            Route::get('show/{id}', 'show')->name('regions.show');
            Route::get('edit/{id}', 'edit')->name('regions.edit');
            Route::post('update', 'update')->name('regions.update');
            Route::post('destroy/{id}', 'destroy')->name('regions.destroy');
        }
    );

Route::controller(SalePointController::class)
    ->middleware([
        'access.level',
        'server.manager',
    ])
    ->prefix('sale-points')
    ->group(
        function () {
            Route::get('', 'index')->name('sale_points.index');
            Route::get('trash', 'trash')->name('sale_points.trash');
            Route::post('recover/{id}', 'recover')->name('sale_points.recover');
            Route::get('create', 'create')->name('sale_points.create');
            Route::post('store', 'store')->name('sale_points.store');
            Route::get('show/{id}', 'show')->name('sale_points.show');
            Route::get('edit/{id}', 'edit')->name('sale_points.edit');
            Route::post('update', 'update')->name('sale_points.update');
            Route::post('destroy/{id}', 'destroy')->name('sale_points.destroy');
        }
    );

Route::controller(AffiliateController::class)
    ->middleware([
        'access.level',
        'server.manager',
    ])
    ->prefix('affiliates')
    ->group(
        function () {
            Route::get('', 'index')->name('affiliates.index');
            Route::get('trash', 'trash')->name('affiliates.trash');
            Route::post('recover/{id}', 'recover')->name('affiliates.recover');
            Route::get('create', 'create')->name('affiliates.create');
            Route::post('store', 'store')->name('affiliates.store');
            Route::get('show/{id}', 'show')->name('affiliates.show');
            Route::get('edit/{id}', 'edit')->name('affiliates.edit');
            Route::post('update', 'update')->name('affiliates.update');
            Route::post('destroy/{id}', 'destroy')->name('affiliates.destroy');
        }
    );

Route::controller(KioskController::class)
    ->middleware([
        'access.level',
        'server.manager',
    ])
    ->prefix('kiosks')
    ->group(
        function () {
            Route::get('', 'index')->name('kiosks.index');
            Route::get('trash', 'trash')->name('kiosks.trash');
            Route::post('recover/{id}', 'recover')->name('kiosks.recover');
            Route::get('create', 'create')->name('kiosks.create');
            Route::post('store', 'store')->name('kiosks.store');
            Route::get('show/{id}', 'show')->name('kiosks.show');
            Route::get('edit/{id}', 'edit')->name('kiosks.edit');
            Route::post('update', 'update')->name('kiosks.update');
            Route::post('destroy/{id}', 'destroy')->name('kiosks.destroy');
        }
    );

Route::controller(PlayerController::class)
    ->middleware([
        'access.level',
        'server.manager',
    ])
    ->prefix('players')
    ->group(
        function () {
            Route::get('', 'index')->name('players.index');
            Route::get('trash', 'trash')->name('players.trash');
            Route::post('recover/{id}', 'recover')->name('players.recover');
            Route::get('create', 'create')->name('players.create');
            Route::post('store', 'store')->name('players.store');
            Route::get('show/{id}', 'show')->name('players.show');
            Route::get('edit/{id}', 'edit')->name('players.edit');
            Route::post('update', 'update')->name('players.update');
            Route::post('destroy/{id}', 'destroy')->name('players.destroy');
        }
    );

Route::controller(SettingController::class)
    ->middleware([
        'access.level',
        'server.manager',
    ])
    ->prefix('settings')
    ->group(
        function () {
            Route::get('', 'index')->name('settings.index');
            Route::get('edit/{id}', 'edit')->name('settings.edit');
            Route::post('update', 'update')->name('settings.update');
        }
    );

Route::controller(OfficeStaffController::class)
    ->middleware([
        'access.level',
        'server.manager',
    ])
    ->prefix('office-staff')
    ->group(
        function () {
            Route::get('', 'index')->name('office_staff.index');
            Route::get('trash', 'trash')->name('office_staff.trash');
            Route::post('recover/{id}', 'recover')->name('office_staff.recover');
            Route::get('create', 'create')->name('office_staff.create');
            Route::post('store', 'store')->name('office_staff.store');
            Route::get('show/{id}', 'show')->name('office_staff.show');
            Route::get('edit/{id}', 'edit')->name('office_staff.edit');
            Route::post('update', 'update')->name('office_staff.update');
            Route::post('destroy/{id}', 'destroy')->name('office_staff.destroy');
        }
    );

Route::controller(CommercialRepresentativeController::class)
    ->middleware([
        'access.level',
        'server.manager',
    ])
    ->prefix('commercial-representatives')
    ->group(
        function () {
            Route::get('', 'index')->name('commercial_representatives.index');
            Route::get('trash', 'trash')->name('commercial_representatives.trash');
            Route::post('recover/{id}', 'recover')->name('commercial_representatives.recover');
            Route::get('create', 'create')->name('commercial_representatives.create');
            Route::post('store', 'store')->name('commercial_representatives.store');
            Route::get('show/{id}', 'show')->name('commercial_representatives.show');
            Route::get('edit/{id}', 'edit')->name('commercial_representatives.edit');
            Route::post('update', 'update')->name('commercial_representatives.update');
            Route::post('destroy/{id}', 'destroy')->name('commercial_representatives.destroy');
        }
    );

Route::controller(DynamicController::class)
    ->middleware([
        'access.level',
        'server.manager',
    ])
    ->prefix('dynamics')
    ->group(
        function () {
            Route::get('businesses-operations-by-franchise/{withTrashed?}', 'getBusinessesOperationsByFranchise')->name('dynamics.businesses-operations-by-franchise');
            Route::get('operations-managers-by-franchise', 'getOperationsManagersByFranchise')->name('dynamics.operations-managers-by-franchise');
            Route::get('operations-managers-by-business-operation/{withTrashed?}', 'getOperationsManagersByBusinessOperation')->name('dynamics.operations-managers-by-business-operation');
            Route::get('regions-by-operations-manager/{withTrashed?}', 'getRegionsByOperationsManager')->name('dynamics.regions-by-operations-manager');
            Route::get('sale-points-by-region/{withTrashed?}', 'getSalePointsByRegion')->name('dynamics.sale-points-by-region');
            Route::get('sale-point-by-sale-point/{withTrashed?}', 'getSalePointBySalePoint')->name('dynamics.sale-point-by-sale-point');
        }
    );
