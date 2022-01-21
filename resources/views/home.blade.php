@extends('layouts.frontend')
@section('content')

<div class="top-area" data-test="aldrintest">
<div class="container">
<figure class="main-banner">
<div class="image"><img class="lozad" src="#" data-src="{{asset('images/template/main-header-image.jpg')}}" alt="Bild: Paar am Strand"></div>

<figcaption>
<strong>Honeymooner</strong>
<small>finden bei</small>
<span>Meine Malediven</span>
<b>die perfekten Angebote!</b>
<p>Einfach Honeymoon in den Filtern auswählen.</p>
</figcaption>


</figure>
</div>
</div>


<main class="main">
<div class="container">
<section class="intro-section">


<div class="intro-box">
<h1>Meine Malediven ...</h1>
<p>
	Wenn das Paradies auf der Erde zu finden ist, dann hier, <br>im Indischen Ozean.
</p>
<p>
	Die Malediven sind ein Ort, an dem Zeit keine Rolle zu spielen scheint,
	an dem allein der Blick auf die menschenleeren Traumstrände und das in allen Blautönen strahlende Wasser genügt, um Entspannung zu finden; an dem Erholung plötzlich nicht mehr nur ein Wort ist, sondern ein Zustand wird.
</p>
<p>
	Kein anderer Ort auf der Welt birgt diesen Zauber <br>- wir wissen, wovon wir sprechen:
	<br>Wir haben schon viele Orte auf der Welt gesehen.
	<br>Doch nichts hat uns mehr berührt, als die Malediven.
	Deshalb möchten wir Ihnen die Schönheit und Exklusivität dieses Reiseziels näher bringen.
</p>
<p>
	Kommen Sie mit und begleiten Sie uns auf eine Reise voller magischer Momente in den schönsten Hotels der Welt!
</p>
</div>

<div class="boxes-block">
<div class="row">

<div class="col-md-6 d-flex">
<figure class="info-box">
<div class="image"><a href="https://www.my-maldives.com/teaser-page"><img class="lozad" src="#" data-src="{{asset('images/content-images/alle-hotels-der-malediven.jpg')}}" alt="Symbolbild: Alle Hotels der Malediven"></a></div>
<figcaption>
<div class="box-body">
<h2><a href="https://www.my-maldives.com/teaser-page">Hotels auf den Malediven</a></h2>
<p>Vom Luxushotel bis zu den noch ursprünglichen Hotels, die Malediven bieten Hotels für jeden Geschmack auf über 154 Resortinseln.</p>
</div>
<div class="box-footer"><a href="https://www.my-maldives.com/teaser-page" class="btn btn-sm btn-primary btn-arrow-right">mehr Infos</a></div>
</figcaption>
</figure>
</div>


<div class="col-md-6 d-flex">
<figure class="info-box">
<div class="image"><a href="https://www.my-maldives.com/informationen/hotel-transfers"><img class="lozad" src="#" data-src="{{asset('images/content-images/hotel-transfers.jpg')}}" alt="Bild: Hoteltransfers"></a></div>
<figcaption>
<div class="box-body">
<h2><a href="https://www.my-maldives.com/informationen/hotel-transfers">Hoteltransfers</a></h2>
<p>Welcher Transfer ist der richtige für mein Aufenthalt auf den Malediven und welche Transfers werden angeboten?</p>
</div>
<div class="box-footer"><a href="https://www.my-maldives.com/informationen/hotel-transfers" class="btn btn-sm btn-primary btn-arrow-right">mehr Infos</a></div>
</figcaption>
</figure>
</div>

</div>
</div>
</section>


<section class="offers-section">
<div class="offers-block">
<h2>Die neuesten Angebote</h2>

<ul class="offers-list">

<li>
<a href="#">
<figure class="offer-card">
<div class="image">
<img class="lozad" src="#" data-src="{{asset('images/front/img-05.jpg')}}" alt="image description">
<span class="price"><span>ab</span> <strong>349 Euro</strong></span>
</div><!-- end image -->
<figcaption>
<h3>Olhuveli Beach Resort</h3>
<ul class="rating-widget">
<li>1</li>
<li>2</li>
<li>3</li>
<li>4</li>
<li>5</li>
</ul>
</figcaption>
</figure>
</a>
</li>


