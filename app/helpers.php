<?php
use Illuminate\Support\Facades\Route;

if (!function_exists('activlink')){
    function activlink(string $route):string
{
    if(Route::currentRouteName()==$route){
        return "active" ;
    }else return "";

}}

if (!function_exists('showroute')){
    function showroute():string
{
        return Route::currentRouteName() ;
}}
