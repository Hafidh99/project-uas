@extends('layouts.user.app')

@section('content')
  @component('components.user.navbar')
  @endcomponent
  <!-- header -->
  <header class="text-start">
    <h3>INFORMASI ONLINE</h3>
    <h1>Clinic <br> Pekanbaru</h1>
    <p class="overflow-visible" >Melalui peta yang interaktif menyajikan lokasi persebaran berbagai klinik
      <br>informasi dapat diakses dimana saja dan kapan saja melalui berbagai platform yang kamu punya.</p>
    <a href="#mapp" class="btn rounded-pill px-4 mt-4 ">Lihat Peta</a>

  </header>

  <!--Food categories section  -->
  <section class="section-categories " id="categories">
    <div class="container">
      <div class="row">
        <div class="col text-center section-categories-heading">
          <h3>Substantial</h3>
          <h2>Pandemi Covid-19</h2><br>
          <!-- <p>Classify foods to create delicious and mouth-watering mixes of flavors <br>with easy recipes to implement at home </p> -->
        </div>
      </div>
    </div>

    <section class="section-categories-content" Id="categoriesContent">
    <div class="container">
      <div class="section-categories-menu row justify-content-center">
        <div class="col-sm-6 col-md-4 col-lg-3 mx-4 ">
          <div class="card-menu  text-center d-flex flex-column">
            <div class="zoom-container">
              <img src="{{ asset('images/pills.png') }}" alt="">
              <div class="menu-name">sakit kepala</div>
              <div class="menu-desc">Sensasi nyeri atau tekanan di area kepala yang dapat mereda seiring waktu atau dengan perawatan yang tepat.</div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3 mx-4 ">
          <div class="card-menu  text-center d-flex flex-column">
            <div class="zoom-container">
              <img src="{{ asset('images/termo.png') }}" alt=""><br><br>
              <div class="menu-name">Demam</div>
              <div class="menu-desc">Respons alami tubuh terhadap infeksi dan dapat disertai dengan menggigil, kedinginan, dan rasa tidak nyaman umum lainnya.</div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3 mx-4 ">
          <div class="card-menu  text-center d-flex flex-column">
            <div class="zoom-container">
              <img src="{{ asset('images/mask.png') }}" alt=""><br><br>
              <div class="menu-name">Batuk</div>
              <div class="menu-desc">respons tubuh dalam membersihkan pernapasan dari lendir dan benda asing, bersifat kering atau produktif dengan lendir. </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    </section>
  </section>

  <!-- map -->
  <div class="container container-map">
    <div id="mapp">
      <h2>Clinic Location</h2>
      <hr>
      <div id="map"></div>
    </div>
    
  </div>
  

  <!--Popular Recipes  -->
  <section class="section-popular">
    <div class="container">
      <div class="col text-start section-popular-heading">
        <h2>Popular Disease</h2>
      </div>

      <div class="row">
        <div class="col-md-4 ">
          <div class="popular-recipes text-start d-flex flex-column ">
          <img src="{{ Storage::url($recipe->picture) }}" alt="">
          </div>
        </div>

        <div class="col-md-7 text-start">
            {!! $recipe->description !!}
        </div>

        <div class="col-md-1 text-start">
          <span class="icon-hover">
            <a href="{{ route('detail',$recipe->id) }}">
              <i class="bi bi-arrow-right-circle display-6"></i>
            </a>
          </span>
        </div>
      </div>
    </div>
  </section>


  <!-- footer -->
  <footer class="section-footer list-unstyled bg-dark mt-5 mb-4 p-5">
    <div class="container-fluid p-5">
      <div class="row justify-content-center">
        <div class="section-footer-logo col-9 mr-5">
          <img src="{{ asset('images/footer-logo.png') }}" alt="">
          <p>Explore a world of culinary delights with our online recipe hub. Stay connected with us through our social media channels to receive the latest updates, tips, and tricks from our passionate community of food enthusiasts. Let your culinary journey continue with our curated collection of cooking resources and helpful guides</p>
        </div>
        <div class="col-1">

        </div>
        <div class="section-footer-link col-1">
          <h5>More</h5>
            <ul class="list-unstyled ">
              <li><a href="{{ route('about') }}">About Us</a></li>
              <li><a href="{{ route('cookingrecipes') }}">Information</a></li>
              <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </div>
        <div class="section-footer-link col-1">
          <h5>Follow Us</h5>
            <ul class="list-unstyled" >
              <li><a href="https://www.instagram.com/ameliaagustinaa_/">Instagram</a></li>
              <li><a href="https://www.tiktok.com/@mellagstn_">Tiktok</a></li>
              <li><a href="#">Twitter</a></li>
            </ul>
        </div>
      </div>
    </div>

    <div class="copyright container-fluid">
      <div class="row border-top justify-content-center align-items-center pt-5">
        <div class="col-auto text-white">
          <p>2024 Copyright . All rights reserved</p>
        </div>
      </div>
    </div>
  </footer>
@endsection

