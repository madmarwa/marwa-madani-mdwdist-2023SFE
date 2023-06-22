@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Member_trans.add_Member') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Member_trans.add_Member') }}
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
                            <form action="{{route('Members.store')}}" method="post">
                             @csrf
                             <div class="form-row">
                                <div class="col">
                                    <label for="title">{{trans('Member_trans.Name_Member')}}</label>
                                    <input type="text" name="Name_ar" class="form-control">
                                    @error('Name_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">{{trans('Member_trans.Name_Member_en')}}</label>
                                    <input type="text" name="Name_en" class="form-control">
                                    @error('Name_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{trans('Member_trans.Email')}}</label>
                                    <input type="email" name="Email" class="form-control">
                                    @error('Email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlTextarea1">{{trans('Member_trans.Phone_Member')}}</label>
                                    <input type="text" name="Phone_Member" class="form-control">
                                    @error('Phone_Member')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                           
                            <br>

                            <div class="form-row">
                            
                                <div class="form-group col">
                                    <label for="inputState">{{trans('Member_trans.gender')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Gender_id">
                                        <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                        @foreach($Genders as $gender)
                                            <option value="{{$gender->id}}">{{$gender->Name}}</option>
                                        @endforeach
                                    </select>
                                    @error('Gender_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                       
                         

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{trans('Member_trans.Address_Member')}}</label>
                                <textarea class="form-control" name="Address"
                                          id="exampleFormControlTextarea1" rows="4"></textarea>
                                @error('Address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                     

                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Member_trans.Finish')}}</button>
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
@endsection
