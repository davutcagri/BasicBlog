@foreach($posts as $post)
<div class="card shadow-lg mb-3">
    <div class="card-header">
        <div class="row">
            <div class="col fs-4">{{ $post->title }}</div>
            <div class="col d-flex" style="margin-left: 350px">
                @if (Auth::user()->id == $post->author->id)
                <button class="btn btn-info text-white me-2" data-bs-toggle="modal" data-bs-target="#editModal">Edit
                </button>

                <div class="modal fade" id="editModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{ route('post.update', ['post_id' => $post->id]) }}">
                                    @csrf
                                    <label for="title">Title</label>
                                    <input class="form-control mb-3" name="title" value="{{ $post->title }}">

                                    <label for="body">Content</label>
                                    <textarea class="form-control mb-3" rows="3" name="body">{{ $post->body }}</textarea>

                                    <input class="btn btn-success" type="submit" value="Save">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <form action="{{ route('post.delete', ['post_id' => $post->id]) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <input class="btn btn-danger" type="submit" value="Delete">
                </form>
                @endif
            </div>
        </div>
    </div>
    <div class="card-body">{{ $post->body }}</div>
    <div class="card-footer text-muted">Author: {{ $post->author->name }}</div>

</div>

<script>

</script>
@endforeach
