@extends('layouts.app')

<body>

    <h1>Hello, <?= $name; ?></h1>
    <p><?= $name ?> is <?= $age ?> jaar oud.</p>

    @foreach($tasks as $task)

        <li>{{ $task }}</li>

    @endforeach

</body>