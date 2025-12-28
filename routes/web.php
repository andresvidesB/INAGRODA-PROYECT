<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ServiceController; // Asegúrate de tener este controlador para los servicios
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS (Accesibles para todo el mundo)
|--------------------------------------------------------------------------
*/

// Página de Inicio
Route::get('/', [PublicController::class, 'index'])->name('home');

// Página "Nosotros"
Route::get('/nosotros', [PublicController::class, 'about'])->name('about');

// Página de Servicios (Vista Pública)
Route::get('/servicios', [PublicController::class, 'services'])->name('services');

// Página de Contacto
Route::get('/contacto', [PublicController::class, 'contact'])->name('contact');
Route::post('/contacto', [PublicController::class, 'sendMessage'])->name('contact.send');

// --- NOTICIAS Y BLOG (PÚBLICO) ---
// Importante: Estas rutas están FUERA del grupo 'admin' para que todos puedan leerlas.
Route::get('/noticias', [PostController::class, 'index'])->name('posts.index');
Route::get('/noticias/{slug}', [PostController::class, 'show'])->name('blog.show');


/*
|--------------------------------------------------------------------------
| RUTAS DE USUARIO / CLIENTE (Requiere iniciar sesión)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Panel del Cliente (Mi Cuenta)
    Route::get('/mi-cuenta', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    // Perfil de Usuario (Editar datos propios)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| RUTAS DE ADMINISTRADOR (Solo usuarios con is_admin = 1)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(function () {
    
    // Panel Principal
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // --- GESTIÓN DE NOTICIAS ---
    
    // 1. NUEVA RUTA: La tabla del administrador
    Route::get('/admin/posts', [PostController::class, 'adminIndex'])->name('admin.posts.index');
    
    // 2. El resto del CRUD (Crear, Guardar, Editar, Borrar)
    // Nota: 'index' ya no lo usamos de aquí, usamos la línea de arriba.
    Route::resource('posts', PostController::class)->except(['index', 'show']);
    // --- GESTIÓN DE MENSAJES ---
    Route::get('/admin/mensajes', [AdminController::class, 'messages'])->name('admin.messages');
    Route::patch('/admin/mensajes/{id}/toggle', [AdminController::class, 'toggleReadStatus'])->name('admin.messages.toggle');

    // --- GESTIÓN DE USUARIOS ---
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users.index');
    Route::get('/admin/users/{id}', [AdminController::class, 'showUser'])->name('admin.users.show');
    Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/admin/users/{id}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');

    // --- GESTIÓN DE SERVICIOS (CRUD) ---
    // Asumiendo que tienes un ServiceController para el admin
    // Si usas otro nombre, cámbialo aquí.
    Route::resource('/admin/services', ServiceController::class)->names('admin.services');

});

// Rutas de Autenticación (Login, Registro, etc.) de Laravel Breeze
require __DIR__.'/auth.php';