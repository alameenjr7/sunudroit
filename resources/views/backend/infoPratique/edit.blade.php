@extends('backend.layouts.master')

@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1><a href="{{route('admin')}}">Tableau de bord</a></h1>
        <ul>
            <li>Infos Pratiques</li>
            <li>Modification d'une Info.</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-3">Modifiez les cases suivantes </div>
                    <div class="col-md-12">
                        @include('components.errors')
                    </div>
                    <form action="{{route('info_pratique.update',$infos->id)}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="firstName2">Title</label>
                                <input class="form-control form-control-rounded" type="text" name="title" value="{{$infos->title}}" required placeholder="Enter your title" />
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <label for="website2">Description</label>
                                <textarea class="form-control form-control-rounded" id="contenu"  placeholder="Ecrire quelque chose ..." name="description">{{$infos->description}}</textarea>
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <label for="picker1">Status</label>
                                <select name="status" class="form-control form-control-rounded" onchange="yesnoCheck(this)">
                                    <option value="active" {{$infos->status=='active' ? 'selected' : ''}}>Active</option>
                                    <option value="inactive" {{$infos->status=='inactive' ? 'selected' : ''}}>Desactiver</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <label for="picker1">Icons</label>
                                <select name="icons" class="form-control form-control-rounded">
                                    <option value="flaticon-car-1" {{$infos->icons=='flaticon-car-1' ? 'selected' : ''}}>Icon 1</option>
                                    <option value="flaticon-briefcase" {{$infos->icons=='flaticon-briefcase' ? 'selected' : ''}}>Icon 2</option>
                                    <option value="flaticon-handcuffs-1" {{$infos->icons=='flaticon-handcuffs-1' ? 'selected' : ''}}>Icon 3</option>
                                    <option value="flaticon-save-money" {{$infos->icons=='flaticon-save-money' ? 'selected' : ''}}>Icon 4</option>
                                    <option value="flaticon-injury" {{$infos->icons=='flaticon-injury' ? 'selected' : ''}}>Icon 5</option>
                                    <option value="flaticon-law" {{$infos->icons=='flaticon-law' ? 'selected' : ''}}>Icon 6</option>
                                    <option value="flaticon-balance" {{$infos->icons=='flaticon-balance' ? 'selected' : ''}}>Icon 7</option>
                                    <option value="flaticon-notebook" {{$infos->icons=='flaticon-notebook' ? 'selected' : ''}}>Icon 8</option>
                                    <option value="flaticon-auction" {{$infos->icons=='flaticon-auction' ? 'selected' : ''}}>Icon 9</option>
                                    <option value="flaticon-marketing" {{$infos->icons=='flaticon-marketing' ? 'selected' : ''}}>Icon 10</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="update btn btn-raised ripple btn-raised-success ml-1">Modifier</button>
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
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>

    <script>
        function yesnoCheck(that) {
            if(that.value == "active"){
                document.getElementById("open").style.display="block";

            } else{
                document.getElementById("open").style.display="none";
            }
        }
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.update').click(function(e) {
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