<li>
<a href="https://www.my-maldives.com/hotel-page/kanuhura-maldives">
<figure class="offer-card">
<div class="image">
<img class="lozad" src="#" data-src="{{asset('images/front/img-06.jpg')}}" alt="image description">
<span class="price"><span>ab</span> <strong>649 Euro</strong></span>
</div>
<figcaption>
<h3>Kanuhura</h3>
<ul class="rating-widget">
<li>1</li>
<li>2</li>
<li>3</li>
<li>4</li>
<li>5</li>
</ul>
</figcaption>
</figure>
</a>
</li>


<li>
<a href="https://www.my-maldives.com/hotel-page/kurumba-resort-maldines">
<figure class="offer-card">
<div class="image"><img src="{{asset('images/front/img-07.jpg')}}" alt="image description">
<span class="price"><span>ab</span> <strong>549 Euro</strong></span>
</div><!-- end image -->
<figcaption>
<h3>Kurumba Maldives</h3>
<ul class="rating-widget">
<li>1</li>
<li>2</li>
<li>3</li>
<li>4</li>
<li>5</li>
</ul>
</figcaption>
</figure>
</a>
</li>

<li>
<a href="#">
<figure class="offer-card">
<div class="image"><img src="{{asset('images/front/img-08.jpg')}}" alt="image description">
<span class="price"><span>ab</span> <strong>549 Euro</strong></span>
</div><
<figcaption>
<h3>Reethi Beach Resort</h3>
<ul class="rating-widget">
<li>1</li>
<li>2</li>
<li>3</li>
<li>4</li>
<li>5</li>
</ul>
</figcaption>
</figure>
</a>
</li>


<li>
<a href="#">
<figure class="offer-card">
<div class="image"><img class="lozad" src="#" data-src="{{asset('images/front/img-05.jpg')}}" alt="image description">
<span class="price"><span>ab</span> <strong>349 Euro</strong></span>
</div>
<figcaption>
<h3>Olhuveli Beach Resort</h3>
<ul class="rating-widget">
<li>1</li>
<li>2</li>
<li>3</li>
<li>4</li>
<li>5</li>
</ul>
</figcaption>
</figure>
</a>
</li>


<li>
<a href="#">
<figure class="offer-card">
<div class="image"><img src="{{asset('images/front/img-06.jpg')}}" alt="image description">
<span class="price"><span>ab</span> <strong>649 Euro</strong></span>
</div>
<figcaption>
<h3>Kanuhura</h3>
<ul class="rating-widget">
<li>1</li>
<li>2</li>
<li>3</li>
<li>4</li>
<li>5</li>
</ul>
</figcaption>
</figure>
</a>
</li>

<li>
<a href="#">
<figure class="offer-card">
<div class="image"><img class="lozad" src="#" data-src="{{asset('images/front/img-07.jpg')}}" alt="image description">
<span class="price"><span>ab</span> <strong>549 Euro</strong></span>
</div>
<figcaption>
<h3>Kurumba Maldives</h3>
<ul class="rating-widget">
<li>1</li>
<li>2</li>
<li>3</li>
<li>4</li>
<li>5</li>
</ul>
</figcaption>
</figure>
</a>
</li>


<li>
<a href="#">
<figure class="offer-card">
<div class="image"><img class="lozad" src="#" data-src="{{asset('images/front/img-08.jpg')}}" alt="image description">
<span class="price"><span>ab</span> <strong>549 Euro</strong></span>
</div>
<figcaption>
<h3>Reethi Beach Resort</h3>
<ul class="rating-widget">
<li>1</li>
<li>2</li>
<li>3</li>
<li>4</li>
<li>5</li>
</ul>
</figcaption>
</figure>
</a>
</li>


</ul>
</div>
<div class="atolls-box">


