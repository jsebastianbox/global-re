<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquiposElectronicosTable extends Model
{
    use HasFactory;
    private $fillable = [
        'todo_riesgo',
        'portadores_externos',
        'incremento_costos',
        'limite_diario',
        'periodo_cobertura',
        'total_cuadro1',
        'todo_riesgo2',
        'portadores_externos2',
        'incremento_costos2',
        'total_cuadro2',
        'slip_id',
        'limite_indemnizacion',
        'asegurable_electronico',
        'asegurada_electronico',
    ];

    public function slip() {
        return $this->belongsTo(Slip::class);
    }
    
}
