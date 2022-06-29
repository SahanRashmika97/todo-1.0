@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="page-title">Todo List</h1>
        </div>
        <div class="col-lg-12">
            <form action="{{ route('todo.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <input class="form-control" type="text" name="title" placeholder="Default input" aria-label="default input example" style="background-color: #252525; color:azure;" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="div col lg-12">
            <div class="task-table">
                <table class="table table-dark table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $key => $task)
                      <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $task->title }}</td>
                        <td>
                            @if ($task->done == 0)
                                <span class="badge text-bg-warning">Not Completed</span>
                            @else
                                <span class="badge text-bg-success">Completed</span>
                            @endif
                        </td>
                        <td>
                            @if ($task->done == 1)
                            <a href="{{ route('todo.done' , $task->id) }}" class="btn btn-outline-secondary btn-sm disabled"><i class="fa-solid fa-check"></i></a>
                            @else
                            <a href="{{ route('todo.done' , $task->id) }}" class="btn btn-outline-success btn-sm"><i class="fa-solid fa-check"></i></a>
                            @endif
                            <a href="{{ route('todo.delete' , $task->id) }}" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>

</div>

@endsection

@push('css')
<style>
    .page-title
    {
        padding-top: 5vh;
        font-size: 2.5rem;
        color: #3be20c;
        padding-bottom: 5vh;
    }
    .task-table
    {
        padding-top: 5vh;
        padding-bottom: 5vh;
    }
</style>
@endpush
