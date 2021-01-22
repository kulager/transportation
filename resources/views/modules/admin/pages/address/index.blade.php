@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Transportation</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Адреса</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <h2 class="h4 card-header-title">Адреса</h2>
                    <a href="#" class="btn btn-outline-primary mt-3" data-toggle="modal" data-target="#add">
                        Добавить
                        <i class="ti ti-plus"></i>
                    </a>
                </header>
                <div class="card-body pt-0">
                    @if($addresses->items())
                        <table class="table table-hover table-light text-center">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>ABBR</th>
                                <th>Город</th>
                                <th>Создан</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($addresses as $address)
                                <tr>
                                    <td>{{$address->id}}</td>
                                    <td>{{$address->name}}</td>
                                    <td>{{$address->second_name}}</td>
                                    <td>{{$address->city->name}}</td>
                                    <td>{{$address->created_at}}</td>
                                    <td class="d-inline-block">
                                        <button class="btn btn-outline-primary btn-sm" data-toggle="modal"
                                                data-target="#edit{{$address->id}}"><i class="ti ti-pencil"></i>
                                        </button>
                                        {{--                                        <button class="btn btn-outline-danger btn-sm" data-toggle="modal"--}}
                                        {{--                                                data-target="#delete{{$address->id}}"><i class="ti ti-trash"></i>--}}
                                        {{--                                        </button>--}}
                                        {{--                                        <div class="modal modal-backdrop" id="delete{{$address->id}}" tabindex="-1"--}}
                                        {{--                                             role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">--}}
                                        {{--                                            <div class="modal-dialog" role="document">--}}
                                        {{--                                                <div class="modal-content">--}}
                                        {{--                                                    <div class="modal-header">--}}
                                        {{--                                                        <h4 class="modal-title w-100" id="myModalLabel">Удаление</h4>--}}
                                        {{--                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                                        {{--                                                            <span aria-hidden="true">&times;</span>--}}
                                        {{--                                                        </button>--}}
                                        {{--                                                    </div>--}}
                                        {{--                                                    <div class="modal-body">--}}
                                        {{--                                                        <p>Вы действительно хотите удалить?</p>--}}
                                        {{--                                                        <form method="post" action="{{route('region.delete', ['id' => $address->id])}}">--}}
                                        {{--                                                            {{csrf_field()}}--}}
                                        {{--                                                            <input type="number" value="{{$address->id}}" hidden>--}}
                                        {{--                                                            <button type="submit" class="btn btn-outline-danger mt-3">Удалить безвозвратно<i class="ti ti-trash"></i></button>--}}
                                        {{--                                                        </form>--}}
                                        {{--                                                    </div>--}}
                                        {{--                                                    <div class="modal-footer">--}}
                                        {{--                                                        <button type="button" class="btn btn-danger-soft btn-sm" data-dismiss="modal">--}}
                                        {{--                                                            <i class="ti ti-close"></i> Закрыть</button>--}}
                                        {{--                                                    </div>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                    </td>
                                </tr>
                                <div class="modal modal-backdrop" id="edit{{$address->id}}" tabindex="-1"
                                     role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title w-100" id="myModalLabel">Редактировать</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="{{route('address.store')}}" method="post" enctype="multipart/form-data">
                                                    <x-admin.input-form-group-list
                                                        :errors="$errors"
                                                        :elements="$address->getForm()"/>
                                                    <button type="submit" class="offset-md-4 col-md-4 btn btn-block btn-wide btn-primary text-uppercase">
                                                        Сохранить <i class="ti ti-check"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger-soft btn-sm" data-dismiss="modal">
                                                    <i class="ti ti-close"></i> Закрыть</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            </tbody>
                        </table>
                        {{$addresses->links()}}
                    @else <h6>У вас пока нет адресов!</h6>
                    @endif
                </div>
            </div>
        </div>
        <div class="modal modal-backdrop" id="add" tabindex="-1"
             role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Добавить</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('address.store')}}" method="post">
                            {{--                        <div class="form-group">--}}
                            {{--                            <textarea class="ckeditor form-control" id="question-ckeditor" name="question"></textarea>--}}
                            {{--                        </div>--}}
                            <div class="form-group">
                                <x-admin.input-form-group-list
                                    :errors="$errors"
                                    :elements="$address_web_form"/>
                            </div>
                            <button type="submit" class="offset-md-4 col-md-4 btn btn-block btn-wide btn-primary text-uppercase">
                                Сохранить <i class="ti ti-check"></i>
                            </button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger-soft btn-sm" data-dismiss="modal">
                            <i class="ti ti-close"></i> Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
