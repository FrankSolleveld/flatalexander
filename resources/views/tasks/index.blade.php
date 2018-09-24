<!DOCTYPE html>

<html>
<style>
    body{
        font-family: Verdana, sans-serif;
    }
</style>
<head>

</head>

<body>

    @foreach($tasks as $task)
        <li>
            <a href="/tasks/{{$task->id}}">
                {{$task->body}}
            </a>
        </li>
    @endforeach

</body>
</html>