@extends("todos/layout")

@section("content")
    <div class="flex justify-center">
    <h1 class="text-2xl">All your Todos</h1>
        <a href="/todos/create" class="mx-5  cursor-pointer rounded text-white bg-black">
            <i class="fas fa-plus-circle"></i>
        </a>

    </div>
    <div>
        <x-alert>
        </x-alert>
    </div>

    <ul class="my-5">

            @forelse($todos as $todo)
                <li class="flex justify-between">
                    <div>
                        @if ($todo->completed)
                            <p class="line-through">{{$todo->title}}</p>
                        @else
                            <a href="{{route('todo.show',$todo->id)}}"> <p >{{$todo->title}}</p></a>
                        @endif
                    </div>

                    <div>
                        @include("todos.ComplatedButton")
                    </div>


                </li>
            @empty
                <p>No Task Avaliable Create One</p>

            @endforelse

    </ul>
@endsection

