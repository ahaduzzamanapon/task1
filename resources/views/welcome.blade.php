<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
@vite(['resources/scss/app.scss','resources/css/app.css','resources/js/app.js'])

</head>
  <body>
    
   
<!-- Portfolio Section Start -->
<section class="portfolio overflow-hidden">
	<div class="container">
		<div class="row">
			<!-- Portfolio Section Heading -->
			<div class="portfolio__heading text-center col-12">
				<h1 class="portfolio__title fw-bold mb-5">Our Portfolio</h1>
			</div>
			<!-- Portfolio Navigation Buttons List -->
			<div class="col-12">
				<ul class="portfolio__nav nav justify-content-center mb-4">
					<li class="nav-item">
						<button class="portfolio__nav__btn position-relative bg-transparent border-0 active" data-filter="*">All</button>
					</li>
                    @foreach ($cat as $catdata )
                        
                    
					<li class="nav-item">
						<button class="portfolio__nav__btn position-relative bg-transparent border-0" data-filter=".{{$catdata->catname}}">{{$catdata->catname}}</button>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
		<!-- Portfolio Cards Container -->
		<div class="row grid">
			
			
			@foreach ( $showdata as $data )
                
           
			<div class="grid-item col-lg-4 col-sm-6 {{$data->catname}}">
				<a href="#!" class="portfolio__card position-relative d-inline-block w-100">
					<img src="{{asset('images/'.$data->image)}}" alt="Random Image" class="w-100">
				</a>
			</div>
             @endforeach
		</div>
	</div>
</section>
<!-- Portfolio Section End -->








<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('isotope.pkgd.min.js')}}"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
$(document).ready(function() {
  (function ($) {
    "use strict";
    $(window).on("load", function () {
      isotopeInit();
    });

    /* Isotope Init */
    function isotopeInit() {
      $(".grid").isotope({
        itemSelector: ".grid-item",
        layoutMode: "fitRows",
        masonry: {
          isFitWidth: true
        }
      });

      // filter items on button click
      $(".portfolio__nav__btn").on("click", function () {
        var filterValue = $(this).data('filter');
        $(".grid").isotope({ filter: filterValue });
        $(".portfolio__nav__btn").removeClass("active");
        $(this).addClass("active");
      });
    }

  })(jQuery);
});

        </script>
    
</body>
</html>