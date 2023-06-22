@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{trans('Exam_trans.add_exam')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{trans('Exam_trans.add_exam')}}
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
                            <form action="{{route('Exams.store')}}" method="post" autocomplete="off">
                                @csrf

                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{trans('Exam_trans.Name_exam')}}   </label>
                                        <input type="text" name="Name_ar" class="form-control">
                                    </div>

                                    <div class="col">
                                        <label for="title">   {{trans('Exam_trans.Name_exam_fr')}} </label>
                                        <input type="text" name="Name_en" class="form-control">
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id">{{trans('subjcet_trans.matiere')}}  <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="subject_id">
                                                <option selected disabled>  {{trans('subjcet_trans.matiere_etude')}}<option>
                                                @foreach($subjects as $subject)
                                                    <option  value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id">{{trans('Grades_trans.Name')}} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="Grade_id">
                                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                                @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}">{{ $grade->getTranslation('Name', LaravelLocalization::getCurrentLocale()) }}</option>
                                            @endforeach
                                            
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Classroom_id">{{trans('My_Classes_trans.Name')}} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="Classroom_id">

                                            </select>
                                        </div>
                                    </div>

                                    

                                </div>
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Grades_trans.submit')}} </button>
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
        function CheckAll(className, elem) {
            var elements = document.getElementsByClassName(className);
            var l = elements.length;
            if (elem.checked) {
                for (var i = 0; i < l; i++) {
                    elements[i].checked = true;
                }
            } else {
                for (var i = 0; i < l; i++) {
                    elements[i].checked = false;
                }
            }
        }
    </script>
 <script>
  $(document).ready(function () {
    $('select[name="Grade_id"]').on('change', function () {
        var gradeId = $(this).val();
        if (gradeId) {
            $.ajax({
                url: "/Get_classrooms/" + gradeId
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="Classroom_id"]').empty();
                    $('select[name="Classroom_id"]').append('<option selected disabled>Choisir la classe...</option>');
                    $.each(data, function (key, value) {
                        $('select[name="Classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                },
                error: function () {
                    console.log('Erreur lors du chargement AJAX');
                }
            });
        } else {
            console.log('Grade non sélectionné');
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
                        url: "{{ URL::to('Get_classrooms') }}/" + Grade_id,
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
@endsection