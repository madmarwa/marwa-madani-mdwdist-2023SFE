@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('Member_trans.List_Members')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('Member_trans.List_Members')}}
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
                                <a href="{{route('Members.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{ trans('Member_trans.add_Member') }}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('Member_trans.Name')}}</th>
                                          
                                            <th>{{trans('Member_trans.Email')}}</th>
                                            <th>{{trans('Member_trans.Phone_Member')}}</th>
                                            <th>{{trans('Member_trans.Address_Member')}}</th>
                                            <th>{{trans('Member_trans.gender')}}</th>
                                            <th>{{trans('Students_trans.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($Members as $Member)
                                            <tr>
                                            <?php $i++; ?>
                                            <td>{{ $i }}</td>
                                            <td>{{$Member->name}}</td>
                                            <td>{{$Member->Email}}</td>
                                            <td>{{$Member->Phone_Member}}</td>
                                            <td>{{$Member->Address}}</td>
                                            <td>{{$Member->genders->Name}}</td>
                                            
                                          
                                                <td>
                                                    <a href="{{route('Members.edit',$Member->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Member{{ $Member->id }}" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="delete_Member{{$Member->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('Members.destroy','test')}}" method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('Member_trans.Delete_Member') }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> {{ trans('My_Classes_trans.Warning_Grade') }}</p>
                                                            <input type="hidden" name="id"  value="{{$Member->id}}">
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
