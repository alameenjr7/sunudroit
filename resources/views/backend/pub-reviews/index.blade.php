@extends('backend.layouts.master')

@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1>Task Manager</h1>
        <ul>
            <li><a href="href">Apps</a></li>
            <li>Task Manager</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div id="task-manager-list">
        <!--  content area -->
        <div class="content">
            <!--  task manager table -->
            <div class="card" id="card">
                <div class="card-header bg-transparent ul-task-manager__header-inline">
                    <h6 class="card-title task-title">Task Manager</h6>
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
                        {{-- <label><span>Show:</span>
                            <select>
                                <option value="15">15</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="75">75</option>
                                <option value="100">100</option>
                            </select>
                        </label> --}}
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered custom-sm-width" id="names">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Publication/Commentaires</th>
                                    <th scope="col">Nom Complet</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Rate</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody id="names">
                                <!-- --------------------------- tr1 -------------------------------------------->
                                @foreach ($pubReviews as $pubRev)
                                    <tr id="names">
                                        <th class="head-width" scope="row">{{$pubRev->id}}</th>
                                        <td class="collection-item">
                                            @php
                                                $pubName = App\Models\Publication::where('id',$pubRev->publication_id)->first();
                                               
                                            @endphp
                                            <div class="font-weight-bold"><a href="#">{{$pubName->title}}</a></div>
                                            <div class="text-muted">{{$pubRev->review}}</div>
                                        </td>
                                        <td class="custom-align">
                                            <div class="btn-group">
                                                <p>{{$pubRev->full_name}}</p>
                                            </div>
                                        </td>
                                        <td class="custom-align">
                                            <div class="btn-group">
                                                <p>{{$pubRev->email}}</p>
                                            </div>
                                        </td>
                                        <td class="custom-align">
                                            <div class="d-inline-flex align-items-center calendar align-middle"><i class="i-Calendar-4"></i><span>{{$pubRev->getCreatedAt()}}</span></div>
                                        </td>
                                        <td class="custom-align">
                                            <div class="">
                                                @for ($i=0; $i<4; $i++)
                                                    @if ($pubRev->rate>$i)
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    @else
                                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                        </td>
                                        <td class="custom-align">
                                            <input 
                                                type="checkbox" 
                                                name="toggle-state"
                                                value="{{$pubRev->id}}"
                                                data-toggle="toggle"
                                                {{$pubRev->status=='active' ? 'checked' : ''}}  
                                                data-onstyle="outline-success" 
                                                data-offstyle="outline-danger"
                                                data-on="Activer"
                                                data-off="Desactiver"
                                            >
                                        </td>
                                        
                                    </tr>
                                @endforeach
                                <!-- ------------------------------ end of tr1 -------------------------------------->
                            
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- {{$pubReviews->render()}} --}}
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
                url:"{{route('pub.review.status')}}",
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
