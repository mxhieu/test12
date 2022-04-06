<?php

namespace Modules\KPI\Entities;

use Illuminate\Database\Eloquent\Model;

class KpiAssignUser extends Model
{
    use SoftDeletes;

    protected $table = 'kpi_assign_user';

    protected $fillable = ['cfg_employee_id', 'kpi_term_id', 'created_id', 'updated_id'];

    public function getAll(){
        return $this->orderBy('created_at')->get();
    }
}
