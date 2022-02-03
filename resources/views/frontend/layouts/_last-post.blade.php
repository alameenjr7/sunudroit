<article class="post">
    <figure class="post-thumb"><img src="{{asset($lpub->photo)}}" alt=""><a href="{{route('publication.detail',$lpub->slug)}}" class="overlay-box"></a></figure>
    <div class="text"><a href="{{route('publication.detail',$lpub->slug)}}">{{$lpub->title}}</a></div>
    <div class="post-info">{{$lpub->getCreatedAt()}}</div>
</article>