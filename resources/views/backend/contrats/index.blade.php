@extends('backend.layouts.master')

@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1><a href="{{route('admin')}}">DASHBOARD</a></h1>
        <ul>
            <li>Contrat</li>
            <li><a href="{{route('contrats.create')}}">AJOUTER UN CONTRAT</a></li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div id="task-manager-list">
        <!--  content area -->
        <div class="content">
            <!--  task manager table -->
            <div class="card" id="card">
                <div class="card-header bg-transparent ul-task-manager__header-inline">
                    <h6 class="card-title task-title">Liste des contrats</h6>
                    <div class="headder-elements">
                        <div class="list-icons">
                            <a class="ul-task-manager__list-icon" id="reload" href="{{route('commentaires.index')}}">
                                <i class="i-Repeat-21"></i>
                            </a>
                            <a class="ul-task-manager__list-icon" id="close-window" href="href">
                                <i class="i-Close-Window"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="card-body">
                    <div class="search ul-task-manager__search-inline">
                        <nav class="navbar">
                            <form class="form-inline">
                                <label class="col-sm-2 col-form-label mr-2" for="inputEmail3">Filter:</label>
                                <input class="form-control mr-sm-2" id="filterInput" type="search" placeholder="type to filter" aria-label="Search" />
                            </form>
                        </nav>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered custom-sm-width" id="names">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">TITRE</th>
                                    <th scope="col">CONTENU</th>
                                    <th scope="col">PRIX</th>
                                    <th scope="col">CONDITION</th>
                                    <th scope="col">DATE</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody id="names">
                                <!-- --------------------------- tr1 -------------------------------------------->
                                @foreach ($contrats as $data)
                                    <tr id="names">
                                        <th class="head-width" scope="row">{{$data->id}}</th>
                                        <td class="collection-item">
                                            <div class="font-weight-bold"><a href="#">{{ucfirst($data->title)}}</a></div>
                                            <div class="text-muted">{{$data->slug}}</div>
                                        </td>
                                        <td>
                                            <div class="">
                                                {{ $data->limit() }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="">
                                                {{ $data->prix}}
                                            </div>
                                        </td>
                                        <td class="custom-align" style="text-align: center;">
                                            <div class="btn-group" >
                                                @if ($data->conditions == 'gratuit')
                                                    <a class="badge badge-success m-2 p-2" href="#">GRATUIT</a>
                                                @else
                                                    <a class="badge badge-warning m-2 p-2" href="#">PAYANT</a>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="custom-align">
                                            <div class="d-inline-flex align-items-center calendar align-middle"><i class="i-Calendar-4"></i><span>{{$data->getCreatedAt()}}</span></div>
                                        </td>
                                        <td class="custom-align" style="text-align: center;">
                                            <input 
                                                type="checkbox" 
                                                name="toggle-state"
                                                value="{{$data->id}}"
                                                data-toggle="toggle"
                                                {{$data->status=='activer' ? 'checked' : ''}}  
                                                data-onstyle="outline-success" 
                                                data-offstyle="outline-danger"
                                                data-on="Activer"
                                                data-off="Desactiver"
                                            >
                                        </td>
                                        <td class="custom-align" style="text-align: center;">
                                            <div class="btn-group" >
                                                <a class="ul-link-action text-success" href="{{route('contrats.edit',$data->id)}}" data-toggle="tooltip" data-placement="top" title="Modifier">
                                                    <i class="i-Edit"></i>
                                                </a>
                                                <form action="{{route('contrats.destroy', $data->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a class="ul-link-action text-danger mr-1 delete" title="Supprimer" data-toggle="tooltip" data-id="{{$data->id}}" data-placement="bottom">
                                                        <i class="i-Eraser-2"></i>
                                                    </a>
                                                </form>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                                <!-- ------------------------------ end of tr1 -------------------------------------->
                            
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- {{$dataiews->render()}} --}}
            </div>
            <!--  end of task manager table -->
        </div>
        <!--  end of content area -->
    </div><!-- end of main-content -->
    <!-- Footer Start -->
    <div class="flex-grow-1"></div>
    
</div>

@endsection

@section('scripts')

<script>
    $(function() {
        $('input[name=toggle-state]').change(function(){
           const _this = $(this).prop('checked');
           const id = $(this).val();
        //    console.log(id);
            
            $.ajax({
                url:"{{route('contrats.status')}}",
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

    $(document).ready(function() {
        var elem = $(".baba");
        console.log(elem)
        if(elem){
            if(elem.text().length > 50)
                elem.text(elem.text().substr(0,50));
        }
    });

</script>

@endsection