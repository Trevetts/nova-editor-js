<?php

namespace Advoor\NovaEditorJs\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
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

        $file = $request->file('file');
        
        if (!$file->isValid()) {
            return [
                'success' => 0
            ];
        }

        $name = $file->getClientOriginalName();

        $path = $request->file('file')->store(
            config('nova-editor-js.toolSettings.attaches.path'),
            config('nova-editor-js.toolSettings.attaches.disk')
        );

        $size = Storage::size($path);

        return [
            'success' => 1,
            'file' => [
                'name' => $name,
                'url' => $path,
                'size' => $size,
            ]
        ];
    }
    


}
