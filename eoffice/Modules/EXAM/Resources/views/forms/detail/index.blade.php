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
                            <form action="#">
                                <div class="form-body col-md-9">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Loại câu hỏi</label>
                                                <select class="form-control custom-select">
                                                    <option>Loại A</option>
                                                    <option>Loại B</option>
                                                    <option>Loại C</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nhóm câu hỏi</label>
                                                <select class="form-control custom-select">
                                                    <option>Nhóm A</option>
                                                    <option>Nhóm B</option>
                                                    <option>Nhóm C</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Điểm</label>
                                                <input type="text" class="form-control" name="end" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Câu hỏi</label>
                                                <textarea id="mymce" name="area"></textarea>
                                            </div>
                                        </div>
         
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Đáp án</label>
                                                <form action="#">
                                                    <p>
                                                        <input type="radio" id="test1" name="radio-group" checked>
                                                        <label class="col-md-12" for="test1"><input class="form-control" type="text"></label>
                                                    </p>
                                                    <p>
                                                        <input type="radio" id="test2" name="radio-group">
                                                        <label class="col-md-12" for="test2"><input class="form-control" type="text"></label>
                                                    </p>
                                                    <p>
                                                        <input type="radio" id="test3" name="radio-group">
                                                        <label class="col-md-12" for="test3"><input class="form-control" type="text"></label>
                                                    </p>
                                                    <p>
                                                        <input type="radio" id="test4" name="radio-group">
                                                        <label class="col-md-12" for="test4"><input class="form-control" type="text"></label>
                                                    </p>
                                                </form>
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
        {{-- <div class="modal fade" id="addItem">
            <div class="modal-dialog">
              <div class="modal-content">
                <form method="post" action="">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm Item</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group col-12">
                            <label class="control-label">Câu hỏi</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="KPI abc...">
                        </div>
                        <div class="form-group col-12">
                            <label class="control-label">Loại</label>
                            <select class="form-control" name="kpi_category_id" id="kpi_category_id">
                               <option value="">Loại câu hỏi 1</option>
                               <option value="">Loại câu hỏi 2</option>
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label class="control-label">Điểm</label>
                            <input type="text" id="weight" name="weight" class="form-control" placeholder="100, 200...">
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
        </div> --}}
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