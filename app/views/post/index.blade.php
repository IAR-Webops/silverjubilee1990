@extends('post.home')

@section('mainbodycontent')

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-offset-3 col-md-6">
                  <h4 class="text-center">Blog Home</h4>        	
                  <hr>
                  <br>
                  <div class="col-sm-12">
                    @foreach ($posts as $post)

                        <div class="tile">
                            <div class="row">
                                <div class="col-sm-12 col-md-4">
                                    <img src="img/icons/svg/gift-box.svg" alt="Compas" class="tile-image big-illustration">						    		
                                </div>	
                                <div class="col-sm-12 col-md-8">
                                    <h3 class="tile-title" style="margin-top:20px;">{{$post->title}}</h3>
                                    <br>
                                    <p>{{$post->content}}
                                    <br><br>					            
                                        <span class="fui-time"></span> - {{$post->created_at}}
                                        |
                                        <span class="fui-location"></span> - {{$post->user_id}}						            	
                                    </p>						            
                                </div>
                            </div>
                        </div>

                    @endforeach
                  </div>
                </div>
            </div>
        </div>

@stop
