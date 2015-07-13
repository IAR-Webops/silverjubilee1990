<?php

class CommentController extends BaseController {

    public function createComment(){
        
        Log::info(Input:get('post_id'));
        Log::info(Input:get('content'));
        $validator = Validator::make(Input::all(),
            array(
                'post_id' 		=> 'required',
                'content'		=> 'required',
            )
        );

        if($validator->fails()) {
            return "Please fill the content properly"
        } else {
			$user_id 				= Auth::id();

			$post_id 			= Input::get('post_id');
			$content 			= Input::get('content');

            $commentdata = Comment::create(array(
                'user_id'			=> $user_id,				
                'post_id' 			=> $post_id,			
                'content'			=> $content,
            ));

            return "Successfully commented";
        }
    }
}

?>
