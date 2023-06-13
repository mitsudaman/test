@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-3">
      </div>
      <div class="column col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">Diary</div>
          <div class="panel-body">
            <div class="text-right">
              <a href="{{ route('tasks.create', ['id' => $current_folder_id]) }}" class="btn btn-default btn-block">
                日記を追加する
              </a>
            </div>
          </div>
          <table class="table">
            <thead>
            <tr>
              <th>画像</th>
              <th>日記</th>
              <th></th>
              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
              <tr>
                <td class="col-md-2">
                @if($task->img_path == null)
                  <img src="{{ asset('noimage.jpg') }}" width="50px" height="50px">
                @else
                <img src="{{ Storage::url($task->img_path) }}" width="50px" height="50px">
                @endif
                </td>
                <td class="col-md-8">{{ $task->title }}</td>
                <td class="col-md-1">
                <a href="{{ route('tasks.edit', ['id' => $task->folder_id, 'task_id' => $task->id]) }}">
                  編集
                </a>
                </td>
                <td class="col-md-1">
                <a href="{{ route('tasks.delete', ['id' => $task->folder_id, 'task_id' => $task->id]) }}">
                  削除
                </a>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <div class="justify-content-center">
            {{ $tasks->links() }}
        </div>
      </div>
      <div class="column col-md-3"></div>
    </div>
  </div>
@endsection