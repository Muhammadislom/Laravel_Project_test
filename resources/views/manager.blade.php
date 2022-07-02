@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Тема</th>
                <th scope="col">сообщение</th>
                <th scope="col">имя клиента</th>
                <th scope="col">почта клиента</th>
                <th scope="col">ссылка на прикрепленный файл</th>
                <th scope="col">время создания</th>
                <th scope="col">статус</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                @foreach($user->user_application as $application)
                    <tr>
                        <th scope="row">{{$application->id}}</th>
                        <td>{{$application->title}}</td>
                        <td>{{$application->content}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><a href="{{'storage/' . $application->file}}">Link</a></td>
                        <td>{{$application->created_at}}</td>
                        <td>
                        <div style="border-radius: 3px;"
                                     @switch($application->status)
                                         @case(0)
                                             class="alert-danger p-1" role="alert">
                                            не отмечено
                                        @break
                                        @case(1)
                                         class="alert-success p-1" role="alert">
                                            отмечено
                                        @break
                                     @endswitch
                                </div>
                        </td>
                        <td>
                            @if(!$application->status)
                            <form action="{{route('application.update.status', $application->id)}}" method="post">
                                @csrf
                                @method('patch')
                                    <button class="btn btn-primary" type="submit">Ответить</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
