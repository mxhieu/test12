@extends('layouts.master')
@section('content')
    @include('kpi::menu')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="card">
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link border-right active" data-toggle="tab" href="#add" role="tab">Thêm mới</a> </li>
                    <li class="nav-item"> <a class="nav-link border-right" data-toggle="tab" href="#group{{$termInfo->group->id}}" role="tab">{{$termInfo->group->name}}</a> </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="add" role="tabpanel">
                        <div class="card-body">
                            <div class="col-md-6">
                                <div class="card card-outline-success">
                                    <div class="card-header"><h4 class="mb-0 text-white">Thông tin card</h4></div>
                                    <div class="card-body">
                                        <h3 class="card-title">{{$termInfo->name}}
                                        <p style="margin:0" class="card-text">Khoản thời gian: {{$termInfo->start_at}} - {{$termInfo->end_at}}</p>
                                        <p class="card-text">Nhóm thực hiện: {{$termInfo->group->name}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="group{{$termInfo->group->id}}" role="tabpanel">
                        
                    

                        <div class="card-body">
                            <div class="card">
                                <ul class="nav nav-tabs profile-tab" role="tablist">
                                    <li class="nav-item"> <a class="nav-link border-right  active" data-toggle="tab" href="#form" role="tab">Danh sách biểu mẫu</a> </li>
                                    <li class="nav-item"> <a class="nav-link border-right" data-toggle="tab" href="#evaluate" role="tab">Danh sách đánh giá</a> </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="form" role="tabpanel">
                                        <div class="card-body">
                                            <form action="{{route('kpi.termdetail.store', $termInfo->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                <div class="row col-12">
                                                    <div class="form-group col-9">
                                                        <label class="control-label">Biểu mẫu</label>
                                                        <select style="display:inline-block; width: 80%" class="form-control" name="kpi_form_id">
                                                            @foreach($forms as $row)
                                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <button style="display:inline-block" class="btn btn-success">Chọn</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="row col-9">
                                                <table style="width: 100%" class="table" id="kpi-apply-table">
                                                    <thead class="bg-info text-white">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Tên biểu mẫu</th>
                                                            <th>Số lượng</th>
                                                            <th>Hành động</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="evaluate" role="tabpanel">
                                        <div class="card-body">
                                            <div class="col-md-12">
                                                <table class="table" id="evaluate-form">
                                                    <thead class="bg-info text-white">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Mã</th>
                                                            <th>Loại</th>
                                                            <th>Nhóm</th>
                                                            <th>Nhân sự </th>
                                                            <th>min</th>
                                                            <th>max</th>
                                                            <th>Kết quả</th>
                                                            <th>Đơn vị</th> 
                                                            <th>Hành động</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>KPI-ITEM-201228611	</td>
                                                            <td>Loại biểu mẫu đánh chất lượng code	</td>
                                                            <td>Nhóm đánh giá A</td>
                                                            <td>Nguyễn Văn A</td>
                                                            <td>5</td>
                                                            <td>1000</td>
                                                            <td>500</td>
                                                            <td>Dòng</td>
                                                            <td><a href="#" class="btn btn-xs btn-success" data-toggle="modal" data-target="#modalResult">
                                                                <i class="fa fa-info">Thêm kết quả</i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>KPI-ITEM-201228798</td>
                                                            <td>Loại biểu đánh giá khả năng	</td>
                                                            <td>Nhóm đánh giá B</td>
                                                            <td>Nguyễn Văn A</td>
                                                            <td>5</td>
                                                            <td>1000</td>
                                                            <td>500</td>
                                                            <td>Dòng</td>
                                                            <td><a href="#" class="btn btn-xs btn-success" data-toggle="modal" data-target="#modalResult">
                                                                <i class="fa fa-info">Thêm kết quả</i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>KPI-ITEM-201228611	</td>
                                                            <td>Loại biểu mẫu đánh chất lượng code	</td>
                                                            <td>Nhóm đánh giá A</td>
                                                            <td>Nguyễn Văn A</td>
                                                            <td>5</td>
                                                            <td>1000</td>
                                                            <td>500</td>
                                                            <td>Dòng</td>
                                                            <td><a href="#" class="btn btn-xs btn-success" data-toggle="modal" data-target="#modalResult">
                                                                <i class="fa fa-info">Thêm kết quả</i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>KPI-ITEM-201228611	</td>
                                                            <td>Loại biểu mẫu đánh chất lượng code	</td>
                                                            <td>Nhóm đánh giá A</td>
                                                            <td>Nguyễn Văn A</td>
                                                            <td>5</td>
                                                            <td>1000</td>
                                                            <td>500</td>
                                                            <td>Dòng</td>
                                                            <td><a href="#" class="btn btn-xs btn-success" data-toggle="modal" data-target="#modalResult">
                                                                <i class="fa fa-info">Thêm kết quả</i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>KPI-ITEM-201228611	</td>
                                                            <td>Loại biểu mẫu đánh chất lượng code	</td>
                                                            <td>Nhóm đánh giá A</td>
                                                            <td>Nguyễn Văn A</td>
                                                            <td>5</td>
                                                            <td>1000</td>
                                                            <td>500</td>
                                                            <td>Dòng</td>
                                                            <td><a href="#" class="btn btn-xs btn-success" data-toggle="modal" data-target="#modalResult"><i class="fa fa-info">Thêm kết quả</i></a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer"> © 2019</footer>
    </div>

    <div class="modal" id="myModal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Kpi Đánh giá nhân sư</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
      
            <div class="modal-body">
                <form action="{{route('kpi.evaluate.store')}}" method="post" id="aaaa">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name" class="control-label">Tên đánh giá</label>
                        <input type="text" name="name" id="evaluate-name" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="employee" class="control-label">Nhân sự nhóm {{$termInfo->group->name}}</label>
                        <select name="group_id" id="group-id" class="form-control">
                            @foreach($termInfo->group->details as $row)
                            <option value="{{$row->employee->id}}">{{$row->employee->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <h2>Form đánh giá</h2>
                    <table class="table" id="create-evaluate-form">
                        <thead class="bg-info text-white">
                            <tr>
                                <th>#</th>
                                <th>Mã</th>
                                <th>Loại</th>
                                <th>Nhóm</th>
                                <th>min</th>
                                <th>max</th>
                                <th>Đơn vị</th>
                            </tr>
                        </thead>
                    </table>
                    
                </form>
            </div>
      
            <div class="modal-footer">
                <button type="button" class="btn btn-success save-evaluate">Lưu</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
      
          </div>
        </div>
      </div>

      <div class="modal" id="modalResult">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
                  <div class="modal-header">
              <h4 class="modal-title">Kết quả KPI</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
      
            <div class="modal-body">
                <table class="table" id="create-evaluate-form">
                    <thead class="bg-info text-white">
                        <tr>
                            <th>#</th>
                            <th>Mã</th>
                            <th>Loại</th>
                            <th>Nhóm</th>
                            <th>Kết quả</th>
                            <th>Ngày</th>
                            <th>Đơn vị</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>KPI-ITEM-201228798</td>
                            <td>Loại biểu đánh giá khả năng	</td>
                            <td>Nhóm đánh giá B</td>
                            <td><input type="number" value="5" class="form-control"></td>
                            <td><input type="text"class="form-control"></td>
                            <td>Dòng</td>
                        </tr>
                    </tbody>
                </table>
            </div>
      
            <div class="modal-footer">
                <button type="button" class="btn btn-success save-evaluate">Lưu</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
      
          </div>
        </div>
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
        $('#kpi-apply-table').DataTable({
            processing: false,
            serverSide: true,
            ajax: '{!! route('kpi.termdetail.datatables', $termInfo->id) !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'form.name', name: 'form.name' },
                { data: 'id', name: 'id' },
                { data: 'action', name: 'action' },
            ]
        });


        $(document).on('click', '.load-kpi-form', function(e){
            e.preventDefault()
            let formId = $(this).data('id')
            $("#create-evaluate-form").dataTable().fnDestroy()
            $("#create-evaluate-form").dataTable({
                processing: false,
                serverSide: true,
                ajax: '{!! route('kpi.item.datatables', 1) !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'code', name: 'code' },
                    { data: 'kpi_category.name', name: 'kpi_category.name' },
                    { data: 'kpi_group.name', name: 'kpi_group.name' },
                    { data: 'id', name: 'id' },
                    { data: 'id', name: 'id' },
                    { data: 'unit', name: 'unit' }
                ],
                "columnDefs": [
                    {
                        "targets": [4],
                        "render": function ( data, type, row, meta ) {
                            return '<input data-id="'+data+'" type="number" class="form-control evaluate-range" type="checkbox" name="min" />';
                        }
                    },
                    {
                        "targets": [5],
                        "render": function ( data, type, row, meta ) {
                            return '<input data-id="'+data+'" type="number" class="form-control evaluate-range" type="checkbox" name="max" />';
                        }
                    }
                ]
            });
        })

        $(document).on('click', '.save-evaluate', function(e){
            e.preventDefault()
            let evaluateName = $('#evaluate-name')
            let groupId = $('#group-id')
        })
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