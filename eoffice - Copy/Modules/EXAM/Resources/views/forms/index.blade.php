@extends('layouts.master')
@section('content')
    @include('exam::menu')
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
                                    <div class="form-group col-12">
                                        <label class="control-label">Bộ câu hỏi</label>
                                        <input type="text" id="firstName" name="name" class="form-control" placeholder="Bộ câu hỏi abc...">
                                    </div>
                                    <div class="form-group col-12">
                                        <label class="control-label">Ghi chú</label>
                                        <textarea class="form-control" name="remark" id="" cols="30" placeholder="Bộ câu hỏi bao gồm..." rows="10"></textarea>
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
                                            <th>Code</th>
                                            <th>Bộ câu hỏi</th>
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
@push('script')
<script>
    $(function() {
        $('#taskgroup-table').DataTable({
            processing: false,
            serverSide: true,
            ajax: '{!! route('exam.forms.datatables') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'code', name: 'code' },
                { data: 'name', name: 'name' },
                { data: 'action', name: 'action' },
            ]
        });
    });


</script>
@endpush