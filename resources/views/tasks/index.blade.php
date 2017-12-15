@extends('layouts.app')

@section('content')
    <!-- Create Task Form... -->
        <div class="panel panel-default">
            @if(Session::has('msg'))
                <p class="category success"><strong><font color="blue">{{ Session::get('msg') }}</font></strong></p>
            @endif
            <div class="panel-heading">
                <a href="{{ route('task.create') }}" title="addTask">Add Task</a>
            </div>

            <div class="panel-body">
                    <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th width="80%">Name</th>
                        <th>Chức năng</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <?php
                            $id=$task->id;
                            $urlDel=route('task.destroy',['id'=>$id]);
                            $urlEdit=route('task.edit',['id'=>$id]);
                            ?>
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>

                                <td>
                                    <a href="{{ $urlEdit }}">Sửa</a> &nbsp;||&nbsp;
                                    <a href="{{ $urlDel }}">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
