@extends('backend.layouts.master')

@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1><a href="{{route('admin')}}">Tableau de bord</a></h1>
        <ul>
            <li>Banniere</li>
            <li>Liste des Bannieres</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    <!-- end of row-->
    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">Liste des Bannieres</h4>
                    <p class="float-right"> Total Banieres: {{$banners->count()}}</p>
                    <div class="col-lg-12">
                        @include('backend.layouts.notification')
                    </div>
                    <div class="table-responsive">
                        <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Sous Titre</th>
                                    <th>URL</th>
                                    <th>Description</th>
                                    <th>Photo</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banners as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->subtitle}}</td>
                                        <td>{{$item->slug}}</td>
                                        <td>{!! html_entity_decode(\Illuminate\Support\Str::words($item->description, 20, '....')) !!}</td>
                                        <td style="text-align: center">
                                            <img src="{{asset($item->photo)}}" style="height: 60px; width: 60px;">
                                        </td>
                                        <td>
                                            <input 
                                                type="checkbox" 
                                                name="toggle-state"
                                                value="{{$item->id}}"
                                                data-toggle="toggle"
                                                {{$item->status=='active' ? 'checked' : ''}}  
                                                data-onstyle="outline-success" 
                                                data-offstyle="outline-danger"
                                                data-on="Activer"
                                                data-off="Desactiver"
                                            >
                                            
                                        </td>
                                        <td>
                                            <a class="btn btn-success float-left" href="{{route('banniere.edit',$item->id)}}"
                                                title="Modifier" data-toggle="tooltip" data-placement="bottom">
                                                <i class="nav-icon i-Pen-2"></i>
                                            </a>
                                            <form action="{{route('banniere.destroy', $item->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="" title="Supprimer" data-toggle="tooltip" data-id="{{$item->id}}" data-placement="bottom"
                                                     class="delete btn btn-danger float-left" >
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
    $(function() {
        $('input[name=toggle-state]').change(function(){
           const _this = $(this).prop('checked');
           const id = $(this).val();
        //    console.log(id);
            
            $.ajax({
                url:"{{route('banner.status')}}",
                type:"POST",
                data:{
                    _token:"{{csrf_token()}}",
                    _this:_this,
                    id:id,
                },
                success:function(response){
                    if(response.status){
                        // console.log(response.msg)
                        toastr.success(response.msg);
                        // showToastr('success', 'Success!', html)
                    }
                    else{
                        toastr.error('Essai encore');
                        // showToastr('error', 'Error!', html)
                    }
                }
            });
            
        });
    });
</script>

@endsection
