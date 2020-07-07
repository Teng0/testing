@extends('todos/layout')

@section("content")

    <div class="flex justify-center">

        <h1 class="text-2xl">{{$todo->title}}</h1>
        <a href="/todos" class=" p-2 cursor-pointer rounded text-white bg-black">Back</a>


    </div>

        <div>
            <p>{{$todo->description}}</p>
        </div>
@if ($todo->steps->count()>0 )
    <div>
    @foreach($todo->steps as $step)

    <p>{{$step->name}}</p>

    @endforeach
    </div>
@endif

@endsection
