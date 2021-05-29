@extends('guest.layouts.app')

@section('content')
<div class="hero-wrap js-fullheight" style="">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.php">Home</a></span> <span class="mr-2"><a href="Package.php">Package</a></span> <span>Detail</span></p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Package Details</h1>
        </div>
      </div>
    </div>
  </div>


  <section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">

        <div class="col-lg-12">
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

                <div class="col-md-12 hotel-single mt-4 mb-5 ftco-animate">
                    <h2>{{$detail->name}}</h2>
                    <p class="rate mb-5">
                        <span class="loc"><a href="#"><i class="icon-map"></i>Location</a></span>
                    </p>
                          <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
                          <div class="d-md-flex mt-5 mb-5">
                              <ul>
                                  <li>The Big Oxmox advised her not to do so</li>
                                  <li>When she reached the first hills of the Italic Mountains</li>
                                  <li>She had a last view back on the skyline of her hometown </li>
                                  <li>Bookmarksgrove, the headline of Alphabet </li>
                              </ul>
                              <ul class="ml-md-5">
                                  <li>Question ran over her cheek, then she continued</li>
                                  <li>Pityful a rethoric question ran</li>
                                  <li>Mountains, she had a last view back on the skyline</li>
                                  <li>Headline of Alphabet Village and the subline</li>
                              </ul>
                          </div>
                          <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
                    </div>

            </div>
        </div> <!-- .col-md-8 -->
      </div>
    </div>
  </section> <!-- .section -->


<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


@endsection