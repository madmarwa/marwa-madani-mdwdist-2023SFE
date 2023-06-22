@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{trans('main_trans.Students_Promotions')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{trans('main_trans.Students_Promotions')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_all">
                                    {{trans('main_trans.Annuler_eleve')}}
                                </button>
                                <a href="{{route('Promotion.index')}}" class="btn btn-success btn-sm" role="button"
                                aria-pressed="true">{{trans('main_trans.ajout_Promotions')}}</a><br><br>
                                
                             


                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th class="alert-info">#</th>
                                            <th class="alert-info">{{trans('Students_trans.name')}}</th>
                                            <th class="alert-danger"> {{trans('main_trans.Niveau_scolaire_précédente')}} </th>
                                            <th class="alert-danger"> {{trans('main_trans.Année_scolaire')}} </th>
                                       
                                            <th class="alert-danger">   {{trans('main_trans.Classe_précédente')}} </th>
                                            <th class="alert-success">   {{trans('main_trans.Niveau_scolaire_actuel')}}</th>
                                            <th class="alert-success">  {{trans('main_trans.Année_scolaire_actuelle')}} </th>
                                           
                                            <th class="alert-success">{{trans('main_trans.Classe_actuelle')}}   </th>
                                            <th class="table-warning">{{trans('Students_trans.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($promotions as $promotion)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$promotion->student->name}}</td>
                                                <td>{{$promotion->f_grade->Name}}</td>
                                                <td>{{$promotion->academic_year}}</td>
                                                <td>{{$promotion->f_classroom->Name_Class}}</td>
                                                
                                                <td>{{$promotion->t_grade->Name}}</td>
                                                <td>{{$promotion->academic_year_new}}</td>
                                                <td>{{$promotion->t_classroom->Name_Class}}</td>
                                                
                                                <td>

                                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#Delete_one{{$promotion->id}}"> {{trans('main_trans.revnir')}}</button>
                                                   
                                                </td>
                                            </tr>
                                        @include('pages.Students.promotion.Delete_all')
                                        @include('pages.Students.promotion.Delete_one')
                                        @endforeach
                                    </table>
                                </div>
                            </div>
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
@endsection
