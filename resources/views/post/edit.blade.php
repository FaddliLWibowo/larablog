@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="" action="{{ route('post.update', $post) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Post title" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" name="category_id" id="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content" name="content" rows="5" class="form-control" placeholder="Post content">{{ $post->content }}</textarea>
            </div>

            <div class="form-group">
                <input type="submit" value="Save" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection
