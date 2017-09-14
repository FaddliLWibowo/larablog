@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($posts as $post)
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $post->title }}
                    <div class="pull-right">
                        <a href="{{ route('post.edit', $post) }}" class="btn btn-xs btn-default">Edit</a>
                        <form action="{{ route('post.destroy', $post) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-xs btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>

                <div class="panel-body">
                    {{ $post->content }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
