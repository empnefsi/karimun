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
        <h1 class="mb-4 sub-title" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><strong>Welcome <br></strong> to Karimun Jawa</h1>
        <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }" class="sub-title">Find out where to stay, what's the updated news, and travel packages in Karimun</p>
    </div>

</div>

<section class="destination-section my-5 py-4">
    <div class="container">
        <div class="col-md-7 heading-section ftco-animate">
            <h2 class="mb-4"><strong>Featured</strong> Destinations</h2>
        </div>
    
        <div class="row mx-auto justify-content-start padding-125">
            @foreach ($destinations as $destination)
                <div class="destination-content mb-md-3 mb-xl-0 column-5">
                    <div class="destination-item">
                        <a href="{{ route('destinations') }}/{{ $destination->slug }}" style="background-image: url('{{ asset('storage/destinations/'.$destination->images[0]->path) }}')" class="card">
                            <div class="overlay"></div>
                        </a>
                    </div>
                    <span style="cursor : pointer;" onclick="window.location.href = '{{ route('destinations') }}/{{ $destination->slug }}'" class="small">{{ $destination->name }}</span>
                </div>
            @endforeach
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
                                    <p class="text-center">
                                        {{ $package->name }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-start mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate">
        <span class="subheading">The Latest from Karimun</span>
        <h2><strong>Recent</strong> Articles</h2>
      </div>
    </div>
    <div class="row d-flex">
      @foreach ($news as $news)
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="{{ route('news') }}/{{ $news->slug }}" class="block-20" style="background-image: url('{{ asset('storage/news/'.$news->images[0]->path) }}')"></a>

              <div class="text p-4 d-block" style="cursor : pointer;" onclick="window.location.href = '{{ route('news') }}/{{ $news->slug }}'">
                <h3 class="heading mt-3">{{ $news->title }}</h3>
                <div class="meta mb-3">
                    {{ date('j M Y', strtotime($news->created_at))}}
                </div>
              </div>

            </div>
          </div>
      @endforeach
    </div>
  </div>
</section>


<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


@endsection