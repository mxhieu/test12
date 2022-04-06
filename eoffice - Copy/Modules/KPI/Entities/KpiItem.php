<?php

namespace Modules\KPI\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KpiItem extends Model
{
    use SoftDeletes;

    protected $table = 'kpi_item';

    protected $fillable = ['name', 'kpi_form_id', 'kpi_category_id', 'kpi_group_id', 'weight', 'unit', 'content', 'created_id', 'updated_id', 'code'];

    public function getAll($formId){
        return $this->where('kpi_form_id', $formId)->orderBy('created_at')->with(['kpiCategory', 'kpiGroup'])->get();
    }

    public function kpiCategory(){
        return $this->belongsTo(KpiCategory::class, 'kpi_category_id', 'id');
    }

    public function kpiGroup(){
        return $this->belongsTo(kpiGroup::class, 'kpi_group_id', 'id');
    }

    public function kpiForm(){
        return $this->belongsTo(kpiForm::class, 'kpi_form_id', 'id');
    }
}
