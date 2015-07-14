@extends('post.home')

@section('mainbodycontent')

    <div class="col-sm-12 col-md-11">
          <h4>New Blog Post</h4>        	
          <hr>
          <form action="{{ URL::route('save-edit-post') }}" id="new_post_form" class="form-horizontal" role="form" method="post">
            <!-- Field - Parent's Name -->
            <div class="form-group">
              <div class="col-sm-12 col-md-12">
                <input type="text" class="form-control" name="title" placeholder="Title *" value="{{ $post->title }}" required>
              </div>
              <div class="col-sm-12 col-md-12">
                <textarea class="form-control" id="content" form="new_post_form" name="content" placeholder="Content *" value="{{ $post->content }}"></textarea>
              </div>             
            </div>
            <input type="hidden" name="id" value="{{ $post->id }}" />
            <!-- START - Permanent Fields -->
            <!-- Field - Permanent Address -->


            <hr>
            <!-- Field - Submit -->
            <div class="form-group">
                <div class="col-sm-12 col-md-6">
                    <input class="btn btn-block btn-lg btn-primary" type="submit" value="Save">
                </div>
                <div class="col-sm-12 col-md-6">
                    <a class="btn btn-block btn-lg btn-danger" href="{{ URL::route('home') }}">Cancel</a>          			
                </div>
                {{ Form::token() }}
            </div>
          </form>
        </div> 

@stop


@section('jsmainbodycontent')

<script src="//cdn.ckeditor.com/4.5.1/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>

@stop
