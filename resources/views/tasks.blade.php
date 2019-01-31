


@extends('layouts.app')

@section('content')
<div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="{{ url('task') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>
    <br>
    <!-- Current Tasks -->
    @if (count($activas) > 0 || count($inactivas) > 0)
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    <thead>
                        <th>Task</th>
                        <th>Estado</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody>
                    <tr><td colspan="4" style="text-align: center;"><h3>ACTIVAS</h3></td></tr>
                    @foreach ($activas as $task)
                        <tr>
                            <td class="table-text">
                                <div>{{ $task->name }}</div>
                            </td>
                            <td class="table-text">
                                <div>Activo</div>
                            </td>
                            
                            <!-- Delete Button -->
                            <td>
                                <form action="{{ url('task/'.$task->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                                <form action="{{ url('task/'.$task->id) }}" method="POST">
                                {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Update
                                    </button>
                                </form>
                            </td>
                        </tr>
                        
                    @endforeach
                    <tr><td colspan="4" style="text-align: center;"><h3>INACTIVAS</h3></td></tr>
                    @foreach ($inactivas as $task)
                        <tr>
                            <td class="table-text">
                                <div>{{ $task->name }}</div>
                            </td>
                            <td class="table-text">
                                <div>Inactivo</div>
                            </td>
                            
                            <!-- Delete Button -->
                            <td>
                                <form action="{{ url('task/'.$task->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                                <form action="{{ url('task/'.$task->id) }}" method="POST">
                                {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Update
                                    </button>
                                </form>
                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table> 
            </div>
        </div>
    @endif
@endsection