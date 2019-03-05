@extends('layouts.app2')
@section('title','Panel de control')
@section('content')


<div class="pricing-plan-section">
     
    <div class="what-we-do bg">
        <div class="container">
            <div class="row justify-content-center">
                @include('includes.message')
                <div class="col-md-8">
                    
                    Welcome Again!! {{ Auth::user()->name}}
                </div>
            </div>
        </div>
    </div>


    @endsection
