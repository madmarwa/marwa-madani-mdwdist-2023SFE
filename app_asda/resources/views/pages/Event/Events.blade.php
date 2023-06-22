@extends('layouts.master')
@section('css')
    @toastr_css
@endsection
@section('title')
    {{trans('Event_trans.Step1')}}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <h3>{{trans('Event_trans.Step1')}}</h3>
    </div>
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
                                <a href="{{ route('events.create') }}" class="btn btn-success btn-sm" role="button" aria-pressed="true">{{ trans('Event_trans.add_Event') }}</a>
                                <br><br>
                                <div class="table-responsive">
                                    <h4>{{trans('Event_trans.Avec_vente')}}</h4><br>
                                    <table id="datatable_avec_vente" class="table table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                                        <thead>
                                            <tr class="table-primary">
                                                <th>#</th>
                                                <th>{{ trans('Event_trans.Name_Event') }}</th>
                                                <th>{{ trans('Event_trans.lieuEvent') }}</th>
                                                <th>{{ trans('Event_trans.date') }}</th>
                                                <th>{{ trans('Event_trans.description') }}</th>
                                                <th>{{ trans('Event_trans.nbreProdVend') }}</th>
                                                <th>{{ trans('Event_trans.Totale_vent') }}</th>
                                                <th>{{ trans('Product_trans.Processes') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @foreach($events as $event)
                                                <?php $i++; ?>
                                                @if ($event->eventAvecVente)
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>{{ $event->nameEvent }}</td>
                                                        <td>{{ $event->lieuEvent }}</td>
                                                        <td>{{ $event->date }}</td>
                                                        <td>{{ $event->description }}</td>
                                                        <td>{{ $event->eventAvecVente->nbreProdVend }}</td>
                                                        <td>{{ $event->eventAvecVente->Totale_vent }}</td>
                                                        <td>
                                                            <a href="{{ route('events.edit',$event->id) }}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Event{{ $event->eventAvecVente->event_id }}" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                    
                                            <div class="modal fade" id="delete_Event{{ $event->eventAvecVente->event_id}}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                               <div class="modal-dialog" role="document">
                                                   <form action="{{route('events.destroy','test')}}" method="post">
                                                       {{method_field('delete')}}
                                                       {{csrf_field()}}
                                                       <div class="modal-content">
                                                           <div class="modal-header">
                                                               <h5 style="font-family: 'Cairo', sans-serif;"
                                                                   class="modal-title" id="exampleModalLabel">{{ trans('Event_trans.confirm_delete_event') }} </h5>
                                                               <button type="button" class="close" data-dismiss="modal"
                                                                       aria-label="Close">
                                                                   <span aria-hidden="true">&times;</span>
                                                               </button>
                                                           </div>
                                                           <div class="modal-body">
                                                               <p> {{ trans('Event_trans.Warning_event') }} {{ $event->name}}</p>
                                                               <input type="hidden" name="id" value="{{ $event->id}}">
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
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <h4>{{trans('Event_trans.Sans_vente')}}</h4><br>
                                    <table id="datatable_sans_vente" class="table table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                                        <thead>
                                            <tr class="table-primary">
                                                <th>#</th>

                                                <th>{{ trans('Event_trans.Name_Event') }}</th>
                                                <th>{{ trans('Event_trans.lieuEvent') }}</th>
                                                <th>{{ trans('Event_trans.date') }}</th>
                                                <th>{{ trans('Event_trans.description') }}</th>
                                                <th>{{ trans('Event_trans.fraisEvent') }}</th>
                                                <th>{{ trans('Product_trans.Processes') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @foreach($events as $event)
                                                <?php $i++; ?>
                                                @if ($event->eventSansVente)
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>{{ $event->nameEvent }}</td>
                                                        <td>{{ $event->lieuEvent }}</td>
                                                        <td>{{ $event->date }}</td>
                                                        <td>{{ $event->description }}</td>
                                                    
                                                        <td>{{ $event->eventSansVente->fraisEvent }}</td>
                                                        <td>
                                                            <a href="{{ route('events.edit',$event->eventSansVente->event_id) }}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Event{{ $event->eventSansVente->event_id }}" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade" id="delete_Event{{ $event->eventSansVente->event_id}}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                       <div class="modal-dialog" role="document">
                                                           <form action="{{route('events.destroy','test')}}" method="post">
                                                               {{method_field('delete')}}
                                                               {{csrf_field()}}
                                                               <div class="modal-content">
                                                                   <div class="modal-header">
                                                                       <h5 style="font-family: 'Cairo', sans-serif;"
                                                                           class="modal-title" id="exampleModalLabel">{{ trans('Event_trans.confirm_delete_event') }}  </h5>
                                                                       <button type="button" class="close" data-dismiss="modal"
                                                                               aria-label="Close">
                                                                           <span aria-hidden="true">&times;</span>
                                                                       </button>
                                                                   </div>
                                                                   <div class="modal-body">
                                                                       <p> {{ trans('Event_trans.Warning_event') }} {{ $event->name}}</p>
                                                                       <input type="hidden" name="id" value="{{ $event->id}}">
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
                                                @endif
                                            @endforeach
                                        </tbody>
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
