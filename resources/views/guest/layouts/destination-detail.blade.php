@extends('guest.layouts.app')

@section('content')

<div class="hero-wrap js-fullheight" style="">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.php">Home</a></span> <span class="mr-2"><a href="destination.php">Destination</a></span> <span>Detail</span></p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Destination Details</h1>
        </div>
      </div>
    </div>
</div>

  <section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">

        <div class="col-md-12 ftco-animate">
            <div class="single-slider owl-carousel">
                <div class="item">
                    <div class="hotel-img" style=""></div>
                </div>
                <div class="item">
                    <div class="hotel-img" style=""></div>
                </div>
                <div class="item">
                    <div class="hotel-img" style=""></div>
                </div>
            </div>
        </div>
        
        <div class="col-md-12 mt-4 mb-5 ftco-animate">
          <h1 class="text-center">{{$detail->name}}</h1>
          <div class="text-justify">
            {!! $detail->description !!}
          </div>
        </div>

        <div class="mx-auto">
          {!! $detail->coordinate !!}

        </div>

      </div>
    </div> <!-- .col-md-8 -->
  </section> <!-- .section -->

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

@endsection