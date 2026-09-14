<?php

use App\Models\Project;
use App\Models\Service;
use App\Models\Equipment;
use App\Models\Industry;
use App\Models\Career;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\PageController;

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['ar', 'en'])) {
        Session::put('locale', $locale);
    }
    return Redirect::back();
})->name('lang.switch');

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/services', [PageController::class, 'services'])->name('services.index');
Route::get('/services/{service:slug}', [PageController::class, 'serviceShow'])->name('services.show');

Route::get('/projects', [PageController::class, 'projects'])->name('projects.index');
Route::get('/projects/{project}', [PageController::class, 'projectShow'])->name('projects.show');

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/equipment', [PageController::class, 'equipment'])->name('equipment.index');
Route::get('/equipment/{equipment:slug}', [PageController::class, 'equipmentShow'])->name('equipment.show');

Route::get('/industries', [PageController::class, 'industries'])->name('industries.index');
Route::get('/industries/{industry:slug}', [PageController::class, 'industryShow'])->name('industries.show');

Route::get('/careers', [PageController::class, 'careers'])->name('careers.index');
Route::get('/careers/{career:slug}', [PageController::class, 'careerShow'])->name('careers.show');
Route::post('/careers/{career:slug}/apply', [PageController::class, 'submitApplication'])->name('careers.apply')->middleware('throttle:5,1');

Route::get('/certifications', [PageController::class, 'certifications'])->name('certifications.index');
Route::get('/hse', [PageController::class, 'hse'])->name('hse');
Route::get('/quality', [PageController::class, 'quality'])->name('quality');

Route::get('/rfq', [PageController::class, 'rfq'])->name('rfq');
Route::post('/rfq', [PageController::class, 'submitRfq'])->name('rfq.submit')->middleware('throttle:5,1');

Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit')->middleware('throttle:5,1');

Route::get('/sitemap.xml', function () {
    $projects = App\Models\Project::where('is_active', true)->get();
    $services = App\Models\Service::where('is_active', true)->get();
    $industries = App\Models\Industry::where('active', true)->get();
    $equipment = App\Models\Equipment::where('active', true)->get();
    $careers = App\Models\Career::where('active', true)->get();
    
    return response()->view('sitemap', compact('projects', 'services', 'industries', 'equipment', 'careers'))
                     ->header('Content-Type', 'text/xml');
});
