@extends('guest.layouts.app')

@section('content')
<div class="container-carousel">
    <div id="carouselLandingPage" class="carousel slide carousel-page" data-ride="carousel">
        
        <div class="carousel-inner">
            {{-- @foreach ($cover as $i => $path) --}}
                
            {{-- <div class="carousel-item @if($i == 0) active @endif"> --}}
            <div class="carousel-item active">
                <div class="hero-wrap layer js-fullheight" style="background-image: url('{{ asset('assets/img/guest-assets/destinations/photo-2.jpeg') }}'); ">
                    <div class="layer-overlay"></div>
                </div>
            </div>
            <div class="carousel-item ">
                <div class="hero-wrap layer js-fullheight" style="background-image: url('{{ asset('assets/img/guest-assets/destinations/photo-1.jpeg') }}'); ">
                    <div class="layer-overlay"></div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="hero-wrap layer js-fullheight" style="background-image: url('{{ asset('assets/img/guest-assets/destinations/photo-3.jpeg') }}'); ">
                    <div class="layer-overlay"></div>
                </div>
            </div>

            {{-- @endforeach --}}

        </div>
    </div>
    <!-- end div carousel page -->

    <div class="col-md-9 ftco-animate carousel-title" data-scrollax=" properties: { translateY: '70%' }">
        <h1 class="mb-4 sub-title" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><strong>Destinations <br></strong></h1>
        <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }" class="sub-title">Find the destinations you want to visit</p>
    </div>

</div>

<section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <div class="row">
                
                @foreach ($destinations as $dst)      
                
                <div class="col-md-4 ftco-animate">
                  <div class="destination">
                      <div class="text p-3" style="border-radius: 20px">
                        <a href="{{ route('destinations') }}/{{ $dst->slug }}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url('{{ asset('storage/destinations/'.$dst->images[0]->path) }}'); border-radius: 5px  "></a>
                            <h3 class="text-center">
                                <a href="{{ route('destinations') }}/{{ $dst->slug }}">{{$dst->name}}</a>
                            </h3>
                          <p class="bottom-area d-flex">
                              <span class="ml-auto"><a href="{{ route('destinations') }}/{{ $dst->slug }}">View</a></span>
                          </p>
                      </div>
                    </div>
                </div>

                @endforeach
            </div>

            <div class="row mt-5">
                <div class="col text-center">
                    {{ $destinations->links() }}
                </div>
            </div>

        </div> <!-- .col-md-8 -->
      </div>
    </div>
  </section> <!-- .section -->

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

@endsection