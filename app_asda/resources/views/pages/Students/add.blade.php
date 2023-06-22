@extends('layouts.master')

@section('css')
    @toastr_css
@endsection

@section('title')
    {{ trans('main_trans.add_student') }}
@endsection

@section('page-header')
    <!-- breadcrumb -->
@endsection

@section('PageTitle')
    {{ trans('main_trans.add_student') }}
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post" action="{{ route('Students.store') }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <h6 style="font-family: 'Cairo', sans-serif; color: blue">{{ trans('Students_trans.Student_information') }}</h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('Students_trans.name_ar') }} : <span class="text-danger">*</span></label>
                                    <input type="text" name="name_ar" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('Students_trans.name_en') }} : <span class="text-danger">*</span></label>
                                    <input class="form-control" name="name_en" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">{{ trans('Students_trans.gender') }} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="gender_id">
                                        <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                        @foreach($Genders as $Gender)
                                            <option value="{{ $Gender->id }}">{{ $Gender->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('Students_trans.Date_of_Birth') }} :</label>
                                    <input class="form-control" type="text" id="datepicker-action" name="Date_Birth" data-date-format="yyyy-mm-dd">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <x-form.label id="greffe_cochlee">{{ trans('Students_trans.Greffe_Cochlee') }}</x-form.label>
                            <x-form.radio name="greffe_cochlee" :checked="$students->greffe_cochlee" :options="[
                                'subi' => __('Students_trans.subi'),
                                'nonsubi' => __('Students_trans.nonsubi'),
                            ]" />
                        </div>

                        <div class="form-group" id="date_greffe_cochlee_container" @if($students->greffe_cochlee == 'subi') style="display: block;" @else style="display: none;" @endif>
                            <x-form.label id="date_greffe_cochlee">{{ trans('Students_trans.Date_Greffe_Cochlee') }}</x-form.label>
                            <input type="date" name="date_greffe_cochlee" class="form-control @error('date_greffe_cochlee') is-invalid @enderror" value="{{ old('date_greffe_cochlee', $students->date_greffe_cochlee) }}">
                            @error('date_greffe_cochlee')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <script>
                            // Event listener for the checkbox
                            document.getElementsByName('greffe_cochlee').forEach(function(elem) {
                                elem.addEventListener('change', function() {
                                    if (document.getElementsByName('greffe_cochlee')[0].checked) {
                                        document.getElementById('date_greffe_cochlee_container').style.display = 'block';
                                    } else {
                                        document.getElementById('date_greffe_cochlee_container').style.display = 'none';
                                    }
                                });
                            });
                        </script>

                        <h6 style="font-family: 'Cairo', sans-serif; color: blue">{{ trans('Students_trans.Student_details') }}</h6><br>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Grade_id">{{ trans('Students_trans.Grade') }} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="Grade_id">
                                        <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                        @foreach($my_classes as $c)
                                            <option value="{{ $c->id }}">{{ $c->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Classroom_id">{{ trans('Students_trans.classrooms') }} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="Classroom_id"></select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="parent_id">{{ trans('Students_trans.parent') }} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="parent_id">
                                        <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                        @foreach($parents as $parent)
                                            <option value="{{ $parent->id }}">{{ $parent->Name_Father }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year">{{ trans('Students_trans.academic_year') }} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="academic_year">
                                        <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                        @php
                                            $current_year = date("Y");
                                        @endphp
                                       
                                            <option value="{{ $current_year }}">{{ $current_year }}</option>
                                      
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="attachments">{{ trans('Students_trans.Attachments') }} : <span class="text-danger">*</span></label>
                                    <input type="file" accept="image/*" name="photos[]" multiple>
                                </div>
                            </div>
                        </div><br>

                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{ trans('Students_trans.submit') }}</button>
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
                        url: "{{ URL::to('Get_classrooms_all') }}/" + Grade_id,
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

@endsection
