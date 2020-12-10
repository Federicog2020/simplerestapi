@extends('layouts.app')

@section('title', 'Inicio')

@section('scripts')
    <script src="{{ asset('js/admin_app.js') }}" defer></script>
    <!-- <script src="{{ asset('js/vuesax-3.8.61/vuesax.common.js') }}" defer></script> -->
    <script src="{{ asset('js/view_admin_app.js') }}" defer></script>
@endsection

@section('styles')
    <link href="{{ asset('css/main_app.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('js/vuesax-3.8.61/vuesax.css') }}" rel="stylesheet"> -->
@endsection

@section('content')
<div class="container-fluid">

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="wrapper">
        <!--
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Toggle Sidebar</span>
                </button>

            </div>
        </nav>
        -->
    
        @include('includes.side_bar')

        <div id="admin-app" class="container">
            <!--<div class="card w-50">
                <div class="card-header">Productos</div>
                    <div class="card-body">
                        <productos-view
                            v-for='producto in productos'
                            v-bind:key='producto.id'
                            v-bind:id='producto.id'
                            v-bind:name='producto.name'
                            v-bind:price='producto.price'
                        ></productos-view>
                    </div>
                </div>
            </div>-->

            <div>
                <productos-contratados v-if="has_productos"></productos-contratados>
            </div>

            <div class="container mt-2">
                <productos-view v-for="(producto, index) in productos" :key="index" :id="producto.id" :name="producto.name"></productos-view>
            </div>
        </div>
    </div>
</div>
@endsection