<div class="atolls-links-box">
<h2>Die Atolle</h2>
<p>Die Malediven bestehen aus 26 geographischen Atollen, eingeteilt in 19 Verwaltungsatolle.</p>
<ul class="atolls-links">
<li><a href="http://www.my-maldives.com/atolle/haa-alifu" data-tab="#atoll-image-tab-01">Haa Alifu</a></li>
<li><a href="http://www.my-maldives.com/atolle/haa-dhaalu" data-tab="#atoll-image-tab-02">Haa Dhaalu</a></li>
<li><a href="http://www.my-maldives.com/atolle/shaviyani" data-tab="#atoll-image-tab-03">Shaviyani</a></li>
<li><a href="http://www.my-maldives.com/atolle/noonu" data-tab="#atoll-image-tab-04">Noonu</a></li>
<li><a href="http://www.my-maldives.com/atolle/raa" data-tab="#atoll-image-tab-05">Raa</a></li>
<li><a href="http://www.my-maldives.com/atolle/baa" data-tab="#atoll-image-tab-06">Baa</a></li>
<li><a href="http://www.my-maldives.com/atolle/lhaviyani" data-tab="#atoll-image-tab-07">Lhaviyani</a></li>
<li><a href="http://www.my-maldives.com/atolle/male" data-tab="#atoll-image-tab-08">Malé (<small>Hauptstadt Insel</small>)</a></li>
<li><a href="http://www.my-maldives.com/atolle/kaafu" data-tab="#atoll-image-tab-09">Kaafu</a></li>
<li><a href="http://www.my-maldives.com/atolle/alifu-alifu" data-tab="#atoll-image-tab-10">Alifu Alifu</a></li>
<li><a href="http://www.my-maldives.com/atolle/alifu-dhaalu" data-tab="#atoll-image-tab-11">Alifu Dhaalu</a></li>
<li><a href="http://www.my-maldives.com/atolle/vaavu" data-tab="#atoll-image-tab-12">Vaavu</a></li>
<li><a href="http://www.my-maldives.com/atolle/meemu" data-tab="#atoll-image-tab-13">Meemu</a></li>
<li><a href="http://www.my-maldives.com/atolle/faafu" data-tab="#atoll-image-tab-14">Faafu</a></li>
<li><a href="http://www.my-maldives.com/atolle/dhaalu" data-tab="#atoll-image-tab-15">Dhaalu</a></li>
<li><a href="http://www.my-maldives.com/atolle/thaa" data-tab="#atoll-image-tab-16">Thaa</a></li>
<li><a href="http://www.my-maldives.com/atolle/laamu" data-tab="#atoll-image-tab-17">Laamu</a></li>
<li><a href="http://www.my-maldives.com/atolle/gaafu-alifu" data-tab="#atoll-image-tab-18">Gaafu Alifu</a></li>
<li><a href="http://www.my-maldives.com/atolle/gaafu-dhaalu" data-tab="#atoll-image-tab-19">Gaafu Dhaalu</a></li>
<li><a href="http://www.my-maldives.com/atolle/gnaviyani" data-tab="#atoll-image-tab-20">Gnaviyani</a></li>
<li><a href="http://www.my-maldives.com/atolle/seenu" data-tab="#atoll-image-tab-21">Seenu</a></li>
</ul>
</div>


<div class="atolls-image-box">
<div class="atolls-map-image"><img class="lozad" src="#" data-src="{{asset('images/content-images/atolls-map.png')}}" alt="Schematic map of Maldives"></div>
<div class="atolls-image-tab" id="atoll-image-tab-01"><img class="lozad" src="#" data-src="{{asset('images/content-images/haa-alifu.png')}}" alt="Haa Alifu Atoll"></div>
<div class="atolls-image-tab" id="atoll-image-tab-02"><img class="lozad" src="#" data-src="{{asset('images/content-images/haa-dhaalu.png')}}" alt="Haa Dhaalu Atoll"></div>
<div class="atolls-image-tab" id="atoll-image-tab-03"><img class="lozad" src="#" data-src="{{asset('images/content-images/shaviyani.png')}}" alt="Shaviyani Atoll"></div>
<div class="atolls-image-tab" id="atoll-image-tab-04"><img class="lozad" src="#" data-src="{{asset('images/content-images/noonu.png')}}" alt="Noonu Atoll"></div>
<div class="atolls-image-tab" id="atoll-image-tab-05"><img class="lozad" src="#" data-src="{{asset('images/content-images/raa.png')}}" alt="Raa Atoll"></div>
<div class="atolls-image-tab" id="atoll-image-tab-06"><img class="lozad" src="#" data-src="{{asset('images/content-images/baa.png')}}" alt="Baa Atoll"></div>
<div class="atolls-image-tab" id="atoll-image-tab-07"><img class="lozad" src="#" data-src="{{asset('images/content-images/lhaviyani.png')}}" alt="Lhaviyani Atoll"></div>
<div class="atolls-image-tab" id="atoll-image-tab-08"><img class="lozad" src="#" data-src="{{asset('images/content-images/male.png')}}" alt="Malé"></div>
<div class="atolls-image-tab" id="atoll-image-tab-09"><img class="lozad" src="#" data-src="{{asset('images/content-images/kaafu.png')}}" alt="Kaafu Atoll"></div>
<div class="atolls-image-tab" id="atoll-image-tab-10"><img class="lozad" src="#" data-src="{{asset('images/content-images/alifu-alifu.png')}}" alt="Alifu Alifu Atoll"></div>
<div class="atolls-image-tab" id="atoll-image-tab-11"><img class="lozad" src="#" data-src="{{asset('images/content-images/alifu-dhaalu.png')}}" alt="Alifu Dhaalu Atoll"></div>
<div class="atolls-image-tab" id="atoll-image-tab-12"><img class="lozad" src="#" data-src="{{asset('images/content-images/vaavu.png')}}" alt="Vaavu Atoll"></div>
<div class="atolls-image-tab" id="atoll-image-tab-13"><img class="lozad" src="#" data-src="{{asset('images/content-images/meemu.png')}}" alt="Meemu Atoll"></div>
<div class="atolls-image-tab" id="atoll-image-tab-14"><img class="lozad" src="#" data-src="{{asset('images/content-images/faavu.png')}}" alt="Faafu Atoll"></div>
<div class="atolls-image-tab" id="atoll-image-tab-15"><img class="lozad" src="#" data-src="{{asset('images/content-images/dhaalu.png')}}" alt="Dhaalu Atoll"></div>
<div class="atolls-image-tab" id="atoll-image-tab-16"><img class="lozad" src="#" data-src="{{asset('images/content-images/thaa.png')}}" alt="Thaa Atoll"></div>
<div class="atolls-image-tab" id="atoll-image-tab-17"><img class="lozad" src="#" data-src="{{asset('images/content-images/laamu.png')}}" alt="Laamu Atoll"></div>
<div class="atolls-image-tab" id="atoll-image-tab-18"><img class="lozad" src="#" data-src="{{asset('images/content-images/gaafu-alifu.png')}}" alt="Gaafu Alifu Atoll"></div>
<div class="atolls-image-tab" id="atoll-image-tab-19"><img class="lozad" src="#" data-src="{{asset('images/content-images/gaafu-dhaalu.png')}}" alt="Gaafu Dhaalu Atoll"></div>
<div class="atolls-image-tab" id="atoll-image-tab-20"><img class="lozad" src="#" data-src="{{asset('images/content-images/gnaviyani.png')}}" alt="Gnaviyani Atoll"></div>
<div class="atolls-image-tab" id="atoll-image-tab-21"><img class="lozad" src="#" data-src="{{asset('images/content-images/seenu.png')}}" alt="Seenu Atoll"></div>
</div>


