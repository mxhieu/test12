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
                            <form action="" enctype="multipart/form-data" method="POST">
                                {{ csrf_field() }}
                                <div class="form-body col-md-9">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Loại câu hỏi</label>
                                                <select name="exam_category_id" class="form-control custom-select">
                                                    @foreach($categories as $row)
                                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nhóm câu hỏi</label>
                                                <select name="exam_group_id" class="form-control custom-select">
                                                    @foreach($groups as $row)
                                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Điểm</label>
                                                <input type="text" class="form-control" name="point" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Câu hỏi</label>
                                                <textarea id="mymce" name="question"></textarea>
                                            </div>
                                        </div>
         
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Đáp án</label>
                                                <p>
                                                    <input type="radio" id="test1" name="is_corect" checked>
                                                    <label class="col-md-12" for="test1">
                                                        <input name="answer[]" class="form-control" type="text">
                                                    </label>
                                                </p>
                                                <p>
                                                    <input type="radio" id="test2" name="is_corect">
                                                    <label class="col-md-12" for="test2">
                                                        <input name="answer[]" class="form-control" type="text">
                                                    </label>
                                                </p>
                                                <p>
                                                    <input type="radio" id="test3" name="is_corect">
                                                    <label class="col-md-12" for="test3">
                                                        <input name="answer[]" class="form-control" type="text">
                                                    </label>
                                                </p>
                                                <p>
                                                    <input type="radio" id="test4" name="is_corect">
                                                    <label class="col-md-12" for="test4">
                                                        <input name="answer[]" class="form-control" type="text">
                                                    </label>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                    <button type="button" class="btn btn-inverse">Cancel</button>
                                </div>
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
                                        <tr>
                                            <td colspan="6" style="background: #73737363"><strong>Nhóm câu hỏi 2 <a class="btn btn-success ml-5" href="">Thêm</a></strong> </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
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
                                            <td colspan="6" style="background: #73737363"><strong>Nhóm câu hỏi 3 <a class="btn btn-success ml-5" href="">Thêm</a></strong> </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
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
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer"> © 2019</footer>
    </div>
@endsection
@push('script')
<script src="{{asset('assets/plugins/tinymce/tinymce.min.js')}}"></script>
<script>
    $(document).ready(function() {

        if ($("#mymce").length > 0) {
            tinymce.init({
                selector: "textarea#mymce",
                theme: "modern",
                height: 300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

            });
        }
    });
</script>
@endpush