<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Coverage;

class Slip extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_coverage',
        'country_id',
        'date',
        'broker',
        'assignor', //cedente
        'insurer', //asegurador
        'sector',
        'direction',
        'activity',
        'validity_since', //vigencia desde
        'validity_until', //vigencia hasta
        'clarification', //aclaracion 1-m
        'reinsurer_rate', //tasa/prima de resagurador
        'deduction', //deducciones
        'note_sinester', //notificacion de siniestros
        'politics_country_one', //ley y juridicion
        'placement_scheme', //esquema de colocalacion
        'reinsurance_withholding', //retencion de resaguros
        'reinsurance_assignment', //cesion de resaguros
        'reinsurance_condition', //condicion de resaguros
        'subject', //sujeto
        'information',
        'type_coverage', //cobertura
        'user_id', //tecnico asignado
        'siniestralidad',
        'reinsurance_premium', //prima de resaguro
        'coin', //tipo de moneda
        //nuevos puestos por juanse
        'insuranceBroker', //Intermediario de seguros
        'retrocedente', //retrocedente
        'accidentRate', //siniestralidad 5 años
        'limit_compensation',
        'retention_porcentage_one', //retencion de resaguros
        'retention_porcentage_two',
        'cesion_porcentage_one', //cesion de resaguros
        'cesion_porcentage_two',
        'coberturas_selectors',
        'clausulas_selectors',
        'object_insurance',
        'object_insured',
        'person_insured',
        'coverage',
        'main_risk',
        'insured_sum',
        'insurable_sum',
        'insured_value',
        'object_insured_value',
        'person_insured_value',
        'insurable_value',
        'insured_sum',
    ];

    public function model()
    {
        return $this->morphTo();
    }

    public function reinsurance_management()
    {
        return $this->hasMany(ReinsuranceManagement::class);
    }

    public function type()
    {
        return $this->belongsTo(TypeCoverage::class, 'type_coverage');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function country_politics_one()
    {
        return $this->belongsTo(Country::class, 'politics_country_one');
    }

    /* public function country_politics_two()
    {
    return $this->belongsTo(Country::class, 'politics_country_two');
    } */

    public function security()
    {
        return $this->hasMany(Security::class);
    }

    public function guarantee_payment()
    {
        return $this->hasMany(GuaranteePayment::class);
    }

    public function deductible()
    {
        return $this->hasMany(DeductibleSlip::class);
    }

    public function coverage()
    {
        return $this->hasMany(CoverageSlip::class);
    }

    public function limit_coverage()
    {
        return $this->hasMany(CoverageLimit::class);
    }

    public function coverage_additional()
    {
        return $this->hasMany(AdditionalCoverage::class);
    }

    public function clause_aditional()
    {
        return $this->hasMany(ClauseSlip::class);
    }

    public function excluye()
    {
        return $this->hasMany(ExclusionSlip::class);
    }

    public function limit_insured()
    {
        return $this->hasMany(LimitInsured::class);
    }

    public function file()
    {
        return $this->morphMany(File::class, 'model');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function calculation_modal()
    {
        return $this->belongsTo(CalculationModal::class);
    }

    public function information_reinsurance()
    {
        return $this->hasMany(InformationReinsurance::class);
    }

    public function slip_status()
    {
        return $this->hasMany(SlipStatus::class);
    }
    public function slipType()
    {
        return $this->belongsTo(SlipType::class);
    }
    public function slipStatus()
    {
        return $this->belongsTo(SlipStatus::class);
    }
    
    //Ricardo

    public function sumAssured()
    {
        return $this->hasMany(SumAssured::class);
    }
    public function coverageSelector()
    {
        return $this->belongsToMany(CoberturasSelector::class);
    }
    public function clausuleSelector()
    {
        return $this->belongsToMany(Clausulas_selector::class);
    }
    public function coverages()
    {
        return $this->hasMany(CoverageSlip::class);
    }
    public function clausules()
    {
        return $this->hasMany(ClauseSlip::class);
    }
    public function predios()
    {
        return $this->hasMany(DetailPerdios::class);
    }
    public function deducible()
    {
        return $this->hasMany(DeductibleSlip::class);
    }
    // public function type_coverage()
    // {
    //     return $this->belongsTo(TypeCoverage::class);
    // }
    public function equipos_electronicos()
    {
        return $this->hasMany(EquiposElectronicosTable::class);
    }
}
