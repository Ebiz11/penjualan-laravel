<!-- headers -->
    @section('header')
      @include('layouts.header')
    @show
<!--  -->

<!-- nav -->
    @section('nav')
      @include('layouts.nav')
    @show
<!--  -->

      @yield('content')

  <!-- footter -->
    @section('footer')
      @include('layouts.footer')
    @show
  <!--  -->
