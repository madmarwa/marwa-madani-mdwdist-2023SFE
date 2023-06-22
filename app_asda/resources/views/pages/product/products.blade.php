@extends('layouts.master')
@section('css')
@toastr_css
@endsection
@section('title')
{{ trans('Product_trans.Step1') }}
@endsection
@section('page-header')

<!-- breadcrumb -->
@section('PageTitle')
{{ trans('Product_trans.Step1') }}
@endsection

<!-- breadcrumb -->
@endsection
@section('content')

<!-- row -->
<div class="row">
@if ($errors->any())
<div class="error">{{ $errors->first('Name') }}</div>
@endif

<div class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
        <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
            {{ trans('Product_trans.add_product') }}
        </button>
        <br><br>
        <div class="card-body">
            <h4>{{ trans('Product_trans.Total_Products') }} : {{ $totalProducts }}</h4>
        </div>
        <div class="table-responsive">
            <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                style="text-align: center">
                <thead>
                    <tr >
                        <th>#</th>
                        <th>{{ trans('Product_trans.Name') }}</th>
                        <th>{{ trans('Product_trans.date') }}</th>
                       
                        <th>{{ trans('Product_trans.Processes') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($products as $product)
                        <tr>
                            <?php $i++; ?>
                            <td>{{ $i }}</td>
                            <td>{{ $product->produit }}</td>
                            <td>{{ $product->created_at }}</td>
                           
                            <td>
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#edit{{ $product->id }}"
                                    title="{{ trans('Product_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete{{ $product->id }}"
                                    title="{{ trans('Product_trans.Delete') }}"><i
                                        class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                     
                        <!-- edit_modal_product -->
                        <div class="modal fade" id="edit{{ $product->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                            id="exampleModalLabel">
                                            {{ trans('Product_trans.edit_product') }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    
                                    <div class="modal-body">
                                        
                                        <!-- add_form -->
                                        <form action="{{ route('products.update', 'test') }}" method="post">
                                            {{ method_field('patch') }}
                                            @csrf
                                            <div class="row">
                                                <div class="col">
                                                    <label for="produit"
                                                        class="mr-sm-2">{{ trans('Product_trans.Name_product') }}
                                                        :</label>
                                                    <input id="produit" type="text" name="produit"
                                                        class="form-control"
                                                        value="{{ $product->getTranslation('produit', 'ar') }}"
                                                        required>
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $product->id }}">
                                                </div>
                                                <div class="col">
                                                    <label for="produit_en"
                                                        class="mr-sm-2">{{ trans('Product_trans.Name_product_en') }}
                                                        :</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $product->getTranslation('produit', 'fr') }}"
                                                        name="produit_en" required>
                                                </div>
                                            </div>
                                         
                                            <br><br>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ trans('Product_trans.Close') }}</button>
                                                <button type="submit"
                                                    class="btn btn-success">{{ trans('Product_trans.submit') }}</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- delete_modal_product -->
                        <div class="modal fade" id="delete{{ $product->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                            id="exampleModalLabel">
                                            {{ trans('Product_trans.delete_product') }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('products.destroy', 'test') }}" method="post">
                                            {{ method_field('Delete') }}
                                            @csrf
                                            {{ trans('Product_trans.Warning_product') }}
                                            <input id="id" type="hidden" name="id" class="form-control"
                                                value="{{ $product->id }}">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ trans('Product_trans.Close') }}</button>
                                                <button type="submit"
                                                    class="btn btn-danger">{{ trans('Product_trans.submit') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                    @endforeach
            </table>
          
        </div>
    </div>
</div>
</div>
<!-- add_modal_product -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('Product_trans.add_product') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="produit" class="mr-sm-2">   {{ trans('Product_trans.Name_product') }}
                                :</label>
                            <input id="produit" type="text" name="produit" class="form-control">
                        </div>
                        <div class="col">
                            <label for="produit_en" class="mr-sm-2">   {{ trans('Product_trans.Name_product_en') }} 
                                :</label>
                            <input type="text" class="form-control" name="produit_en">
                        </div>
                    </div>
                  
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('Product_trans.Close') }}</button>
                <button type="submit" class="btn btn-success">{{ trans('Product_trans.submit') }}</button>
            </div>
            </form>    </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
