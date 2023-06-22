@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('Donateur_trans.List_Donateurs')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('Donateur_trans.List_Donateurs')}}
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
                                <a href="{{route('Donateurs.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{ trans('Donateur_trans.add_Donateur') }}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('Donateur_trans.Name_Donateur')}}</th>
                                          
                                            <th>{{trans('Donateur_trans.Email')}}</th>
                                            <th>{{trans('Donateur_trans.Phone_Donateur')}}</th>
                                            <th>{{trans('Donateur_trans.Address_Donateur')}}</th>
                                            <th>{{trans('Donateur_trans.gender')}}</th>
                                            <th>{{trans('Students_trans.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($Donateurs as $Donateur)
                                            <tr>
                                            <?php $i++; ?>
                                            <td>{{ $i }}</td>
                                            <td>{{$Donateur->name}}</td>
                                            <td>{{$Donateur->Email}}</td>
                                            <td>{{$Donateur->Phone_Donateur}}</td>
                                            <td>{{$Donateur->Address}}</td>
                                            <td>{{$Donateur->genders->Name}}</td>
                                            
                                          
                                                <td>
                                                    <a href="{{route('Donateurs.edit',$Donateur->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Donateur{{ $Donateur->id }}" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="delete_Donateur{{$Donateur->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('Donateurs.destroy','test')}}" method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('Donateur_trans.Delete_Donateur') }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> {{ trans('My_Classes_trans.Warning_Grade') }}</p>
                                                            <input type="hidden" name="id"  value="{{$Donateur->id}}">
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
