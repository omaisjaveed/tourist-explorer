<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\About;
use App\Livewire\Services;
use App\Livewire\Blogs;
use App\Livewire\BlogDetail;
use App\Livewire\Contact;
use App\Livewire\AiItinerary;
use App\Livewire\MapExplorer;
use App\Livewire\Admin\Login as AdminLogin;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Admin\BlogManager;
use App\Livewire\Admin\ServiceManager;
use App\Livewire\Admin\ChatPanel as AdminChatPanel;
use App\Livewire\Admin\MediaPicker as MediaGallery;

use App\Http\Controllers\HotelController;

// Frontend Routes
Route::get('/', Home::class);
Route::get('/about', About::class);
Route::get('/services', Services::class);
Route::get('/blogs', Blogs::class);
Route::get('/blogs/{slug}', BlogDetail::class);
Route::get('/contact', Contact::class);
Route::get('/ai-itinerary', AiItinerary::class);
Route::get('/route-map', MapExplorer::class);
Route::get('/hotel-finder', [HotelController::class, 'index'])->name('hotel-finder');

use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ServiceController;

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', AdminLogin::class)->name('login')->middleware('guest');
    
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', AdminDashboard::class);
        
        // Traditional Blog Routes
        Route::get('/blogs', [BlogController::class, 'index'])->name('admin.blogs.index');
        Route::post('/blogs', [BlogController::class, 'store'])->name('admin.blogs.store');
        Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('admin.blogs.destroy');

        // Traditional Service Routes
        Route::get('/services', [ServiceController::class, 'index'])->name('admin.services.index');
        Route::post('/services', [ServiceController::class, 'store'])->name('admin.services.store');
        Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');
        
        // Traditional Media Routes
        Route::get('/media', [MediaController::class, 'index'])->name('admin.media.index');
        Route::post('/media', [MediaController::class, 'store'])->name('admin.media.store');
        Route::delete('/media/{id}', [MediaController::class, 'destroy'])->name('admin.media.destroy');

        Route::get('/messages', AdminChatPanel::class);
        Route::get('/logout', function () {
            auth()->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/admin/login');
        })->name('logout');
    });
});
