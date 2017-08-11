@extends('layouts.app')

@section('content')
    <div class="row-fluid login-wrapper">
        {{--<a href="{{ url('/home') }}">--}}
        <img class="logo" src="img/logo-white.png" />
        {{--</a>--}}

        <div class="span4 box" id="loginForm">
            <div class="content-wrap">
                <h6>登录</h6>
                <input class="span12" type="text" name="name" placeholder="用户名" v-model="name" id="name"/>
                <input class="span12" type="password" name="password" placeholder="密码" v-model="password" v-on:keyup.13="login"/>
                {{--<a href="#" class="forgot">Forgot password?</a>--}}
                <div class="remember">
                    <input id="remember-me" type="checkbox" v-model="remember" name="remember"/>
                    <label for="remember-me">记住我</label>
                </div>
                <a class="btn-glow primary login" v-on:click="login">登录</a>
            </div>
        </div>

        {{--<div class="span4 no-account">--}}
        {{--<p>Don't have an account?</p>--}}
        {{--<a href="signup.html">Sign up</a>--}}
        {{--</div>--}}
    </div>
@endsection