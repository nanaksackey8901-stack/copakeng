<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::livewire('members', 'pages.members.members')->name('members');
});
    Route::livewire('members/show/{id}', 'pages.members.show')->name('members.show');
    Route::livewire('members/create', 'pages.members.create')->name('members.create');
    Route::livewire('/', 'pages.members.guest')->name('members.guest');

require __DIR__.'/settings.php';
