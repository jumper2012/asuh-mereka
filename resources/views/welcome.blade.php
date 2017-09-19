<!DOCTYPE html>
<html>
  <head>
    @include ('includes.head')  
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include ('includes.header')  
        @include ('includes.sidebar')  
        @yield('content')
        @include ('includes.footer')    
    </div><!-- ./wrapper -->
    @include ('includes.script')     
  </body>
</html>