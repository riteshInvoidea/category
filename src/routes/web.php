<?php
use Invoidea\Categorymodule\Controllers\CategoryController;

Route::get('category',[CategoryController::class, 'index']);
