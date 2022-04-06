<?php

namespace Modules\EXAM\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\EXAM\Entities\EXAMCategory;
use Modules\EXAM\Http\Controllers\BaseController;
use Yajra\Datatables\Datatables;

class ExamCategoryController extends BaseController
{
    protected $EXAMCategory;
    
    public function __construct(){
        $this->EXAMCategory = new EXAMCategory();
    }

    public function datatables(){
        $list = $this->EXAMCategory->getAll();
        return Datatables::of($list)
        ->addColumn('action', function ($list) {
            return '<a href="'.route('exam.category.edit', $list->id).'" class="btn btn-xs btn-warning">
                        <i class="fa fa-eye"></i> View</a>
                    <a href="javascript:void(0)" data-link="'.route('exam.category.destroy', $list->id). '" class="btn btn-xs btn-danger btn-delete">
                        <i class="fa fa-times"></i> Delete</a>';
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('exam::category.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
        return view('config::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $params = $request->all();
        $params['created_id'] = $this->getAdmin()->id;
        try{
            $this->EXAMCategory->create($params);
            return $this->success('exam.category.index');
        }catch (\Exception $e) {
            return $this->error('exam.category.index');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $info = $this->EXAMCategory->findOrFail($id);
        $data['info'] = $info;
        return view('exam::category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $info = $this->EXAMCategory->findOrFail($id);
        if($request->isMethod('put')){
            try{
                $params = $request->all();
                $params['updated_id'] = $this->getAdmin()->id;
                $info->fill($params);
                $info->save();
                return $this->success('exam.category.index');
            }catch (\Exception $e) {
                return $this->error('exam.category.index');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try{
            $info = $this->EXAMCategory->findOrFail($id);
            $info->delete();
            return ['status' => true, 'msg' => 'xóa thành công "' .$info->name.'"', 'data' => []];
        }catch (\Exception $e) {
            return ['status' => false, 'msg' => 'Có lỗi xảy ra vui lòng thực hiện lại', 'data' => []];
        }
    }
}
