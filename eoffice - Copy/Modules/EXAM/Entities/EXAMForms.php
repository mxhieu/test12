<?php

namespace Modules\EXAM\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EXAMForms extends Model
{
    use SoftDeletes;

    protected $table = 'exam_forms';

    protected $fillable = ['name', 'code', 'remark', 'created_id', 'updated_id'];

    public function getAll(){
        return $this->orderBy('created_at')->get();
    }
}
