<?php

namespace Modules\Core\Helpers;

use Auth;
use Illuminate\Http\Request;
use Storage;

trait HasUpload
{
    private function upload($file, $oldFile = null)
    {
        if (is_file($file)){
            $ext = $file->getClientOriginalExtension();
            $filename = now()->timestamp.'.'.$ext;

            $path = 'uploads/' . Auth::id() . date('/y') . '/' . date('m') . '/';
            $filePath = $path.$filename;

            $oldFile = str($oldFile)->remove('storage/');
            if($oldFile) {
                if (Storage::disk(config('filesystems.default'))->exists($oldFile)) {
                    Storage::disk(config('filesystems.default'))->delete($oldFile);
                }
            }

            Storage::disk(config('filesystems.default'))->put($filePath, file_get_contents($file));

            return 'storage/'.$filePath;
        }
        return null;
    }

    public function deleteFile($path)
    {
        $path = str($path)->remove('storage');
        if (Storage::disk(config('filesystems.default'))->exists($path)) {
            Storage::disk(config('filesystems.default'))->delete($path);
        }
    }
}
