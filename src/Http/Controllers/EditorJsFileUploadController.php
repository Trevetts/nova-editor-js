<?php

namespace Advoor\NovaEditorJs\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Laravel\Nova\Http\Requests\NovaRequest;

class EditorJsFileUploadController extends Controller
{
    /**
     * Upload file
     *
     * @param NovaRequest $request
     * @return array
     */
    public function file(NovaRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|file',
        ]);

        if ($validator->fails()) {
            return [
                'success' => 0
            ];
        }

        $path = $request->file('file')->store(
            config('nova-editor-js.toolSettings.file.path'),
            config('nova-editor-js.toolSettings.file.disk')
        );

        $this->applyAlterations(Storage::disk(config('nova-editor-js.toolSettings.file.disk'))->path($path));

        return [
            'success' => 1,
            'file' => [
                'url' => Storage::disk(config('nova-editor-js.toolSettings.file.disk'))->url($path),
            ]
        ];
    }


}
