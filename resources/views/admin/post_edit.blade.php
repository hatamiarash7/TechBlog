<form method="post" action="{{ url('post/edit') }}">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $post->id }}">
    <input type="text" name="title" placeholder="title" value="{{ $post->title }}">
    <input type="text" name="body" placeholder="content" value="{{ $post->body }}">
    <input type="submit" value="save">
</form>