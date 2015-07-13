@extends('post.home')

@section('mainbodycontent')

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-offset-3 col-md-6">
                  <h4 class="text-center">Blog Home</h4>        	
                  <hr>
                      <div class="col-sm-6 col-md-4">
                          <a class="btn btn-primary" href="{{ URL::route('new-post-blog') }}"><span class="fui-new"> | New Post</span></a>
                      </div>
                  <br>
                  <br>
                  <div class="col-sm-12">
                    @foreach ($posts as $post)

                        <div class="tile" id="post_id_{{ $post->id }}">
                            <div class="row">
                                <div class="col-sm-12 col-md-4">
                                    <img src="img/icons/svg/gift-box.svg" alt="Compas" class="tile-image big-illustration">						    		
                                </div>	
                                <div class="col-sm-12 col-md-8">
                                    <h3 class="tile-title" style="margin-top:20px;">{{$post->title}}</h3>
                                    <br>
                                    <p>{{$post->content}}
                                    </p>						            
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-4">
                                    <?php $info = DB::table('basic_infos')->where('user_id', $post->user_id)->first(); ?>
                                    <span class="fui-user"></span> | {{ $info->firstname }} {{ $info->lastname }}
                                </div>	
                                <div class="col-sm-12 col-md-8">
                                        <span class="fui-time"></span> | {{$post->created_at}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                            @if ($post->user_id == Auth::id())
                                <div class="col-sm-12 col-md-4">
                                    <a class="btn btn-danger" onclick="deletePost({{ $post->id }})"><span class="fui-trash"> | Delete Post</span></a>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                </div>
                            @else
                                <div class="col-sm-12 col-md-8">
                                </div>
                            @endif
                                <div class="col-sm-12 col-md-4">
                                    <a class="btn btn-primary" href="{{ URL::route('new-post-blog') }}"><span class="fui-chat"> | Comments</span></a>
                                </div>
                            </div>
                        </div>

                    @endforeach
                  </div>
                </div>
            </div>
        </div>

@stop

@section('jsmainbodycontent')
	<script type="text/javascript">
		function deletePost(id) {
			$.ajax({
			    url: "{{ URL::route('blog-post-delete') }}",
			    type: 'DELETE',
			    data: "post_id="+id,
			    success: function(result) {
			        // Do something with the result
					$.notify(result ,"error");	        
					$("#post_id_"+id).fadeOut();
					//$.notify("Under Construction " + id ,"error");	        
			    },
			    error: function(xhr, status, error) {
				  //var err = eval("(" + xhr.responseText + ")");
				  //alert(err.Message);
				  //alert(xhr.responseText);
					$.notify("Unable to remove. Contact Webops Team" ,"error");	        

				}
			});
		}
	</script>
@stop
