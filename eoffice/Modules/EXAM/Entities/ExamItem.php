<?php

namespace Modules\EXAM\Entities;

use Illuminate\Database\Eloquent\Model;

class ExamItem extends Model
{
    use SoftDeletes;

    protected $table = 'exam_item';

    protected $fillable = ['name', 'exam_form_id', 'exam_category_id', 'exam_group_id', 'point', 'question', 'created_id', 'updated_id'];

    public function getAll(){
        return $this->orderBy('created_at')->get();
    }
}
