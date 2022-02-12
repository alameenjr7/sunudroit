<div class="news-block">
    <div class="inner-box">
        <div class="image" style="max-width: 769.980px; max-height: 360.918px;">
            <a href="{{route('publication.detail',$pub->slug)}}"><img src="{{asset($pub->photo)}}" alt="{{$pub->title}}"/></a>
            @if ($pub->added_by != null)
                <div class="category">{{$pub->added_by}}</div>
            @endif
            <ul class="post-meta">
                <li><a href="#"><span class="icon flaticon-timetable"></span>{{$pub->getCreatedAt()}}</a></li>
                <li><a href="{{route('publication.detail',$pub->slug)}}"><span class="icon flaticon-email"></span>Comments 03</a></li>
                @if ($pub->added_by != null)
                    <li><a href="#"><span class="icon flaticon-user-2"></span>{{$pub->added_by}}</a></li>
                @endif
            </ul>
        </div>
        <div class="lower-content">
            <h3><a href="{{route('publication.detail',$pub->slug)}}">{{ucfirst($pub->title)}}</a></h3>
            <h6>{{ucfirst($pub->subtitle)}}</h6>
            <div class="text"><p>{!! html_entity_decode(\Illuminate\Support\Str::limit($pub->contenu, 200)) !!}</p></div>
            <div class="btn-box">
                <a href="{{route('publication.detail',$pub->slug)}}" class="theme-btn btn-style-two"><span class="txt">Voir plus</span></a>
            </div>
        </div>
    </div>
</div>