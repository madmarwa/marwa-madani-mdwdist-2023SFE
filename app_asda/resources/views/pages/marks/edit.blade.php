@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('Mark_trans.Modifier_des_notes') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{ trans('Mark_trans.Modifier_des_notes') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                                <form action="{{route('Marks.update','test')}}" method="post">
                                  
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="Grade_id"> {{trans('Grades_trans.Name')}}: <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="Grade_id" id="Grade_id"> 
                                            <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                            @foreach($my_classes as $c)
                                                <option value="{{ $c->id }}">{{ $c->Name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col">
                                        <label for="Classroom_id">{{trans('My_Classes_trans.Name')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="Classroom_id" id="Classroom_id"></select>
                                    </div>

                                    <div class="form-group col">
                                        <label for="subject_id">{{trans('subjcet_trans.matiere')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="subject_id"  id="subject_id"></select>
                                    </div>

                                    <div class="form-group col">
                                        <label for="exam_id">{{trans('Exam_trans.Name')}}   : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="exam_id" id="exam_id">
                                            <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                            @foreach($exams as $exam)
                                                <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                              
                                </div>
                                <br>

                                <a class="btn btn-success btn-sm nextBtn btn-lg pull-right"  name="search" id ="search">{{ trans('Mark_trans.Search') }}</a><br><br>
                                <div class="row d-none" id="marks-entry">


                                    <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ trans('Students_trans.name_ar') }} </th>
                                                <th>{{ trans('Students_trans.name_en') }} </th>
                                                    <th>{{ trans('Mark_trans.note') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody id="marks-entry-tr">
                                            <td>
                                              
                                            </td>
                                        </tbody>
                                    </table>
                                    <input type="submit" class="btn btn-rounded btn-primary" value="{{ trans('Grades_trans.Edit') }}">
                                  
                                     </div>
                            </form>
                        </div>
                    </div>
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
              url: "{{ URL::to('marksedite') }}/" + Grade_id + "/" + Classroom_id + "/" + subject_id + "/" + exam_id,
              type: "GET",
              dataType: "json",
              success: function (data) {
                 console.log(data); // Vérifie les données retournées
                 $('#marks-entry').removeClass('d-none');
                 var html = '';
     
                 $('#marks-entry-tr').html('');
     
                 if (typeof data === 'object') {
                    $.each(data, function (index, item) {
                       
                       html += '<tr>' +
                          '<td>' + item.student_id + '<input type="hidden" name="student_id[]" value="' + item.student_id + '"></td>' +
                          '<td>' + item.student.name.ar + '</td>' +
                          '<td>' + item.student.name.fr + '</td>' +
                          '<td><input type="text" class="form-control form-control-sm" name="marks[]" value="' + item.marks + '"></td>' +
                          '</tr>';
                    });
                 } else {
                    console.log("Les données retournées ne sont pas un objet.");
                 }
     
                 $('#marks-entry-tr').append(html);
              },
              error: function (xhr, status, error) {
                 console.log("Erreur lors de la récupération des données: " + error);
              }
           });
        });
     </script>
     

    <script>
        $(document).ready(function () {
            $('select[name="Classroom_id"]').on('change', function () {
                var Classroom_id = $(this).val();
                if (Classroom_id) {
                    $.ajax({
                        url: "{{ URL::to('subject') }}/" + Classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="subject_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="subject_id"]').append('<option value="' + key + '">' + value + '</option>');
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
            $('select[name="Grade_id"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('classes') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="Class_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="Class_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection
