<div class="col-md-4" data-sticky_column>
    <div class="primary-sidebar">

        <aside class="widget border pos-padding" style="padding: 10px;">

            <h3 class="widget-title text-uppercase text-center">Категории</h3>
            <ul>
                @foreach($categories as $category)
                <li>
                    <a href="{{route('category.show', $category->slug)}}">{{$category->title}}</a>
                    <span class="post-count pull-right"> ({{$category->posts()->count()}})</span>
                </li>
                @endforeach
            </ul>
            
            <h3 class="widget-title text-uppercase text-center">Теги</h3>
             <ul>
                @foreach($tags as $tag)
                <li>
                    <a href="{{route('tag.show', $tag->slug)}}">{{$tag->title}}</a>
                    <span class="post-count pull-right"> ({{$tag->posts()->count()}})</span>
                </li>
                @endforeach
            </ul>
        </aside>
    </div>
</div>