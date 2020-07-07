@if ($todo->completed)
    <a href="{{'/todos/'.$todo->id.'/edit'}}" class="mx-5 py-2 px-1  cursor-pointer ">  <span class="fas fa-edit"></span></a>

    <i onclick="event.preventDefault();document.getElementById('form-incomplete-{{$todo->id}}').submit()"
    class="fas fa-check text-green-400"></i>

    <form action="{{route('todo.incomplete',$todo->id)}}" method="post" style="display: none" id="{{'form-incomplete-'.$todo->id}}">
        @csrf
        @method('delete')
    </form>
    <i onclick="event.preventDefault();
        if(confirm('Are you Sure to whant Delete?')){ document.getElementById('form-delete-{{$todo->id}}').submit()}
   " class="fas fa-trash text-black-400"></i>
    <form action="{{route('todo.delete',$todo->id)}}" method="post" style="display: none" id="{{'form-delete-'.$todo->id}}">
        @csrf
        @method('delete')
    </form>
@else
    <a href="{{'/todos/'.$todo->id.'/edit'}}" class="mx-5 py-2 px-1  cursor-pointer ">  <span class="fas fa-edit"></span></a>
    <i onclick="event.preventDefault();

        document.getElementById('form-complete-{{$todo->id}}').submit()"

       class="fas fa-check text-black-400"></i>
    <form action="{{route('todo.complete',$todo->id)}}" method="post" style="display: none" id="{{'form-complete-'.$todo->id}}">
        @csrf
        @method('put')

    </form>
    <i onclick="event.preventDefault();
        if(confirm('Are you Sure to whant Delete?')){document.getElementById('form-delete-{{$todo->id}}').submit()}"
       class="fas fa-trash text-black-400"></i>
    <form action="{{route('todo.delete',$todo->id)}}" method="post" style="display: none" id="{{'form-delete-'.$todo->id}}">
        @csrf
        @method('delete')

    </form>
@endif
