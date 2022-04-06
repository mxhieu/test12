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
                            <form action="{{route('kpi.item.store', $form->id)}}" method="post">
                                {{ csrf_field() }}
                                <div class="row col-9">
                                    <div class="form-group col-6">
                                        <label class="control-label">Tên biểu mẫu</label>
                                        <input type="text" name="name" class="form-control" placeholder="KPI abc...">
                                    </div>
                                    <div class="form-group col-3">
                                        <label class="control-label">Trọng số</label>
                                        <input type="text" name="weight" class="form-control" placeholder="100, 200...">
                                    </div>
                                    <div class="form-group col-3">
                                        <label class="control-label">Đơn vị</label>
                                        <input type="text" name="unit" class="form-control" placeholder="task, thời gian...">
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="control-label">Loại biểu mẫu</label>
                                        <select name="kpi_category_id" class="form-control">
                                            @foreach($kpiGroup as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="control-label">Nhóm biểu mẫu</label>
                                        <select name="kpi_group_id" class="form-control">
                                            @foreach($kpiCategory as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-12">
                                        <label class="control-label">Nội dung</label>
                                        <textarea name="content"  class="form-control" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Lưu</button>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane active" id="list" role="tabpanel">
                        <div class="card-body">
                            <div class="col-md-12">
                                <div id="result-alert"></div>
                                <table class="table" id="taskgroup-table">
                                    <thead class="bg-info text-white">
                                        <tr>
                                            <th>#</th>
                                            <th>Tên</th>
                                            <th>Type</th>
                                            <th>Type ID</th>
                                            <th>Mã</th>
                                            <th>Loại</th>
                                            <th>Nhóm</th>
                                            <th>Trọng số</th>
                                            <th>Đơn vị</th>
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
        <div class="modal fade" id="addItem">
            <div class="modal-dialog">
              <div class="modal-content">
                <form method="post" action="{{route('kpi.item.store', $form->id)}}">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm Item</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group col-12">
                            <label class="control-label">Tên biểu mẫu</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="KPI abc...">
                        </div>
                        <div class="form-group col-12">
                            <label class="control-label">Loại biểu mẫu</label>
                            <select class="form-control" name="kpi_category_id" id="kpi_category_id">
                                @foreach($kpiGroup as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label class="control-label">Trọng số</label>
                            <input type="text" id="weight" name="weight" class="form-control" placeholder="100, 200...">
                        </div>
                        <div class="form-group col-12">
                            <label class="control-label">Đơn vị</label>
                            <input type="text" id="unit" name="unit" class="form-control" placeholder="task, thời gian...">
                        </div>
                        <div class="form-group col-12">
                            <input type="hidden" name="kpi_category_id" value="1" class="form-control" placeholder="task, thời gian...">
                        </div>
                        <div class="form-group col-12">
                            <input type="hidden" name="kpi_group_id" value="1" class="form-control" placeholder="task, thời gian...">
                        </div>
                        <div class="form-group col-12">
                            <label class="control-label">Nội dung</label>
                            <textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Lưu</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
              </div>
            </div>
        </div>
        <footer class="footer"> © 2019</footer>
    </div>
@endsection
@push('script')
<script>
    $(document).ready(function() {
        $('#taskgroup-table').DataTable({
            processing: false,
            serverSide: true,
            ajax: '{!! route('kpi.item.datatables', $form->id) !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'type', name: 'type' },
                { data: 'type_id', name: 'type_id' },
                { data: 'code', name: 'code' },
                { data: 'kpi_category.name', name: 'kpi_category.name' },
                { data: 'kpi_group.name', name: 'kpi_group.name' },
                { data: 'weight', name: 'weight' },
                { data: 'unit', name: 'unit' },
                { data: 'action', name: 'action' },
            ],
            order: [[2, 'asc']],
            "drawCallback": function ( settings ) {
                var api = this.api();
                var rows = api.rows( {page:'current'} ).nodes();
                var last = null;
                api.column(6, {page:'current'} ).data().each( function ( group, i ) {
                    if ( last !== group ) {
                        let cateAndGroupItem = $(rows).eq(i).find('td:eq(5)').html()
                        $(rows).eq( i ).before(
                            `<tr class="group" style="background: #d6d6d6">
                                <td colspan="8"><strong class="text-center">`+group+`</strong>
                                    <a data-toggle="modal" data-target="#addItem" href="" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> Add</a>
                                </td>
                            </tr>`
                        );
                        last = group;
                    }
                } );
            },
            "columnDefs": [
                {
                    "targets": [ 2 ],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [ 3 ],
                    "visible": false,
                    "searchable": false
                }
            ]
        });


    });


</script>
@endpush