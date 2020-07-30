<?php

use Illuminate\Support\Facades\Route;

use Advoor\NovaEditorJs\Http\Controllers\EditorJsLinkController;
use Advoor\NovaEditorJs\Http\Controllers\EditorJsFileUploadController;
use Advoor\NovaEditorJs\Http\Controllers\EditorJsImageUploadController;

Route::post('upload/attaches', EditorJsFileUploadController::class . '@file')->name('editor-js-file-upload');
Route::post('upload/file', EditorJsImageUploadController::class . '@file')->name('editor-js-upload-image-by-file');
Route::post('upload/url', EditorJsImageUploadController::class . '@url')->name('editor-js-upload-image-by-url');
Route::get('fetch/url', EditorJsLinkController::class . '@fetch')->name('editor-js-fetch-url');
