@extends('layout')

@section('content')
<!--main content start-->
		

  
        <section class="site-section">
            
            
      <div class="container">

        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            <div>

              <div class="col-md-12">
                 
                
               
                 
                
                @foreach($posts as $post)

               
                <div class="post-entry-horzontal">
                  <a href="{{route('post.show', $post->slug)}}">
                    <div class="image element-animate" data-animate-effect="fadeIn" style="background-image: url({{$post->getImage()}});"></div>
                    <span class="text">
                      <div class="post-meta">
                          <span class="category">
                               @if($post->hasCategory())
                                    {{$post->getCategoryTitle()}}
                                @endif
                              
                          </span>
                        <span class="mr-2">{{$post->getDate()}} </span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span>  <?php echo $commentsForEachPosts[$post->id]->countComment;?></span>
                      </div>
                      <h2>{{$post->title}}</h2>
                    </span>
                  </a>
                </div>
                <!-- END post -->
                
                @endforeach
                

     
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 text-center">
                <nav aria-label="Page navigation" class="text-center">
                  <ul class="pagination">
                      <li class="page-item"><a class="page-link" href="?page=1">first</a></li>
                    <?php
                        
                            $page = [1,2,3];
                            $prevPage = [];
                            $total = $posts->total();
                            
                            
                            function paginator($page, $current) {
                                
                                foreach($page as $key => $val) {
                                  if($current!= $val) {
                                    if($val != 0) {
                                         echo ' <li class="page-item"><a class="page-link" href=?page=' . $val . '>' . $val . '</a></li>';
                                        
                                         
                                    }
                                  }
                                   else {
                                       echo '<li class="page-item  active"><a class="page-link" href="#">'.$val.'</a></li>';
                                   }
                                   
                               }
                            }
                            
                            if($posts->currentPage() < 3) {
                               paginator($page, $posts->currentPage());
                            }
                            
                            if(!empty($_GET['page'])) {
                               if($posts->currentPage() >= 3 && $posts->currentPage() <= $total) {
                                    $ostatok = $posts->currentPage();
                                    $once = $ostatok + 1;
                                    $two = $ostatok + 2;
                                    
                                    $prev1 = $posts->currentPage() - 3;
                                    $prev2 = $posts->currentPage() - 2;
                                    $prev3 = $posts->currentPage() - 1;
                                    
                                    
                                    array_splice($prevPage, 0, 3);
                                    array_push($prevPage, $prev1, $prev2, $prev3);

                                    array_splice($page, 0, 3);
                                    
                                        
                                    if($total >= $once && $total >= $two){
                                        array_push($page, $once, $two);
                                    }
                                    
                                    elseif($total >= $once) {
                                         array_push($page, $once);
                                    }
                                    paginator($prevPage, $posts->currentPage());
                                    echo '<li class="page-item  active"><a class="page-link" href="#">'.$posts->currentPage().'</a></li>';
                                    paginator($page, $posts->currentPage());
                                     
                                }
                            }    
                            
                        ?>
                    
                     <li class="page-item"><a class="page-link" href="?page=<?php echo $posts->lastPage(); ?>">last</a></li>
                  </ul>
                        

                </nav>
              </div>
            </div>

            

          </div>

            @include('pages._sidebar')
           
        </div>
      </div>
    </section>
                
                

@endsection