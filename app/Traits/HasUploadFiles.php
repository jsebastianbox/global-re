<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

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
    public function keysFiles($case)
    {
        $keys = [];
        switch ($case) {
            case 'vida':
                $keys[] = "accidentRate";
                break;
            case 'activos_fijos':
                $keys[] = "quote_form_file";
                $keys[] = "inspection_control_file";
                $keys[] = "machine_list_file";
                $keys[] = "devices_list_file";
                $keys[] = "desglose_file";
                $keys[] = "accidentRate";
                break;
            case 'vehiculos':
                $keys[] = "accidentRate";
                $keys[] = "informe";
                break;
            case 'tecnico':
                $keys[] = "coverageDetail";
                $keys[] = "accidentRate";
                $keys[] = "schedule";
                $keys[] = "soilStudy";
                $keys[] = "quotationForm";
                $keys[] = "experience";
                $keys[] = "workMemory";
                break;
            case 'energia':
                $keys[] = "coverageDetail";
                $keys[] = "accidentRate";
                $keys[] = "valueDetail";
                $keys[] = "petroleumDenValue";
                $keys[] = "report";
                $keys[] = "anualIncome";
                $keys[] = "employees";
                $keys[] = "vehicles";
                $keys[] = "payroll";
                $keys[] = "dailyProduction";
                $keys[] = "barrelValue";
                break;
            case 'responsabilidad':
                $keys[] = "accidentRate";
                $keys[] = "quotationReport";
                $keys[] = "financialStatements";
                break;
            case 'riesgo':
                $keys[] = "accidentRate";
                $keys[] = "quotationReport";
                $keys[] = "financialStatements";
                break;
            case 'aviacion_1':
                $keys[] = "modelMakeHours";
                $keys[] = "accidentRate";
                $keys[] = "otherForms";
                $keys[] = "crFormSigned";
                $keys[] = "pilotExperienceFormSigned";
                break;
            case 'aviacion_2':
                $keys[] = "pilotos";
                $keys[] = "signedForm";
                $keys[] = "medicTest";
                break;
            case 'aviacion_3':
                $keys[] = "crFormSigned";
                break;
            case 'maritimo_1':
                $keys[] = "copiaMatricula";
                $keys[] = "informeInspeccion";
                $keys[] = "accidentRate";
                $keys[] = "siniestralidad_armador";
                $keys[] = "otrasEmbarcaciones";
                $keys[] = "experienciaArmador";
                $keys[] = "detalleMantenimiento";
                $keys[] = "tripulacionInfo";
                $keys[] = "detalleLicencia";
                $keys[] = "detalleViajeFile";
                $keys[] = "detalleValorReemplazo";
                $keys[] = "formularioFirmado";
                break;
            case 'maritimo_2':
                $keys[] = "copiaMatricula";
                $keys[] = "informeInspeccion";
                $keys[] = "siniestralidadCincoAnios";
                $keys[] = "siniestralidad_armador";
                $keys[] = "otrasEmbarcaciones";
                $keys[] = "experienciaArmador";
                $keys[] = "detalleMantenimiento";
                $keys[] = "tripulacionInfo";
                $keys[] = "detalleLicencia";
                $keys[] = "detalleViajeFile";
                $keys[] = "detalleValorReemplazo";
                $keys[] = "formularioFirmado";
                break;
            case 'maritimo_3':
                $keys[] = "report";
                $keys[] = "signedForm";
                $keys[] = "accidentRate";
                break;
            case 'maritimo_4':
                $keys[] = "quotationForm";
                break;
            default:
                break;
        }
        return $keys;
    }
    public function chargeFilesIntoView(string $slip_route, $case, $id, View $view): View
    {
        foreach ($this->keysFiles($case) as $key) {
            $file = $this->getFile("slips/" . $slip_route . "/" . $id . "/" . $key . ".*");
            $view->with($key . "Extension", $file ? $this->getExtensionFromName($file) : null);
            $view->with($key, $file ? $this->getBase64FromFile($file) : null);
        }
        return $view;
    }
    public function saveFilesFromRequest(Request $request, string $basePath, string $case, $id, string $route = null)
    {
        $route = $route ?? $case;
        foreach ($this->keysFiles($case) as $key) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $this->saveFile($file, $this->getPath($basePath . '/' . $route . '/' . $id), $key);
            }
        }
    }
}
