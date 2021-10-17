@extends('layouts.app')
@section('content')
<style>
.x_panel {
    position: relative;
    width: 100%;
    margin-bottom: 10px;
    padding: 10px 17px;
    display: inline-block;
    background: #fff;
    border: 1px solid #E6E9ED;
    -webkit-column-break-inside: avoid;
    -moz-column-break-inside: avoid;
    opacity: 1;
    -webkit-transition: all .2s ease;
    transition: all .2s ease;
    margin-left: -100%;
    margin-top: 63px;
    width: 200%;
}
</style>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <div class="right_col" role="main">
        <div>
            <div class="page-title">
                <div class="title_left">
                    <h3>Post Details</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">

                            <table class="table table-striped table-bordered custom-table spam">
                                <tr>
                                    <td width="210">Profile Picture</td>
                                    <td><img src="{{ url('/storage') }}/{{ $post->image }}" width="100"> </td>
                                </tr>
                                <tr>
                                    <td>Title</td>
                                    <td>{{ $post->title }}</td>
                                </tr>
                                <tr>
                                    <td>Category</td>
                                    <td>{{ $post->category }}</td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>{{ $post->description }}</td>
                                </tr>
                            </table>
                          
                            <button type="button" class="btn btn-primary" data-post-id="{{ $post->id }}" data-type="{{ ($user_like_count > 0) ? 'Dislike' : 'Like' }}"
                                data-user-id="{{ Auth::user()->id }}" id="like-status">
                                <span class="label">{{ ($user_like_count > 0) ? 'Dislike' : 'Like' }}</span> <span class="#">{{ $count }}</span>
                            </button>

                            {{-- @if ($post->status == true) --}}
                            <h4>Display Comments</h4>

                            @include('posts.comment-display', ['comments' => $post->comments, 'post_id' => $post->id])

                            <hr />
                            <h4>Add comment</h4>
                            <form method="post" action="{{ route('comments.store') }}">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" name="body"></textarea>
                                    <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Add Comment" />
                                </div>
                            </form>

                            {{-- @endif --}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#like-status").click(function(event) {
                event.preventDefault();
                // console.log($(this));
                let post_id = $(this).data("post-id");
                let user_id = $(this).data("user-id");
                $.ajax({
                    type: 'post',
                    url: "{{ url('like') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'user_id': user_id,
                        'post_id': post_id,
                    },
                    success: function(data) {
                        $('body').load(window.location.href)
                    },
                });
            });
        });
    </script>



@endsection