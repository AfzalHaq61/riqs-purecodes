<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Structures\StructureIndexController;
use App\Http\Controllers\Structures\StructureCreateController;
use App\Http\Controllers\Structures\StructureStoreController;
use App\Http\Controllers\Structures\StructureEditController;
use App\Http\Controllers\Structures\StructureUpdateController;
use App\Http\Controllers\Structures\StructureDeleteController;
use App\Http\Controllers\Structures\StructureExportController;
use App\Http\Controllers\Structures\StructureDownloadController;

use App\Mail\Testmail;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Mail;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::group(['middleware' => ['auth', 'verified']], function () {

    // Dashboard

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // User

    Route::prefix('/user')->group(function () {
        Route::get('/{resource:uuid}/create', [UserController::class, 'create'])
            ->name('user.create');
        Route::post('/{resource:uuid}', [UserController::class, 'store'])
            ->name('user.store');
    });

    // Kawaif

    Route::prefix('/kawaif')->group(function () {
        Route::get('', [KawaifController::class, 'index'])
            ->name('kawaif.index');
        Route::get('/create', [KawaifController::class, 'create'])
            ->name('kawaif.create');
        Route::post('', [KawaifController::class, 'store'])
            ->name('kawaif.store');
        Route::get('/{resource:uuid}/edit', [KawaifController::class, 'edit'])
            ->name('kawaif.edit');
        Route::put('/{resource:uuid}', [KawaifController::class, 'update'])
            ->name('kawaif.update');
        Route::get('/{resource:uuid}/deleteConfirm', [KawaifController::class, 'deleteConfirm'])
            ->name('kawaif.deleteConfirm');
        Route::delete('/{resource:uuid}/delete', [KawaifController::class, 'destroy'])
            ->name('kawaif.delete');

        // Kawaif Ajax Routes

        Route::get('/fix-amount/{resource}', [KawaifController::class, 'getFixedAmount'])
            ->name('kawaif.geyFixedAmount');
        Route::get('/export', [KawaifController::class, 'export'])
            ->name('kawaif.export');
        Route::get('/download', [KawaifController::class, 'download'])
            ->name('kawaif.download');
    });

    Route::controller(KawaifController::class)->group(function () {
        Route::get('/zone/selection/{region}', 'zoneSelecion')
            ->name('zone.selection');
        Route::get('/shehar/halqa/unit/selection/{zone}', 'sheharHalqaUnitSelecion')
            ->name('shehar.halqa.unit.selection');
        Route::get('/halqa/unit/selection/{shehar}', 'halqaUnitSelecion')
            ->name('halqa.unit.selection');
        Route::get('/unit/selection/{halqa}', 'unitSelecion')
            ->name('unit.selection');
    });

    // Maliyat Popup

    Route::prefix('/maliyat')->group(function () {
        Route::get('/popup/{resource:uuid}/edit', [MaliyatPopupController::class, 'edit'])
            ->name('maliyat-popup.edit');
        Route::put('/popup/{resource:uuid}', [MaliyatPopupController::class, 'update'])
            ->name('maliyat-popup.update');
    });

    // Maliyat

    Route::prefix('/maliyat')->group(function () {
        Route::get('', [MaliyatController::class, 'index'])
            ->name('maliyat.index');
        Route::get('/create', [MaliyatController::class, 'create'])
            ->name('maliyat.create');
        Route::post('', [MaliyatController::class, 'store'])
            ->name('maliyat.store');
        Route::get('/edit', [MaliyatController::class, 'edit'])
            ->name('maliyat.edit');
        Route::put('/{maliyatResource:uuid}', [MaliyatController::class, 'update'])
            ->name('maliyat.update');
        Route::delete('/{maliyatResource:uuid}/delete', [MaliyatController::class, 'destroy'])
            ->name('maliyat.delete');

        // Maliyat Ajax Routes

        Route::get('/export', [MaliyatController::class, 'export'])
            ->name('maliyat.export');
        Route::get('/download', [MaliyatController::class, 'download'])
            ->name('maliyat.download');
    });

    // Rahimia

    Route::prefix('/rahimia')->group(function () {
        Route::get('', [RahimiaController::class, 'index'])
            ->name('rahimia.index');
        Route::get('/create', [RahimiaController::class, 'create'])
            ->name('rahimia.create');
        Route::post('', [RahimiaController::class, 'store'])
            ->name('rahimia.store');
        Route::get('/edit', [RahimiaController::class, 'edit'])
            ->name('rahimia.edit');
        Route::put('/{rahimiaResource:uuid}', [RahimiaController::class, 'update'])
            ->name('rahimia.update');
        Route::delete('/{rahimiaResource:uuid}/delete', [RahimiaController::class, 'destroy'])
            ->name('rahimia.delete');

        // Rahimia Ajax Routes

        Route::get('/export', [RahimiaController::class, 'export'])
            ->name('rahimia.export');
        Route::get('/download', [RahimiaController::class, 'download'])
            ->name('rahimia.download');
    });

    // Centers

    Route::prefix('/centers')->group(function () {
        Route::get('', [CenterController::class, 'index'])
            ->name('centers.index');
        Route::get('/create', [CenterController::class, 'create'])
            ->name('centers.create');
        Route::post('', [CenterController::class, 'store'])
            ->name('centers.store');
        Route::get('/{centers:uuid}/edit', [CenterController::class, 'edit'])
            ->name('centers.edit');
        Route::put('/{centers:uuid}', [CenterController::class, 'update'])
            ->name('centers.update');
        Route::delete('/{centers:uuid}/delete', [CenterController::class, 'destroy'])
            ->name('centers.delete');

        // Center Ajax Routes

        Route::get('/export', [CenterController::class, 'export'])
            ->name('centers.export');
        Route::get('/download', [CenterController::class, 'download'])
            ->name('centers.download');
    });

    // CenterSemesterController(cenerID) [index]

    Route::get('/center/{center:uuid}/semesters', [CenterSemesterController::class, 'show'])
        ->name('centerSemesters.show');

    // SemesterController [index,]

    Route::prefix('/semesters')->group(function () {
        Route::get('', [SemesterController::class, 'index'])
            ->name('semesters.index');
        Route::get('/create', [SemesterController::class, 'create'])
            ->name('semesters.create');
        Route::post('', [SemesterController::class, 'store'])
            ->name('semesters.store');
        Route::get('/{semesters:uuid}/edit', [SemesterController::class, 'edit'])
            ->name('semesters.edit');
        Route::put('/{semesters:uuid}', [SemesterController::class, 'update'])
            ->name('semesters.update');
        Route::delete('/{semesters:uuid}/delete', [SemesterController::class, 'destroy'])
            ->name('semesters.delete');

        // Semester Ajax Routes

        Route::get('/selection/{center}', [SemesterController::class, 'course'])
            ->name('semesters.selection');
        Route::get('/export', [SemesterController::class, 'export'])
            ->name('semesters.export');
        Route::get('/download', [SemesterController::class, 'download'])
            ->name('semesters.download');
    });

    // SemesterResourceController(SemesterID) [index]

    Route::controller(ResourceSemesterController::class)->group(function () {
        Route::get('/semester/{semester:uuid}/resources', 'index')
            ->name('resourcesSemester.index');
        Route::get('/semester/{semester:uuid}/resources/create', 'create')
            ->name('resourcesSemester.create');
        Route::post('/semester/{semester:uuid}/resources', 'store')
            ->name('resourcesSemester.store');
        Route::get('/resources/{resourceSemester:uuid}/edit', 'edit')
            ->name('resourcesSemester.edit');
        Route::put('/resources/{resourceSemester:uuid}', 'update')
            ->name('resourcesSemester.update');
        Route::delete('/resources/{resourcesResource:uuid}/delete', 'destroy')
            ->name('resourcesSemester.delete');

        // ResourceSemester Ajax Routes

        Route::get('/resourcesSemester/export', 'export')
            ->name('resourcesSemester.export');
        Route::get('resourcesSemester/download', 'download')
            ->name('resourcesSemester.download');
    });

    // Structures Route

    Route::prefix('/structures')->group(function () {
        Route::get('', StructureIndexController::class)
            ->name('structures.index');
        Route::get('/create', StructureCreateController::class)
            ->name('structures.create');
        Route::post('', StructureStoreController::class)
            ->name('structures.store');
        Route::get('/{resource:uuid}/edit', StructureEditController::class)
            ->name('structures.edit');
        Route::put('/{resource:uuid}', StructureUpdateController::class)
            ->name('structures.update');
        Route::delete('/{resource:uuid}/delete', StructureDeleteController::class)
            ->name('structures.delete');

        // Struecture Ajax Routes

        Route::get('/export', StructureExportController::class)
            ->name('structures.export');
        Route::get('/download', StructureDownloadController::class)
            ->name('structures.download');
    });
});

Route::get('/send-mail', function () {
    $mailData = [
        'name' => "Afzal",
        'from' => "Swat",
    ];
    Mail::to('fakeMail@mail.com')->send(new TestMail($mailData));
    dd("Email Send Successfully");
});

require __DIR__ . '/auth.php';
