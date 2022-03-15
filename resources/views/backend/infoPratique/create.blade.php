@extends('backend.layouts.master')

@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1><a href="{{route('admin')}}">Tableau de bord</a></h1>
        <ul>
            <li>Infs Pratiques</li>
            <li>Creation d'une Info.</li>
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
                    <form action="{{route('info_pratique.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 form-group mb-3">
                                <label for="firstName2">Title</label>
                                <input class="form-control form-control-rounded" id="firstName2" type="text" name="title" value="{{old('title')}}" required placeholder="Enter your title" />
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <label for="website2">Description</label>
                                <textarea class="form-control form-control-rounded" id="contenu" placeholder="Web address" name="description" placeholder="Description ...">{{old('description')}}</textarea>
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <label for="picker1">Status</label>
                                <select name="status" class="form-control form-control-rounded">
                                    <option value="active" {{old('status')=='active' ? 'selected' : ''}}>Active</option>
                                    <option value="inactive" {{old('status')=='inactive' ? 'selected' : ''}}>Desactiver</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <label for="picker1">Icons</label>
                                <select name="icons" class="form-control form-control-rounded">
                                    <option value="flaticon-car-1" {{old('icons')=='flaticon-car-1' ? 'selected' : ''}}>Icon 1</option>
                                    <option value="flaticon-briefcase" {{old('icons')=='flaticon-briefcase' ? 'selected' : ''}}>Icon 2</option>
                                    <option value="flaticon-handcuffs-1" {{old('icons')=='flaticon-handcuffs-1' ? 'selected' : ''}}>Icon 3</option>
                                    <option value="flaticon-save-money" {{old('icons')=='flaticon-save-money' ? 'selected' : ''}}>Icon 4</option>
                                    <option value="flaticon-injury" {{old('icons')=='flaticon-injury' ? 'selected' : ''}}>Icon 5</option>
                                    <option value="flaticon-law" {{old('icons')=='flaticon-law' ? 'selected' : ''}}>Icon 6</option>
                                    <option value="flaticon-balance" {{old('icons')=='flaticon-balance' ? 'selected' : ''}}>Icon 7</option>
                                    <option value="flaticon-notebook" {{old('icons')=='flaticon-notebook' ? 'selected' : ''}}>Icon 8</option>
                                    <option value="flaticon-auction" {{old('icons')=='flaticon-auction' ? 'selected' : ''}}>Icon 9</option>
                                    <option value="flaticon-marketing" {{old('icons')=='flaticon-marketing' ? 'selected' : ''}}>Icon 10</option>
                                </select>
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
 </script>
@endsection
