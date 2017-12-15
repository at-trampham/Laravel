@extends('layouts.app')

@section('content')
<div class="panel-body">
            <!-- @if(Session::has('msg'))
                <p class="category success"><strong><font color="blue">{{ Session::get('msg') }}</font></strong></p>
            @endif -->
        <!-- New Task Form -->
        <?php 
        $id=$tasks->id;
         $urlEdit=route('task.edit',['id'=>$id]);
        ?>
        <form action="{{ $urlEdit }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <!-- Task Name -->
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control" value="{{ $tasks->name }}">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Edit Task
                    </button>
                </div>
            </div>
        </form>
    </div>


@endsection