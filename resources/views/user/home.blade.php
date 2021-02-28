@extends('layouts.user.app')
@include('layouts.user.header')

@section('content')
    <div id="app">
        <nav class="main-wrapper">
            <router-link to="/user/home">Home</router-link>
            <router-link to="/user/about">About</router-link>
            <router-link to="/user/shops">ユーザ一覧</router-link>
            <router-view/>
            </div>
        </nav>
    </div>
<script src="{{ mix('js/app.js') }}"></script> 
@endsection

@include('layouts.user.footer')