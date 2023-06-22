@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Donateur_trans.edit_Donateur') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Donateur_trans.edit_Donateur') }}
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
                            <form action="{{route('Donateurs.update','test')}}" method="post">
                             {{method_field('patch')}}
                             @csrf
                  
                            <br>


                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{trans('Donateur_trans.Name_Donateur')}}</label>
                                    <input type="text" name="Name_ar" value="{{ $Donateurs->getTranslation('name', 'ar') }}" class="form-control">
                                    @error('Name_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">{{trans('Donateur_trans.Name_Donateur_en')}}</label>
                                    <input type="text" name="Name_en" value="{{ $Donateurs->getTranslation('name', 'fr') }}" class="form-control">
                                    @error('Name_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{trans('Donateur_trans.Email')}}</label>
                                    <input type="hidden" value="{{$Donateurs->id}}" name="id">
                                    <input type="email" name="Email" value="{{$Donateurs->Email}}" class="form-control">
                                    @error('Email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">{{trans('Donateur_trans.Phone_Donateur')}}</label>
                                    <input type="hidden" value="{{$Donateurs->id}}" name="id">
                                    <input type="text" name="Phone_Donateur" value="{{$Donateurs->Phone_Donateur}}" class="form-control">
                                    @error('Phone_Donateur')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                            </div>
                            <br>
                            <div class="form-row">
                             
                                <div class="form-group col">
                                    <label for="inputState">{{trans('Donateur_trans.gender')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Gender_id">
                                        <option value="{{$Donateurs->Gender_id}}">{{$Donateurs->genders->Name}}</option>
                                        @foreach($genders as $gender)
                                            <option value="{{$gender->id}}">{{$gender->Name}}</option>
                                        @endforeach
                                    </select>
                                    @error('Gender_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                             
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{trans('Donateur_trans.Address_Donateur')}}</label>
                                <textarea class="form-control" name="Address"
                                          id="exampleFormControlTextarea1" rows="4">{{$Donateurs->Address}}</textarea>
                                @error('Address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Donateur_trans.Finish')}}</button>
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
