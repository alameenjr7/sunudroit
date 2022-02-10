@extends('backend.layouts.master')

@section('content')
<div class="main-content">
    <div class="breadcrumb">
        <h1><a href="{{route('admin')}}">Tableau de bord</a></h1>
        <ul>
            <li>Publication</li>
            <li>Liste des Publications</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <section class="contact-list">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-header text-right bg-transparent">
                        <form action="{{route('publication.create')}}" method=""> 
                            @csrf
                            <button class="btn btn-primary btn-md m-1" type="submit" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="i-Add-Post text-white mr-2"></i> Ajouter une publication</button>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display table" id="ul-contact-list" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Sous-titre</th>
                                        <th>Contenu</th>
                                        <th>Conditions</th>
                                        <th>Status</th>
                                        <th>Date Creation</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach ($publications as $publication)
                                    <tbody>
                                        <tr>
                                            <td hidden>{{$publication->id}}</td>
                                            <td>
                                                <a href="">
                                                    <div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{asset($publication->photo)}}" alt="" /> {{ $publication->title}}</div>
                                                </a>
                                            </td>
                                            <td>{{$publication->subtitle}}</td>
                                            <td>{!! html_entity_decode(\Illuminate\Support\Str::words($publication->contenu, 20, '....')) !!}</td>
                                            
                                            <td>
                                                @if ($publication->conditions == 'publier')
                                                    <a class="badge badge-success m-2 p-2" href="#">Publier</a>
                                                @else
                                                    <a class="badge badge-warning m-2 p-2" href="#">Future Pub</a>
                                                @endif
                                            </td>
                                            <td>
                                                <input 
                                                    type="checkbox" 
                                                    name="toggle-state"
                                                    value="{{$publication->id}}"
                                                    data-toggle="toggle"
                                                    {{$publication->status=='active' ? 'checked' : ''}}  
                                                    data-onstyle="outline-success" 
                                                    data-offstyle="outline-danger"
                                                    data-on="Activer"
                                                    data-off="Desactiver"
                                                >
                                            </td>
                                            <td>{{$publication->getCreatedAt()}}</td>
                                            <td>
                                                <a class="ul-link-action text-success" href="{{route('publication.edit',$publication->id)}}" data-toggle="tooltip" data-placement="top" title="Modifier">
                                                    <i class="i-Edit"></i>
                                                </a>
                                                <form action="{{route('publication.destroy', $publication->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a class="ul-link-action text-danger mr-1 delete" title="Supprimer" data-toggle="tooltip" data-id="{{$publication->id}}" data-placement="bottom">
                                                        <i class="i-Eraser-2"></i>
                                                    </a>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- end of main-content -->

@endsection

@section('scripts')

<script>
    $(function() {
        $('input[name=toggle-state]').change(function(){
           const _this = $(this).prop('checked');
           const id = $(this).val();
        //    console.log(id);
            
            $.ajax({
                url:"{{route('publication.status')}}",
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