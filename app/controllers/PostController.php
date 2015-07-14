<?php

class PostController extends BaseController {

    /* New Post Page (GET) */
    public function newPost(){
        return View::make('post.new');
    }

    /* Create Post (POST) */
    public function createPost(){

        $validator = Validator::make(Input::all(),
            array(
                'title' 		=> 'required',
                'content'		=> 'required',
            )
        );

        //return var_dump(Input::all());
        if($validator->fails()) {
            return Redirect::route('home-info')
                ->withErrors($validator)
                ->withInput();   // fills the field with the old inputs what were correct

        } else {
			$user_id 				= Auth::id();

			$title 			= Input::get('title');
			$content 			= Input::get('content');

            $postdata = Post::create(array(
                'user_id'				=> $user_id,				
                'title' 			=> $title,			
                'content'			=> $content,
            ));

            return Redirect::route('post-index')
                ->with('globalalertmessage', 'New blog post created')
                ->with('globalalertclass', 'success');
        }
    }

    public function index(){
        
        $posts = DB::table('posts')
            ->orderBy('created_at', 'desc')
            ->get();

		View::share('posts',$posts);	

        return View::make('post.index');
    }

    public function deletePost(){

        $user_id = Auth::id();
        $post_id = Input::get('post_id');

        $post = DB::table('posts')
        ->where('id', $post_id)
        ->where('user_id', $user_id)->first();

        if (!is_null($post)){
            DB::table('posts')
            ->where('id', $post_id)
            ->where('user_id', $user_id)
            ->delete();

            return "Post deleted";
        } else {
            return "Requested post doesn't exist";
        }
    }

    public function editPost(){

        $user_id = Auth::id();
        $post_id = Input::get('id');

        $post = DB::table('posts')->where('id', $post_id)->first();
        if (is_null($post)){
            return View::make('post.new');
        } else {
            View::share('post', $post);
            return View::make('post.edit');
        }

    }

    public function saveeditPost(){
        
        $validator = Validator::make(Input::all(),
            array(
                'title' 		=> 'required',
                'content'		=> 'required',
                'id'            => 'required',
            )
        );

        //return var_dump(Input::all());
        if($validator->fails()) {
            return Redirect::route('post-index')
                ->withErrors($validator)
                ->withInput();   // fills the field with the old inputs what were correct

        } else {
			$user_id 				= Auth::id();

			$title 			= Input::get('title');
			$content 			= Input::get('content');
            $post_id        = Input::get('id');

            $post = DB::table('posts')->where('id', $post_id)->first();

            if (!is_null($post)){
                
                DB::table('posts')
                    ->where('id', $post_id)
                    ->update(array(
                        'user_id'       => $user_id,
                        'title'         => $title,
                        'content'       => $content
                    ));

                return Redirect::route('post-index')
                    ->with('globalalertmessage', 'Post Updated')
                    ->with('globalalertclass', 'success');
            } else {

                return Redirect::route('post-index')
                    ->with('glocalalertmessage', 'Post does not exist')
                    ->with('globalalertclass', 'error');
            }
        }
    }
}

?>
