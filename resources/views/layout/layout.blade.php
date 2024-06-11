
<!doctype html>
<html lang="en">
  <head>
  	@include('layout.partials.head')
  </head>

  <body>

	@include('layout.partials.nav')

    <main role="main" class="container flex justify-center">

      <div class="starter-template" style="max-width: 690px">
        <div class="">
           <div class="">
       			@yield('content')
       		</div>
       	</div>
      </div>

    </main><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	@include('layout.partials.footer-scripts');
  </body>
</html>