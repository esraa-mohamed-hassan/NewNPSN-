<?php
use App\Http\Controllers\HomeController;
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
        Route::get('/', 'RecordingIncomingReportsController@index')->name('incomingreport.index');
        Route::post('/store', 'RecordingIncomingReportsController@store')->name('incomingreport.store');
        Route::get('/add_incoming', 'RecordingIncomingReportsController@create')->name('incomingreport.create');
        Route::get('/view/{id}',   'RecordingIncomingReportsController@show')->name('incomingreport.show');
        Route::get('/edit/{id}',   'RecordingIncomingReportsController@edit')->name('incomingreport.edit');
        Route::put('/update','RecordingIncomingReportsController@update')->name('incomingreport.update');
        Route::delete('/delete/{id}', 'RecordingIncomingReportsController@delete')->name('incomingreport.delete');
        Route::post('/pdf', 'RecordingIncomingReportsController@generatePDF')->name('incomingreport.pdf');

    });

    Route::prefix('recording_scenarios')->group(function () {
        Route::get('/', 'RecordingScenariosController@index')->name('recordingScenario.index');
        Route::post('/store', 'RecordingScenariosController@store')->name('recordingScenario.store');
        Route::get('/add_scenario', 'RecordingScenariosController@create')->name('recordingScenario.create');
        Route::get('/view/{id}',   'RecordingScenariosController@show')->name('recordingScenario.show');
        Route::get('/edit/{id}',   'RecordingScenariosController@edit')->name('recordingScenario.edit');
        Route::put('/update','RecordingScenariosController@update')->name('recordingScenario.update');
        Route::delete('/delete/{id}', 'RecordingScenariosController@delete')->name('recordingScenario.delete');
        Route::post('/pdf', 'RecordingScenariosController@generatePDF')->name('recordingScenario.pdf');

    });

    Route::prefix('typical_reports_operation')->group(function () {
        Route::get('/', 'TypicalReportsOperationController@index')->name('reportsOperation.index');
        Route::post('/pdf', 'TypicalReportsOperationController@generatePDF')->name('reportsOperation.pdf');
    });

    Route::prefix('typical_reports_places')->group(function () {
        Route::get('/', 'TypicalReportsPlacesController@index')->name('typicalReportsPlaces.index');
        Route::post('/pdf', 'TypicalReportsPlacesController@generatePDF')->name('typicalReportsPlaces.pdf');
    });

    Route::prefix('typical_reports_medical')->group(function () {
        Route::get('/', 'TypicalReportsMedicalServicesController@index')->name('typicalMedicalServices.index');
        Route::post('/pdf', 'TypicalReportsMedicalServicesController@generatePDF')->name('typicalMedicalServices.pdf');
    });

    Route::prefix('statistical_communications')->group(function () {
        Route::get('/', 'StatisticalCommunicationsController@index')->name('statisticalCommunications.index');
        Route::post('/pdf', 'StatisticalCommunicationsController@generatePDF')->name('statisticalCommunications.pdf');
    });

    Route::prefix('statistical_events_received')->group(function () {
        Route::get('/', 'StatisticalEventsReceivedController@index')->name('statisticalEvents.index');
        Route::post('/pdf', 'StatisticalEventsReceivedController@generatePDF')->name('statisticalEvents.pdf');
    });

    Route::prefix('inquiries_communications')->group(function () {
        Route::get('/', 'InquiryCommunicationsController@index')->name('inquiryCommunications.index');
        Route::post('/store', 'InquiryCommunicationsController@store')->name('inquiryCommunications.store');
        Route::post('/print', 'InquiryCommunicationsController@print')->name('inquiryCommunications.print');
         Route::post('/pdf', 'InquiryCommunicationsController@generatePDF')->name('inquiryCommunications.pdf');
    });

    Route::prefix('specific_inquiries')->group(function () {
        Route::get('/', 'SpecificInquyCommunicationsController@index')->name('specificInquiry.index');
        Route::post('/store', 'SpecificInquyCommunicationsController@store')->name('specificInquiry.store');
        Route::post('/print', 'SpecificInquyCommunicationsController@print')->name('specificInquiry.print');
        Route::post('/pdf', 'SpecificInquyCommunicationsController@generatePDF')->name('specificInquiry.pdf');
    });

    Route::prefix('inquiries_scenario')->group(function () {
        Route::get('/', 'InquryScenariosController@index')->name('inquiryScenarios.index');
        Route::post('/store', 'InquryScenariosController@store')->name('inquiryScenarios.store');
        Route::post('/print', 'InquryScenariosController@print')->name('inquiryScenarios.print');
         Route::post('/pdf', 'InquryScenariosController@generatePDF')->name('inquiryScenarios.pdf');
    });

    Route::prefix('inquiries_specific_responsible')->group(function () {
        Route::get('/', 'InqurySpecificResponsibleController@index')->name('specificResponsible.index');
        Route::post('/store', 'InqurySpecificResponsibleController@store')->name('specificResponsible.store');
        Route::post('/print', 'InqurySpecificResponsibleController@print')->name('specificResponsible.print');
         Route::post('/pdf', 'InqurySpecificResponsibleController@generatePDF')->name('specificResponsible.pdf');
    });

    Route::prefix('inquiries_phones')->group(function () {
        Route::get('/', 'InquryPhonesController@index')->name('inquiryPhones.index');
        Route::post('/store', 'InquryPhonesController@store')->name('inquiryPhones.store');
        Route::post('/print', 'InquryPhonesController@print')->name('inquiryPhones.print');
         Route::post('/pdf', 'InquryPhonesController@generatePDF')->name('inquiryPhones.pdf');
    });

    Route::prefix('recording_event_data')->group(function () {
        Route::get('/', 'RecordingEventDataController@index')->name('recordingEvent.index');
        Route::post('/store', 'RecordingEventDataController@store')->name('recordingEvent.store');
        Route::get('/add_event', 'RecordingEventDataController@create')->name('recordingEvent.create');
        Route::get('/view/{id}',   'RecordingEventDataController@show')->name('recordingEvent.show');
        Route::get('/edit/{id}',   'RecordingEventDataController@edit')->name('recordingEvent.edit');
        Route::put('/update','RecordingEventDataController@update')->name('recordingEvent.update');
        Route::delete('/delete/{id}', 'RecordingEventDataController@delete')->name('recordingEvent.delete');
        Route::post('/pdf', 'RecordingEventDataController@generatePDF')->name('recordingEvent.pdf');

    });

    Route::prefix('recording_dalil_phone')->group(function () {
        Route::get('/', 'DalilPhonesListController@index')->name('dalilPhone.index');
        Route::post('/store', 'DalilPhonesListController@store')->name('dalilPhone.store');
        Route::get('/add_dalil_phone', 'DalilPhonesListController@create')->name('dalilPhone.create');
        Route::get('/view/{id}',   'DalilPhonesListController@show')->name('dalilPhone.show');
        Route::get('/edit/{id}',   'DalilPhonesListController@edit')->name('dalilPhone.edit');
        Route::put('/update','DalilPhonesListController@update')->name('dalilPhone.update');
        Route::delete('/delete/{id}', 'DalilPhonesListController@delete')->name('dalilPhone.delete');
        Route::get('/get_entities/{id}', 'DalilPhonesListController@getEntities')->name('dalilPhone.getEntities');
    });

    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('users',  'UsersController', ['names' => 'users']);

        Route::prefix('report_destinations')->group(function () {
            Route::get('/', 'ReportsEntitiesController@index')->name('entity.index');
            Route::post('/store', 'ReportsEntitiesController@store')->name('entity.store');
            Route::get('/entity', 'ReportsEntitiesController@create')->name('entity.create');
            Route::get('/view/{id}',   'ReportsEntitiesController@show')->name('entity.show');
            Route::get('/edit/{id}',   'ReportsEntitiesController@edit')->name('entity.edit');
            Route::put('/update','ReportsEntitiesController@update')->name('entity.update');
            Route::delete('/delete/{id}', 'ReportsEntitiesController@delete')->name('entity.delete');

        });

        Route::prefix('event_type')->group(function () {
            Route::get('/', 'EventTypesController@index')->name('event.index');
            Route::post('/store', 'EventTypesController@store')->name('event.store');
            Route::get('/event', 'EventTypesController@create')->name('event.create');
            Route::get('/view/{id}',   'EventTypesController@show')->name('event.show');
            Route::get('/edit/{id}',   'EventTypesController@edit')->name('event.edit');
            Route::put('/update','EventTypesController@update')->name('event.update');
            Route::delete('/delete/{id}', 'EventTypesController@delete')->name('event.delete');
        });

        Route::prefix('operation_data')->group(function () {
            Route::get('/', 'ReportsOperationDataController@index')->name('operationData.index');
            Route::post('/store', 'ReportsOperationDataController@store')->name('operationData.store');
            Route::get('/add_operation_data', 'ReportsOperationDataController@create')->name('operationData.create');
            Route::get('/view/{id}',   'ReportsOperationDataController@show')->name('operationData.show');
            Route::get('/edit/{id}',   'ReportsOperationDataController@edit')->name('operationData.edit');
            Route::put('/update','ReportsOperationDataController@update')->name('operationData.update');
            Route::delete('/delete/{id}', 'ReportsOperationDataController@delete')->name('operationData.delete');
        });

        Route::prefix('dalil_entity')->group(function () {
            Route::get('/', 'DalilDestinationsEntitiesController@index')->name('dalilEntity.index');
            Route::post('/store', 'DalilDestinationsEntitiesController@store')->name('dalilEntity.store');
            Route::get('/add_dalil_entity', 'DalilDestinationsEntitiesController@create')->name('dalilEntity.create');
            Route::get('/view/{id}',   'DalilDestinationsEntitiesController@show')->name('dalilEntity.show');
            Route::get('/edit/{id}',   'DalilDestinationsEntitiesController@edit')->name('dalilEntity.edit');
            Route::put('/update','DalilDestinationsEntitiesController@update')->name('dalilEntity.update');
            Route::delete('/delete/{id}', 'DalilDestinationsEntitiesController@delete')->name('dalilEntity.delete');
            Route::get('/add_Dentity/{id}', 'DalilDestinationsEntitiesController@showAddEntity')->name('entity.showAddEntity');
            Route::post('/store_Dentity', 'DalilDestinationsEntitiesController@storeAddEntity')->name('entity.storeAddEntity');
        });

        Route::prefix('gathering_places')->group(function () {
            Route::get('/', 'ReportsPlacesController@index')->name('gatheringPlaces.index');
            Route::post('/store', 'ReportsPlacesController@store')->name('gatheringPlaces.store');
            Route::get('/add_gathering_places', 'ReportsPlacesController@create')->name('gatheringPlaces.create');
            Route::get('/view/{id}',   'ReportsPlacesController@show')->name('gatheringPlaces.show');
            Route::get('/edit/{id}',   'ReportsPlacesController@edit')->name('gatheringPlaces.edit');
            Route::put('/update','ReportsPlacesController@update')->name('gatheringPlaces.update');
            Route::delete('/delete/{id}', 'ReportsPlacesController@delete')->name('gatheringPlaces.delete');
        });

        Route::prefix('medical_services')->group(function () {
            Route::get('/', 'ReportsMedicalServicesController@index')->name('medicalServices.index');
            Route::post('/store', 'ReportsMedicalServicesController@store')->name('medicalServices.store');
            Route::get('/add_medical_services', 'ReportsMedicalServicesController@create')->name('medicalServices.create');
            Route::get('/view/{id}',   'ReportsMedicalServicesController@show')->name('medicalServices.show');
            Route::get('/edit/{id}',   'ReportsMedicalServicesController@edit')->name('medicalServices.edit');
            Route::put('/update','ReportsMedicalServicesController@update')->name('medicalServices.update');
            Route::delete('/delete/{id}', 'ReportsMedicalServicesController@delete')->name('medicalServices.delete');
        });

    });
});

