<!DOCTYPE html>
<html lang="en">
<head>
  @include('head')
</head>
<body>
    
    <!-- Header -->
    @include('header')
    <!-- End Header -->

    <!-- Main -->
    @yield('content')
    <!-- End Main -->

    <!-- Footer -->
    @include('footer')
    <!-- End Footer -->

    
    @include('script')
    


</body>
</html>