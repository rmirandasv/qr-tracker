<?php

use App\Http\Controllers\QrLinkRedirectController;
use App\Livewire\Pages\Dashboard;
use App\Livewire\Pages\QrLinks\CreateQrLink;
use App\Livewire\Pages\QrLinks\EditQrLink;
use App\Livewire\Pages\QrLinks\QrLinkIndex;
use App\Livewire\Pages\QrLinks\ShowQrLink;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::get('/qr-links', QrLinkIndex::class)->name('qr-links.index');
    Route::get('/qr-links/create', CreateQrLink::class)->name('qr-links.create');
    Route::get('/qr-links/{qrLink}', ShowQrLink::class)->name('qr-links.show');
    Route::get('/qr-links/{qrLink}/edit', EditQrLink::class)->name('qr-links.edit');
});

Route::get('/qr/{uuid}', QrLinkRedirectController::class)->name('qr-links.redirect');
