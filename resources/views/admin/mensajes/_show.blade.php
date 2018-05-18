@extends('layout')

@section('contenido')

<h1>Mensaje</h1>
<p>Enviado por {{ $mensaje->nombre }}</p>

@stop