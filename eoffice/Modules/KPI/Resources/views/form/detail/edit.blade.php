@extends('layouts.master')
@section('content')
    @include('kpi::menu')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('kpi.item.update', $info->id)}}" method="post" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <div class="row col-9">
                            <div class="form-group col-6">
                                <label class="control-label">Tên biểu mẫu</label>
                                <input type="text" id="name" name="name" value="{{$info->name}}" class="form-control" placeholder="KPI abc...">
                            </div>
                            <div class="form-group col-3">
                                <label class="control-label">Trọng số</label>
                                <input type="text" id="weight" value="{{$info->weight}}" name="weight" class="form-control" placeholder="100, 200...">
                            </div>
                            <div class="form-group col-3">
                                <label class="control-label">Đơn vị</label>
                                <input type="text" id="unit" value="{{$info->unit}}" name="unit" class="form-control" placeholder="task, thời gian...">
                            </div>
                            <div class="form-group col-6">
                                <label class="control-label">Loại biểu mẫu</label>
                                <select name="kpi_category_id" class="form-control" id="kpi_category_id">
                                    @foreach($kpiGroup as $row)
                                    <option @if($info->kpi_category_id == $row->id) selected @endif value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label class="control-label">Nhóm biểu mẫu</label>
                                <select name="kpi_group_id" class="form-control" id="kpi_group_id">
                                    @foreach($kpiCategory as $row)
                                    <option @if($info->kpi_group_id == $row->id) selected @endif value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <label class="control-label">Nội dung</label>
                                <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{$info->content}}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Lưu</button>
                    </form>
                </div>
            </div>
        </div>
        <footer class="footer"> © 2019</footer>
    </div>
@endsection