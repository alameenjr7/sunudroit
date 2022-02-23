@extends('backend.layouts.master')

@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1><a href="{{route('admin')}}">Tableau de bord</a></h1>
        <ul>
            <li>Contrat</li>
            <li>Creation d'une Contrat</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-3">Remplissez les cases suivantes </div>
                    <div class="col-md-12">
                        @include('components.errors')
                    </div>
                    <form action="{{route('contrats.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 form-group mb-3">
                                <label for="firstName2">Title</label>
                                <input class="form-control form-control-rounded" id="firstName2" type="text" name="title" value="{{old('title')}}" required placeholder="Enter your title" />
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Status</label>
                                <select name="status" class="form-control form-control-rounded">
                                    <option value="activer" {{old('status')=='activer' ? 'selected' : ''}}>Active</option>
                                    <option value="desactiver" {{old('status')=='desactiver' ? 'selected' : ''}}>Desactiver</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Condition</label>
                                <select name="conditions" id="CONDITIONS" class="form-control form-control-rounded">
                                    <option value="gratuit" {{old('conditions')=='gratuit' ? 'selected' : ''}}>Gratuit</option>
                                    <option value="payant" {{old('conditions')=='payant' ? 'selected' : ''}}>Payant</option>
                                </select>
                            </div>

                            <div class="col-md-12 form-group mb-3 d-none" id="PRIX">
                                <label for="prix">Prix</label>
                                <input class="form-control form-control-rounded" id="prix" type="number" name="prix" value="{{old('prix')}}" placeholder="Ex: 1000" />
                            </div>
                            
                            <div class="col-md-12 form-group mb-3">
                                <label for="website2">Contenu</label>
                                <textarea class="form-control form-control-rounded" id="contenu" name="contenu" placeholder="Contenu ...">{{old('contenu')}}</textarea>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="create btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.create').click(function(e) {
         e.preventDefault();
         var form = $(this).closest('form');
        //  var dataID = $(this).data('id');
        //   alert(dataID);
        swal({
            type: 'success',
            title: 'Success!',
            text: 'Your work has been saved',
            buttonsStyling: false,
            confirmButtonClass: 'btn btn-lg btn-success'
            })
            .then((willCreate)=> {
                if(willCreate){
                    form.submit();
                // swal('Your imaginary file has been created.');
            }
         });
    });

    $(document).ready(function(){
        $("#CONDITIONS").change(function(){
            // e.preventDefault();
            var responseID = $(this).val();
            console.log(responseID);

            if(responseID == "payant")
            {
                $('#PRIX').removeClass('d-none');
                $('#PRIX').val('');
                document.getElementById('prix').required = true;
            }
            else
            {
                $('#PRIX').addClass('d-none');
                document.getElementById('prix').required = false;
            }
        });
    });

    function htmlDecode(value){
        var txt = document.createElement("textarea");
        txt.innerHTML = html;
        return txt.value;
    }

 </script>
@endsection