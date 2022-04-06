<?php

namespace Modules\KPI\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KpiTerm extends Model
{
    use SoftDeletes;

    protected $table = 'kpi_term';

    protected $fillable = ['name','cfg_employee_group_id', 'start_at', 'end_at', 'remark', 'created_id', 'updated_id'];

    public function getAll(){
        return $this->orderBy('created_at')->with(['group'])->get();
    }

    public function group(){
        return $this->belongsTo(EmployeeGroup::class, 'cfg_employee_group_id', 'id')->with('details');
    }
}
