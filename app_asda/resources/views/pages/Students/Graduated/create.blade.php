@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.list_Graduate')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.list_Graduate')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if (Session::has('error_Graduated'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{Session::get('error_Graduated')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                        <form action="{{route('Graduated.store')}}" method="post">
                        @csrf
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">{{trans('Students_trans.Grade')}}</label>
                                <select class="custom-select mr-sm-2" name="Grade_id"  id="Grade_id" required>
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($Grades as $Grade)
                                        <option value="{{$Grade->id}}">{{$Grade->Name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="Classroom_id">{{trans('Students_trans.classrooms')}} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Classroom_id" id="Classroom_id" required>

                                </select>
                            </div>


                        </div>

                         <a class="btn btn-success btn-sm nextBtn btn-lg pull-right"  name="search" id ="search">{{ trans('Mark_trans.Search') }}</a>
                                    <br>   <br>
                        <div class="row d-none" id="marks-entry">
                            <br>   <br>
                          
                        <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                            <thead>
                                <tr>
                                    <th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
                                    <th>#</th>
                                    <th>{{ trans('Students_trans.name') }} </th>
                                  
                                 
                                </tr>
                            </thead>
                            <tbody id="marks-entry-tr">
                                <td>
                                  
                                </td>
                            </tbody>
                        </table>
                        <input type="submit" class="btn btn-rounded btn-primary" value="{{ trans('Grades_trans.submit') }}">
                         </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
@endsection
@section('js')

    @toastr_js
    @toastr_render
    <script>
        $(document).ready(function () {
            $('select[name="Grade_id"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                      url: "/Get_classrooms_all/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="Classroom_id"]').empty();
                            $('select[name="Classroom_id"]').append('<option selected disabled>{{trans('Parent_trans.Choose')}}...</option>');
                            $.each(data, function (key, value) {
                                $('select[name="Classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
    
    <script>
        $(document).ready(function () {
            $('select[name="Grade_id_new"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('Get_classrooms_all') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="Classroom_id_new"]').empty();
                            $('select[name="Classroom_id_new"]').append('<option selected disabled>{{trans('Parent_trans.Choose')}}...</option>');
                            $.each(data, function (key, value) {
                                $('select[name="Classroom_id_new"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
 <script>
    $(document).on('click', '#search', function () {
        var academic_year = $('#academic_year').val();
        console.log(academic_year);
        var Grade_id = $('#Grade_id').val();
        console.log(Grade_id);
        var Classroom_id = $('#Classroom_id').val();
        console.log(Classroom_id);
        var subject_id = $('#subject_id').val();
        console.log(subject_id);
        var exam_id = $('#exam_id').val();
        console.log(exam_id);

        $.ajax({
            url: "{{ URL::to('students') }}/" + Grade_id + "/" + Classroom_id,
            type: "GET",
            dataType: "json",
            success: function (data) {
                console.log(data); // Verify the returned data
                $('#marks-entry').removeClass('d-none');
                var html = '';

                $('#marks-entry-tr').html('');

                if (typeof data === 'object') {
                    $.each(data, function (student_id, name) {
                        html += '<tr>' +
                            '<td><input type="checkbox" name="student_ids[]" value="' + student_id + '" class="box1"></td>' +
                            '<td>' + student_id + '<input type="hidden" name="student_id[]" value="' + student_id + '"></td>' +
                            '<td>' + name + '</td>' +
                            
                            '</tr>';
                    });
                } else {
                    console.log("The returned data is not an object.");
                }

                $('#marks-entry-tr').append(html);
            },
            error: function (xhr, status, error) {
                console.log("Error retrieving data: " + error);
            }
        });
    });
</script>

@endsection