</div>
</section>


<section class="special-offers-section">
<h2>Ausgesuchte Hotels für spezielle Interessen</h2>
<ul class="special-offers-list">


<li>
<figure class="special-offer-card">
<div class="image"><img class="lozad" src="#" data-src="{{asset('images/content-images/interest-index-honeymoon.jpg')}}" alt="Bild: Paar in den Flitterwochen"></div>
<figcaption>
<div class="special-offer-card-body"><h2>Hochzeiten &amp; Honeymoon</h2></div>
<div class="special-offer-card-footer">
<form action="{{url('/teaser-page')}}" method="post">
@csrf
<input type="hidden" name="special_interest_value" value="honeymoon">
<button type="submit" class="btn btn-primary btn-arrow-right-inline">Hotel finden</button>
</form>
</div>
</figcaption>
</figure>
</li>



<li>
<figure class="special-offer-card">
<div class="image"><img class="lozad" src="#" data-src="{{asset('images/content-images/interest-index-familie.jpg')}}" alt="Bild: Familie"></div>
<figcaption>
<div class="special-offer-card-body"><h2>Familienurlaub</h2></div>
<div class="special-offer-card-footer">
<form action="{{url('/teaser-page')}}" method="post">
@csrf
<input type="hidden" name="special_interest_value" value="family">
<button type="submit" class="btn btn-primary btn-arrow-right-inline">Hotel finden</button>
</form>
</div>
</figcaption>
</figure>
</li>

<li>
<figure class="special-offer-card">
<div class="image"><img class="lozad" src="#" data-src="{{asset('images/content-images/interest-index-taucher.jpg')}}" alt="Bild: Taucher"></div>
<figcaption>
<div class="special-offer-card-body"><h2>Taucher</h2></div>
<div class="special-offer-card-footer">
<form action="{{url('/teaser-page')}}" method="post">
@csrf
<input type="hidden" name="special_interest_value" value="diver">
<button type="submit" class="btn btn-primary btn-arrow-right-inline">Hotel finden</button>
</form>
</div>
</figcaption>
</figure>
</li>

</ul>
</section>


<section class="info-section">
<div class="newsletter-box">
<div class="coupon-block">
<b>20</b>
<div class="block">
<em>€</em>
<strong>Gutschein</strong>
<small>für Deine</small>
</div>
</div>
<h3>NEWSLETTERANMELDUNG</h3>
<a href="https://www.my-maldives.com/registration" class="btn btn-primary btn-arrow-right-inline">Zur Newsletteranmeldung</a>
</div>


