
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
                'fathersname' 		=> 'required',
                'mothersname'		=> 'required',
                'permaddline1'		=> 'required',
                'permcity'			=> 'required',
                'permstate'			=> 'required',
                'permpincode'		=> 'required',
                'permcountry'		=> 'required'
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
        }
    }
}

?>
