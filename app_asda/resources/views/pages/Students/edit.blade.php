@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('Students_trans.Modifier_données_eleve')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{trans('Students_trans.Modifier_données_eleve')}}
@stop
<!-- breadcrumb -->
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

                    <form action="{{route('Students.update','test')}}" method="post" autocomplete="off">
                        @method('PUT')
                        @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Students_trans.personal_information')}}</h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Students_trans.name_ar')}} : <span class="text-danger">*</span></label>
                                    <input value="{{$Students->getTranslation('name','ar')}}" type="text" name="name_ar"  class="form-control">
                                    <input type="hidden" name="id" value="{{$Students->id}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Students_trans.name_en')}} : <span class="text-danger">*</span></label>
                                    <input value="{{$Students->getTranslation('name','fr')}}" class="form-control" name="name_en" type="text" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            


                          

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender">{{trans('Students_trans.gender')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="gender_id">
                                        <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                        @foreach($Genders as $Gender)
                                            <option value="{{$Gender->id}}" {{$Gender->id == $Students->gender_id ? 'selected' : ""}}>{{ $Gender->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                          

                          

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{trans('Students_trans.Date_of_Birth')}}  :</label>
                                    <input class="form-control" type="text" value="{{$Students->Date_Birth}}" id="datepicker-action" name="Date_Birth" data-date-format="yyyy-mm-dd">
                                </div>
                            </div>
                           

                        </div>

                          
                        <div class="form-group">
                            <x-form.label id="greffe_cochlee">{{ trans('Students_trans.Greffe_Cochlee') }}</x-form.label>
                            <x-form.radio name="greffe_cochlee" :checked="$Students->greffe_cochlee" :options="[
                                'subi' => __('Students_trans.subi'),
                                'nonsubi' => __('Students_trans.nonsubi'),
                            ]"/>
                           </div>
                    
                    
                    
                           <div class="form-group" id="date_greffe_cochlee_container" @if($Students->greffe_cochlee == 'nonsubi')style="display: none;" @else style="display: block;"@endif>
                            <x-form.label id="date_greffe_cochlee">{{ trans('Students_trans.Date_Greffe_Cochlee') }}</x-form.label>
                            <input type="date" name="date_greffe_cochlee" class="form-control @error('date_greffe_cochlee') is-invalid @enderror"  value="{{old('date_greffe_cochlee',$Students->date_greffe_cochlee)}}">
                            @error('date_greffe_cochlee')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    
                    <script>
                        // Ecouteur d'Ã©vÃ©nement pour la case Ã  cocher
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
                
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Students_trans.Student_information')}}</h6><br>
                    <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Grade_id">{{trans('Students_trans.Grade')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="Grade_id">
                                        <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                        @foreach($Grades as $Grade)
                                            <option value="{{ $Grade->id }}" {{$Grade->id == $Students->Grade_id ? 'selected' : ""}}>{{ $Grade->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Classroom_id">{{trans('Students_trans.classrooms')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="Classroom_id">
                                        <option value="{{$Students->Classroom_id}}">{{$Students->classroom->Name_Class}}</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="parent_id">{{trans('Students_trans.parent')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="parent_id">
                                        <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                       @foreach($parents as $parent)
                                            <option value="{{ $parent->id }}" {{ $parent->id == $Students->parent_id ? 'selected' : ""}}>{{ $parent->Name_Father }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">{{trans('Students_trans.academic_year')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year">
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @php
                                        $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}" {{$year == $Students->academic_year ? 'selected' : ' '}}>{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        </div><br>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Students_trans.submit')}}</button>
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

@endsection
