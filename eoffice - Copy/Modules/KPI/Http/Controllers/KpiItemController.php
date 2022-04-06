<?php

namespace Modules\KPI\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\KPI\Entities\KpiForm;
use Modules\KPI\Entities\KpiGroup;
use Modules\KPI\Entities\KpiCategory;
use Modules\KPI\Entities\KpiItem;
use Modules\KPI\Http\Controllers\BaseController;
use Yajra\Datatables\Datatables;
class KpiItemController extends BaseController
{
    public function __construct(){
        $this->KpiForm = new KpiForm();
        $this->KpiGroup = new KpiGroup();
        $this->KpiCategory = new KpiCategory();
        $this->KpiItem = new KpiItem();
    }

    public function datatables($formId){
        $list = $this->KpiItem->getAll($formId);
        foreach($list as $row){
            $row->type = $row->kpiCategory->name.' - '.$row->kpiGroup->name;
            $row->type_id =(["kpi_category_id" => $row->kpiCategory->id, "kpi_group_id" => $row->kpiGroup->id]);
        }
        return Datatables::of($list)
        ->addColumn('action', function ($list) {
            return '<a href="'.route('kpi.item.edit', $list->id).'" class="btn btn-xs btn-warning">
                        <i class="fa fa-eye"></i> Edit</a>
                    <a href="javascript:void(0)" data-link="'.route('kpi.item.destroy', $list->id).'" class="btn btn-xs btn-danger btn-delete">
                        <i class="fa fa-times"></i> Delete</a>';
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request, $formId)
    {
        $form = $this->KpiForm->findOrFail($formId);
        $kpiGroup = $this->KpiGroup->getAll();
        $kpiCategory = $this->KpiCategory->getAll();
        $data = [
            'kpiGroup' => $kpiGroup,
            'kpiCategory' => $kpiCategory,
            'form' => $form
        ];
        return view('kpi::form.detail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('kpi::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $formId)
    {
        $params = $request->all();
        $params['created_id'] = $this->getAdmin()->id;
        $params['kpi_form_id'] = $formId;
        $params['code'] = $this->generateCode('KPI-ITEM-');
        try{
            $this->KpiItem->create($params);
            return $this->success('kpi.item.index', $formId);
        }catch (\Exception $e) {
            return $this->error('kpi.item.index', $formId);
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
        $info = $this->KpiItem->with('kpiForm')->findOrFail($id);
        $kpiGroup = $this->KpiGroup->getAll();
        $kpiCategory = $this->KpiCategory->getAll();
        $data = [
            'kpiGroup' => $kpiGroup,
            'kpiCategory' => $kpiCategory,
            'info' => $info
        ];
        return view('kpi::form.detail.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $info = $this->KpiItem->with('kpiForm')->findOrFail($id);
        if($request->isMethod('put')){
            try{
                $params = $request->all();
                $params['updated_id'] = $this->getAdmin()->id;
                $info->fill($params);
                $info->save();
                return $this->success('kpi.item.index',$info->kpiForm->id);
            }catch (\Exception $e) {
                return $this->error('kpi.item.index',$info->kpiForm->id);
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
            $info = $this->KpiItem->findOrFail($id);
            $info->delete();
            return ['status' => true, 'msg' => 'xóa thành công "' .$info->name.'"', 'data' => []];
        }catch (\Exception $e) {
            return ['status' => false, 'msg' => 'Có lỗi xảy ra vui lòng thực hiện lại', 'data' => []];
        }
    }
}
