<?php

class CommentController extends BaseController {

    public function createComment(){
        
        $validator = Validator::make(Input::all(),
            array(
                'post_id' 		=> 'required',
                'content'		=> 'required',
            )
        );

        if($validator->fails()) {
            return "Please fill the content properly";
        } else {
			$user_id 				= Auth::id();

			$post_id 			= Input::get('post_id');
			$content 			= Input::get('content');

            $commentdata = Comment::create(array(
                'user_id'			=> $user_id,				
                'post_id' 			=> $post_id,			
                'content'			=> $content,
            ));

            $info = DB::table('basic_infos')->where('user_id', Auth::id())->first();
            $time = new DateTime();

            $res['message'] = "Successfully commented";
            $res['created_at'] = $time->format('Y-m-d H:i:s');
            $res['firstname'] = $info->firstname;
            $res['lastname'] = $info->lastname;

            return $res;
        }
    }

    public function deleteComment(){

        $user_id = Auth::id();
        $comment_id = Input::get('comment_id');

        $comment = DB::table('comments')
        ->where('id', $comment_id)
        ->where('user_id', $user_id)->first();

        if (!is_null($comment)){
            DB::table('comments')
            ->where('id', $comment_id)
            ->where('user_id', $user_id)
            ->delete();

            return "Comment deleted";
        } else {
            return "Requested comment doesn't exist";
        }
    }

}

?>
