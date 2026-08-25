<?php

use App\Models\Project;
use App\Models\Service;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    $projects = Project::latest()->take(3)->get();
    $services = Service::latest()->take(3)->get();
    return view('welcome', compact('projects', 'services'));
});

Route::get('/projects/{project:slug}', function (Project $project) {
    return view('projects.show', compact('project'));
})->name('projects.show');

Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');
