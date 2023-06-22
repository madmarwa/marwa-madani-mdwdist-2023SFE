@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('Don_trans.List_Dons')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('Don_trans.List_Dons')}}
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
                                <a href="{{route('Dons.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{ trans('Don_trans.add_Don') }}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('Donateur_trans.Name')}}</th>
                                          
                                            <th>{{trans('Don_trans.Phone_Don')}}</th>
                                            <th>{{trans('Don_trans.Email')}}</th>
                                            <th>{{trans('Don_trans.montant')}}</th>
                                           
                                            <th>{{trans('Students_trans.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($donateurs as $Don)
                                            <tr>
                                              
                                            <?php $i++; ?>
                                            <td>{{ $i }}</td>
                                          
                                        
                                            <td><a href="{{ route('Dons.show',$Don->id) }}">{{ $Don->name }}</a></td>
                                             <td>{{ $Don->Phone_Donateur }}</td>
                                            <td>{{ $Don->Email }}</td>
                                          
                                            <td>{{ $donateursMontantTotal[$Don->id] }}</td>
                                     
                                          
                                          
                                            
                                          
                                                <td>
                                                  
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Donateur{{  $Don->id }}" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="delete_Donateur{{ $Don->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('Donateurs.destroy','test')}}" method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('Don_trans.Delete_Donateur') }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> {{ trans('My_Classes_trans.Warning_Grade') }}</p>
                                                            <input type="hidden" name="id"  value="{{ $Don->id}}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
                                                                <button type="submit"
                                                                        class="btn btn-danger">{{ trans('My_Classes_trans.submit') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
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
