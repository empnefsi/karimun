@extends('guest.layouts.app')

@section('content')

<div class="hero-wrap js-fullheight" style="background-image: url('{{ asset('storage/packages/' . $package_detail->images[0]->path) }}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{ $package_detail->name }} Details</h1>
        </div>
      </div>
    </div>
</div>


  <section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">

        <div class="col-md-12 ftco-animate">
            <div class="single-slider owl-carousel">
                @if (count($package_detail->images) > 1)
                    @foreach ($package_detail->images as $image)
                        <div class="item">
                            <div class="hotel-img"
                                style="background-image: url('{{ asset('storage/destinations/' . $image->path) }}');">
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="col-md-12 mt-4 mb-5 ftco-animate">
          <h2 class="text-center">{{$package_detail->name}}</h2>
          <div class="text-justify">
            {!! $package_detail->description !!}
          </div>
        </div>

      </div>
    </div> <!-- .col-md-8 -->
  </section> <!-- .section -->


<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


@endsection
