@extends('layouts.master')

@section('css')
    @toastr_css
@endsection

@section('title')
{{trans('Event_trans.add_Event')}}
@stop

@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
    {{trans('Event_trans.add_Event')}}
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

                            <form action="{{ route('events.store') }}" method="post" >
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <label for="nameEvent">{{trans('Event_trans.Name_Event')}}</label>
                                        <input type="text" name="nameEvent_ar" class="form-control">
                                        

                                        @error('nameEvent_ar')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="nameEvent">{{trans('Event_trans.Name_Event_en')}}</label>
                                        <input type="text" name="nameEvent_en" class="form-control">
                                        @error('nameEvent_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="lieuEvent">{{trans('Event_trans.lieuEvent_ar')}}</label>
                                        <input type="text" name="lieuEvent_ar" class="form-control">
                                        @error('lieuEvent_ar')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="lieuEvent">{{trans('Event_trans.lieuEvent_fr')}}</label>
                                        <input type="text" name="lieuEvent_en" class="form-control">
                                        @error('lieuEvent_en')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="date">{{trans('Event_trans.date')}}</label>
                                        <input type="date" name="date" class="form-control">

                                        @error('date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="description">{{trans('Event_trans.description')}}</label>
                                        <textarea name="description" class="form-control"></textarea>
                                        @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="type-vente">{{trans('Event_trans.Type_de_vente')}}</label>
                                        <select name="type-vente" id="type-vente" class="form-control form-control-lg">
                                            <option value="">{{trans('Event_trans.select_option')}}</option>
                                            <option value="avec-vente">{{trans('Event_trans.Avec_vente')}}</option>
                                            <option value="sans-vente">{{trans('Event_trans.Sans_vente')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div id="form-avec-vente" style="display: none;">
                                    <div class="form-row">
                                        <div class="col">
                                         
                                       
                                          
                                
                                            <p> {{trans('Event_trans.products_available')}}</p><br>
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
                                            <div class="form-row">
                                                <div class="col">
                                                    <label for="title">{{ trans('Event_trans.Totale_vent') }}</label>
                                                    <input type="text" name="Totale_vent"  class="form-control">
                                                    @error('Totale_vent')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                <div id="form-sans-vente" style="display: none;">
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="fraisEvent">{{ trans('Event_trans.fraisEvent') }}</label>
                                            <input type="number" name="fraisEvent" class="form-control">
                                            @error('fraisEvent')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="button"  class="btn btn-success" onclick="confirmDelete(event)">{{trans('Grades_trans.submit')}}</button>
                                </div>
                                
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
@endsection

@section('js')
    @toastr_js
    @toastr_render
    <script>
       $(document).ready(function() {
    // Masquer les formulaires au chargement de la page
    $("#form-avec-vente").hide();
    $("#form-sans-vente").hide();

    // Gérer l'affichage des formulaires en fonction de la sélection de l'utilisateur
    $("#type-vente").change(function() {
        var selectedOption = $(this).val();

        if (selectedOption === "avec-vente") {
            $("#form-avec-vente").show();
            $("#form-sans-vente").hide();
        } else if (selectedOption === "sans-vente") {
            $("#form-avec-vente").hide();
            $("#form-sans-vente").show();
        } else {
            $("#form-avec-vente").hide();
            $("#form-sans-vente").hide();
        }
        
        // Afficher ou masquer la fenêtre de confirmation en fonction de la sélection
        if ($("#type-vente").val() === "avec-vente") {
    $(".custom-confirm").show();
} else {
    $(".custom-confirm").hide();
}

    });
});

    </script>
    
  <script>
    function confirmDelete(event) {
        event.preventDefault();

        var confirmDialog = document.createElement('div');
        confirmDialog.classList.add('custom-confirm');

        var title = document.createElement('h2');
        title.textContent = "{{ trans('Event_trans.confirmation') }}";
        if ($("#type-vente").val() === "avec-vente") {
        var message = document.createElement('p');
        message.textContent = "{{ trans('Event_trans.confirm_delete_product') }}";
        }
        else{
            var message = document.createElement('p');
        message.textContent = "{{ trans('Event_trans.confirm') }}";
        }
        var buttonsContainer = document.createElement('div');
        buttonsContainer.classList.add('confirm-buttons');

        var confirmButton = document.createElement('button');
        confirmButton.textContent = "{{ trans('Event_trans.yes') }}";
        confirmButton.onclick = function() {
            document.body.removeChild(confirmDialog);
            // Soumettre le formulaire de suppression
            var form = event.target.closest('form');
            form.submit();
        };

        var cancelButton = document.createElement('button');
        cancelButton.textContent = "{{ trans('Event_trans.no') }}";
        cancelButton.classList.add('cancel');
        cancelButton.onclick = function() {
            document.body.removeChild(confirmDialog);
            // Annuler la suppression
            return false;
        };

        buttonsContainer.appendChild(confirmButton);
        buttonsContainer.appendChild(cancelButton);

        confirmDialog.appendChild(title);
        confirmDialog.appendChild(message);
        confirmDialog.appendChild(buttonsContainer);

        document.body.appendChild(confirmDialog);
    }
</script>

<style>
    .custom-confirm {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        font-family: Arial, sans-serif;
        font-size: 14px;
        color: #333;
        width: 300px;
        text-align: center;
        z-index: 9999;
    }

    .custom-confirm h2 {
        font-size: 18px;
        margin-top: 0;
    }

    .custom-confirm p {
        margin-bottom: 20px;
    }

    .custom-confirm .confirm-buttons {
        margin-top: 10px;
        text-align: center;
    }

    .custom-confirm .confirm-buttons button {
        padding: 6px 12px;
        margin: 0 5px;
        font-size: 14px;
        border-radius: 4px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    .custom-confirm .confirm-buttons button.cancel {
        background-color: #999;
    }
</style>

@endsection
