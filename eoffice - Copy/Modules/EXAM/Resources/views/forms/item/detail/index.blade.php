@extends('layouts.master')
@section('content')
    @include('exam::menu')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="mt-4 text-center">
                                <h4 class="card-title mt-2">Bài kiểm tra tháng 1/ 2021</h4>
                                <h6 class="card-subtitle">TEST-20123454</h6>
                            </div>
                        </div>
                        <div>
                            <hr> </div>
                        <div class="card-body"> <small class="text-muted">Nhóm thực hiện </small>
                            <h6>Nhóm A</h6> 
                            <small class="text-muted p-t-30 db">Bắt đầu - kết thúc</small>
                            <h6>1/1/2021 - 30/1/2021</h6> 
                        
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <ul class="nav nav-tabs profile-tab" role="tablist">
                            <li class="nav-item"> <a class="nav-link border-right" data-toggle="tab" href="#forms" role="tab">Bộ câu hỏi</a> </li>
                            <li class="nav-item"> <a class="nav-link border-right" data-toggle="tab" href="#evaluate" role="tab">Đánh giá</a> </li>
                            <li class="nav-item"> <a class="nav-link border-right" data-toggle="tab" href="#list" role="tab">Danh sách câu hỏi</a> </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="forms" role="tabpanel">
                                <div class="card-body">
                                    <span>Bộ câu hỏi: </span><select style="width: 85%; margin-bottom: 10px" class="form-control" name="" id="">
                                        <option value="">Bộ câu hỏi 1</option>
                                        <option value="">Bộ câu hỏi 2</option>
                                        <option value="">Bộ câu hỏi 3</option>
                                    </select>
                                    <span><button class="btn btn-success">Chọn</button></span>
                                    <table class="table" id="taskgroup-table">
                                        <thead class="bg-info text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>Tên</th>
                                                <th>Mã</th>
                                                <th>Loại</th>
                                                <th>Điểm</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="6" style="background: #73737363"><strong>Nhóm câu hỏi 1 <a data-toggle="modal" data-target="#addItem" class="btn btn-success ml-5" href="">Thêm</a></strong> </td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Có bao nhiêu ngôi sao trên trời ? </td>
                                                <td>QT-20123454</td>
                                                <td>Câu hỏi khó</td>
                                                <td>5</td>
                                                <td>
                                                    <a class="btn btn-warning" href="">Cập nhật</a>
                                                    <a class="btn btn-danger" href="">Xóa</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Có bao nhiêu ngôi sao trên trời ?</td>
                                                <td>QT-20123454</td>
                                                <td>Câu hỏi khó</td>
                                                <td>5</td>
                                                <td>
                                                    <a class="btn btn-warning" href="">Cập nhật</a>
                                                    <a class="btn btn-danger" href="">Xóa</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Có bao nhiêu ngôi sao trên trời ?</td>
                                                <td>QT-20123454</td>
                                                <td>Câu hỏi khó</td>
                                                <td>5</td>
                                                <td>
                                                    <a class="btn btn-warning" href="">Cập nhật</a>
                                                    <a class="btn btn-danger" href="">Xóa</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="evaluate" role="tabpanel">
                                <div class="card-body">
                                    <ul class="nav nav-tabs profile-tab" role="tablist">
                                        <li class="nav-item"> <a class="nav-link border-right" data-toggle="tab" href="#create" role="tab">Tạo đánh giá</a> </li>
                                        <li class="nav-item"> <a class="nav-link border-right" data-toggle="tab" href="#listevaluate" role="tab">Danh sách</a> </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="create" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Tên Đánh giá</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="">Loại / nhóm</label>
                                                        <select class="form-control" name="" id="">
                                                            <option value="">Nhóm 1</option>
                                                            <option value="">Nhóm 2</option>
                                                            <option value="">Nhóm 3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Min</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Max</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="tab-pane" id="listevaluate" role="tabpanel">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="list" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table" id="taskgroup-table">
                                            <thead class="bg-info text-white">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tên</th>
                                                    <th>Mã</th>
                                                    <th>Loại</th>
                                                    <th>Điểm</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Có bao nhiêu ngôi sao trên trời ? </td>
                                                    <td>QT-20123454</td>
                                                    <td>Câu hỏi khó</td>
                                                    <td>5</td>
                                                    <td>
                                                        <a class="btn btn-warning" href="">Cập nhật</a>
                                                        <a class="btn btn-danger" href="">Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Có bao nhiêu ngôi sao trên trời ?</td>
                                                    <td>QT-20123454</td>
                                                    <td>Câu hỏi khó</td>
                                                    <td>5</td>
                                                    <td>
                                                        <a class="btn btn-warning" href="">Cập nhật</a>
                                                        <a class="btn btn-danger" href="">Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Có bao nhiêu ngôi sao trên trời ?</td>
                                                    <td>QT-20123454</td>
                                                    <td>Câu hỏi khó</td>
                                                    <td>5</td>
                                                    <td>
                                                        <a class="btn btn-warning" href="">Cập nhật</a>
                                                        <a class="btn btn-danger" href="">Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Có bao nhiêu ngôi sao trên trời ?</td>
                                                    <td>QT-20123454</td>
                                                    <td>Câu hỏi khó</td>
                                                    <td>5</td>
                                                    <td>
                                                        <a class="btn btn-warning" href="">Cập nhật</a>
                                                        <a class="btn btn-danger" href="">Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Có bao nhiêu ngôi sao trên trời ?</td>
                                                    <td>QT-20123454</td>
                                                    <td>Câu hỏi khó</td>
                                                    <td>5</td>
                                                    <td>
                                                        <a class="btn btn-warning" href="">Cập nhật</a>
                                                        <a class="btn btn-danger" href="">Xóa</a>
                                                    </td>
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
        <footer class="footer"> © 2019</footer>
    </div>
@endsection
@push('style')
<link href="{{asset('assets/plugins/switchery/dist/switchery.min.css')}}" rel="stylesheet" />
@endpush
@push('script')
<script src="{{asset('assets/plugins/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('assets/plugins/switchery/dist/switchery.min.js')}}"></script>
<script src="{{asset('assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/daterangepicker/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script>

jQuery(document).ready(function() {
    $('.js-switch').each(function() {
        new Switchery($(this)[0], $(this).data());
    });

    $('.daterange').daterangepicker();
})
</script>
@endpush