
<?php

class PostController extends BaseController {

    /* New Post Page (GET) */
    public function newPost(){

		$user_id = Auth::id();

		$post = DB::table('posts')->where('user_id', $user_id)->first();
		if(is_null($post)) {
			$post = new stdClass();
			$post->title = "";
			$post->content = "";
		} 
		View::share('post',$post);	

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
        
		$post = DB::table('posts')->get();

		View::share('post',$post);	

        return View::make('post.index');
    }
}

?>
