<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecordingIncomingReportsController;
use App\Http\Controllers\RecordingScenariosController;
use App\Http\Controllers\TypicalReportsOperationController;
use App\Http\Controllers\TypicalReportsPlacesController;
use App\Http\Controllers\TypicalReportsMedicalServicesController;
use App\Http\Controllers\StatisticalCommunicationsController;
use App\Http\Controllers\StatisticalEventsReceivedController;
use App\Http\Controllers\InquiryCommunicationsController;
use App\Http\Controllers\SpecificInquyCommunicationsController;
use App\Http\Controllers\InquryScenariosController;
use App\Http\Controllers\InqurySpecificResponsibleController;
use App\Http\Controllers\InquryPhonesController;
use App\Http\Controllers\RecordingEventDataController;
use App\Http\Controllers\DalilPhonesListController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ReportsEntitiesController;
use App\Http\Controllers\EventTypesController;
use App\Http\Controllers\ReportsOperationDataController;
use App\Http\Controllers\DalilDestinationsEntitiesController;
use App\Http\Controllers\ReportsPlacesController;
use App\Http\Controllers\ReportsMedicalServicesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::group(['middleware' => ['get.menu']], function () {

    Route::get('/', function () {  return view('dashboard.auth-temp.login'); });

    Route::get('/home',  [HomeController::class, 'index'])->name('home.index');

    Route::prefix('recording_incoming_reports')->group(function () {
        Route::get('/', [RecordingIncomingReportsController::class, 'index'])->name('incomingreport.index');
        Route::post('/store', [RecordingIncomingReportsController::class, 'store'])->name('incomingreport.store');
        Route::get('/add_incoming', [RecordingIncomingReportsController::class, 'create'])->name('incomingreport.create');
        Route::get('/view/{id}',   [RecordingIncomingReportsController::class, 'show'])->name('incomingreport.show');
        Route::get('/edit/{id}',   [RecordingIncomingReportsController::class, 'edit'])->name('incomingreport.edit');
        Route::put('/update',[RecordingIncomingReportsController::class, 'update'])->name('incomingreport.update');
        Route::delete('/delete/{id}', [RecordingIncomingReportsController::class, 'delete'])->name('incomingreport.delete');
        Route::post('/pdf', [RecordingIncomingReportsController::class, 'generatePDF'])->name('incomingreport.pdf');

    });

    Route::prefix('recording_scenarios')->group(function () {
        Route::get('/', [RecordingScenariosController::class, 'index'])->name('recordingScenario.index');
        Route::post('/store', [RecordingScenariosController::class, 'store'])->name('recordingScenario.store');
        Route::get('/add_scenario', [RecordingScenariosController::class, 'create'])->name('recordingScenario.create');
        Route::get('/view/{id}',   [RecordingScenariosController::class, 'show'])->name('recordingScenario.show');
        Route::get('/edit/{id}',   [RecordingScenariosController::class, 'edit'])->name('recordingScenario.edit');
        Route::put('/update',[RecordingScenariosController::class, 'update'])->name('recordingScenario.update');
        Route::delete('/delete/{id}', [RecordingScenariosController::class, 'delete'])->name('recordingScenario.delete');
        Route::post('/pdf', [RecordingScenariosController::class, 'generatePDF'])->name('recordingScenario.pdf');

    });

    Route::prefix('typical_reports_operation')->group(function () {
        Route::get('/', [TypicalReportsOperationController::class, 'index'])->name('reportsOperation.index');
        Route::post('/pdf', [TypicalReportsOperationController::class, 'generatePDF'])->name('reportsOperation.pdf');
    });

    Route::prefix('typical_reports_places')->group(function () {
        Route::get('/', [TypicalReportsPlacesController::class, 'index'])->name('typicalReportsPlaces.index');
        Route::post('/pdf', [TypicalReportsPlacesController::class, 'generatePDF'])->name('typicalReportsPlaces.pdf');
    });

    Route::prefix('typical_reports_medical')->group(function () {
        Route::get('/', [TypicalReportsMedicalServicesController::class, 'index'])->name('typicalMedicalServices.index');
        Route::post('/pdf', [TypicalReportsMedicalServicesController::class, 'generatePDF'])->name('typicalMedicalServices.pdf');
    });

    Route::prefix('statistical_communications')->group(function () {
        Route::get('/', [StatisticalCommunicationsController::class, 'index'])->name('statisticalCommunications.index');
        Route::post('/pdf', [StatisticalCommunicationsController::class, 'generatePDF'])->name('statisticalCommunications.pdf');
    });

    Route::prefix('statistical_events_received')->group(function () {
        Route::get('/', [StatisticalEventsReceivedController::class, 'index'])->name('statisticalEvents.index');
        Route::post('/pdf', [StatisticalEventsReceivedController::class, 'generatePDF'])->name('statisticalEvents.pdf');
    });

    Route::prefix('inquiries_communications')->group(function () {
        Route::get('/', [InquiryCommunicationsController::class, 'index'])->name('inquiryCommunications.index');
        Route::post('/store', [InquiryCommunicationsController::class, 'store'])->name('inquiryCommunications.store');
        Route::post('/print', [InquiryCommunicationsController::class, 'print'])->name('inquiryCommunications.print');
         Route::post('/pdf', [InquiryCommunicationsController::class, 'generatePDF'])->name('inquiryCommunications.pdf');
    });

    Route::prefix('specific_inquiries')->group(function () {
        Route::get('/', [SpecificInquyCommunicationsController::class, 'index'])->name('specificInquiry.index');
        Route::post('/store', [SpecificInquyCommunicationsController::class, 'store'])->name('specificInquiry.store');
        Route::post('/print', [SpecificInquyCommunicationsController::class, 'print'])->name('specificInquiry.print');
        Route::post('/pdf', [SpecificInquyCommunicationsController::class, 'generatePDF'])->name('specificInquiry.pdf');
    });

    Route::prefix('inquiries_scenario')->group(function () {
        Route::get('/', [InquryScenariosController::class, 'index'])->name('inquiryScenarios.index');
        Route::post('/store', [InquryScenariosController::class, 'store'])->name('inquiryScenarios.store');
        Route::post('/print', [InquryScenariosController::class, 'print'])->name('inquiryScenarios.print');
         Route::post('/pdf', [InquryScenariosController::class, 'generatePDF'])->name('inquiryScenarios.pdf');
    });

    Route::prefix('inquiries_specific_responsible')->group(function () {
        Route::get('/', [InqurySpecificResponsibleController::class, 'index'])->name('specificResponsible.index');
        Route::post('/store', [InqurySpecificResponsibleController::class, 'store'])->name('specificResponsible.store');
        Route::post('/print', [InqurySpecificResponsibleController::class, 'print'])->name('specificResponsible.print');
         Route::post('/pdf', [InqurySpecificResponsibleController::class, 'generatePDF'])->name('specificResponsible.pdf');
    });

    Route::prefix('inquiries_phones')->group(function () {
        Route::get('/', [InquryPhonesController::class, 'index'])->name('inquiryPhones.index');
        Route::post('/store', [InquryPhonesController::class, 'store'])->name('inquiryPhones.store');
        Route::post('/print', [InquryPhonesController::class, 'print'])->name('inquiryPhones.print');
         Route::post('/pdf', [InquryPhonesController::class, 'generatePDF'])->name('inquiryPhones.pdf');
    });

    Route::prefix('recording_event_data')->group(function () {
        Route::get('/', [RecordingEventDataController::class, 'index'])->name('recordingEvent.index');
        Route::post('/store', [RecordingEventDataController::class, 'store'])->name('recordingEvent.store');
        Route::get('/add_event', [RecordingEventDataController::class, 'create'])->name('recordingEvent.create');
        Route::get('/view/{id}',   [RecordingEventDataController::class, 'show'])->name('recordingEvent.show');
        Route::get('/edit/{id}',   [RecordingEventDataController::class, 'edit'])->name('recordingEvent.edit');
        Route::put('/update',[RecordingEventDataController::class, 'update'])->name('recordingEvent.update');
        Route::delete('/delete/{id}', [RecordingEventDataController::class, 'delete'])->name('recordingEvent.delete');
        Route::post('/pdf', [RecordingEventDataController::class, 'generatePDF'])->name('recordingEvent.pdf');

    });

    Route::prefix('recording_dalil_phone')->group(function () {
        Route::get('/', [DalilPhonesListController::class, 'index'])->name('dalilPhone.index');
        Route::post('/store', [DalilPhonesListController::class, 'store'])->name('dalilPhone.store');
        Route::get('/add_dalil_phone', [DalilPhonesListController::class, 'create'])->name('dalilPhone.create');
        Route::get('/view/{id}',   [DalilPhonesListController::class, 'show'])->name('dalilPhone.show');
        Route::get('/edit/{id}',   [DalilPhonesListController::class, 'edit'])->name('dalilPhone.edit');
        Route::put('/update',[DalilPhonesListController::class, 'update'])->name('dalilPhone.update');
        Route::delete('/delete/{id}', [DalilPhonesListController::class, 'delete'])->name('dalilPhone.delete');
        Route::get('/get_entities/{id}', [DalilPhonesListController::class, 'getEntities'])->name('dalilPhone.getEntities');
    });

    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('users',  UsersController::class, ['names' => 'users']);

        Route::prefix('report_destinations')->group(function () {
            Route::get('/', [ReportsEntitiesController::class, 'index'])->name('entity.index');
            Route::post('/store', [ReportsEntitiesController::class, 'store'])->name('entity.store');
            Route::get('/entity', [ReportsEntitiesController::class, 'create'])->name('entity.create');
            Route::get('/view/{id}',   [ReportsEntitiesController::class, 'show'])->name('entity.show');
            Route::get('/edit/{id}',   [ReportsEntitiesController::class, 'edit'])->name('entity.edit');
            Route::put('/update',[ReportsEntitiesController::class, 'update'])->name('entity.update');
            Route::delete('/delete/{id}', [ReportsEntitiesController::class, 'delete'])->name('entity.delete');

        });

        Route::prefix('event_type')->group(function () {
            Route::get('/', [EventTypesController::class, 'index'])->name('event.index');
            Route::post('/store', [EventTypesController::class, 'store'])->name('event.store');
            Route::get('/event', [EventTypesController::class, 'create'])->name('event.create');
            Route::get('/view/{id}',   [EventTypesController::class, 'show'])->name('event.show');
            Route::get('/edit/{id}',   [EventTypesController::class, 'edit'])->name('event.edit');
            Route::put('/update',[EventTypesController::class, 'update'])->name('event.update');
            Route::delete('/delete/{id}', [EventTypesController::class, 'delete'])->name('event.delete');
        });

        Route::prefix('operation_data')->group(function () {
            Route::get('/', [ReportsOperationDataController::class, 'index'])->name('operationData.index');
            Route::post('/store', [ReportsOperationDataController::class, 'store'])->name('operationData.store');
            Route::get('/add_operation_data', [ReportsOperationDataController::class, 'create'])->name('operationData.create');
            Route::get('/view/{id}',   [ReportsOperationDataController::class, 'show'])->name('operationData.show');
            Route::get('/edit/{id}',   [ReportsOperationDataController::class, 'edit'])->name('operationData.edit');
            Route::put('/update',[ReportsOperationDataController::class, 'update'])->name('operationData.update');
            Route::delete('/delete/{id}', [ReportsOperationDataController::class, 'delete'])->name('operationData.delete');
        });

        Route::prefix('dalil_entity')->group(function () {
            Route::get('/', [DalilDestinationsEntitiesController::class, 'index'])->name('dalilEntity.index');
            Route::post('/store', [DalilDestinationsEntitiesController::class, 'store'])->name('dalilEntity.store');
            Route::get('/add_dalil_entity', [DalilDestinationsEntitiesController::class, 'create'])->name('dalilEntity.create');
            Route::get('/view/{id}',   [DalilDestinationsEntitiesController::class, 'show'])->name('dalilEntity.show');
            Route::get('/edit/{id}',   [DalilDestinationsEntitiesController::class, 'edit'])->name('dalilEntity.edit');
            Route::put('/update',[DalilDestinationsEntitiesController::class, 'update'])->name('dalilEntity.update');
            Route::delete('/delete/{id}', [DalilDestinationsEntitiesController::class, 'delete'])->name('dalilEntity.delete');
            Route::get('/add_Dentity/{id}', [DalilDestinationsEntitiesController::class, 'showAddEntity'])->name('entity.showAddEntity');
            Route::post('/store_Dentity', [DalilDestinationsEntitiesController::class, 'storeAddEntity'])->name('entity.storeAddEntity');
        });

        Route::prefix('gathering_places')->group(function () {
            Route::get('/', [ReportsPlacesController::class, 'index'])->name('gatheringPlaces.index');
            Route::post('/store', [ReportsPlacesController::class, 'store'])->name('gatheringPlaces.store');
            Route::get('/add_gathering_places', [ReportsPlacesController::class, 'create'])->name('gatheringPlaces.create');
            Route::get('/view/{id}',   [ReportsPlacesController::class, 'show'])->name('gatheringPlaces.show');
            Route::get('/edit/{id}',   [ReportsPlacesController::class, 'edit'])->name('gatheringPlaces.edit');
            Route::put('/update',[ReportsPlacesController::class, 'update'])->name('gatheringPlaces.update');
            Route::delete('/delete/{id}', [ReportsPlacesController::class, 'delete'])->name('gatheringPlaces.delete');
        });

        Route::prefix('medical_services')->group(function () {
            Route::get('/', [ReportsMedicalServicesController::class, 'index'])->name('medicalServices.index');
            Route::post('/store', [ReportsMedicalServicesController::class, 'store'])->name('medicalServices.store');
            Route::get('/add_medical_services', [ReportsMedicalServicesController::class, 'create'])->name('medicalServices.create');
            Route::get('/view/{id}',   [ReportsMedicalServicesController::class, 'show'])->name('medicalServices.show');
            Route::get('/edit/{id}',   [ReportsMedicalServicesController::class, 'edit'])->name('medicalServices.edit');
            Route::put('/update',[ReportsMedicalServicesController::class, 'update'])->name('medicalServices.update');
            Route::delete('/delete/{id}', [ReportsMedicalServicesController::class, 'delete'])->name('medicalServices.delete');
        });

    });
});