<ul class="info-list">
<li>
<h3>Sicher Bezahlen</h3>
<div class="ico"><img class="lozad" src="#" data-src="{{asset('images/template/ico-card-blue.png')}}" alt="image description"></div>
<p>Sicher, einfach und schnell bezahlen. <br>Mit Kreditkarte (Visa oder Mastercard) oder bequem auf Rechnung.</p>
</li>

<li>
<h3>SSL Verschlüsselung</h3>
<div class="ico"><img class="lozad" src="#" data-src="{{asset('images/template/ico-encryption-blue.png')}}" alt="image description"></div>
<p>Ihre Daten sind bei uns sicher. <br>Daten die von Ihren Browser zu unserem Server übertragen werden sind mit einer 256 bit SSL-Verschlüsselung geschützt.</p>
</li>

<li>
<h3>Kundenservice</h3>
<div class="ico"><img class="lozad" src="#" data-src="{{asset('images/template/ico-people-blue.png')}}" alt="image description"></div>
<p>Ihre Daten werden mit mit einer SSL Verschlüsselung übertragen. So sind Ihre Daten sicher.</p>
</li>
</ul>


</section>


<ul class="info-cards">

<li>
<div class="info-card">
<a href="https://www.my-maldives.com/informationen/fakten">
<div class="image"><img class="lozad" src="#" data-src="{{asset('images/template/die-wichtigsten-fakten.jpg')}}" alt="Symbolbild: Die wichtigsten Fakten"></div>
<h3>Die wichtigsten Fakten</h3>
</a>
</div>
</li>


<li>
<div class="info-card">
<a href="https://www.my-maldives.com/informationen/flora-and-fauna">
<div class="image"><img class="lozad" src="#" data-src="{{asset('images/template/flora-und-fauna.jpg')}}" alt="Symbolbild: Flora und Fauna"></div>
<h3>Flora &amp; Fauna</h3>
</a>
</div>
</li>


<li>
<div class="info-card">
<a href="https://www.my-maldives.com/informationen/news">
<div class="image"><img class="lozad" src="#" data-src="{{asset('images/template/news.jpg')}}" alt="Symbolbild: News"></div>
<h3>News aus den Malediven</h3>
</a>
</div>
</li>

</ul>
</div>
</main>


<div class="pre-footer">
<div class="container">
<div class="row">
<div class="col-md-12 col-lg-6">
<h4>Lassen Sie uns in Verbindung bleiben</h4>

<ul class="social">
<li><a href="#" class="facebook"><img src="{{asset('images/front/ico-facebook-white-01.svg')}}" alt="image description"></a></li>
<li><a href="#" class="twitter"><img src="{{asset('images/front/ico-twitter-white-01.svg')}}" alt="image description"></a></li>
</ul>

</div>

<div class="col-md-4 col-lg-2">
<h4>So buchen Sie bei uns</h4>
<ul class="pre-footer-links">
<li><a href="#">Buchungen</a></li>
<li><a href="#">Zahlungen</a></li>
<li><a href="#">Stornierungen</a></li>
</ul>
</div>

<div class="col-md-4 col-lg-2">
<h4>Kundenservice</h4>
<ul class="pre-footer-links">
<li><a href="#">Bonuspunkte</a></li>
<li><a href="#">Hotelbewertungen</a></li>
<li><a href="#">Newsletter</a></li>
</ul>
</div>

<div class="col-md-4 col-lg-2">
<h4>Kundenservice</h4>

<ul class="pre-footer-links">
<li><a href="#">Bonuspunkte</a></li>
<li><a href="#">Hotelbewertungen</a></li>
<li><a href="#">Newsletter</a></li>
</ul>

</div></div></div></div>




<script>

	function matchStart(params, data) {
    params.term = params.term || '';
    if (data.text.toUpperCase().indexOf(params.term.toUpperCase()) == 0) {
        return data;
    }
    return false;
}
$("#hotel_id").select2().val(null)
$('.js-example-basic-single').select2({
	placeholder: "Suche Hotel",
	matcher: function(params, data) {
        return matchStart(params, data);
    },
});

</script>
<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
<script>
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#eaf7f7",
      "text": "#5c7291"
    },
    "button": {
      "background": "#56cbdb",
      "text": "#ffffff"
    }
  },
  "theme": "edgeless"
});
</script>
@endsection
