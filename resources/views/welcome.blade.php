@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="alert alert-primary" role="alert">
            Все страницы и функционал доступны только авторизованным пользователям и только в соответствии с их
            привилегиями.
        </div>
    </div>
    @can('viewManager', auth()->user())
        <div class="container">
            <a href="{{route('manager')}}" class="btn btn-primary">Перейти в панель менеджера</a>
        </div>
    @endcan
    @can('view', auth()->user())
        <div class="container">
            <div class="row d-flex">
                <div class="col-6">
                    @if($isApplication)
                        <form action="{{route('user.store.application')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Тема</label>
                            <input required type="text" name="title" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Сообщение</label>
                            <textarea required name="content" class="form-control" id="exampleInputPassword1" cols="30"
                                      rows="10"></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupFile01">Загрузить</label>
                            <input required type="file" name="file" class="form-control" id="inputGroupFile01"
                                   accept=".png, .jpeg, .jpg, .pdf">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Отправить</button>
                        </div>
                    </form>
                    @else
                        <div class="alert alert-danger" role="alert">Заявка разрешено только 1 раз в сутки.</div>
                    @endif
                </div>
                <div class="col-6">
                    <ul class="list-group">
                        @if($applications)
                            <span class="mb-1">Список пуст</span>
                        @endif
                        @foreach($applications as $application)
                            <li class="list-group-item d-flex justify-content-between align-items-center">{{$application->title}}
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
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endcan
@endsection
