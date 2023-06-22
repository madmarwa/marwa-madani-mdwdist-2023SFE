@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('Donateur_trans.show_Donateurs')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('Donateur_trans.show_Donateurs')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="card-body">
                        <div class="tab nav-border">
                  
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                     aria-labelledby="home-02-tab">
                                     <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                     data-page-length="50"
                                     style="text-align: center">
                                  <thead>
                                  <tr>
                                      <th>#</th>
                                      <th> {{trans('Donateur_trans.Name')}}</th>
                                    
                                    
                                      <th>{{trans('Don_trans.montant')}}</th>
                                     
                                      <th>{{trans('Don_trans.Date_dons')}}</th>
                                      <th>{{trans('Students_trans.Processes')}}</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <?php $i = 0; ?>
                                  
                                
                                  @foreach ($Dons as $don)
                                  <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                      <td>{{ $donateur->name }}</td>
                                      <td>{{ $don->montant }}</td>
                                      <td>{{ $don->created_at }}</td>
                                      <td>
                                        <a href="{{route('Dons.edit', $don->id )}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                      
                                    </td>
                                  </tr>
                              @endforeach

                                    
                                                  <div class="modal-footer">
                                                      <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary"  onclick="redirectToIndex()"
                                                                  data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
                                                        
                                                      </div>
                                                  </div>
                                              </div>
                                              </form>
                                          </div>
                                      </div>
                                    
                                 
                              </table>
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
    function redirectToIndex() {
        window.location.href = "{{ route('Dons.index') }}";
    }
</script>
@endsection
