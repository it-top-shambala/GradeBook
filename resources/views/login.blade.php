@extends('layouts.base')

@section('content')
<x-forms.form action="/user" title="Вход">
    <x-forms.formItem>
        <x-forms.label>{{__('Имя*')}}</x-forms.label>
        <x-forms.input autofocus/>
    </x-forms.formItem>
    <x-forms.formItem>
        <x-forms.label>{{__('Пароль*')}}</x-forms.label>
        <x-forms.input type="password"></x-forms.input>
    </x-forms.formItem>
    <x-forms.formItem>
        <x-forms.checkbox idname="checkbox">{{__('запомнить меня')}}</x-forms.checkbox>
    </x-forms.formItem>
    <x-forms.formItem>
        <x-forms.button>{{__('Войти')}}</x-forms.button>
    </x-forms.formItem>
</x-forms.form>
@endsection