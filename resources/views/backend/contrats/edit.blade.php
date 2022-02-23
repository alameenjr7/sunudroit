@extends('backend.layouts.master')

@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1><a href="{{route('admin')}}">Tableau de bord</a></h1>
        <ul>
            <li>Contrat</li>
            <li>Modification d'une Contrat</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-3">Modifier les cases suivantes </div>
                    <div class="col-md-12">
                        @include('components.errors')
                    </div>
                    <form action="{{route('contrats.update',$contrat->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12 form-group mb-3">
                                <label for="firstName2">Title</label>
                                <input class="form-control form-control-rounded" id="firstName2" type="text" name="title" value="{{$contrat->title}}" required placeholder="Entrer le titre du contrat" />
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Status</label>
                                <select name="status" class="form-control form-control-rounded">
                                    <option value="activer" {{$contrat->status=='activer' ? 'selected' : ''}}>Active</option>
                                    <option value="desactiver" {{$contrat->status=='desactiver' ? 'selected' : ''}}>Desactiver</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3" id="CONDITIONS">
                                <label for="picker1">Condition</label>
                                <select name="conditions" class="form-control form-control-rounded" id="SELECTE">
                                    <option id="conditions" value="gratuit" {{$contrat->conditions=='gratuit' ? 'selected' : ''}}>Gratuit</option>
                                    <option id="conditions" value="payant" {{$contrat->conditions=='payant' ? 'selected' : ''}}>Payant</option>
                                </select>
                            </div>

                            <div class="col-md-12 form-group mb-3" id="PRIX">
                                <label for="prix">Prix</label>
                                <input class="form-control form-control-rounded" id="prix" type="number" name="prix" value="{{$contrat->prix}}" placeholder="Ex: 1000" />
                            </div>

                            <div class="col-md-12 form-group mb-3">
                                <label for="website2">Contenu</label>
                                <textarea class="form-control form-control-rounded" id="contenu" placeholder="Web address" name="contenu" placeholder="Contenu ...">{{$contrat->contenu}}</textarea>
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
    

    function htmlDecode(value){
        var txt = document.createElement("textarea");
        txt.innerHTML = html;
        return txt.value;
    }
 </script>
@endsection