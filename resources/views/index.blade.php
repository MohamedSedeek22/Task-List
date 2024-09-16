@extends('layouts.app')

@section('title','Task lists')




@section('content')

@forelse ($tasks as $task)

<div><a href="{{route('tasks.show',['id'=>$task->id])}}">{{$task->title}}</a></div>

@empty
<div> no tasks</div>
@endforelse
@endsection

