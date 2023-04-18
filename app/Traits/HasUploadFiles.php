<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HasUploadFiles
{
    public $basePath = "";

    public function getPath(string $reasource)
    {
        return $this->basePath . "/" . $reasource;
    }

    public function forceDir(string $path, ?bool $full = false)
    {

        $pathToCheck = $full ? $path : "app/{$path}";
        if (!is_dir($pathDir = storage_path($pathToCheck))) {
            mkdir($pathDir, 0755, true);
        }
    }

    public function saveFile($file, $path, $fileName = null, $public = false)
    {
        $this->forceDir($path);

        $fileName = $fileName ??  $file->getClientOriginalName();
        $fileName = str_replace(' ', '_', $fileName);

        $file_exists = $this->getFile($path . '/' . $fileName);
        $extension = $this->getExtension($file);
        $fileName = $fileName . "." . $extension;
        if ($file_exists) {
            return null;
        }
        if (!$public) {
            $file->storeAs($path, $fileName);

            return;
        } else {
            $file->storeAs($path, $fileName, 'public');
        }

        return [
            "name" => $fileName,
            "url" => Storage::url(($public ? 'public/' : '') . $path . '/' . $fileName)
        ];
    }

    public function getExtension($file)
    {
        $originalName = $file->getClientOriginalName();
        $ext = explode('.', $originalName);
        return end($ext);
    }
    public function getExtensionFromName(string $file)
    {
        $name = explode('/', $file);
        $ext = explode('.', end($name));
        return end($ext);
    }

    public function removeOldersFiles($storagePath)
    {
        $previous = glob(storage_path('app/' . $storagePath));
        foreach ($previous as $files) {
            unlink($files);
        }
    }

    public function removeFile($storage_path)
    {
        $file = $this->getFile($storage_path);
        if ($file) {
            unlink($file);
            return true;
        } else {
            return false;
        }
    }
    public function getFiles($storage_path)
    {
        return glob(storage_path($storage_path));
    }
    public function removeDir($storage_path)
    {
        $files = $this->getFiles($storage_path);
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
    }

    public function removeDirectory($path)
    {

        $pathToRemove = storage_path($path);
        if (is_dir($pathToRemove)) {
            rmdir($pathToRemove);
        }
    }

    public function getFile($storage_path): ?string
    {
        $files = $this->getFiles('app/' . $storage_path);
        return count($files) > 0 ? $files[0] : null;
    }

    public function getFileFile($storage_path)
    {
        $file = $this->getFile($storage_path);
        return $file ? file_get_contents($file) : null;
    }

    public function getBase64FromFile($file): ?string
    {
        return base64_encode(file_get_contents($file));
    }

    public function getBase64($storage_path): ?string
    {
        $file = $this->getFile($storage_path);
        if (!$file) {
            return null;
        }
        return base64_encode(file_get_contents($file));
    }

    public function getUrlFile($storage_path)
    {
        $file = $this->getFile("$storage_path/*.*");
        $fileName = basename($file);
        if ($file) {
            return [
                "name" => $fileName,
                "value" => Storage::url('public/' . $storage_path . '/' . $fileName),
                "url" => true
            ];
        }
        return null;
    }
    public function copyFile(string $located_path, string $to_copy_path)
    {
        copy(storage_path($located_path), storage_path($to_copy_path));
    }
}
