@extends('todos/layout')

@section("content")

    <div class="flex justify-center">

        <h1 class="text-2xl">What next you need to-Do</h1>
        <a href="/todos" class=" p-2 cursor-pointer rounded text-white bg-black">Back</a>

    </div>

    <x-alert>
    </x-alert>
    <form action="{{route('todo.update',$todo->id)}}" method="post" class="py-5">
        @method('patch')
        @csrf

        <div class="py-2">
            <input type="text" name="title" id="title"  value="{{$todo->title}}" class="py-2 px-2 border rounded" placeholder="Title">
        </div>
        <div class="py-2">
            <textarea name="description" id="description"   class="p-4 rounded border" >{{$todo->description}}</textarea>
        </div>

        <div class="py-2">
            @livewire('edit-step',['steps'=>$todo->steps])
        </div>
        <div class="py-2">
            <input type="submit" value="Update" class="p-2 border rounded">
        </div>
    </form>



@endsection
