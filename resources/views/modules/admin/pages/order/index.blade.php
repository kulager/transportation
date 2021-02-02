@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Transportation</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Заказы</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <h2 class="h4 card-header-title">Заказы</h2>
                    <a href="{{route('order.create')}}" class="btn btn-outline-primary mt-3">
                        Добавить
                        <i class="ti ti-plus"></i>
                    </a>
                </header>
                <div class="card-body pt-0">
                    @if($orders->items())
                        <table class="table table-hover table-light text-center">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Номер документа</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->document_id}}</td>
                                    <td class="d-inline-flex align-items-center">
                                        <a href="{{route('order.edit', ['id' => $order->id])}}"
                                           class="btn btn-outline-primary btn-sm"><i class="ti ti-pencil"></i>
                                        </a>
                                        <form method="post" action="{{route('order.cmr', ['id' => $order->id])}}">
                                            @csrf
                                            <button class="btn btn-outline-primary btn-sm">CMR</button>
                                        </form>
                                        <form method="post" action="{{route('order.driver', ['id' => $order->id])}}">
                                            @csrf
                                            <button class="btn btn-outline-primary btn-sm">Доверенность Водителя
                                            </button>
                                        </form>
                                        <form method="post" action="{{route('order.goods', ['id' => $order->id])}}">
                                            @csrf
                                            <button class="btn btn-outline-primary btn-sm">Товар накладная</button>
                                        </form>
                                        <form method="post" action="{{route('order.contract', ['id' => $order->id])}}">
                                            @csrf
                                            <button class="btn btn-outline-primary btn-sm">Договор</button>
                                        </form>
                                        <a class="btn btn-outline-primary btn-sm" href="{{route('order.realization',
                                            ['id' => $order->id])}}" target="_blank">Реализация ТМЗ
                                        </a>
                                        <a class="btn btn-outline-primary btn-sm" href="{{route('order.invoice',
                                            ['id' => $order->id])}}" target="_blank">Счет-Фактура
                                        </a>

                                        <form method="post" action="{{route('order.invoice.document', ['id' => $order->id])}}">
                                            @csrf
                                            <button class="btn btn-outline-primary btn-sm">Счет-Фактура Новый</button>
                                        </form>
                                        <form method="post" action="{{route('order.zip', ['id' => $order->id])}}">
                                            @csrf
                                            <button class="btn btn-outline-primary btn-sm">ZIP</button>
                                        </form>
                                        {{--                                        <button class="btn btn-outline-danger btn-sm" data-toggle="modal"--}}
                                        {{--                                                data-target="#delete{{$company->id}}"><i class="ti ti-trash"></i>--}}
                                        {{--                                        </button>--}}
                                        {{--                                        <div class="modal modal-backdrop" id="delete{{$company->id}}" tabindex="-1"--}}
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
                                        {{--                                                        <form method="post" action="{{route('region.delete', ['id' => $company->id])}}">--}}
                                        {{--                                                            {{csrf_field()}}--}}
                                        {{--                                                            <input type="number" value="{{$company->id}}" hidden>--}}
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
                            @endforeach
                            </tbody>
                        </table>
                        {{$orders->links()}}
                    @else <h6>У вас пока нет заказов!</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
