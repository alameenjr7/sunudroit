<form action="{{route('publication.filter')}}" method="POST">
    @csrf
    @if (count($categories)>0)
        <!--Blog Category Widget-->
        <div class="sidebar-widget sidebar-blog-category">
            <div class="widget-content">
                <div class="sidebar-title">
                    <h5>Categories</h5>
                </div>
                @if (!empty($_GET['categorie']))
                    @php
                        $filter_cats = explode(',',$_GET['categorie']);
                    @endphp
                @endif
                @foreach ($categories as $cat)
                    <ul class="cat-list-two">
                        <input type="checkbox" 
                            @if (!empty($filter_cats) && in_array($cat->slug,$filter_cats)) 
                            checked 
                            @endif
                            id={{$cat->slug}}
                            name="category[]" onchange="this.form.submit();" value="{{$cat->slug}}"
                        >
                        <label class="" for="{{$cat->slug}}">{{ucfirst($cat->title)}}<a href="{{$cat->slug}}"><span class="text-muted">({{count($cat->publications)}})</span></a></label>
                    </ul>
                @endforeach
            </div>
        </div>
    @endif
</form>