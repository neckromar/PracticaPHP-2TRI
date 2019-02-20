@extends('layouts.app2')
@section('title','Panel de control')
@section('content')


<div style="padding-top: 300px;">
    <div class="what-we-do bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    Welcome Again!! {{ Auth::user()->name}}
                </div>
            </div>
        </div>
    </div>


    @endsection
