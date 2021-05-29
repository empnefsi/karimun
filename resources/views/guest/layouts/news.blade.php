@extends('guest.layouts.app')

@section('content')
<div class="container-carousel">
    <div id="carouselLandingPage" class="carousel slide carousel-page" data-ride="carousel">

        <div class="carousel-inner">

          <div class="carousel-inner">
            @foreach ($cover as $i => $path)
                
            <div class="carousel-item @if($i == 0) active @endif">
                <div class="hero-wrap layer js-fullheight" style="background-image: url('{{ asset('storage/news/'.$path) }}'); ">
                    <div class="layer-overlay"></div>
                </div>
            </div>

            @endforeach
            {{-- @dump($path) --}}
        </div>

        </div>
    </div>
    <!-- end div carousel page -->

    <div class="col-md-9 ftco-animate carousel-title" data-scrollax=" properties: { translateY: '70%' }">
        <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><strong>News<br></strong></h1>
        <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }" id="descTitleLandingPage">Updated News About Karimun Jawa</p>
    </div>

</div>

  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row d-flex">
        
        @foreach ($news as $nws)            
        <div class="col-md-3 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch" style="border-radius: 20px">
            <div class="text p-4 d-block">
              <a href="#" class="block-20" style="background-image: url('{{ asset('storage/news/'.$nws->images[0]->path) }}'); border-radius: 5px">
              </a>
                <span class="tag">Updated News</span>
              <h3 class="heading mt-3">{{$nws->title}}</h3>
              <div class="meta mb-3">
                  <div>{{$nws->created_at}}</div>
                  <div><a href="#" class="meta-chat"></div>
                  <p class="bottom-area d-flex">
                    <span class="ml-auto text-center"><a href="{{ route('news') }}/{{$nws->slug}}">View</a></span>
                  </p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
   
      </div>
      <div class="row mt-5">
        <div class="col text-center">
          {{ $news->links() }}
        </div>
      </div>
    </div>
  </section>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

@endsection