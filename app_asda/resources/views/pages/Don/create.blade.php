@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Donateur_trans.add_Donateur') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Donateur_trans.add_Donateur') }}
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
                            <form action="{{route('Dons.store')}}" method="post">
                             @csrf
                           
                             
                           
                            <br>

                            <div class="form-row">
                            
                                <div class="form-group">
                                    <label for="donateur_id">{{ trans('Students_trans.gender') }} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="donateur_id" id="donateur_id">
                                        <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                        @foreach($donateurs as $donateur)
                                            <option value="{{ $donateur->id }}">{{ $donateur->name }}</option>
                                        @endforeach
                                    </select>
                                </div>    
                         
                            </div>
                        
                     

                                <a class="btn btn-success btn-sm nextBtn btn-lg pull-right"  name="search" id ="search">{{trans('Don_trans.rechercher')}}</a>
<br><br>

                            <div class="row d-none" id="dons-entry">


                                <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('Donateur_trans.Name')}}</th>
                                            <th>{{trans('Don_trans.Phone_Don')}}</th>
                                            <th>{{trans('Don_trans.montant')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dons-entry-tr">
                                        <td>
                                          
                                        </td>
                                    </tbody>
                                </table>
                                <input type="submit" class="btn btn-rounded btn-primary" value="{{trans('Don_trans.Submit')}}">
                                 </div>
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
    <script>
        $(document).on('click', '#search', function () {
     var donateur_id = $('#donateur_id').val();
     console.log(donateur_id);
    
 
     $.ajax({      
         url: "{{ URL::to('donnateur') }}/" + donateur_id ,
         type: "GET",
         dataType: "json",
         success: function (data) {
           
             console.log(data); // Vérifie les données retournées
             $('#dons-entry').removeClass('d-none');
             var html = '';
 
             $('#dons-entry-tr').html('');
 
             if (typeof data === 'object') {
                $.each(data, function (index, item) {
    html += '<tr>' +
        '<td>' + item.id + '</td>' +
        '<td>' + item.name.ar + '</td>' +
        '<td>' + item.Phone_Donateur + '</td>' +
        '<td><input type="text" class="form-control form-control-sm" name="montant"></td>' +
        '</tr>';
});
 }else {
                 console.log("Les données retournées ne sont pas un objet.");
             }
 
             $('#dons-entry-tr').append(html);
         },
         error: function (xhr, status, error) {
             console.log("Erreur lors de la récupération des données: " + error);
         }
     });
 });
     </script>
@endsection
