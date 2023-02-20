<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <p>
                    {{$post->description}}
                </p>
                <br>

                @foreach($post->comments as $comment)
                    {{--                    //@dd($category)--}}
                    <b>{{$comment->user->name}}</b>
                    <p>{{$comment->comment}}</p>
                @if(Auth::user() != null && Auth::user()->isAdmin())
                    <form action="{{route('comment.delete',['comment'=>$comment])}}" method="post">
                        @csrf
                        @method('delete')
                            <input type="hidden" name="comment_id" value="{{$comment->id}}">
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                @endif
                    <br>
                @endforeach

                @if(Auth::user() !== null)
                    <div>
                        <form action="{{route('comment.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <label for="lcomment"> Comment: </label><br>
                            <textarea id="lcomment" name="comment" rows="5" cols="30"></textarea><br>
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">