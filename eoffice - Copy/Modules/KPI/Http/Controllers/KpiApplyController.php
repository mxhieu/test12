<?php

namespace Modules\KPI\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\KPI\Entities\KpiApply;
use Modules\KPI\Entities\KpiTerm;
use Modules\KPI\Entities\KpiForm;
use Modules\KPI\Http\Controllers\BaseController;
use Yajra\Datatables\Datatables;

class KpiApplyController extends BaseController
{

    public function __construct(){
        $this->KpiApply = new KpiApply();
        $this->KpiTerm = new KpiTerm();
        $this->KpiForm = new KpiForm();
    }

    public function datatables($termId){
        $list = $this->KpiApply->where('kpi_term_id', $termId)->with(['form', 'employeeGroup', 'employee'])->get();
        return Datatables::of($list)
        ->addColumn('action', function ($list) {
            return '<a href="#" class="btn btn-xs btn-success load-kpi-form" data-id="'.$list->kpi_form_id.'" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-info"> Tạo đánh giá</i></a>';
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($termId)
    {
        $termInfo = $this->KpiTerm->with('group')->find($termId);
        $forms = $this->KpiForm->getAll();
        $data['termInfo'] = $termInfo;
        $data['forms'] = $forms;
        return view('kpi::term.apply.index', $data);
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
    public function store(Request $request, $termId)
    {
        $params = $request->all();
        $params['created_id'] = $this->getAdmin()->id;
        $params['kpi_term_id'] = $termId;
        try{
            $this->KpiApply->create($params);
            return $this->success('kpi.term.detail', $termId);
        }catch (\Exception $e) {
            return $this->error('kpi.term.detail', $termId);
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($termId)
    {
        
        return view('kpi::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('kpi::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
