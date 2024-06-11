<div class="card shadow-lg border-black">
    <h5 class="card-header">Share a blog post</h5>
    <div class="card-body">
        <form method="post" action="{{ route('post.create') }}">
            @csrf
            <input class="form-control mb-3" placeholder="Title" name="title" required>
            <textarea class="form-control mb-3" placeholder="Content" rows="3" name="body" required ></textarea>
            <input class="btn btn-primary" type="submit" value="Share">
        </form>
    </div>
</div>
