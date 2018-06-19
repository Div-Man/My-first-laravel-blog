@extends('layout')

@section('content')
<!--main content start-->



<section class="site-section py-lg">
      <div class="container">
         @include('admin.errors')
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            <h1 class="mb-4">{{$post->title}}</h1>
            <div class="post-meta">
                <span class="category">
                     @if($post->hasCategory())
                          {{$post->getCategoryTitle()}}
                       @endif
                </span>
                        <span class="mr-2">{{$post->getDate()}} </span> &bullet;
                        
                      <span class="ml-2"><span class="fa fa-comments"></span> {{$commentsCount}}</span>
                        
                      </div>
            <div class="post-content-body">
          
                 {!! $post->content !!}
                
            <div class="row mb-5">
              <div class="col-md-12 mb-4 element-animate">
                <img src="{{$post->getImage()}}" alt="Image placeholder" class="img-fluid">
              </div>

            </div>
          

            </div>
            
    
            <div class="pt-5">
             Tags:  @foreach($post->tags as $tag)
                       <a href="{{route('tag.show', $tag->slug)}}" class="btn btn-default">{{$tag->title}}</a>
                  @endforeach
            </div>


            <div class="pt-5">
              <h3 class="mb-5">{{$commentsCount}} Comments</h3>
              <ul class="comment-list">

                    @if(!$post->comments->isEmpty())
                    @foreach($post->getComments() as $comment)
                    
                     <li class="comment">
                        <div class="vcard">
                          <img src="{{$comment->author->getImage()}}">
                        </div>
                        <div class="comment-body">
                          <h3>{{$comment->author->name}}</h3>
                          <div class="meta">{{$comment->created_at->diffForHumans()}}</div>
                          <p>{{$comment->text}}</p>
                        </div>
                    </li>

                    @endforeach
                @endif
              
                
                
              </ul>
              <!-- END comment-list -->
              
               @if(Auth::check())
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="/addComment" class="p-5 bg-light" method="post">
                   {{csrf_field()}}
                  <div class="form-group">
                      {{ Auth::user()->name}}
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn btn-primary">
                  </div>

                </form>
              </div>
                @endif
            </div>

          </div>

          
        @include('pages._sidebar')
         
         

        </div>
      </div>
    </section>
@endsection