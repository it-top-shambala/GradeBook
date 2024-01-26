@extends('layouts.base')

@section('content')
<x-forms.form action="/user" title="Регистрация" method="post">
    <x-forms.formItem>
        <x-forms.label>{{__('Имя*')}}</x-forms.label>
        <x-forms.input autofocus/>
    </x-forms.formItem>
    <x-forms.formItem>
        <x-forms.label>{{__('Email*')}}</x-forms.label>
        <x-forms.input type="email"/>
    </x-forms.formItem>
    <x-forms.formItem>
        <x-forms.label>{{__('Телефон*')}}</x-forms.label>
        <x-forms.input/>
    </x-forms.formItem>
    <x-forms.formItem>
        <x-forms.label>{{__('Пароль*')}}</x-forms.label>
        <x-forms.input type="password"></x-forms.input>
    </x-forms.formItem>
    <x-forms.formItem>
        <x-forms.label>{{__('Подтверждение пароля*')}}</x-forms.label>
        <x-forms.input type="password"></x-forms.input>
    </x-forms.formItem>
    <x-forms.formItem>
        <x-forms.label>{{__('статус?')}}</x-forms.label>
        <x-forms.select>
            <option selected='true'>{{__('Заказчик')}}</option>
            <option >{{__('подрядчик')}}</option>
        </x-forms.select>
    </x-forms.formItem>
    <x-forms.formItem>
        <x-forms.button>{{__('Зарегистрироваться')}}</x-forms.button>
    </x-forms.formItem>
</x-forms.form>
@endsection
