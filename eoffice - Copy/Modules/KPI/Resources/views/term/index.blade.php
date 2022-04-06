@extends('layouts.master')
@section('content')
    @include('kpi::menu')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="card">
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link border-right" data-toggle="tab" href="#add" role="tab">Thêm mới</a> </li>
                    <li class="nav-item"> <a class="nav-link border-right active" data-toggle="tab" href="#list" role="tab">Danh sách</a> </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="add" role="tabpanel">
                        <div class="card-body">
                            <form action="" method="post">
                                {{ csrf_field() }}
                                <div class="row col-6">
                                    <div class="form-term col-12">
                                        <label class="control-label">Kỳ đánh giá</label>
                                        <input type="text" id="firstName" name="name" class="form-control" placeholder="KPI abc...">
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="control-label">Nhóm thực hiện</label>
                                        <select style="display: block;width:100%" multiple="multiple" name="cfg_employee_group_id[]" class="form-control group_employee" id="cfg_employee_group_id">
                                            @foreach($group as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Time</label>
                                            <div class='input-group mb-3'>
                                                <input type="text" name="datetimes" class="form-control"/>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <span class="ti-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-term col-12">
                                        <label class="control-label">Ghi chú</label>
                                        <textarea class="form-control" name="remark" id="" cols="30" placeholder="KPI bao gồm..." rows="10"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Lưu</button>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane active" id="list" role="tabpanel">
                        <div class="card-body">
                            <div class="col-md-9">
                                <div id="result-alert"></div>
                                <table class="table" id="taskgroup-table">
                                    <thead class="bg-info text-white">
                                        <tr>
                                            <th>#</th>
                                            <th>Kỳ đánh giá</th>
                                            <th>Nhóm</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer"> © 2019</footer>
    </div>
@endsection
@push('style')
<link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endpush
@push('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript" src="{{asset('assets/plugins/daterangepicker/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script>
    $(function() {
        $('#taskgroup-table').DataTable({
            processing: false,
            serverSide: true,
            ajax: '{!! route('kpi.term.datatables') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'group.name', name: 'group.name' },
                { data: 'action', name: 'action' },
            ],
            "columnDefs": [
                {
                    "targets": [ 4 ],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [ 5 ],
                    "visible": false,
                    "searchable": false
                }
            ]
        });
    });
    $('input[name="datetimes"]').daterangepicker({
        timePicker: true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
            format: 'DD/MM/YYYY HH:mm:ss'
        }
    });
    $(document).ready(function() {
        $('.group_employee').select2();
    });
    
</script>
@endpush