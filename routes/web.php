<?php
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Models\Task;






Route::get('/',function(){
   return redirect()->route('tasks.index');
});
Route::get('/tasks', function () {
    return view('index', [
        'tasks' => \App\Models\Task::latest() ->get()// 'tasks' instead of 'task'
    ]);
})->name('tasks.index');


Route::view('/tasks/create', 'create')
    ->name('tasks.create');

Route::get('/tasks/{id}', function ($id) {
    return view('show', [
        'task' => \App\Models\Task::findOrFail($id)
    ]);
})->name('tasks.show');

Route::post('/tasks', function (Request $request) {
    $data=$request->validate([
        'title' => 'required|max:255',
        'description' => 'required|max:1000',
        'long_description' => 'required',

    ]);

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

     return redirect()->route('tasks.show', ['id' => $task->id]);





})->name('tasks.store');
