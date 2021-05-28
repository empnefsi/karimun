@extends('guest.layouts.app')

@section('content')
<div class="container-carousel">
    <div id="carouselLandingPage" class="carousel slide carousel-page" data-ride="carousel">
        
        <div class="carousel-inner">
            @foreach ($cover as $i => $path)
                
            <div class="carousel-item @if($i == 0) active @endif">
                <div class="hero-wrap layer js-fullheight" style="background-image: url('{{ asset('storage/packages/'.$path) }}'); ">
                    <div class="layer-overlay"></div>
                </div>
            </div>

            @endforeach
            {{-- @dump($path) --}}
        </div>
    </div>
    <!-- end div carousel page -->

    <div class="col-md-9 ftco-animate carousel-title" data-scrollax=" properties: { translateY: '70%' }">
        <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><strong>Packages <br></strong></h1>
        <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }" id="descTitleLandingPage">Find out our best packages for your trip</p>
    </div>

</div>

<section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <div class="row">

                @foreach ($packages as $pkg)
                    
                <div class="col-md-4 ftco-animate">
                    <div class="destination">
                      <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url('{{ asset('storage/packages/'.$pkg->images[0]->path) }}');"></a>
                      <div class="text p-3">
                          <div class="d-flex">
                              <div class="one">
                                  <h3><a href="#">{{ $pkg->name }}</a></h3>
                              </div>
                              <div class="two">
                                  <span class="price per-price">{{ $pkg->price }}<br><small>/day</small></span>
                              </div>
                          </div>
                          <hr>
                          <p class="bottom-area d-flex">
                              <span><i class="icon-map-o"></i> San Franciso, CA</span> 
                              <span class="ml-auto"><a href="{{ route('packages') }}/{{ $pkg->slug }}">View</a></span>
                          </p>
                      </div>
                    </div>
                </div>

                @endforeach

            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    {{ $packages->links() }}
                </div>
              </div>
        </div> <!-- .col-md-8 -->
      </div>
    </div>
  </section> <!-- .section -->


<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


@endsection