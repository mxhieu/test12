<?php

namespace Modules\KPI\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\KPI\Entities\KpiTerm;
use Modules\KPI\Entities\KpiAssignGroup;
use Modules\KPI\Entities\EmployeeGroup;
use Modules\KPI\Http\Controllers\BaseController;
use Yajra\Datatables\Datatables;


class KpiTermController extends BaseController
{    
    public function __construct(){
        $this->KpiTerm = new KpiTerm();
        $this->EmployeeGroup = new EmployeeGroup();
        $this->KpiAssignGroup = new KpiAssignGroup();
    }

    public function datatables(){
        $list = $this->KpiTerm->getAll();
        return Datatables::of($list)
        ->addColumn('action', function ($list) {
            return '<a href="'.route('kpi.term.edit', $list->id).'" class="btn btn-xs btn-warning">
                        <i class="fa fa-eye"></i> View</a>
                    <a href="'.route('kpi.term.detail', $list->id).'" class="btn btn-xs btn-success">
                        <i class="fa fa-info"></i> Detail</a>
                    <a href="javascript:void(0)" data-link="'.route('kpi.term.destroy', $list->id). '" class="btn btn-xs btn-danger btn-delete">
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
        $data['group'] = $this->EmployeeGroup->getAll();
        return view('kpi::term.index', $data);
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
        $arrTime = explode(' - ', $params['datetimes']);
        $params['start_at'] = $this->formatTime($arrTime[0]);
        $params['end_at'] = $this->formatTime($arrTime[1]);
        $params['created_id'] = $this->getAdmin()->id;
        try{
            $term = $this->KpiTerm->create($params);
            $assignGroup = [];
            foreach($params['cfg_employee_group_id'] as $key => $row){
                $assignGroup[$key]['cfg_employee_group_id'] = $row;
                $assignGroup[$key]['kpi_term_id'] = $term->id;
                $assignGroup[$key]['created_id'] = $this->getAdmin()->id;
            }
            $this->KpiAssignGroup->insert($assignGroup);
            return $this->success('kpi.term.index');
        }catch (\Exception $e) {
            return $this->error('kpi.term.index');
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
        $info = $this->KpiTerm->findOrFail($id);
        $data['info'] = $info;
        return view('kpi::term.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $info = $this->KpiTerm->findOrFail($id);
        if($request->isMethod('put')){
            try{
                $params = $request->all();
                $params['updated_id'] = $this->getAdmin()->id;
                $info->fill($params);
                $info->save();
                return $this->success('kpi.term.index');
            }catch (\Exception $e) {
                return $this->error('kpi.term.index');
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
            $info = $this->KpiTerm->findOrFail($id);
            $info->delete();
            return ['status' => true, 'msg' => 'xóa thành công "' .$info->name.'"', 'data' => []];
        }catch (\Exception $e) {
            return ['status' => false, 'msg' => 'Có lỗi xảy ra vui lòng thực hiện lại', 'data' => []];
        }
    }
}