@push('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>
    <script>
      var map = L.map('map').setView([0.517454, 101.422873], 11);

      
      //Map Option
      var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
          maxZoom: 19,
          attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
      });
      osm.addTo(map);

      googleSat = L.tileLayer('http://{s}.google.com/vt?lyrs=s&x={x}&y={y}&z={z}',{
          maxZoom: 20,
          subdomains:['mt0','mt1','mt2','mt3']
      });
      googleSat.addTo(map);


      // Klinik Umum
      var umum = L.icon({
          iconUrl: "{{asset('images/umum.png')}}" ,
        
          iconSize:     [20, 20], // size of the icon
          shadowSize:   [50, 64], // size of the shadow
          // iconAnchor:   [22, 30], // point of the icon which will correspond to marker's location
          // shadowAnchor: [4, 62],  // the same for the shadow
          popupAnchor:  [-10, -10] // point from which the popup should open relative to the iconAnchor
      });

        // 1
        var keluargaku = L.marker([0.485532, 101.406661],{icon:umum});
        keluargaku.addTo(map);
        var popup = keluargaku.bindPopup('<h6><b>Klinik Pratama Keluargaku</b></h6> <p>Buka: Senin-Minggu (24 JAM)</p><img src="{{ asset("images/Keluargaku.jpg") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        // 2
        var sariMedika = L.marker([0.463879, 101.400224],{icon:umum});
        sariMedika.addTo(map);
        var popup = sariMedika.bindPopup('<h6><b>Klinik Pratama Sari Medika 1</b></h6> <p>Buka: Senin-Minggu (24 JAM)</p><img src="{{ asset("images/SariMedika.jpg") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        // 3
        var dewiSehat = L.marker([0.517454, 101.422873],{icon:umum});
        dewiSehat.addTo(map);
        var popup = dewiSehat.bindPopup('<h6><b>Klinik Pratama Dewi Sehat</b></h6>  Buka: Senin-Sabtu (08:00-21:00)<br>Tutup: Minggu</p><img src="{{ asset("images/DewiSehat.jpg") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        // 4
        var bhakti = L.marker([0.519433, 101.407323],{icon:umum});
        bhakti.addTo(map);
        var popup = bhakti.bindPopup('<h6><b>Klinik Pratama Bhakti</b></h6> <p>Buka: - </p><img src="{{ asset("images/PratamaBhakti.jpg") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        // 5
        var sejahtera = L.marker([0.519433, 101.407323],{icon:umum});
        sejahtera.addTo(map);
        var popup = sejahtera.bindPopup('<h6><b>Klinik Sejahtera</b></h6> <p>Buka: - </p><img src="{{ asset("images/Sejahtera.jpg") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        // 6
        var rizkiMedika = L.marker([0.535928, 101.436449],{icon:umum});
        rizkiMedika.addTo(map);
        var popup = rizkiMedika.bindPopup('<h6><b>Klinik Pratama Rizki Medika</b></h6> <p>Buka: Senin-Minggu (24 JAM)</p><img src="{{ asset("images/RizkiMedika.jpg") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        // 7
        var binaKasih = L.marker([0.535068, 101.421384],{icon:umum});
        binaKasih.addTo(map);
        var popup = binaKasih.bindPopup('<h6><b>Klinik Pratama Bina Kasih 2</b></h6><p>Buka: Senin-Minggu (08:00-21:00)</p><img src="{{ asset("images/BinaKasih2.jpg") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        // 8
        var cendana = L.marker([0.538761, 101.431618],{icon:umum});
        cendana.addTo(map);
        var popup = cendana.bindPopup('<h6><b>Klinik Pratama Cendana Husada</b></h6> <p>Buka: Senin-Minggu (24 JAM)</p><img src="{{ asset("images/CendanaHusada.jpg") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        // 9
        var kartika = L.marker([0.522069, 101.442594],{icon:umum});
        kartika.addTo(map);
        var popup = kartika.bindPopup('<h6><b>Klinik Pratama Kartika Utama</b></h6> <p>Buka: Senin-Minggu (24 JAM)</p><img src="{{ asset("images/KartikaUtama.jpg") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        // 10
        var erna = L.marker([0.463642, 101.457599],{icon:umum});
        erna.addTo(map);
        var popup = erna.bindPopup('<h6><b>Klinik Pratama Dokter Erna</b></h6> <Minggu>Buka: Senin-Sabtu (08:00-21:00)<br>Minggu (15:00-21:00)</p><img src="{{ asset("images/Erna.jpg") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        // 11
        var aisyiyah = L.marker([0.514627, 101.437616],{icon:umum});
        aisyiyah.addTo(map);
        var popup = aisyiyah.bindPopup('<h6><b>Klinik Pratama Aisyiyah</b></h6> <p>Buka: Senin-Minggu (24 JAM)</p><img src="{{ asset("images/PratamaAisyiyah.jpg") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        // 12
        var mysha = L.marker([0.516674, 101.440682],{icon:umum});
        mysha.addTo(map);
        var popup = mysha.bindPopup('<h6><b>Klinik Pratama Mysha Medika</b></h6> <Minggu>Buka: Senin-Sabtu (08:00-21:00)<br>Minggu (15:00-21:00)</p><img src="{{ asset("images/MyshaMedika.jpg") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        // 13
        var pausMedika = L.marker([0.517341, 101.415608],{icon:umum});
        pausMedika.addTo(map);
        var popup = pausMedika.bindPopup('<h6><b>Klinik Pratama Paus Medika Sigunggung</b></h6> <p>Buka: Senin-Minggu (24 JAM)</p><img src="{{ asset("images/PausMedika.jpg") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);
        
        // 14
        var mitraSehat = L.marker([0.536572, 101.421467],{icon:umum});
        mitraSehat.addTo(map);
        var popup = mitraSehat.bindPopup('<h6><b>Klinik Pratama Mitra Sehat Medika</b></h6> <p>Buka: Senin-Minggu (24 JAM)</p><img src="{{ asset("images/MitraSehat.jpg") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        // 15
        var ekra = L.marker([0.516717, 101.439220],{icon:umum});
        ekra.addTo(map);
        var popup = ekra.bindPopup('<h6><b>Klinik Pratama Ekra Diandra</b></h6> <p>Buka: - </p><img src="{{ asset("images/EkraDiandra.jpg") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

         // 15
        var salma = L.marker([0.49032772737105274, 101.46387782756845],{icon:umum});
        salma.addTo(map);
        var popup = salma.bindPopup('<h6><b>Klinik Pratama Salma</b></h6> <p>Buka: Senin-Minggu (24 JAM) </p><img src="{{ asset("images/salma.png") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        var harapanMedika = L.marker([0.4997688113352437, 101.45571582745332],{icon:umum});
        harapanMedika.addTo(map);
        var popup = harapanMedika.bindPopup('<h6><b>Klinik Harapan Medika</b></h6> <p>Buka: Senin-Minggu (24 JAM) </p><img src="{{ asset("images/HarapanMedika.png") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);
        
        var bertuahMedika = L.marker([0.49869759767826605, 101.45405817197651],{icon:umum});
        bertuahMedika.addTo(map);
        var popup = bertuahMedika.bindPopup('<h6><b>Klinik Pratama Bertuah Medika</b></h6> <p>Buka: Senin-Minggu (08.00-23.00) </p><img src="{{ asset("images/BertuahMedika.png") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        var binaKasih1 = L.marker([0.4995155696725308, 101.46517268353934],{icon:umum});
        binaKasih1.addTo(map);
        var popup = binaKasih1.bindPopup('<h6><b>Klinik Pratama Bertuah Medika</b></h6> <p>Buka: Senin-Minggu (08.00-21.00) </p><img src="{{ asset("images/BinaKasih.png") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        var annisa = L.marker([0.49847517164393335, 101.44512658061902],{icon:umum});
        annisa.addTo(map);
        var popup = annisa.bindPopup('<h6><b>Klinik Pratama Bp. Annisa Medika 1</b></h6> <p>Buka: Senin-Minggu (08.00-21.00) </p><img src="{{ asset("images/AnnisaMedika.png") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        var arrabih = L.marker([0.49257933345474886, 101.44526333481217],{icon:umum});
        arrabih.addTo(map);
        var popup = arrabih.bindPopup('<h6><b>Klinik Pratama Arrabih 2</b></h6> <p>Buka: Senin-Minggu (08.00-21.30) </p><img src="{{ asset("images/PratamaArrabih.png") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        var amanahRiau = L.marker([0.4792486613434971, 101.44876789011954],{icon:umum});
        amanahRiau.addTo(map);
        var popup = amanahRiau.bindPopup('<h6><b>Klinik Amanah Riau Kepri</b></h6> <p>Buka: Senin-Minggu (08.00-22.00) </p><img src="{{ asset("images/AmanahRiau.png") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        var pratamaUES = L.marker([0.4759376256124455, 101.44768232088163],{icon:umum});
        pratamaUES.addTo(map);
        var popup = pratamaUES.bindPopup('<h6><b>Klinik Pratama UES Medika</b></h6> <p>Buka: Senin-Minggu (08.00-17.00) </p><img src="{{ asset("images/PratamaUES.png") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        // Klinik Kecantikan
        var kecantikan = L.icon({
          iconUrl: "{{asset('images/kecantikan.png')}}" ,
        
          iconSize:     [20, 20], // size of the icon
          shadowSize:   [50, 64], // size of the shadow
          // iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
          // shadowAnchor: [4, 62],  // the same for the shadow
          popupAnchor:  [-10, -80] // point from which the popup should open relative to the iconAnchor
        });

        // 16
        var zidya = L.marker([0.464054, 101.456844],{icon:kecantikan});
        zidya.addTo(map);
        var popup = zidya.bindPopup('<h6><b>Klinik Pratama Zidya</b></h6> <p>Buka: - </p><img src="{{ asset("images/Zidya.jpg") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        // 17
        var mayerd = L.marker([0.463792, 101.400072],{icon:kecantikan});
        mayerd.addTo(map);
        var popup = mayerd.bindPopup('<h6><b>Mayerd Clinic</b></h6> <p>Buka: Senin-Minggu (09:00-18:00)</p><img src="{{ asset("images/Mayerd.jpg") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        // 18
        var memoci = L.marker([0.509673, 101.438674],{icon:kecantikan});
        memoci.addTo(map);
        var popup =  memoci.bindPopup('<h6><b>Memoci Klinik</b></h6> <p>Buka: Senin-Minggu (10:00-19:00)</p><img src="{{ asset("images/Memoci.jpg") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        // 19
        var vinGlow = L.marker([0.516543, 101.437643],{icon:kecantikan});
        vinGlow.addTo(map);
        var popup = vinGlow.bindPopup('<h6><b>Vin Glow Clinic</b></h6> <p>Buka: Senin-Minggu (09:00-21:00)</p><img src="{{ asset("images/VinGlow.jpg") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);
        // 20
        var omoni = L.marker([0.517265, 101.421210],{icon:kecantikan});
        omoni.addTo(map);
        var popup = omoni.bindPopup('<h6><b>Omoni Clinic</b></h6> <p>Buka: Senin-Minggu (09:00-21:00)</p><img src="{{ asset("images/Omoni.jpg") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        // 21
        var djasur = L.marker([0.517212, 101.415323],{icon:kecantikan});
        djasur.addTo(map);
        var popup = djasur.bindPopup("<h6><b>Klinik Pratama Dja'Sur</b></h6>Buka: Senin-Sabtu (10:00-18:00)<br>Tutup: Minggu</p><img src='{{ asset('images/PratamaBhakti.jpg') }}' style='width:200px;height:200px;' >")
        popup.addTo(map);


        // Klinik Anak
        var anak = L.icon({
          iconUrl: "{{asset('images/anak.png')}}" ,
        
          iconSize:     [20, 20], // size of the icon
          shadowSize:   [50, 64], // size of the shadow
          // iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
          // shadowAnchor: [4, 62],  // the same for the shadow
          popupAnchor:  [-10, -80] // point from which the popup should open relative to the iconAnchor
        });

        // 22
        var kiddo = L.marker([0.538921, 101.429296],{icon:anak});
        kiddo.addTo(map);
        var popup = kiddo.bindPopup("<h6><b>Kiddo's Clinic </b></h6> Buka: Senin-Sabtu (09:00-17:00) <br>Tutup: Minggu</p><img src='{{ asset('images/KlinikPsikologi.jpg') }}' style='width:200px;height:200px;' >")
        popup.addTo(map);

        var kiddy = L.marker([0.4882735169861596, 101.45462755515176],{icon:anak});
        kiddy.addTo(map);
        var popup = kiddy.bindPopup("<h6><b>Klinik Anak Kiddy </b></h6> Buka: Senin-Minggu (09.00-21.00)</p><img src='{{ asset('images/Kiddy.png') }}' style='width:200px;height:200px;' >")
        popup.addTo(map);


        // Klinik Gigi
        var gigi = L.icon({
          iconUrl: "{{asset('images/gigi.png')}}" ,
        
          iconSize:     [20, 20], // size of the icon
          shadowSize:   [50, 64], // size of the shadow
          // iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
          // shadowAnchor: [4, 62],  // the same for the shadow
          popupAnchor:  [-10, -80] // point from which the popup should open relative to the iconAnchor
        });
        // 23
        var saudaraMedical = L.marker([0.508643, 101.433475],{icon:gigi});
        saudaraMedical.addTo(map);
        var popup = saudaraMedical.bindPopup('<h6><b>Saudara Medical Clinic</b></h6> <p>Buka: Senin-Minggu (09:00-22:00)</p><img src="{{ asset("images/SaudaraMedical.jpg") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        // 24
        var prettyDental = L.marker([0.518599, 101.433549],{icon:gigi});
        prettyDental.addTo(map);
        var popup = prettyDental.bindPopup('<h6><b>Pretty Dental Clinic</b></h6>  Buka: Senin-Sabtu (08:00-21:00)<br>Tutup: Minggu</p><img src="{{ asset("images/PrettyDental.jpg") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        // 25
        var dwDental = L.marker([0.463562, 101.457842],{icon:gigi});
        dwDental.addTo(map);
        var popup = dwDental.bindPopup('<h6><b>DW Dental House</b></h6> <p>Buka: Senin-Sabtu (08:00-21:00)</p><img src="{{ asset("images/DWDental.jpg") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        //26
        var widiaDental = L.marker([0.46471097747015805, 101.42135552624053],{icon:gigi});
        widiaDental.addTo(map);
        var popup = widiaDental.bindPopup('<h6><b>Widia Dental Care</b></h6> <p>Buka: Senin-Minggu (09:00-21:00)</p><img src="{{ asset("images/WidiaDental.png") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        //27
        var dentalTone = L.marker([0.501001213391666, 101.47548268980525],{icon:gigi});
        dentalTone.addTo(map);
        var popup = dentalTone.bindPopup('<h6><b>Dental Tone</b></h6> <Minggu>Buka: Senin-Sabtu (09:00-21:00)<br>Minggu (13:00-21:00)</p><img src="{{ asset("images/DentalTone.png") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        //28
        var rionaDental = L.marker([0.4994421538541819, 101.46497186177568],{icon:gigi});
        rionaDental.addTo(map);
        var popup = rionaDental.bindPopup('<h6><b>Riona Dental Care</b></h6> <p>Buka: Senin-Sabtu (09:00-21:00)</p><img src="{{ asset("images/RionaDental.png") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);


        //Klinik Spesialis
        var spesialis = L.icon({
          iconUrl: "{{asset('images/spesialis.png')}}" ,
        
          iconSize:     [20, 20], // size of the icon
          shadowSize:   [50, 64], // size of the shadow
          popupAnchor:  [-10, -80] // point from which the popup should open relative to the iconAnchor
        });

        var ginjalSehat = L.marker([0.48994005728093687, 101.45502698179773 ],{icon:spesialis});
        ginjalSehat.addTo(map);
        var popup =ginjalSehat.bindPopup('<h6><b>Klinik utama ginjal sehat</b></h6> <p>Buka: Senin-Minggu (24 JAM)</p><img src="{{ asset("images/GinjalSehat.png") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        var thtPekanbaru = L.marker([0.49968441198104346, 101.45810724136557],{icon:spesialis});
        thtPekanbaru.addTo(map);
        var popup =thtPekanbaru.bindPopup('<h6><b>Praktik dokter THT Pekanbaru </b></h6> <p>Buka: Senin-Jum’at (17.00-19.00)<br>Tutup: Sabtu-Minggu </p><img src="{{ asset("images/Yolazenia.png") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        var elniza = L.marker([0.46433265689101544, 101.40922070701998],{icon:spesialis});
        elniza.addTo(map);
        var popup =elniza.bindPopup('<h6><b>Praktek dr Elniza Morina SpTHT-KL (Apotek ASEAN 123):</b></h6> <p>Buka: Senin-Sabtu (17.00-19.00)</p><img src="{{ asset("images/ElnizaMorina.png") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);

        var meiza = L.marker([0.4989044236829604, 101.45416872945708],{icon:spesialis});
        meiza.addTo(map);
        var popup =meiza.bindPopup('<h6><b>Dr. Meiza Ningsih, Sp. THT-KL (Dokter Spesialis Penyakit Telinga Hidung Tenggorokan) </b></h6> <p>Buka: Senin-Sabtu (17.00-19.00)<br>Tutup: Sabtu-Minggu<p><img src="{{ asset("images/Meiza.png") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);
        
        var merifa = L.marker([0.4637748095382461, 101.41231724267293],{icon:spesialis});
        merifa.addTo(map);
        var popup =merifa.bindPopup('<h6><b>Apotek Merifa (Praktek Dokter Kandungan, Dokter Gigi Pekanbaru, THT dan Anak)</b></h6> <p>Buka: Senin-Sabtu (14.00-22.00)<br>Tutup: Minggu</p><img src="{{ asset("images/Merifa.png") }}" style="width:200px;height:200px;" >')
        popup.addTo(map);


        //geo JSON Data
        var geojsonFeature = {
            "type": "FeatureCollection",
            "features": [
                {
                    "type": "Feature",
                    "properties": { "Keterangan": "Kec.Tampan", "d": 9 },
                    "geometry": {
                        "coordinates": [
                            [
                                [101.39429308176835, 0.49781105702540174],
                                [101.38469241034747, 0.5028227278602202],
                                [101.36317736269159, 0.49930562485501184],
                                [101.35916564939365, 0.4978331925899783],
                                [101.35858386472123, 0.4999349716902918],
                                [101.35890058036028, 0.5006365247559994],
                                [101.35830645823833, 0.501714702620395],
                                [101.35560182449427, 0.5006578794903004],
                                [101.35517497963897, 0.49959122386490207],
                                [101.35511558919038, 0.49897424434920934],
                                [101.35438303159182, 0.4986067607345239],
                                [101.35270128932376, 0.4976912778096061],
                                [101.35175680708346, 0.4967989938772597],
                                [101.34978829871886, 0.49290692600816755],
                                [101.34940780806153, 0.4875941825589649],
                                [101.34926092359194, 0.48254520971109116],
                                [101.34990770484768, 0.4803478931249998],
                                [101.35100933837117, 0.47755718562510197],
                                [101.35272219371552, 0.4746153517871079],
                                [101.3536514421454, 0.4734709481203936],
                                [101.3548937005757, 0.4723558879553167],
                                [101.35638391143533, 0.471700545499246],
                                [101.35710090697268, 0.47169528722426435],
                                [101.36262950427152, 0.43214273483651766],
                                [101.36567148814356, 0.4332507106397827],
                                [101.36579236167466, 0.4335528858300677],
                                [101.36943871320386, 0.4354263717447111],
                                [101.37018409998143, 0.4355875318013034],
                                [101.37027978376744, 0.4342386994909049],
                                [101.37297649135456, 0.4348354946773867],
                                [101.37306490799847, 0.4345481488531817],
                                [101.3755626781417, 0.4347249770539321],
                                [101.3756953031048, 0.4335976972012361],
                                [101.38108871828263, 0.43448183827679543],
                                [101.3828501963713, 0.43434631861067885],
                                [101.38629322409327, 0.4330726338318698],
                                [101.3879052775344, 0.4329532258723532],
                                [101.38882076467405, 0.43297312719893455],
                                [101.38919890066666, 0.43321194311474187],
                                [101.39045272001027, 0.4334109563715174],
                                [101.39097016926377, 0.43468464109334093],
                                [101.39136820714981, 0.43470454241540324],
                                [101.39168663745875, 0.43573941109153225],
                                [101.39167476853265, 0.4364474196346322],
                                [101.39700827583152, 0.43326895624493034],
                                [101.40241436631612, 0.4318217099316257],
                                [101.40277337798051, 0.43268929678676216],
                                [101.40414958936299, 0.4320311274571509],
                                [101.40980402308799, 0.42978736795160444],
                                [101.41240685765962, 0.4281120270901084],
                                [101.41423183362383, 0.42721452290726347],
                                [101.4158473861172, 0.4269452716311122],
                                [101.4171936798611, 0.4267059371566404],
                                [101.4184801383276, 0.42631701861851923],
                                [101.42033503193056, 0.4254793478555996],
                                [101.42174116095185, 0.42428267517890106],
                                [101.42299770177954, 0.42383392287716504],
                                [101.42814353564535, 0.4218594124426147],
                                [101.42853246494855, 0.42284666772323476],
                                [101.42948982938924, 0.4224577489910786],
                                [101.43011809980317, 0.4218893292710959],
                                [101.43065661730094, 0.4212610758482498],
                                [101.43206274632217, 0.4212909926789763],
                                [101.43203282868353, 0.4217397451276099],
                                [101.43209266396093, 0.4222184143776673],
                                [101.431464393547, 0.4236245051279752],
                                [101.43065661730094, 0.4236843387711957],
                                [101.43068653493964, 0.4261674345605826],
                                [101.43038735855146, 0.42718460609940223],
                                [101.43065661730094, 0.42778294223448654],
                                [101.43098571132663, 0.42790260945707814],
                                [101.43032382269445, 0.42856348775083575],
                                [101.42709563492366, 0.4304378667419968],
                                [101.4263666892972, 0.4328329058949265],
                                [101.4215764751865, 0.4392890946139971],
                                [101.41814001723719, 0.44678659709325075],
                                [101.41814001723719, 0.46417660790775983],
                                [101.41897309795263, 0.5008308600285432],
                                [101.39429308176835, 0.49781105702540174]
                            ]
                        ],
                        "type": "Polygon"
                    },
                    "id": 0
                },
                {
                    "type": "Feature",
                    "properties": { "Keterangan": "Kec.Marpoyan Damai", "d": 6 },
                    "geometry": {
                        "coordinates": [
                            [
                                [101.4182840464589, 0.44675019753152867],
                                [101.42177807659002, 0.43906284905221327],
                                [101.4264983705392, 0.4326421257808306],
                                [101.42719283737625, 0.4302352651645833],
                                [101.4305426272193, 0.42825815936630107],
                                [101.4311331380959, 0.4277336325211536],
                                [101.43204828039728, 0.42615105495596595],
                                [101.4376500570296, 0.42373806429597494],
                                [101.44080568044265, 0.42845863042805377],
                                [101.4442568762168, 0.4327649621778846],
                                [101.44475753510486, 0.4333394080178046],
                                [101.44853468031499, 0.4416750723972669],
                                [101.45264618479194, 0.4508007429610785],
                                [101.45191501636782, 0.4603409969571288],
                                [101.45435036789928, 0.46469844067105726],
                                [101.45432881255095, 0.4746802258120937],
                                [101.4544968775586, 0.4859528759539433],
                                [101.454682948278, 0.49432101225024283],
                                [101.45544357497619, 0.49703050422451656],
                                [101.45525158991231, 0.49794381222613215],
                                [101.45468465426194, 0.49898648583505656],
                                [101.45309883430409, 0.500426163958978],
                                [101.45324775169132, 0.5012909734726274],
                                [101.45346288804355, 0.501765589449614],
                                [101.45366924015883, 0.5022156779381145],
                                [101.45383911997592, 0.5033466235815904],
                                [101.4510038132297, 0.5064303835746697],
                                [101.44899124897918, 0.5103809279408651],
                                [101.43230621403455, 0.5048102667370955],
                                [101.41919394974002, 0.5007920806298358],
                                [101.41852179618292, 0.47375567278568553],
                                [101.4182840464589, 0.44675019753152867]
                            ]
                        ],
                        "type": "Polygon"
                    },
                    "id": 1
                },
                {
                    "type": "Feature",
                    "properties": { "Keterangan": "Kec.Rumbai", "d": 3 },
                    "geometry": {
                        "coordinates": [
                            [
                                [101.45716208268732, 0.6623126716032743],
                                [101.44114783963478, 0.6653368173536798],
                                [101.42678468023593, 0.6740714884315846],
                                [101.41849101011341, 0.6844374851043389],
                                [101.41546267591309, 0.6827028060683464],
                                [101.41175073621329, 0.6834161335760984],
                                [101.40753089573496, 0.687995823859106],
                                [101.4019169817539, 0.6889378393171847],
                                [101.39764458648793, 0.6922714585737495],
                                [101.39187804384939, 0.6899496562206553],
                                [101.38687685134937, 0.686338254285126],
                                [101.38272002284064, 0.6811043162154469],
                                [101.38125204759271, 0.6753897572075837],
                                [101.3780475010822, 0.6702905302490239],
                                [101.37866176693919, 0.662427568964369],
                                [101.38076401783867, 0.6617516209241618],
                                [101.38114389035178, 0.6594762738805449],
                                [101.38202522934438, 0.6581238901000214],
                                [101.38115103451184, 0.6573013887642905],
                                [101.38027224060744, 0.6559864590420799],
                                [101.37940586545557, 0.6544369786724706],
                                [101.37847667411239, 0.6544434470582288],
                                [101.37738775317106, 0.6532267147280137],
                                [101.37777870917459, 0.6513419256797782],
                                [101.3775186036479, 0.650764651527669],
                                [101.37780099993157, 0.6504105042765652],
                                [101.3777855464735, 0.6497896574849578],
                                [101.37763340248137, 0.6479510595360738],
                                [101.37660655185559, 0.6457894604152973],
                                [101.37549520449508, 0.644142597135194],
                                [101.37360868292124, 0.6429722952128907],
                                [101.37048487064015, 0.6399666475335407],
                                [101.36748928456214, 0.6386050730310817],
                                [101.36573893020571, 0.6365688798773383],
                                [101.3635071333428, 0.6358944539658817],
                                [101.36271694666567, 0.6349517422500854],
                                [101.35895581094674, 0.6326560688843585],
                                [101.35844835000114, 0.6314824752461927],
                                [101.35680186128216, 0.6306951714220776],
                                [101.35513254368362, 0.6285655390170977],
                                [101.35372161797802, 0.6278902828850993],
                                [101.35256189891538, 0.62646723615317],
                                [101.34960064079742, 0.6244873836538241],
                                [101.34806341116479, 0.6224182663507833],
                                [101.34713022523547, 0.6217037610040017],
                                [101.3474989925422, 0.6211530263421374],
                                [101.34627492503913, 0.6202003146527688],
                                [101.34443744922497, 0.6199277005211621],
                                [101.34223014698154, 0.618466939988791],
                                [101.34219421874263, 0.6180230201999374],
                                [101.34010716718402, 0.6172969510149879],
                                [101.33836150633802, 0.6157525020936514],
                                [101.33643347492367, 0.6150467633622536],
                                [101.33379452501921, 0.6131184499062268],
                                [101.33208270651575, 0.6107131014054471],
                                [101.33161350216653, 0.6106491059079628],
                                [101.33107601763243, 0.6091665868800473],
                                [101.32982029442701, 0.6085521737937665],
                                [101.32814562332656, 0.6057509233007901],
                                [101.32833734577491, 0.6048640094415596],
                                [101.32969910750697, 0.6055993750612664],
                                [101.33140480944157, 0.6048457144667225],
                                [101.3311115173363, 0.6035079104951546],
                                [101.33265973690197, 0.6029289203096505],
                                [101.33234344478419, 0.6005253329924574],
                                [101.3300901564352, 0.5999020148246818],
                                [101.32799443941676, 0.5999288168121344],
                                [101.32632154392012, 0.598356556928433],
                                [101.32808291591459, 0.5965184748101483],
                                [101.3300904995662, 0.5963791013642361],
                                [101.33084584688831, 0.5955839819617739],
                                [101.33084927360737, 0.5935203882965311],
                                [101.32899538000527, 0.5905777714711218],
                                [101.33043331194219, 0.5891111032533878],
                                [101.33537093003957, 0.5867184757515506],
                                [101.33803839033351, 0.5867146593436217],
                                [101.34021962773348, 0.586050124225286],
                                [101.34147068229069, 0.583458471523967],
                                [101.33924569012876, 0.5836098382226453],
                                [101.33764160898951, 0.5813917117643473],
                                [101.3391660126655, 0.5800551877406996],
                                [101.34259092874947, 0.5791352706565565],
                                [101.34260411020485, 0.5775073107606085],
                                [101.3453042939895, 0.5739795530044067],
                                [101.34794755652658, 0.5735512788280248],
                                [101.34916647319062, 0.5732860035639913],
                                [101.34959618548828, 0.570382429947037],
                                [101.35471128081866, 0.566243127476894],
                                [101.35595016532164, 0.5661779238662207],
                                [101.35649054093989, 0.5693136026119998],
                                [101.35932220453837, 0.5689389823431432],
                                [101.3614676646047, 0.5634698480728172],
                                [101.36511945487408, 0.562931223057396],
                                [101.36704157523214, 0.5603825449989539],
                                [101.36947226475354, 0.5590639550323422],
                                [101.3685611477545, 0.5626743131286347],
                                [101.3689855413962, 0.5655656155636772],
                                [101.37007841804923, 0.5657388954721687],
                                [101.37292133394016, 0.563541316738835],
                                [101.37230021031581, 0.5568400231379238],
                                [101.3768754474641, 0.5526752876475475],
                                [101.37795986650275, 0.556188660017771],
                                [101.378655446479, 0.5575907244996021],
                                [101.37945326509653, 0.5580768127746494],
                                [101.3815396542038, 0.5578732871937846],
                                [101.38498437944884, 0.5593391305434201],
                                [101.38623401601599, 0.5587450413696218],
                                [101.38206081833314, 0.5510188677384273],
                                [101.38251430908764, 0.5491232681477811],
                                [101.38546353184154, 0.5473719588039652],
                                [101.39135293926563, 0.5519278634984515],
                                [101.39120569755923, 0.5531867023917034],
                                [101.39177039549641, 0.554409342650835],
                                [101.39239549871391, 0.5567198264075692],
                                [101.39241203776277, 0.5589468591120168],
                                [101.39282626715831, 0.5593384384344884],
                                [101.39370464863953, 0.559497952768607],
                                [101.39455142922168, 0.5592917817507779],
                                [101.3953551821794, 0.5588415279823159],
                                [101.39597313986839, 0.5582170539040308],
                                [101.39621935171223, 0.5576775015839694],
                                [101.39631898921556, 0.5571379492639081],
                                [101.39610907751367, 0.5560405235944839],
                                [101.3949927771906, 0.5549324019935413],
                                [101.3938968702502, 0.5537427106964918],
                                [101.39349967383117, 0.5526480509154326],
                                [101.3936804720891, 0.5519776614407139],
                                [101.39491152943084, 0.550766872505789],
                                [101.39562170701538, 0.5493760897657112],
                                [101.39624011439085, 0.5484849218016515],
                                [101.39723579930174, 0.5483176855858676],
                                [101.39749732252122, 0.5485379058489595],
                                [101.39804653922945, 0.5489693427107337],
                                [101.39833064199233, 0.5497882360088651],
                                [101.39970966187761, 0.5513185538608274],
                                [101.40122123873411, 0.5523594532454651],
                                [101.40203290502201, 0.5523429530776851],
                                [101.40282417793065, 0.5518574269474597],
                                [101.40346862825564, 0.5509679443875779],
                                [101.4044108414409, 0.5503819367501457],
                                [101.40687411263767, 0.550553316825666],
                                [101.40941895735531, 0.5505411649493954],
                                [101.41122625679864, 0.5495051304087659],
                                [101.41270726215994, 0.5487545900339024],
                                [101.41425573521877, 0.5489064866208675],
                                [101.41633443616519, 0.5492827000950595],
                                [101.41884484943006, 0.551713073264466],
                                [101.42006359723638, 0.5521695191830105],
                                [101.42152406689348, 0.552118538099549],
                                [101.42247414443034, 0.5516529961722512],
                                [101.42278314555227, 0.5505104102752654],
                                [101.42237912961883, 0.5484274846856749],
                                [101.42303037028273, 0.5473594980631162],
                                [101.42633376057364, 0.5457950674716017],
                                [101.42972035656271, 0.545261335092377],
                                [101.43167324589837, 0.5446747768642979],
                                [101.43319024369299, 0.5429587937339306],
                                [101.43594418680348, 0.5417622829316926],
                                [101.44002603285406, 0.5410764811206121],
                                [101.43650884415797, 0.547247990345511],
                                [101.43464687619263, 0.5537879304664202],
                                [101.43305918504859, 0.5598720524322118],
                                [101.42881759192505, 0.5715135785419818],
                                [101.42865286231466, 0.5766325905275522],
                                [101.42981752424197, 0.5780294939259392],
                                [101.42966263454667, 0.5808095786344154],
                                [101.4283999943462, 0.5816442989422086],
                                [101.42700552589719, 0.5810877830757875],
                                [101.42504423066833, 0.58178345020211],
                                [101.42377186205312, 0.5838717898442809],
                                [101.4240633704432, 0.602898137696144],
                                [101.43797330152665, 0.6084148194577352],
                                [101.441595387863, 0.6128971176357396],
                                [101.44299454160256, 0.6167114350871685],
                                [101.44468385391275, 0.6175599649178878],
                                [101.44721624672303, 0.6209573765785876],
                                [101.45060067946929, 0.6222327657521163],
                                [101.45716208268732, 0.6623126716032743]
                            ]
                        ],
                        "type": "Polygon"
                    },
                    "id": 2
                },
                {
                    "type": "Feature",
                    "properties": { "Keterangan": "Kec.Rumbai Pesisir", "d": 5 },
                    "geometry": {
                        "coordinates": [
                            [
                                [101.42414523668083, 0.6029017626349145],
                                [101.4238720698686, 0.5838485712921511],
                                [101.4251440377854, 0.5818057564333046],
                                [101.42637070299975, 0.5813596194492021],
                                [101.42713578698539, 0.581136461511889],
                                [101.42850033698795, 0.5816492270077731],
                                [101.42973516476289, 0.5808413547272977],
                                [101.42985516697826, 0.5792079239360248],
                                [101.42989340174829, 0.578061816426299],
                                [101.42877314386172, 0.5767303594340802],
                                [101.42893063426072, 0.5715385338265406],
                                [101.43270703284935, 0.5614686302583607],
                                [101.43648343143792, 0.5472628440066671],
                                [101.44000136115113, 0.541065804701546],
                                [101.44284884752255, 0.5406681806530429],
                                [101.44500572732309, 0.5398977960098392],
                                [101.44769692703358, 0.5394256231831775],
                                [101.45163055413798, 0.5425584465908742],
                                [101.45353563747031, 0.5422117488236466],
                                [101.45656762006314, 0.5422083463669622],
                                [101.45787961803507, 0.5431068455950054],
                                [101.45803856407167, 0.5448583811646301],
                                [101.45748331770653, 0.5467642039004517],
                                [101.45726599837514, 0.547471083867137],
                                [101.45692807134333, 0.5485771332282781],
                                [101.45542019912878, 0.5498073256262117],
                                [101.45423881627322, 0.5507385204748267],
                                [101.45388571439901, 0.550718182535249],
                                [101.45329523140202, 0.5505504249189741],
                                [101.4508087862975, 0.5492237324485529],
                                [101.44904934529072, 0.5496885485678362],
                                [101.4473051596371, 0.5507497332489066],
                                [101.44710864260657, 0.5520112865158353],
                                [101.44784656016529, 0.5541834659130416],
                                [101.44942032530469, 0.5558929910504133],
                                [101.45175319455893, 0.5557381699869666],
                                [101.45368767361515, 0.5567114969795597],
                                [101.45600205800406, 0.5565175531812656],
                                [101.45753383043584, 0.5548119754184242],
                                [101.45917205292045, 0.5535321778766757],
                                [101.46344693860433, 0.5511994260667521],
                                [101.46434203523279, 0.5501174042605044],
                                [101.46628156482109, 0.547208243384631],
                                [101.46812411793019, 0.5459476065659885],
                                [101.4695787651205, 0.5467233831012521],
                                [101.47180922414844, 0.5514750121833742],
                                [101.4715182947088, 0.5547720587069591],
                                [101.47190620062759, 0.5563236093765909],
                                [101.47316689485945, 0.556905440772411],
                                [101.4736332627067, 0.5572313205150579],
                                [101.47649475665162, 0.556971752658157],
                                [101.48039211408255, 0.555060262241895],
                                [101.48168144531843, 0.5550115600868963],
                                [101.48383430759344, 0.5563236093765909],
                                [101.48732546085319, 0.5587479064797236],
                                [101.4888847498948, 0.5589341852057714],
                                [101.49241560562791, 0.5613774274700063],
                                [101.49828380302483, 0.562778782144207],
                                [101.50002937965468, 0.5640813565797629],
                                [101.50167797980532, 0.5674753677357529],
                                [101.5031326269957, 0.569123886722096],
                                [101.5063855249357, 0.5698663201709735],
                                [101.51380518227882, 0.5680332217171511],
                                [101.51765876298668, 0.5677967954232059],
                                [101.51952351934071, 0.5694931398668217],
                                [101.5208028004269, 0.5714023739063663],
                                [101.52139409217966, 0.5765931910284223],
                                [101.52260356987563, 0.577937153284438],
                                [101.52501858403042, 0.5782048553151213],
                                [101.52762477395112, 0.5774719133414266],
                                [101.53342203215945, 0.5733478459707086],
                                [101.53714351441636, 0.5714591174557313],
                                [101.54153815351413, 0.5716350564941308],
                                [101.54298603812546, 0.5733116997126331],
                                [101.54389626801533, 0.5739105210724347],
                                [101.54698872390958, 0.5796719096307186],
                                [101.54935253136699, 0.5812280092615651],
                                [101.55512911707945, 0.5816687531049922],
                                [101.56205607559554, 0.5788941582573841],
                                [101.56948071311075, 0.5777279040357399],
                                [101.57103451540246, 0.5795539423387055],
                                [101.56955191032262, 0.5835065750905102],
                                [101.56611869949379, 0.5845636054112688],
                                [101.56400285751084, 0.587626077406469],
                                [101.5639249321423, 0.5906462390990157],
                                [101.56712209067337, 0.5931194996776128],
                                [101.57895046168596, 0.5970284736808509],
                                [101.58559987572374, 0.595268815223946],
                                [101.58938175099536, 0.5985934672267916],
                                [101.591215194281, 0.6027053982501513],
                                [101.59126539884733, 0.6058420196842462],
                                [101.58953267470503, 0.6081966013412483],
                                [101.58778649374182, 0.6097673310285927],
                                [101.58523219168416, 0.610126531035732],
                                [101.58421000253475, 0.6116647434290812],
                                [101.58285382867044, 0.6120864976802629],
                                [101.58124093061905, 0.6124656225004994],
                                [101.57957978939444, 0.6139308060643129],
                                [101.57789852617815, 0.6146594576220727],
                                [101.57456975785524, 0.6192298499905557],
                                [101.57220443245619, 0.6239817339259778],
                                [101.5744071719775, 0.6328364444684951],
                                [101.57134355476887, 0.6388514351938284],
                                [101.5676852607796, 0.6408239408475538],
                                [101.5640454424352, 0.6405728692596142],
                                [101.5589943151282, 0.6375874641766348],
                                [101.55103213809716, 0.6368120631573255],
                                [101.54659850406793, 0.6415956744790687],
                                [101.5440683324374, 0.6502834786284089],
                                [101.53950431576332, 0.6577759042679432],
                                [101.51878150222291, 0.6566211911051845],
                                [101.49811283934862, 0.6592166211716002],
                                [101.49708797980244, 0.6565892514636176],
                                [101.49545504214541, 0.6550870436536518],
                                [101.49454866567342, 0.6554600038961906],
                                [101.49154282015013, 0.6538354818000491],
                                [101.48924924587388, 0.650988757911918],
                                [101.48446564159742, 0.6550775210850066],
                                [101.48508380953933, 0.6577351996899266],
                                [101.48447605717439, 0.6595742885016769],
                                [101.45747323113888, 0.662383314479861],
                                [101.45399053427653, 0.64208626598416],
                                [101.45071866932784, 0.622263558456897],
                                [101.44737092278311, 0.6210373274447742],
                                [101.44478405452001, 0.617617258020128],
                                [101.44305610894071, 0.6168067459800697],
                                [101.44171817953533, 0.6129652495141473],
                                [101.43809383882527, 0.6084566720723803],
                                [101.42414523668083, 0.6029017626349145]
                            ]
                        ],
                        "type": "Polygon"
                    },
                    "id": 3
                },
                {
                    "type": "Feature",
                    "properties": { "Keterangan": "Kec.Tenayan Raya", "d": 7 },
                    "geometry": {
                        "coordinates": [
                            [
                                [101.46832499610923, 0.5459630974712582],
                                [101.46824017512675, 0.5443426306981093],
                                [101.4689801891735, 0.5432720291240651],
                                [101.46832939344294, 0.5411995592223992],
                                [101.46874620828996, 0.5403538119427231],
                                [101.467861431676, 0.5379062529090973],
                                [101.46808522976755, 0.5367227287180498],
                                [101.46798293593292, 0.5321562191100838],
                                [101.4689468645513, 0.5298277943891605],
                                [101.46833148045083, 0.5286763445313851],
                                [101.46840670104459, 0.5271295132200633],
                                [101.46752609844629, 0.5263727851251526],
                                [101.46749196792302, 0.5215673383805883],
                                [101.46767862925562, 0.5185841526960567],
                                [101.46881671906036, 0.51758856536152],
                                [101.46918098082206, 0.5154699393965223],
                                [101.46990950434534, 0.5136543567159277],
                                [101.47085670663405, 0.5128272247551902],
                                [101.47393951769035, 0.5096038783409862],
                                [101.47530160268408, 0.509057110959278],
                                [101.47738846672414, 0.5078361203327109],
                                [101.47850312624792, 0.5071785257223875],
                                [101.47971275577692, 0.5048436879165843],
                                [101.480475019371, 0.5047624361762466],
                                [101.48123477941945, 0.5038351958395867],
                                [101.48160714880817, 0.5026179974239804],
                                [101.48120473687726, 0.5003110583438591],
                                [101.48039991301542, 0.49824630837415396],
                                [101.4808296443293, 0.4955188308225087],
                                [101.4785025772112, 0.49274046225679335],
                                [101.47767227866831, 0.4897328579682496],
                                [101.47830598299916, 0.48805117407274634],
                                [101.47957339166089, 0.4863447445944604],
                                [101.48032375232597, 0.48420645551688996],
                                [101.48105970651909, 0.48439085887120215],
                                [101.48202177014724, 0.482337993510708],
                                [101.48547543168016, 0.47976174693333695],
                                [101.48626461763612, 0.47792313283065296],
                                [101.48593107170268, 0.476412671352897],
                                [101.48653859173103, 0.4745388649061606],
                                [101.48647901989239, 0.47295802172787615],
                                [101.48903656120018, 0.47005125862400465],
                                [101.48854335146635, 0.46385537937952037],
                                [101.48987631257074, 0.4625994104831161],
                                [101.49069942891707, 0.46032378525393935],
                                [101.49024793336551, 0.45957764488270275],
                                [101.49132597209092, 0.4576843906606889],
                                [101.49461843747598, 0.45406254413062674],
                                [101.49865414444815, 0.45115239511113625],
                                [101.51053488429434, 0.4427222759153939],
                                [101.51578764227257, 0.4420670552323589],
                                [101.51592581792082, 0.44107049435413115],
                                [101.51988782925974, 0.4381620720948003],
                                [101.5250077057656, 0.43591403592374744],
                                [101.52696248144295, 0.4376633794425304],
                                [101.52739667307641, 0.4357958120885085],
                                [101.52910547660775, 0.43405570223768364],
                                [101.5400432938675, 0.4326148029543675],
                                [101.54581893294127, 0.4333406819833947],
                                [101.55235933915225, 0.43240961284868007],
                                [101.55466843874814, 0.4313006677661687],
                                [101.55704126894017, 0.4270052830933488],
                                [101.55911024433914, 0.4266992588065962],
                                [101.56197358323669, 0.4251950071814139],
                                [101.56708263294222, 0.42500403327796255],
                                [101.56794220819077, 0.42850398844398485],
                                [101.5666736910623, 0.4309399271536247],
                                [101.56690317689853, 0.4338965755537289],
                                [101.5697030501808, 0.43597941607179214],
                                [101.56976975656809, 0.4403579022800301],
                                [101.56756226772839, 0.4478380599596229],
                                [101.57123404107793, 0.45322225085439194],
                                [101.57410859379004, 0.4539889088102482],
                                [101.57028128351592, 0.4628638938379628],
                                [101.56943167456737, 0.4686846003883851],
                                [101.57092296723296, 0.4721644834493599],
                                [101.57762971422281, 0.47274017963321624],
                                [101.58603893511514, 0.471613459680591],
                                [101.58817353949823, 0.47425446604794175],
                                [101.5850901162616, 0.4855141030446197],
                                [101.5803042191225, 0.49698654162482736],
                                [101.5819252787758, 0.5010058300084101],
                                [101.58248229224277, 0.5069403282921687],
                                [101.58835167192743, 0.5166693772703954],
                                [101.58975205762314, 0.5293776352447739],
                                [101.59297844748488, 0.5315989120322202],
                                [101.58866073574939, 0.5419008547816162],
                                [101.58702182667349, 0.5431946723608263],
                                [101.58477910898773, 0.5421596183199711],
                                [101.58020741524581, 0.5419008547816162],
                                [101.57761966407094, 0.5431084178643175],
                                [101.57606701336721, 0.5479386677763216],
                                [101.5758944966226, 0.5510438263787449],
                                [101.57761966407094, 0.5533726942693704],
                                [101.57925857314854, 0.5569953758362942],
                                [101.58150129083418, 0.5578579187389181],
                                [101.5819325826958, 0.5590654785903268],
                                [101.57986238175647, 0.570882301086769],
                                [101.58201884106813, 0.5723486204438757],
                                [101.58365775014579, 0.574418717719908],
                                [101.58512414247883, 0.5747637338600811],
                                [101.5858142094574, 0.5780413861479161],
                                [101.58443407549845, 0.585027954434338],
                                [101.58176006595113, 0.5881330931090929],
                                [101.5819325826958, 0.589944423205452],
                                [101.58037993199054, 0.5919282602531695],
                                [101.57882728128686, 0.5970172302992296],
                                [101.56769995123608, 0.5933945741368376],
                                [101.56390458284676, 0.5907207073523466],
                                [101.56381832496129, 0.587788078156052],
                                [101.56606104264523, 0.5846829392898911],
                                [101.56942511917288, 0.5836478926193962],
                                [101.5709777698782, 0.5795939579947031],
                                [101.56942511917288, 0.5777826245637527],
                                [101.56200689913896, 0.5789901802489652],
                                [101.5551924877114, 0.5817503065620429],
                                [101.54958569349986, 0.5813190369143939],
                                [101.54691168395249, 0.57993897382093],
                                [101.54380638254361, 0.5739874478860116],
                                [101.54294379881856, 0.573469923598168],
                                [101.54139114811323, 0.5715723341424734],
                                [101.53707822949002, 0.5714860800606942],
                                [101.53369048153809, 0.5732318581685405],
                                [101.5305039517948, 0.5754623169210475],
                                [101.52763607502419, 0.5774378653717065],
                                [101.52489565944438, 0.5782663209708829],
                                [101.52266508862374, 0.578011411568113],
                                [101.52139047672608, 0.5766731370201938],
                                [101.52094436256266, 0.5716386728143306],
                                [101.51954228947409, 0.5695993949155849],
                                [101.51756664103391, 0.5677512986961517],
                                [101.51393399712481, 0.5680699360181478],
                                [101.50609513395506, 0.5698543046919866],
                                [101.50348217956468, 0.5694082125758797],
                                [101.5017614535023, 0.5677512986961517],
                                [101.5002956498202, 0.564437469514786],
                                [101.49832828447069, 0.5628478785175446],
                                [101.49242066025056, 0.5614524439001798],
                                [101.48883887233859, 0.5589406607505794],
                                [101.48744337055325, 0.5589871752639937],
                                [101.48609438549579, 0.5580568849429426],
                                [101.48409416627175, 0.5564753910591236],
                                [101.48167529651124, 0.5550799549285159],
                                [101.48018676127566, 0.5551264694714177],
                                [101.47627935627958, 0.5569870508912516],
                                [101.47353486943672, 0.5572661380540751],
                                [101.47204633420114, 0.5564288765267804],
                                [101.47148813348662, 0.5548008676622658],
                                [101.47195330074896, 0.5520565088489064],
                                [101.47158116693868, 0.5508471299855984],
                                [101.46962746444063, 0.5466608166461384],
                                [101.46832499610923, 0.5459630974712582]
                            ]
                        ],
                        "type": "Polygon"
                    },
                    "id": 4
                },
                {
                    "type": "Feature",
                    "properties": { "Keterangan": "Kec.Bukit Raya", "d": 5 },
                    "geometry": {
                        "coordinates": [
                            [
                                [101.45554732133274, 0.49712243044524485],
                                [101.45478441187383, 0.49454665350889393],
                                [101.45462721088941, 0.4915670859632597],
                                [101.45431280892056, 0.48424515665682266],
                                [101.45439066487361, 0.4647557998225347],
                                [101.4519564625092, 0.46036345458924366],
                                [101.45270666937456, 0.4508459458716807],
                                [101.44478792762257, 0.43331964026206116],
                                [101.44183002593148, 0.4298357565005575],
                                [101.43898453726302, 0.4259584382367967],
                                [101.43686267339965, 0.4222786604573301],
                                [101.43913333641079, 0.4210632911422348],
                                [101.43945367349903, 0.4201956583471971],
                                [101.43938056501031, 0.4199181780319471],
                                [101.43959398965072, 0.419707536707395],
                                [101.4413416919484, 0.41886471662310365],
                                [101.44407300819725, 0.41731933393215015],
                                [101.44571969888037, 0.41741782036476793],
                                [101.44674811793705, 0.4170104616204968],
                                [101.4474063842463, 0.4168783405941523],
                                [101.44802249567391, 0.4176876536902036],
                                [101.44867062099217, 0.4192591954734154],
                                [101.44718233976903, 0.4316124038976266],
                                [101.45364220444972, 0.44255714178002903],
                                [101.45440271443317, 0.44242380192102293],
                                [101.45437232935383, 0.4423108716486846],
                                [101.45496978798656, 0.44211052308632315],
                                [101.45471279718308, 0.4415292419037987],
                                [101.45496695939264, 0.4413398330406222],
                                [101.45610782730697, 0.4406999148879799],
                                [101.45624342762957, 0.4408607793989266],
                                [101.457522303563, 0.44060724702956056],
                                [101.45805074335954, 0.4405140475609213],
                                [101.45817026074623, 0.44062530324949895],
                                [101.45880117949642, 0.44035371466019446],
                                [101.45908330705339, 0.4409946735909301],
                                [101.45929728087535, 0.44098819121069144],
                                [101.45935790879298, 0.4407644752219006],
                                [101.45933334454267, 0.4405577971618949],
                                [101.46083372011407, 0.44023185359647093],
                                [101.46085977446455, 0.4401114766446178],
                                [101.46185701954057, 0.43963330313973215],
                                [101.46262502947431, 0.4396851372480312],
                                [101.46289343610543, 0.4399632614175186],
                                [101.46322489637487, 0.44001019573346933],
                                [101.46338505431655, 0.4414882112629004],
                                [101.4639002672995, 0.4415168171823764],
                                [101.46391818426908, 0.44165198336902256],
                                [101.46519725824317, 0.44178023538532063],
                                [101.46505548646256, 0.4423347284633786],
                                [101.46535757258161, 0.44287837563031524],
                                [101.46583726442108, 0.44324442238468165],
                                [101.46631695626056, 0.44359270907036125],
                                [101.46647695780707, 0.4440475559937377],
                                [101.4675073837737, 0.44367852701672067],
                                [101.46761425080857, 0.4440454113522907],
                                [101.46924852702888, 0.4457265384715675],
                                [101.47111399428675, 0.44708190853217633],
                                [101.47157637636184, 0.44824191830843374],
                                [101.47257157559552, 0.4495084882521011],
                                [101.47548552380368, 0.4530006694467897],
                                [101.47697862625628, 0.4557469299268855],
                                [101.47826170224413, 0.45544185067409665],
                                [101.48133011196745, 0.4543881067216652],
                                [101.48571039338307, 0.4526549511163172],
                                [101.49016599825521, 0.4498365227728057],
                                [101.49598966440531, 0.44609852634767466],
                                [101.49995600755699, 0.4454559743528869],
                                [101.50529708036973, 0.44595614975267805],
                                [101.50257925341593, 0.4485821733659353],
                                [101.49877345384391, 0.4509053365226795],
                                [101.49478806630208, 0.45390193369132464],
                                [101.49231717280607, 0.4568197804286547],
                                [101.49108172605801, 0.4577848530610715],
                                [101.4900599297516, 0.4594571216781239],
                                [101.49047793556323, 0.4605935175320776],
                                [101.48995310453083, 0.4615503312206015],
                                [101.48996703741003, 0.4624173538685173],
                                [101.48876178504895, 0.46305289506808456],
                                [101.48845447254106, 0.46355374969228713],
                                [101.48883982948267, 0.4703334974335185],
                                [101.48710566949876, 0.47184952303166705],
                                [101.48623858950856, 0.47314628163699424],
                                [101.48656829838754, 0.4741762724777038],
                                [101.4859250069605, 0.47637484722135703],
                                [101.48600006741322, 0.47803467667667204],
                                [101.48558728720363, 0.4794466785992805],
                                [101.48275442303385, 0.48161178058837584],
                                [101.48176560078701, 0.48265812927352364],
                                [101.48154057162033, 0.48358536217371817],
                                [101.48109105748935, 0.48401874574898707],
                                [101.48028073480401, 0.48418094122132327],
                                [101.47978796427914, 0.4855372125446574],
                                [101.47949196631211, 0.48689348386799153],
                                [101.47820316134914, 0.4879188315765286],
                                [101.47794335977511, 0.4888965873196166],
                                [101.47732578991533, 0.48998166964006873],
                                [101.47859606113303, 0.4932290653358576],
                                [101.48056549479384, 0.4953470865756614],
                                [101.48071339037236, 0.49577065419411376],
                                [101.48038523707856, 0.4978786392734311],
                                [101.48053455165996, 0.49872577483249586],
                                [101.4812359914041, 0.5000538685684492],
                                [101.48150367742984, 0.5024171143954128],
                                [101.48170947718486, 0.5028593302700133],
                                [101.48160840868303, 0.5034508205197046],
                                [101.48037947033492, 0.5047828144713611],
                                [101.47953503299719, 0.5051261298324867],
                                [101.47865177948765, 0.506984527679867],
                                [101.4774345596316, 0.5078817593308944],
                                [101.47668460054194, 0.5079185726469878],
                                [101.47485511006606, 0.5092005839080846],
                                [101.47383270747818, 0.5095309267428713],
                                [101.47270338090466, 0.510887349133742],
                                [101.47220244666792, 0.5117693097482926],
                                [101.47123719733969, 0.5121783766954231],
                                [101.47080808358511, 0.5128134226170542],
                                [101.46958366463676, 0.5136807205601945],
                                [101.46878268821725, 0.5135478149217327],
                                [101.46796275408224, 0.5120126850206603],
                                [101.46666677107797, 0.5108803496150593],
                                [101.46449592522214, 0.5100620774589197],
                                [101.46114295040036, 0.5080593564941918],
                                [101.45996881464458, 0.5079973736325796],
                                [101.45945382347907, 0.5076424491285252],
                                [101.45874886358706, 0.5076928015416655],
                                [101.45773757043668, 0.5067031471308212],
                                [101.45713752668706, 0.5064088177549877],
                                [101.45683540101862, 0.5060311754158846],
                                [101.45660880676638, 0.5057794138449907],
                                [101.45648292107023, 0.5054269476282798],
                                [101.456281503958, 0.5052507145132239],
                                [101.45623114967992, 0.5049486005896711],
                                [101.45585349259346, 0.5044199011903032],
                                [101.45542548122887, 0.5042688442114809],
                                [101.4550226470044, 0.5034380307631636],
                                [101.45464498991782, 0.5016253465100817],
                                [101.45371747072215, 0.5019687400453137],
                                [101.45334510456964, 0.5011135115041903],
                                [101.45329903069174, 0.5004214228627504],
                                [101.45453924306031, 0.4993363352776896],
                                [101.45554732133274, 0.49712243044524485]
                            ]
                        ],
                        "type": "Polygon"
                    },
                    "id": 5
                },
                {
                    "type": "Feature",
                    "properties": { "Keterangan": "Kec.Sukajadi", "d": 5 },
                    "geometry": {
                        "coordinates": [
                            [
                                [101.43288700217369, 0.5051359316696562],
                                [101.44898560111557, 0.5104126362413695],
                                [101.44737841985778, 0.5141357906725688],
                                [101.44721770173004, 0.51842143337106],
                                [101.44456585265505, 0.5186357154308041],
                                [101.44186043086927, 0.5227874288883783],
                                [101.44237555144116, 0.528404047817645],
                                [101.4388502995175, 0.5283560011987873],
                                [101.43729343552707, 0.5284553866879946],
                                [101.43547506242146, 0.5284456325282605],
                                [101.42786655702287, 0.528205149173985],
                                [101.4279234225505, 0.5274882921857753],
                                [101.42917344797078, 0.5255275551939521],
                                [101.42974413387611, 0.5239415296206549],
                                [101.43047932359616, 0.5225464508319341],
                                [101.43085808866613, 0.5222694402077976],
                                [101.43202180089689, 0.5217661898292589],
                                [101.43236908766377, 0.5211404692840373],
                                [101.43154860091572, 0.5182618015734062],
                                [101.43118506902175, 0.5154465971764832],
                                [101.4303148282023, 0.5131468065368061],
                                [101.43045293873931, 0.5122027175389761],
                                [101.43288700217369, 0.5051359316696562]
                            ]
                        ],
                        "type": "Polygon"
                    },
                    "id": 6
                },
                {
                    "type": "Feature",
                    "properties": { "Keterangan": "Kec.Pekanbaru Kota", "d": 1 },
                    "geometry": {
                        "coordinates": [
                            [
                                [101.44946567413439, 0.509586901610092],
                                [101.45061924849571, 0.5071691985151574],
                                [101.4524187651457, 0.5078196007574292],
                                [101.45214493204419, 0.5087189288589684],
                                [101.45224846575618, 0.5120565308156557],
                                [101.45235393442402, 0.5163950555748187],
                                [101.45250482896151, 0.52520747535889],
                                [101.45354640150815, 0.5251652031830538],
                                [101.45364431680741, 0.5321326597858445],
                                [101.4427418862047, 0.5322112171417857],
                                [101.44201412389731, 0.5228443598207129],
                                [101.44466771351054, 0.5186682572323553],
                                [101.44732130312379, 0.5184569757107145],
                                [101.44744972760483, 0.5140695916007161],
                                [101.4479686493487, 0.5128596044158229],
                                [101.44946567413439, 0.509586901610092]
                            ]
                        ],
                        "type": "Polygon"
                    },
                    "id": 7
                },
                {
                    "type": "Feature",
                    "properties": { "Keterangan": "Kec.Payung Sekaki", "d": 5 },
                    "geometry": {
                        "coordinates": [
                            [
                                [101.41916488637958, 0.5009060900094511],
                                [101.43279362284261, 0.5051083154096574],
                                [101.43158630717511, 0.5088462042304798],
                                [101.43058794999058, 0.5118875904316553],
                                [101.43040220911922, 0.5124680074819281],
                                [101.4302906068553, 0.5133035521439666],
                                [101.43047074704015, 0.5135810542683288],
                                [101.43065575589355, 0.5139364517068543],
                                [101.43089431992291, 0.5146472465269625],
                                [101.4309478751133, 0.5150415915641702],
                                [101.43125460029268, 0.5155381741693787],
                                [101.43139641656143, 0.5178890748970417],
                                [101.43173570878383, 0.5189611944677495],
                                [101.43217000283136, 0.5205761590463709],
                                [101.43236000647511, 0.5212004309576486],
                                [101.43200714256432, 0.5218925584395606],
                                [101.43085354900256, 0.5223675478433734],
                                [101.43067711704725, 0.5225575435946013],
                                [101.4304328266457, 0.5225982569696725],
                                [101.42966976094249, 0.5240652701981361],
                                [101.42913868182268, 0.5256304904010136],
                                [101.42835603890853, 0.5269162067024808],
                                [101.4278529113223, 0.5275590647536887],
                                [101.4276852021269, 0.5353572071090014],
                                [101.4281363765673, 0.5413246786247754],
                                [101.42804304079436, 0.542537989439893],
                                [101.42962974893913, 0.5453846023178386],
                                [101.42631632898997, 0.5458512600386456],
                                [101.42300290904268, 0.5473912302600326],
                                [101.42234955862978, 0.5485112083553787],
                                [101.42276956961013, 0.550517835250659],
                                [101.42248956229116, 0.551684478484006],
                                [101.42155620455918, 0.5521511357135012],
                                [101.4200628321874, 0.5522444671548072],
                                [101.41880279924999, 0.5517311442084889],
                                [101.41768276997203, 0.5506578324504829],
                                [101.4163294012597, 0.5493511917882472],
                                [101.4139960069308, 0.548931200086102],
                                [101.41268930610687, 0.5488378685929547],
                                [101.4111025979621, 0.5496311862402763],
                                [101.4094692219308, 0.5505645009843079],
                                [101.40685582028289, 0.5506111667176157],
                                [101.40434671812562, 0.5504053845337609],
                                [101.4034223154278, 0.5510356300056998],
                                [101.40283405916495, 0.5518759571985186],
                                [101.40199369307584, 0.5524221698098728],
                                [101.4012373635955, 0.5524221698098728],
                                [101.40010286937581, 0.5516658754109898],
                                [101.399178466678, 0.5508675645532293],
                                [101.39833810058894, 0.5498171553656874],
                                [101.3980447021982, 0.5490058509619757],
                                [101.39723451396145, 0.5483725687954006],
                                [101.39623833876675, 0.5485429410499307],
                                [101.39558197071787, 0.5494498041133724],
                                [101.39510320945726, 0.5504750662168192],
                                [101.3941799602, 0.5514846123171111],
                                [101.39365305367386, 0.5520400094345734],
                                [101.39346952027245, 0.5527493252839327],
                                [101.39367079519103, 0.5531734051850619],
                                [101.39396679372973, 0.5539053225714288],
                                [101.39494953851803, 0.5549687571369443],
                                [101.39612171777091, 0.5560892348849173],
                                [101.39629929900941, 0.5571860328438099],
                                [101.39616900293157, 0.5577220435735529],
                                [101.3959203023293, 0.5582817340858965],
                                [101.39532724133232, 0.5589075954520373],
                                [101.3945210521908, 0.5593440185872448],
                                [101.39367986087314, 0.559532630414064],
                                [101.39286235046339, 0.5593897253673816],
                                [101.39238769399083, 0.5590091961560921],
                                [101.39240105698434, 0.5567839277145582],
                                [101.39213024911716, 0.5557663283675223],
                                [101.39178753748479, 0.554325946074866],
                                [101.39123089946213, 0.5531826698688724],
                                [101.39132987295065, 0.551858741311405],
                                [101.38854420691018, 0.5497875744455889],
                                [101.38546994086752, 0.5473752799252639],
                                [101.38508163947286, 0.5475656373699449],
                                [101.38408045672858, 0.5481795163014255],
                                [101.38256689721032, 0.5491246466188502],
                                [101.38237798282883, 0.5496600583541127],
                                [101.382116695328, 0.5510148626096883],
                                [101.38287785923865, 0.5526220138210147],
                                [101.38397594627241, 0.5544917651133687],
                                [101.38499862374077, 0.556393535209644],
                                [101.3862497132761, 0.5587411088786576],
                                [101.38573787992435, 0.5590158443927554],
                                [101.38503626531852, 0.559298164084336],
                                [101.38158803986677, 0.5579057985493403],
                                [101.38049730484101, 0.5579909252599147],
                                [101.3794214296237, 0.5580524983842444],
                                [101.37862526060687, 0.5575478810486845],
                                [101.37794464512844, 0.5561964277203552],
                                [101.37793229222575, 0.5561729787548975],
                                [101.37742015692226, 0.5544672850529362],
                                [101.37739687185773, 0.5543580232630092],
                                [101.37688875867084, 0.5527020710302492],
                                [101.3766684684515, 0.5528524040006548],
                                [101.376537049993, 0.5530109213455401],
                                [101.3750070397976, 0.5543806285435914],
                                [101.3748349071553, 0.5541723462603945],
                                [101.37476457016996, 0.5543639164171378],
                                [101.37447010469518, 0.5542562405872982],
                                [101.37403471027517, 0.5537794648849512],
                                [101.37359931585516, 0.5533026891826042],
                                [101.37343014969744, 0.5523810282335126],
                                [101.37350641260329, 0.552036557810435],
                                [101.37343569483104, 0.5513157266087501],
                                [101.37347269977349, 0.5506316627153147],
                                [101.37338213695601, 0.5500113797584649],
                                [101.37313722744102, 0.5497913089013587],
                                [101.37312578750951, 0.549478729103547],
                                [101.37265642048679, 0.5488854600551859],
                                [101.37208652194192, 0.5489998404809484],
                                [101.37187159111309, 0.5487821347128522],
                                [101.37195200049537, 0.5484105042972189],
                                [101.37159215862675, 0.5482839005578203],
                                [101.37100197063077, 0.5478580403089051],
                                [101.37069235673547, 0.5475400883338725],
                                [101.37085756055197, 0.5472652998208072],
                                [101.37048240990136, 0.5467704315430746],
                                [101.37059541353415, 0.5462554914440823],
                                [101.37110851703991, 0.5452296403435117],
                                [101.37108205495986, 0.5446138406785211],
                                [101.37025215636578, 0.5437275478179384],
                                [101.36906717688754, 0.5433361877674002],
                                [101.3678626795891, 0.5425103046319186],
                                [101.36700763387049, 0.5411606818675714],
                                [101.36711048279075, 0.5407922555840221],
                                [101.36675503242472, 0.5397532602563775],
                                [101.36608729693751, 0.5387111900623935],
                                [101.36504662246082, 0.5367052477955063],
                                [101.36296538182751, 0.5360199660910183],
                                [101.36298891067773, 0.4994820732674441],
                                [101.38470827935625, 0.5030573821815878],
                                [101.39453121173528, 0.49788425318854834],
                                [101.41916488637958, 0.5009060900094511]
                            ]
                        ],
                        "type": "Polygon"
                    },
                    "id": 8
                },
                {
                    "type": "Feature",
                    "properties": { "Keterangan": "Kec.Senapelan", "d": 4 },
                    "geometry": {
                        "coordinates": [
                            [
                                [101.427848543744, 0.5282519508151893],
                                [101.44236207155393, 0.5286159109534054],
                                [101.44268055022178, 0.5323465011448718],
                                [101.44750322717437, 0.532301006156203],
                                [101.44750322717437, 0.5394892102004718],
                                [101.44472791307874, 0.5400351494024704],
                                [101.4429080349833, 0.5407175733358116],
                                [101.43894980012624, 0.5412180175050878],
                                [101.43585600736458, 0.5417639565516481],
                                [101.43317168717363, 0.5429013294081244],
                                [101.43167028774428, 0.5446756306353393],
                                [101.42966842183955, 0.5452215693704119],
                                [101.42821251936425, 0.5424918752044903],
                                [101.42762105898254, 0.5351671897921619],
                                [101.427848543744, 0.5282519508151893]
                            ]
                        ],
                        "type": "Polygon"
                    },
                    "id": 9
                },
                {
                    "type": "Feature",
                    "properties": { "Keterangan": "Kec.Sail", "d": 2 },
                    "geometry": {
                        "coordinates": [
                            [
                                [101.45366032198092, 0.502016507100592],
                                [101.45464926454423, 0.501709144830258],
                                [101.45502345903924, 0.5035132274378213],
                                [101.45539765353232, 0.5042482239127537],
                                [101.45581194029296, 0.5043952231979887],
                                [101.45621286296506, 0.5049965838741315],
                                [101.4562262270536, 0.50530394597628],
                                [101.45646678065737, 0.505410854529984],
                                [101.45654696519262, 0.5058251251604275],
                                [101.4568008828848, 0.5060122151131736],
                                [101.45712162102171, 0.5064532128381529],
                                [101.45772300502995, 0.5067204841727744],
                                [101.45869858353109, 0.5076826608831766],
                                [101.45937747295369, 0.5077020189850856],
                                [101.45986728889142, 0.508013707791207],
                                [101.46117346472295, 0.508087919409931],
                                [101.46365223022093, 0.5096018362362997],
                                [101.46455764755888, 0.5100767904619943],
                                [101.46657628293474, 0.5108782756374524],
                                [101.46785277295197, 0.5119617646973893],
                                [101.46875819028986, 0.513564734478436],
                                [101.4695745501848, 0.5136834729644733],
                                [101.46973822734401, 0.513928572428398],
                                [101.46964916990106, 0.5143441570974829],
                                [101.46896639617103, 0.5153385917303694],
                                [101.46908513942827, 0.5158877570577403],
                                [101.46899608198532, 0.5167337684161311],
                                [101.46905545361398, 0.5171493529020808],
                                [101.46841720860476, 0.5183367369967726],
                                [101.46789770685393, 0.5184851599926645],
                                [101.46750686419574, 0.5195835653632912],
                                [101.46756623582434, 0.5204889454072514],
                                [101.46718032023733, 0.5213943253212392],
                                [101.46756642123984, 0.5229912624138677],
                                [101.46749220670353, 0.5240302225454343],
                                [101.467388306354, 0.5248168636741752],
                                [101.4525364074916, 0.5251582375115333],
                                [101.4521625517362, 0.5086204378933701],
                                [101.45243387304788, 0.507842680732125],
                                [101.4505888881306, 0.5071553603726073],
                                [101.45102300222806, 0.5063776030366398],
                                [101.45386283195575, 0.503194223199273],
                                [101.45366386299366, 0.5021451545020597],
                                [101.45366032198092, 0.502016507100592]
                            ]
                        ],
                        "type": "Polygon"
                    },
                    "id": 10
                },
                {
                    "type": "Feature",
                    "properties": { "Keterangan": "Kec.Lima Puluh", "d": 3 },
                    "geometry": {
                        "coordinates": [
                            [
                                [101.44753027686414, 0.5323164147055337],
                                [101.45362396798856, 0.5321768705484828],
                                [101.45348441781044, 0.5252461734475276],
                                [101.46743943565303, 0.5250135995849945],
                                [101.46739291892692, 0.5256648063776055],
                                [101.46711381857062, 0.5260834392786506],
                                [101.46734640220092, 0.5265951016760937],
                                [101.46841628690203, 0.5270602492737595],
                                [101.46827673672391, 0.5277579706055491],
                                [101.46827673672391, 0.5285952360990649],
                                [101.46892797088861, 0.5298976488659832],
                                [101.46818370327173, 0.5313396055381361],
                                [101.4678115694615, 0.5322698999868578],
                                [101.46804415309362, 0.5332932237181893],
                                [101.46804415309362, 0.535386385365598],
                                [101.46790460291356, 0.5360375910656074],
                                [101.46795111963962, 0.5373400022587873],
                                [101.46776505273539, 0.5379446930751897],
                                [101.46832325344991, 0.5388284718533782],
                                [101.46846280362809, 0.5397122505033707],
                                [101.46869538725838, 0.5405029997122313],
                                [101.46827673672391, 0.5413402634690812],
                                [101.46864887053238, 0.5420844978227706],
                                [101.46864887053238, 0.542828732084061],
                                [101.46902100434085, 0.5432938784511947],
                                [101.46846280362809, 0.5438985686747202],
                                [101.46795111963962, 0.5443172003327135],
                                [101.46837698221509, 0.545877510500901],
                                [101.46642327971705, 0.5469473465501409],
                                [101.46553946192012, 0.5480636970068105],
                                [101.46451609394506, 0.5499242806393312],
                                [101.46321362561366, 0.551319717983219],
                                [101.46125992311562, 0.5524825821862436],
                                [101.45907363698723, 0.5535989316070982],
                                [101.45730600139348, 0.5550873971749013],
                                [101.45600353306202, 0.5565293478365447],
                                [101.45363118002763, 0.5567619204913541],
                                [101.4517239942557, 0.5557851152814237],
                                [101.44935164122313, 0.5559711734287731],
                                [101.44777007253356, 0.5541571062396571],
                                [101.44702580491668, 0.5520174365321253],
                                [101.44725838854691, 0.5508080576617971],
                                [101.44897950741466, 0.5497382223024943],
                                [101.4507471430066, 0.5492730764341616],
                                [101.45325904621922, 0.5506219993516197],
                                [101.45418938074215, 0.5508080576617971],
                                [101.456887350859, 0.5485753575633368],
                                [101.45800375228612, 0.5449007035069258],
                                [101.45781768538006, 0.5431331475912771],
                                [101.4565152170486, 0.5422493694404551],
                                [101.45335207967133, 0.5422958840831029],
                                [101.45153792731111, 0.5425749719808124],
                                [101.45000287534765, 0.5414121058581998],
                                [101.4474909721369, 0.5393189462754151],
                                [101.44753027686414, 0.5323164147055337]
                            ]
                        ],
                        "type": "Polygon"
                    },
                    "id": 11
                }
            ]
        };
        

        function getColor(d) {
            return d >= 9 ? '#0a2647' :
                  d >= 7 ? '#144272' :
                  d >= 6 ? '#205295' :
                  d >= 5 ? '#2c74b3' :
                  d >= 4 ? '#629dd5' :
                  d >= 2 ? '#b4d4ff' :
                  d >= 1 ? '#eef5ff' :
                              '#FFEDA0';
        }

        function style(feature) {
            return {
                fillColor: getColor(feature.properties.d),
                weight: 2,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 1,
                
            };
        }


        //Layer Grouping

        //base on script
        var umum = L.layerGroup([keluargaku,sariMedika,dewiSehat,bhakti,sejahtera,rizkiMedika,binaKasih,cendana,kartika,erna,aisyiyah,mysha,pausMedika,mitraSehat,ekra,salma,harapanMedika,bertuahMedika,binaKasih1,annisa,arrabih,amanahRiau,pratamaUES]);
        var kecantikan = L.layerGroup([zidya,mayerd,memoci,vinGlow,omoni,djasur]);
        var anak = L.layerGroup([kiddo,kiddy]);
        var gigi = L.layerGroup([saudaraMedical,prettyDental,dwDental,widiaDental,dentalTone,rionaDental]);
        var spesialis = L.layerGroup([ginjalSehat,thtPekanbaru,elniza,meiza,merifa]);
        
        //base on csv file
        var markerLayer = L.layerGroup();
        Papa.parse('{{ asset("csv/data.csv") }}', {
            header: true,
            download: true,
            complete: function(results) {
                var data = results.data;

                for (var i = 0; i < data.length; i++) {
                    var marker = L.marker([data[i].Lat, data[i].Long]).bindPopup(data[i].Nama_Klinik);
                    markerLayer.addLayer(marker);
                }

                overlays["Marker CSV"] = markerLayer;

                L.control.layers(baseLayers, overlays).addTo(map);
            }
        });
        

        //base on geoJSON polygon
        var kawasan = L.geoJSON(geojsonFeature,{
          onEachFeature: function(feature, layer){
            layer.bindPopup(feature.properties.Keterangan + '<hr>Jumlah Poliklinik umum: '+ feature.properties.d)
          },
          style: style
        }).addTo(map);

        var baseLayers = {
          "Satelit": googleSat,
          "OpenStreetMap": osm
        };

        var overlays = {
            "Klinik Umum": umum,
            "Klinik Kecantikan": kecantikan,
            "Klinik Anak": anak,
            "Klinik Gigi": gigi,
            "Klinik Spesialis": spesialis,
            "Kawasan Persebaran Klinik": kawasan,
            "Marker CSV": markerLayer
            
        };

        overlays["Klinik Umum"].addTo(map);
        overlays["Klinik Kecantikan"].addTo(map);
        overlays["Klinik Anak"].addTo(map);
        overlays["Klinik Gigi"].addTo(map);
        overlays["Klinik Spesialis"].addTo(map);

        L.control.layers(baseLayers, overlays).addTo(map);
        L.Control.geocoder().addTo(map);
        

    </script>
@endpush
