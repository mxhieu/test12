<?php

namespace Modules\KPI\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KpiEvalute extends Model
{
    use SoftDeletes;

    protected $table = 'kpi_category';

    protected $fillable = ['name', 'kpi_item_id', 'min', 'max', 'result', 'created_id', 'updated_id'];

    public function getAll(){
        return $this->orderBy('created_at')->get();
    }
}
