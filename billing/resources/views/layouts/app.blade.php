<!doctype html>
<html class="no-js" lang="">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <link rel="apple-touch-icon" href="yogavana-icon.png">
      <link rel="apple-tile-icon" href="yogavana-tile.png">
      <link rel="apple-wide-icon" href="yogavana-wide.png">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('css/datatables.min.css') }}" type="text/css">
      <link rel="stylesheet" href="{{ asset('css/main.css') }}" type="text/css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

   </head>
   <body>
      <div class="main dasbord">
         @include('layouts.header')
         <article>
            @yield('content')
         </article>
         @include('layouts.footer')
      </div>
      <div class="flashmessages @if(Session::get('alert-success')) showpop @endif" id="priceshowss">
      @if(Session::get('alert-success')) {{Session::get('alert-success')}} @endif
      </div>
     
     
   </body>
</html>
