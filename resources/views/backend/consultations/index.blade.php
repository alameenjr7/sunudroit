@extends('backend.layouts.master')

@section('content')

<div class="main-content">
    <div class="card chat-sidebar-container" data-sidebar-container="chat">
        <div class="chat-sidebar-wrap" data-sidebar="chat">
            <div class="border-right">
                <div class="pt-2 pb-2 pl-3 pr-3 d-flex align-items-center o-hidden box-shadow-1 chat-topbar"><a class="link-icon d-md-none" data-sidebar-toggle="chat"><i class="icon-regular ml-0 mr-3 i-Left"></i></a>
                    <div class="form-group m-0 flex-grow-1">
                        <input class="form-control form-control-rounded" id="search" type="text" placeholder="Search contacts" />
                    </div>
                </div>
                <div class="contacts-scrollable perfect-scrollbar">
                    <div class="mt-4 pb-2 pl-3 pr-3 font-weight-bold text-muted border-bottom">Recent</div>
                    @if (count($consultations)>0)
                    @foreach ($consultations as $consultation)
                        <div class="p-3 d-flex align-items-center border-bottom online contact" data-id="{{$consultation->id}}">
                            <input hidden value="{{$consultation->id}}"/>
                                <img class="avatar-sm rounded-circle mr-3" src="{{asset('backend/assets/dist-assets/images/faces/13.jpg')}}" alt="alt" />
                                <div>
                                    <h6 class="m-0">{{$consultation->full_name}}</h6><span class="text-muted text-small">{{$consultation->getCreatedAt()}}</span>
                                </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="chat-content-wrap"  data-sidebar-content="chat" data-target="{{$consultation->id}}">
            <div class="d-flex pl-3 pr-3 pt-2 pb-2 o-hidden box-shadow-1 chat-topbar"><a class="link-icon d-md-none" data-sidebar-toggle="chat"><i class="icon-regular i-Right ml-0 mr-3"></i></a>
                <div class="d-flex align-items-center"><img class="avatar-sm rounded-circle mr-2" src="{{asset('backend/assets/dist-assets/images/faces/13.jpg')}}" alt="alt" />
                    <p class="m-0 text-title text-16 flex-grow-1">{{$consultation->full_name}}</p>
                </div>
            </div>
            <div class="chat-content perfect-scrollbar" data-suppress-scroll-x="true">
                <div class="d-flex mb-4">
                    <div class="message flex-grow-1">
                        <div class="d-flex">
                            <p class="mb-1 text-title text-16 flex-grow-1">{{$consultation->full_name}}</p><span class="text-small text-muted">{{$consultation->getCreatedAt()}}</span>
                        </div>
                        <p class="m-0">{{$consultation->message}}</p>
                    </div><img class="avatar-sm rounded-circle ml-3" src="{{asset('backend/assets/dist-assets/images/faces/13.jpg')}}" alt="alt" />
                </div>
                <div class="d-flex mb-4 user"><img class="avatar-sm rounded-circle mr-3" src="{{asset('backend/assets/dist-assets/images/faces/1.jpg')}}" alt="alt" />
                    <div class="message flex-grow-1">
                        <div class="d-flex">
                            <p class="mb-1 text-title text-16 flex-grow-1">{{auth()->user()->prenom}} {{auth()->user()->nom}}</p><span class="text-small text-muted">{{$consultation->getUpdatedAt()}}</span>
                        </div>
                        <p class="m-0">{{$consultation->response}}</p>
                    </div>
                </div>
            </div>
            
            <div class="pl-3 pr-3 pt-3 pb-3 box-shadow-1 chat-input-area">
                <form class="inputForm" action="{{route('consultation.update',$consultation->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <textarea class="form-control form-control-rounded" id="response" placeholder="Type your response" name="response" cols="30" rows="3">{{$consultation->response}}</textarea>
                    </div>
                    <div class="d-flex">
                        <div class="flex-grow-1"></div>
                        <button type="submit" class="btn btn-icon btn-rounded btn-primary mr-2"><i class="i-Paper-Plane"></i></button>
                        {{-- <button class="btn btn-icon btn-rounded btn-outline-primary" type="button"><i class="i-Add-File"></i></button> --}}
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end of main-content -->
    
</div>

@endsection


@section('scripts')

    <script>
        
        $(document).on("click", ".contact", function() {
            const _this = $(this);
            const data_id = _this.attr('data-id');
            
            alert(data_id)
            
        });
       
    </script>

@endsection

