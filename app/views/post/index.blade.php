@extends('post.home')

@section('mainbodycontent')

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-offset-2 col-md-8">
                  <h4 class="text-center">Blog Home</h4>        	
                  <hr>
                      <div class="col-sm-6 col-md-4">
                          <a class="btn btn-primary" href="{{ URL::route('new-post-blog') }}"><span class="fui-new"> | New Post</span></a>
                      </div>
                  <br>
                  <br>
                  <div class="col-sm-12">
                    @foreach ($posts as $post)

                        <div class="tile post_div" id="post_id_{{ $post->id }}">
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
                                    <a class="btn btn-primary" onclick="showComments({{ $post->id }})"><span class="fui-chat"> | Comments</span></a>
                                </div>
                            </div>
                            <div class="row comments_container_{{ $post->id }} container-fluid" style="display:none;">
                            <hr>
                                Comments:   
                                <hr>
                                <div class="new_comment_div">
                                    <form action="#" onsubmit="newComment({{ $post->id }});" class="form-horizontal" role="form" method="POST">
                                        <div class="form-group">
                                            <div class="col-sm-12 col-md-8">
                                                <input type="textarea" class="form-control" id="comment_content_{{ $post->id }}" name="content" placeholder="Comment *" required>
                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <hr>
                                <?php $comments = DB::table('comments')->where('post_id', $post->id)->get(); ?>
                                <div id="comment_post_id_{{ $post->id }}">
                                @foreach ($comments as $comment)
                                <?php $comment_info = DB::table('basic_infos')->where('user_id', $comment->user_id)->first() ?>
                                <div id="comment_id_{{ $comment->id }}">
                                <div class="comment_div col-sm-12 col-md-12 container-fluid">
                                    <div class="col-xs-2 col-md-2">
                                        <img src="img/icons/default-user.jpg" alt="Compas" class="img-responsive">						    		
                                    </div>
                                    <div class="col-xs-10 col-md-10">
                                        {{ $comment->content }}
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 container-fluid">
                                    <div class="col-xs-2 col-md-2">
                                        <span class="fui-user"></span> | {{ $comment_info->firstname }} {{ $comment_info->lastname }}
                                    </div>
                                    <div class="col-xs-10 col-md-10">
                                        <span class="fui-time"></span> | {{$comment->created_at}}
                                    </div>
                                </div>
                                <hr>
                                @if ($comment->user_id == Auth::id())
                                <div class="row">
                                    <div class="col-sm-12 col-md-3">
                                        <a class="btn btn-danger" onclick="deleteComment({{ $comment->id }})"><span class="fui-trash"> | Delete Comment</span></a>
                                    </div>
                                </div>
                                @endif
                                </div>
                                @endforeach
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

        <script type="text/javascript">

        function showComments(id) {
            $('.comments_container_'+id).slideToggle();
        }

        </script>

        <script type="text/javascript">

        function newComment(id){
            event.preventDefault();
            content = document.getElementById('comment_content_'+id).value;
            $.ajax({
                url: "{{ URL::route('comment-post') }}",
                type: 'POST',
                data: {
                    'post_id': id,
                    'content': content
                },
                success: function(result) {
                    $.notify(result['message'], "error");       
                    //alert(content);
                    $('#comment_post_id_'+id).append('<div id="comment_id_'+id+'"><div class="comment_div col-sm-12 col-md-12 container-fluid"><div class="col-xs-2 col-md-2"><img src="img/icons/default-user.jpg" alt="Compas" class="img-responsive"></div><div class="col-xs-10 col-md-10">'+content+'</div></div><div class="col-sm-12 col-md-12 container-fluid"><div class="col-xs-2 col-md-2"><span class="fui-user"></span> | '+result["firstname"]+' '+result["lastname"]+'</div><div class="col-xs-10 col-md-10"><span class="fui-time"></span> | '+result["created_at"]+'</div></div><hr><div class="row"><div class="col-sm-12 col-md-3"><a class="btn btn-danger" onclick="deleteComment('+id+')"><span class="fui-trash"> | Delete Comment</span></a></div></div></div>');
                },
                error: function(xhr, status, error){
				    var err = eval("(" + xhr.responseText + ")");
				    alert(err.Message);
				    alert(xhr.responseText);
                    $.notify("Unable to comment. Contact Webops Team", "error");
                }
            });
        }

        </script>

        <script type="text/javascript">

        function deleteComment(id){
			$.ajax({
			    url: "{{ URL::route('blog-comment-delete') }}",
			    type: 'DELETE',
			    data: "comment_id="+id,
			    success: function(result) {
			        // Do something with the result
					$.notify(result ,"error");	        
					$("#comment_id_"+id).fadeOut();
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
