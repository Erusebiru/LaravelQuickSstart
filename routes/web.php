<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Task;
use Illuminate\Http\Request;

/**
 * Show Task Dashboard
 */
Route::get('/', function () {
    $inactivas = Task::orderBy('id', 'desc')->get()->where('estado','0');
    $activas = Task::orderBy('id', 'desc')->get()->where('estado','1');
    return view('tasks', ['inactivas' => $inactivas,'activas' => $activas]);
});

/**
 * Add New Task
 */
Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->estado = 0;
    $task->save();

    return redirect('/');
});



/**
 * Delete Task
 */
Route::delete('/task/{task}', function (Task $task) {
    $task->delete();

    return redirect('/');
});

/**
 * Update Task
 */
Route::put('/task/{task}', function (Task $task) {
    if($task->estado == 1){
        $task->estado = 0;
    }else{
        $task->estado = 1;
    }
    
    $task->save();

    return redirect('/');
});

