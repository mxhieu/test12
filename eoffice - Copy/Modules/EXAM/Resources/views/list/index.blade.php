@extends('layouts.master')
@section('content')
    @include('exam::menu')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="card">
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link border-right active" data-toggle="tab" href="#hastest" role="tab">Đã kiểm tra</a> </li>
                    <li class="nav-item"> <a class="nav-link border-right" data-toggle="tab" href="#requesting" role="tab">Đang yêu cầu</a> </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="hastest" role="tabpanel">
                        <div class="card-body">
                            <div class="col-md-9">
                                <div id="result-alert"></div>
                                <table class="table" id="taskgroup-table">
                                    <thead class="bg-info text-white">
                                        <tr>
                                            <th>#</th>
                                            <th>Bài kiểm tra</th>
                                            <th>Mã</th>
                                            <th>Loại</th>
                                            <th>Điểm</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Bài kiểm tra tháng 1/2021</td>
                                            <td>QT-20123454</td>
                                            <td>Câu hỏi khó</td>
                                            <td>100</td>
                                            <td>
                                                <a data-toggle="modal" data-target="#addItem"  class="btn btn-success" href="">Chi tiết</a>
                                                <a class="btn btn-danger" href="">Xóa</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Bài kiểm tra tháng 1/2021</td>
                                            <td>QT-20123454</td>
                                            <td>Câu hỏi khó</td>
                                            <td>100</td>
                                            <td>
                                                <a   class="btn btn-success" href="">Chi tiết</a>
                                                <a class="btn btn-danger" href="">Xóa</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Bài kiểm tra tháng 1/2021</td>
                                            <td>QT-20123454</td>
                                            <td>Câu hỏi khó</td>
                                            <td>100</td>
                                            <td>
                                                <a  class="btn btn-success" href="">Chi tiết</a>
                                                <a class="btn btn-danger" href="">Xóa</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Bài kiểm tra tháng 1/2021</td>
                                            <td>QT-20123454</td>
                                            <td>Câu hỏi khó</td>
                                            <td>100</td>
                                            <td>
                                                <a  class="btn btn-success" href="">Chi tiết</a>
                                                <a class="btn btn-danger" href="">Xóa</a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="requesting" role="tabpanel">
                        <div class="card-body">
                            <div class="col-md-9">
                                <table class="table" id="taskgroup-table">
                                    <thead class="bg-info text-white">
                                        <tr>
                                            <th>#</th>
                                            <th>Bài kiểm tra</th>
                                            <th>Mã</th>
                                            <th>Loại</th>
                                            <th>Điểm</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Bài kiểm tra tháng 1/2021</td>
                                            <td>QT-20123454</td>
                                            <td>Câu hỏi khó</td>
                                            <td>100</td>
                                            <td>
                                                <a data-toggle="modal" data-target="#addItem"  class="btn btn-success" href="">Làm bài</a>
                                                <a class="btn btn-danger" href="">Xóa</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Bài kiểm tra tháng 1/2021</td>
                                            <td>QT-20123454</td>
                                            <td>Câu hỏi khó</td>
                                            <td>100</td>
                                            <td>
                                                <a data-toggle="modal" data-target="#addItem"  class="btn btn-success" href="">Làm bài</a>
                                                <a class="btn btn-danger" href="">Xóa</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Bài kiểm tra tháng 1/2021</td>
                                            <td>QT-20123454</td>
                                            <td>Câu hỏi khó</td>
                                            <td>100</td>
                                            <td>
                                                <a data-toggle="modal" data-target="#addItem"  class="btn btn-success" href="">Làm bài</a>
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
        <div class="modal fade" id="addItem">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                              <div class="col-md-6 col-lg-4 col-xlg-4">
                                  <div class="card card-inverse card-info">
                                      <div class="box bg-info text-center">
                                          <h1 class="font-light text-white">80</h1>
                                          <h6 class="text-white">Điểm</h6>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6 col-lg-4 col-xlg-4">
                                  <div class="card card-inverse card-success">
                                      <div class="box bg-success text-center">
                                          <h1 class="font-light text-white">8</h1>
                                          <h6 class="text-white">Đáp án đúng</h6>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6 col-lg-4 col-xlg-4">
                                  <div class="card card-inverse card-danger">
                                      <div class="box bg-danger text-center">
                                          <h1 class="font-light text-white">2</h1>
                                          <h6 class="text-white">Đáp án sai</h6>
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <table class="table" id="taskgroup-table">
                                  <thead class="bg-info text-white">
                                      <tr>
                                          <th>#</th>
                                          <th>Câu hỏi</th>
                                          <th>Mã</th>
                                          <th>Loại</th>
                                          <th>Điểm</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr style="background:#8af3966b">
                                          <td>1</td>
                                          <td>Có bao nhiêu ngôi sao trên trời ? </td>
                                          <td>QT-20123454</td>
                                          <td>Câu hỏi khó</td>
                                          <td>5</td>
          
                                      </tr>
                                      <tr style="background:#8af3966b">
                                          <td>2</td>
                                          <td>Có bao nhiêu ngôi sao trên trời ?</td>
                                          <td>QT-20123454</td>
                                          <td>Câu hỏi khó</td>
                                          <td>5</td>
                                      </tr>
                                      <tr style="background:#8af3966b">
                                          <td>3</td>
                                          <td>Có bao nhiêu ngôi sao trên trời ?</td>
                                          <td>QT-20123454</td>
                                          <td>Câu hỏi khó</td>
                                          <td>5</td>
                                      </tr>
                                      <tr style="background: #ff2b2b70">
                                          <td>4</td>
                                          <td>Có bao nhiêu ngôi sao trên trời ?</td>
                                          <td>QT-20123454</td>
                                          <td>Câu hỏi khó</td>
                                          <td>5</td>
                                      </tr>
                                      <tr style="background: #ff2b2b70">
                                          <td>5</td>
                                          <td>Có bao nhiêu ngôi sao trên trời ?</td>
                                          <td>QT-20123454</td>
                                          <td>Câu hỏi khó</td>
                                          <td>5</td>
                                      </tr>
                                      <tr style="background:#8af3966b">
                                          <td>6</td>
                                          <td>Có bao nhiêu ngôi sao trên trời ?</td>
                                          <td>QT-20123454</td>
                                          <td>Câu hỏi khó</td>
                                          <td>5</td>
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
        <footer class="footer"> © 2019</footer>
    </div>
@endsection
@push('script')
@endpush