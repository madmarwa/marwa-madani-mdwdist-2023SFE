@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Event_trans.edit_Event') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Event_trans.edit_Event') }}
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
                            <form action="{{route('events.update','test')}}" method="post">
                             {{method_field('patch')}}
                             @csrf
                  
                            <br>



                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{trans('Event_trans.Name_Event')}}</label>
                                    <input type="text" name="nameEvent_ar" value="{{ $events->getTranslation('nameEvent', 'ar') }}" class="form-control">
                                    @error('nameEvent_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">{{trans('Event_trans.Name_Event_en')}}</label>
                                    <input type="text" name="nameEvent_en" value="{{ $events->getTranslation('nameEvent', 'fr') }}" class="form-control">
                                    @error('nameEvent_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <br>
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{trans('Event_trans.lieuEvent_ar')}}</label>
                                    <input type="text" name="lieuEvent_ar" value="{{ $events->getTranslation('lieuEvent', 'ar') }}" class="form-control">
                                    @error('lieuEvent_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">{{trans('Event_trans.lieuEvent_fr')}}</label>
                                    <input type="text" name="lieuEvent_en" value="{{ $events->getTranslation('lieuEvent', 'fr') }}" class="form-control">
                                    @error('lieuEvent_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{trans('Event_trans.date')}}</label>
                                    <input type="hidden" value="{{$events->id}}" name="id">
                                    <input type="date" name="date" value="{{$events->date}}" class="form-control">
                                    @error('date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlTextarea1">{{trans('Event_trans.description')}}
                                        :</label>
                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                        rows="2">{{$events->description}}</textarea>
                                </div>
                               </div> 
                               
                              
                            <br>
                            <div class="form-row">
                                <div class="col">
                                <p> {{trans('Event_trans.products_available')}}</p>
                                <br>
                                <p>{{ trans('Event_trans.total_products') }} {{ $totalProducts }}</p><br>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ trans('Event_trans.product_name') }}</th>
                                      <th scope="col">{{ trans('Event_trans.select') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($products as $index => $product)
                                    <?php $i++; ?>
                                        <tr>
                                            <th scope="row">{{ $i }}</th>
                                            <td>{{ $product }}</td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" name="selectedProducts[]" value="{{ $index }}" class="form-check-input">
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div> </div>
                            <br>
                            <div class="form-row">
                              
                                <div class="col">
                                    <label for="title">{{ trans('Event_trans.Totale_vent') }}</label>
                                    <input type="text" name="Totale_vent" value="{{ $events->eventAvecVente ? $events->eventAvecVente->Totale_vent : '' }}" class="form-control">
                                    @error('Totale_vent')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                           

                       
                            <br>

                           

                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Event_trans.Finish')}}</button>
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
