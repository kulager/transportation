@extends('modules.admin.layouts.app-full')
@section('styles')
    <style>
    .product-form {
        border-top: 3px black solid;
        padding-top: 5px;
    }
    </style>
@endsection
@section('content')
    <h1 class="h2 mb-2">Заказ</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Заказ</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <a href="{{route('order.index')}}" class="btn btn-outline-primary mt-1 mb-4"><i
                            class="ti ti-arrow-left"></i> Назад</a>
                    <h2 class="h4 card-header-title">Заказ</h2>
                </header>
                <div class="card-body pt-0">
                    <form action="{{route('order.store')}}" method="post" enctype="multipart/form-data" id="order_form">
                        <input type="number" name="id" value="{{$order ? $order->id : ''}}" hidden>
                        @csrf
                        <div class="row">
                            <div class="form-group col-3 required">
                                <label for="document_id" class="control-label">ID</label>
                                <input type="number" name="document_id" class="form-control" id="document_id" min="1"
                                       max="999" value="{{$order ? $order->document_id : old('document_id')}}" required>
                            </div>
                            <div class="form-group col-3 required">
                                <label for="date" class="control-label">Дата</label>
                                <input type="date" name="date" class="form-control"
                                       value="{{$order ? $order->date : old('date')}}"
                                       id="date" required>
                            </div>
                            <div class="form-group col-6 required">
                                <label for="company_id" class="control-label">Компания</label>
                                <select name="company_id" class="form-control js-example-basic-single" id="company_id" required>
                                    <option value=""></option>
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}" {{$order ? $order->company_id == $company->id
                                        ? 'selected' : '' : ''}}>{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-3 required">
                                <label for="driver_full_name" class="control-label">Водитель 1</label>
                                <input type="text" name="driver_full_name" class="form-control"
                                       id="driver_full_name" placeholder="Мамедов 1"
                                       value="{{$order ? $order->driver_full_name : old('driver_full_name')}}" required>
                            </div>
                            <div class="form-group col-3 required">
                                <label for="driver_passport" class="control-label">Паспорт</label>
                                <input type="text" name="driver_passport" class="form-control"
                                       id="driver_passport" placeholder="Мамедов 1"
                                       value="{{$order ? $order->driver_passport : old('driver_passport')}}" required>

                            </div>
                            <div class="form-group col-3 required">
                                <label for="driver_birth_date" class="control-label">Дата рождения водителя</label>
                                <input type="date" name="driver_birth_date" class="form-control"
                                       id="driver_passport" placeholder="Мамедов 1"
                                       value="{{$order ? $order->driver_birth_date : old('driver_birth_date')}}" required>
                            </div>
                            <div class="form-group col-3">
                                <label for="second_driver_full_name" class="control-label">Водитель 2</label>
                                <input type="text" name="second_driver_full_name" class="form-control"
                                       id="second_driver_full_name" placeholder="Мамедов 2"
                                       value="{{$order ? $order->second_driver_full_name : old('second_driver_full_name')}}">
                            </div>
                            <div class="form-group col-3 required">
                                <label for="car_brand" class="control-label">Марка машины</label>
                                <input type="text" name="car_brand" class="form-control" id="car_brand"
                                       value="{{$order ? $order->car_brand : old('car_brand')}}" required>
                            </div>
                            <div class="form-group col-3 required">
                                <label for="car_number" class="control-label">Номер машины</label>
                                <input type="text" name="car_number" class="form-control" id="car_number"
                                       value="{{$order ? $order->car_number : old('car_number')}}" required>
                            </div>
                            <div class="form-group col-3">
                                <label for="second_car_brand" class="control-label">Марка машины 2</label>
                                <input type="text" name="second_car_brand" class="form-control" id="second_car_brand"
                                       value="{{$order ? $order->second_car_brand : old('second_car_brand')}}">
                            </div>
                            <div class="form-group col-3">
                                <label for="second_car_number" class="control-label">Номер машины 2</label>
                                <input type="text" name="second_car_number" class="form-control" id="second_car_number"
                                       value="{{$order ? $order->second_car_number : old('second_car_number')}}">
                            </div>
                            <div class="form-group col-6 required">
                                <label for="address_id" class="control-label">Адрес</label>
                                <select name="address_id" class="form-control js-example-basic-single" id="address_id" required>
                                    <option value=""></option>
                                    @foreach($addresses as $address)
                                        <option value="{{$address->id}}" {{$order ? $order->address_id == $address->id
                                        ? 'selected' : '' : ''}}>
                                            {{$address->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="contract_person" class="control-label">Договор ЧЛ, ИП, ТОО</label>
                                <input type="text" name="contract_person" class="form-control" id="contract_person"
                                       value="{{$order ? $order->contract_person : old('contract_person')}}">
                            </div>
                        </div>
                        <div id="products">
                            @if($order && $order->products)
                                @foreach($order->products as $order_product)
                                    <div class="row product-form" id="product-form{{$order_product->id}}">
                                        <hr>
                                        <div class="form-group col-6 required">
                                            <label for="product_id{{$order_product->id}}"
                                                   class="control-label">Продукт</label>
                                            <select name="products[{{$order_product->id}}][id]" class="form-control js-example-basic-single"
                                                    id="product_id{{$order_product->id}}" required>
                                                <option value=""></option>
                                                @foreach($products as $product)
                                                    <option value="{{$product->id}}" {{$order_product->product_id == $product->id
                                        ? 'selected' : ''}}>
                                                        {{$product->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-6 required">
                                            <label for="box_id{{$order_product->id}}" class="control-label">Тип
                                                коробки</label>
                                            <select name="products[{{$order_product->id}}][box]" class="form-control js-example-basic-single"
                                                    id="box_id{{$order_product->id}}" required>
                                                <option value=""></option>
                                                @foreach($boxes as $box)
                                                    <option value="{{$box->id}}" {{$order_product->box_id == $box->id
                                        ? 'selected' : ''}}>
                                                        {{$box->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-4 required">
                                            <label for="net_weight{{$order_product->id}}" class="control-label">Масса
                                                нетто</label>
                                            <input name="products[{{$order_product->id}}][net_weight]" class="form-control"
                                                   type="number" min="1" id="net_weight{{$order_product->id}}"
                                                   value="{{$order_product->net_weight}}" required>
                                        </div>
                                        <div class="form-group col-4 required">
                                            <label for="gross_weight{{$order_product->id}}" class="control-label">Масса
                                                бруто</label>
                                            <input name="products[{{$order_product->id}}][gross_weight]" class="form-control"
                                                   type="number" min="1" id="gross_weight{{$order_product->id}}"
                                                   value="{{$order_product->gross_weight}}" required>
                                        </div>
                                        <div class="form-group col-3 required">
                                            <label for="place_quantity{{$order_product->id}}" class="control-label">Количество
                                                мест</label>
                                            <input name="products[{{$order_product->id}}][place_quantity]" class="form-control"
                                                   type="number" min="1" id="place_quantity{{$order_product->id}}"
                                                   value="{{$order_product->place_quantity}}" required>
                                        </div>
                                        <div class="form-group col-1 mt-5">
                                            <a href="#" class="btn btn-primary removeProduct"><i class="ti-minus"></i></a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-group">
                            <a class="btn btn-primary" href="#" onclick="productForm()">Добавить продукт <i
                                    class="ti-plus"></i></a>
                        </div>
                        <button type="submit"
                                class="offset-md-4 col-md-4 btn btn-block btn-wide btn-primary text-uppercase">
                            Сохранить <i class="ti ti-check"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        let orderProductId = '{{$order ? !$order->products->isEmpty() ? $order->products->last()->id : 0 : 0}}';
        $(document).ready(function(){
            $(".removeProduct").click(function(event){
                event.target.parentNode.parentNode.remove();
            });
        });
        function productForm() {
            var newProductForm = document.createElement('div');
            newProductForm.className = 'row product-form';
            orderProductId = Number(orderProductId);
            orderProductId = orderProductId + 1;
            newProductForm.id = 'product_form';
            newProductForm.innerHTML = `<div class="form-group col-6 required">
                                    <label for="product_id${orderProductId}" class="control-label">Продукт</label>
                                    <select name="products[${orderProductId}][id]" class="form-control js-example-basic-single" required id="product_id${orderProductId}">
                                        <option value=""></option>
                                        @foreach($products as $product)
            <option value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
            </select>
        </div>
        <div class="form-group col-6 required">
            <label for="box_id${orderProductId}" class="control-label">Тип коробки</label>
                                    <select name="products[${orderProductId}][box]" class="form-control js-example-basic-single" id="box_id${orderProductId}"
                                        required>
                                        <option value=""></option>
                                        @foreach($boxes as $box)
            <option value="{{$box->id}}">{{$box->name}}</option>
                                        @endforeach
            </select>
        </div>
        <div class="form-group col-4 required">
            <label for="net_weight${orderProductId}" class="control-label">Масса нетто</label>
                                    <input name="products[${orderProductId}][net_weight]" class="form-control"
                                           type="number" min="1" id="net_weight${orderProductId}" required>
                                </div>
                                <div class="form-group col-4 required">
                                    <label for="gross_weight${orderProductId}" class="control-label">Масса бруто</label>
                                    <input name="products[${orderProductId}][gross_weight]" class="form-control"
                                           type="number" min="1" id="gross_weight${orderProductId}" required>
                                </div>
                                <div class="form-group col-3 required">
                                    <label for="place_quantity${orderProductId}" class="control-label">Количество мест</label>
                                    <input name="products[${orderProductId}][place_quantity]" class="form-control"
                                           type="number" min="1" id="place_quantity${orderProductId}" required>
                                </div>
                                <div class="form-group col-1 mt-5">
                                            <a href="#" class="btn btn-primary removeProduct"><i class="ti-minus"></i></a>
                                        </div>`;
            document.getElementById('products').appendChild(newProductForm);
            $(".removeProduct").click(function(event){
                event.target.parentNode.parentNode.remove();
            });
            $('.js-example-basic-single').select2({
                placeholder: "Не выбрано",
                allowClear: true,
                theme: "classic",
                width: '100%',
                language: {
                    noResults: function () {
                        return "Не найдено!";
                    }
                }
            });
        }

        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                placeholder: "Не выбрано",
                allowClear: true,
                theme: "classic",
                width: '100%',
                language: {
                    noResults: function () {
                        return "Не найдено!";
                    }
                }
            });
        });
    </script>
@endsection
