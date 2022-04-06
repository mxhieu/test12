<?php

namespace Modules\KPI\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KpiApply extends Model
{
    use SoftDeletes;

    protected $table = 'kpi_apply';

    protected $fillable = ['kpi_term_id', 'kpi_form_id', 'cfg_employee_group_id', 'cfg_employee_id', 'goal', 'created_id', 'updated_id'];

    public function getAll(){
        return $this->orderBy('created_at')->get();
    }

    public function form(){
        return $this->belongsTo(KpiForm::class, 'kpi_form_id', 'id');
    }

    public function employeeGroup(){
        return $this->belongsTo(EmployeeGroup::class, 'cfg_employee_group_id', 'id');
    }

    public function employee(){
        return $this->belongsTo(Employee::class, 'cfg_employee_id', 'id');
    }
}
