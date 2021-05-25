@extends('guest.layouts.app')

@section('content')
<div class="container-carousel">
    <div id="carouselLandingPage" class="carousel slide carousel-page" data-ride="carousel">

        <div class="carousel-inner">

            @foreach ($cover as $i => $path_img_cover)
                <div class="carousel-item @if($i == 0) active @endif">
                    <div class="hero-wrap js-fullheight" style="background-image: url('{{ asset('storage/destinations/'.$path_img_cover) }}'); ">
                        <div class="layer-overlay"></div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <!-- end div carousel page -->

    <div class="col-md-9 ftco-animate carousel-title" data-scrollax=" properties: { translateY: '70%' }">
        <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><strong>Welcome <br></strong> to Karimun Jawa</h1>
        <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }" id="descTitleLandingPage">Find out where to stay, what's the updated news, and travel packages in Karimun</p>
    </div>

</div>

<section class="ftco-section ftco-destination">
    <div class="container">
        <div class="row justify-content-start mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate">
                <span class="subheading">Featured</span>
                <h2 class="mb-4"><strong>Featured</strong> Destination</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="destination-slider owl-carousel ftco-animate">
                    @foreach ($destinations as $destination)
    					<div class="item">
		    				<div class="destination">
                                <a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url('{{ asset('storage/destinations/'.$destination->images[0]->path) }}');"></a>
                                <div class="text p-3">
                                    <h3>{{ $destination->name }}</h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-start mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate">
                <span class="subheading">Special Offers</span>
                <h2 class="mb-4"><strong>Top</strong> Tour Packages</h2>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="destination-slider owl-carousel ftco-animate">
                    @foreach ($packages as $package)
    					<div class="item">
		    				<div class="destination">
                                <a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url('{{ asset('storage/packages/'.$package->images[0]->path) }}');"></a>
                                <div class="text p-3">
                                    <div class="one">
                                        {{ $package->name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-start mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate">
        <span class="subheading">Recent Blog</span>
        <h2><strong>Tips</strong> &amp; Articles</h2>
      </div>
    </div>
    <div class="row d-flex">
      <div class="col-md-3 d-flex ftco-animate">
        <div class="blog-entry align-self-stretch">
          <a href="blog-single.html" class="block-20">
          </a>
          <div class="text p-4 d-block">
              <span class="tag">Tips, Travel</span>
            <h3 class="heading mt-3"><a href="#">8 Best homestay in Philippines that you don't miss out</a></h3>
            <div class="meta mb-3">
              <div><a href="#">August 12, 2018</a></div>
              <div><a href="#">Admin</a></div>
              <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 d-flex ftco-animate">
        <div class="blog-entry align-self-stretch">
          <a href="blog-single.html" class="block-20">
          </a>
          <div class="text p-4">
              <span class="tag">Culture</span>
            <h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
            <div class="meta mb-3">
              <div><a href="#">August 12, 2018</a></div>
              <div><a href="#">Admin</a></div>
              <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 d-flex ftco-animate">
        <div class="blog-entry align-self-stretch">
          <a href="blog-single.html" class="block-20">
          </a>
          <div class="text p-4">
              <span class="tag">Tips, Travel</span>
            <h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
            <div class="meta mb-3">
              <div><a href="#">August 12, 2018</a></div>
              <div><a href="#">Admin</a></div>
              <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 d-flex ftco-animate">
        <div class="blog-entry align-self-stretch">
          <a href="blog-single.html" class="block-20">
          </a>
          <div class="text p-4">
              <span class="tag">Tips, Travel</span>
            <h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
            <div class="meta mb-3">
              <div><a href="#">August 12, 2018</a></div>
              <div><a href="#">Admin</a></div>
              <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


@endsection