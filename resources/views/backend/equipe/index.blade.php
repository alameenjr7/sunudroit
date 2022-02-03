@extends('backend.layouts.master')

@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1><a href="{{route('admin')}}">Tableau de bord</a></h1>
        <ul>
            <li>Employeurs</li>
            <li>Liste de Nos Employeurs</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    <!-- end of row-->
    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">Liste de Nos Employeurs</h4>
                    <p class="float-right"> Nombre total d'employeurs: {{$equipePros->count()}}</p>
                    <div class="col-lg-12">
                        @include('backend.layouts.notification')
                    </div>
                    <div class="table-responsive">
                        <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Photo</th>
                                    <th>Prenom</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Adresse</th>
                                    <th>Telephone</th>
                                    <th>Poste</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($equipePros as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td style="text-align: center">
                                            <img src="{{$item->photo}}" style="height: 60px; width: 60px;">
                                        </td>
                                        <td>{{$item->prenom}}</td>
                                        <td>{{$item->nom}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->adresse}}</td>
                                        <td>{{$item->telephone}}</td>
                                        <td>{{$item->poste}}</td>
                                        {{-- <td>{!! html_entity_decode($item->description) !!}</td> --}}
                                        
                                        <td>
                                            @if ($item->status=='active')
                                            <span class="badge badge-success">Active</span>
                                            @else
                                            <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-success float-left" href="{{route('equipe.edit',$item->id)}}"
                                                title="Modifier" data-toggle="tooltip" data-placement="bottom">
                                                <i class="nav-icon i-Pen-2"></i>
                                            </a>
                                            <form action="{{route('equipe.destroy', $item->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="" title="Supprimer" data-toggle="tooltip" data-id="{{$item->id}}" data-placement="bottom"
                                                     class="delete btn btn-danger float-left ml-1" >
                                                    <i class="nav-icon i-Close-Window"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of col-->
    </div>
</div>

@endsection

@section('scripts')

<script>
    $('input[name=toogle]').change(function(){
        var mode = $(this).prop('checked');
        var id=$(this).val();
        // alert(id);
        $.ajax({
            url:"{{route('banner.status')}}",
            type:"POST",
            data:{
                _token:'{{csrf_token()}}',
                mode:mode,
                id:id,
            },
            success:function(response){
                if(response.status){
                    alert(response.msg);
                }
                else{
                    alert('Please try again!')
                }
            }
        })
    });
</script>


<script>
   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
   });
    $('.delete').click(function(e) {
        e.preventDefault();
        var form = $(this).closest('form');
        var dataID = $(this).data('id');
        // alert(dataID);
        swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0CC27E',
        cancelButtonColor: '#FF586B',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        confirmButtonClass: 'btn btn-success mr-5',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false
        }).then((willDelete)=> {
            if(willDelete){
                form.submit();
                swal('Deleted!', 'Your imaginary file has been deleted.', 'success');
            }
        }, function (dismiss) {
        // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
        if (dismiss === 'cancel') {
            swal('Cancelled', 'Your imaginary file is safe :)', 'error');
        }
        });
    });
</script>

@endsection