@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Member_trans.edit_Member') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Member_trans.edit_Member') }}
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
                    <div class="col-md-12">
                        <br>
                        <form action="{{ route('Dons.update', $Don->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                    
                            <div class="form-group">
                                <label for="name">{{trans('Donateur_trans.Name')}}</label>
                                <input type="text" name="name" id="name" value="{{ $donateur->name }}" class="form-control" disabled>
                            </div>
                    
                            <div class="form-group">
                                <label for="montant">{{trans('Don_trans.montant')}}</label>
                                <input type="number" name="montant" id="montant" value="{{ $Don->montant }}" class="form-control">
                            </div>
                    
                            <div class="form-group">
                                <label for="created_at">Date de création :</label>
                                <input type="text" name="created_at" id="created_at" value="{{ $Don->created_at }}" class="form-control" disabled>
                            </div>
                    
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </form>
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
