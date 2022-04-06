<?php

namespace Modules\KPI\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KpiAssignGroup extends Model
{
    use SoftDeletes;

    protected $table = 'kpi_assign_group';

    protected $fillable = ['cfg_employee_group_id', 'kpi_term_id', 'created_id', 'updated_id'];

    public function getAll(){
        return $this->orderBy('created_at')->get();
    }
}
