<!doctype html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/app.css">
  <title>www.newspaper.com</title>
  <link rel="website icon" type="png" href="{{Storage::url('public/img/logo.gif')}}">

  <script type="text/javascript">
    function displayTime() {
      var clientTime = new Date();
      var time = new Date(clientTime.getTime());
      var sh = time.getHours().toString();
      var sm = time.getMinutes().toString();
      var ss = time.getSeconds().toString();
      document.getElementById("jam").innerHTML = (sh.length == 1 ? "0" + sh : sh) + ":" + (sm.length == 1 ? "0" + sm : sm) + ":" + (ss.length == 1 ? "0" + ss : ss);
      document.getElementById("jaminput").value = (sh.length == 1 ? "0" + sh : sh) + ":" + (sm.length == 1 ? "0" + sm : sm) + ":" + (ss.length == 1 ? "0" + ss : ss);
    }
    
  </script>

    

</head>

<body>



  <!--Navbar-->
  <section id=nav>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="{{ route('/') }}"><span>Newspaper.</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">

          <i class="bi bi-brightness-high-fill mode" id="toggleDark"></i>

            <!--Search-->
            <form class="form-inline my-2 my-lg-0 " style="display:block; margin:50px;" method="get" action="/search">
              <input class="form-control ml-sm-2" name="search" type="search" placeholder="Search" aria-label="Search" required>
              <button class="btn btn-outline-primary my-1 my-sm-0" style="width:80px; font-size:15px;" type="submit">Search</button>
            </form>

            <li class="nav-item active">
              <a class="nav-link" href="{{ route('/') }}">Home <span class="sr-only">(current)</span></a>
              <div class="d-flex">
              </div>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('posts.hotnews', 'Hot News') }}">Hot News</a>
            </li>

            <div class="dropdown">
              <button class="btn  dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                <b>CATEGORY</b>
              </button>
              <div class="dropdown-menu">
                <a href="{{ route('posts.all', 'Entertainment') }}"><button class="dropdown-item" type="button">Entertainment</button></a>
                <a href="{{ route('posts.politic', 'Politic') }}"><button class="dropdown-item" type="button">Politic</button></a>
                <a href="{{ route('posts.sport', 'Sport') }}"><button class="dropdown-item" type="button">Sport</button></a>
                <a href="{{ route('posts.travel', 'Travel') }}"><button class="dropdown-item" type="button">Travel</button></a>
                <a href="{{ route('posts.style', 'Style') }}"><button class="dropdown-item" type="button">Style</button></a>
              </div>
            </div>
          </ul>
        </div>
      </div>
    </nav>
  </section>

  <style>
    .jumbotronbg {
      background-image: url({{Storage::url('public/img/bgjumbo.jpg')}});
    }
  </style>


  <!--Jumbotron-->

  <div class="jumbotron jumbotron-fluid jumbotronbg">
    <div class="container">
      <img src="{{Storage::url('public/img/logo.gif')}}" class="ban-img img-fluid" alt="" height="100" width="100">

      <body onload="setInterval('displayTime()', 1000);">

        <h1 id="jam" style="text-align:center;color:white"></h1>

        <h1 class="display-4">Majalah dan Surat Kabar <br>Berita Seluruh Dunia</br></h1>
    </div>
  </div>


  <!--News-->

  <!--Entertainment-->

  <section id="news">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h2>Entertainment</h2>
          <hr color="black">
        </div>
      </div>
      <div class="row justify-content-between">
        @forelse($entertainments as $entertainment)
        <div class="enter col-sm-4">

          <img src="{{Storage::url('public/posts/' . $entertainment->image )  }}" class="gb-konten img-fluid" alt="" height="480" width="480">

          <a href="{{route('berita_full',[$entertainment->id])}}" class="news-link">{{ $entertainment->title }}</a>

          <br>
          <p class="paragraf">{{ $entertainment->thumbnail }}</br></p>
        </div>
        @empty
        @endforelse

        <div class="col-sm-12">
          <a href="{{ route('posts.all', 'Entertainment') }}"><button type="button" class="btn btn-secondary btn-lg btn-lain">Lihat lainnya</button></a>
        </div>
      </div>

      <!--Politic-->

      <div class="row">
        <div class="col text-center">
          <h2>Politic</h2>
          <hr color="black">
        </div>
      </div>
      <div class="row justify-content-between">
        @forelse($politics as $politic)
        <div class="enter col-sm-4">

          <img src="{{Storage::url('public/posts/' . $politic->image )}}" class="gb-konten img-fluid" alt="" height="400" width="400">

          <a href="{{route('berita_full',[$politic->id])}}" class="news-link">{{ $politic->title }}</a>

          <br>
          <p class="paragraf">{{ $politic->thumbnail }}</br></p>
        </div>
        @empty
        @endforelse

        <div class="col-sm-12">
          <a href="{{ route('posts.politic', 'Politic') }}"><button type="button" class="btn btn-secondary btn-lg btn-lain">Lihat lainnya</button></a>
        </div>
      </div>

      <!--Sport-->

      <div class="row">
        <div class="col text-center">
          <h2>Sport</h2>
          <hr color="black">
        </div>
      </div>
      <div class="row justify-content-between">
        @forelse($sports as $sport)
        <div class="enter col-sm-4">

          <img src="{{Storage::url('public/posts/' . $sport->image )}}" class="gb-konten img-fluid" alt="" height="400" width="400">

          <a href="{{route('berita_full',[$sport->id])}}" class="news-link">{{ $sport->title }}</a>

          <br>
          <p class="paragraf">{{ $sport->thumbnail }}</br></p>
        </div>
        @empty
        @endforelse

        <div class="col-sm-12">
          <a href="{{ route('posts.sport', 'Sport') }}"><button type="button" class="btn btn-secondary btn-lg btn-lain">Lihat
              lainnya</button></a>

        </div>
      </div>


      <!--Travel-->

      <div class="row">
        <div class="col text-center">
          <h2>Travel</h2>
          <hr color="black">
        </div>
      </div>
      <div class="row justify-content-between">
        @forelse($travels as $travel)
        <div class="enter col-sm-4">

          <img src="{{Storage::url('public/posts/' . $travel->image )}}" class="gb-konten img-fluid" alt="" height="400" width="400">

          <a href="{{route('berita_full',[$travel->id])}}" class="news-link">{{ $travel->title }}</a>

          <br>
          <p class="paragraf">{{ $travel->thumbnail }}</br></p>
        </div>
        @empty
        @endforelse

        <div class="col-sm-12">
          <a href="{{ route('posts.travel', 'Travel') }}"><button type="button" class="btn btn-secondary btn-lg btn-lain">Lihat
              lainnya</button></a>

        </div>
      </div>


      <!--Style-->
      <div class="row">
        <div class="col text-center">
          <h2>Style</h2>
          <hr color="black">
        </div>
      </div>
      <div class="row justify-content-between">
        @forelse($styles as $style)
        <div class="enter col-sm-4">

          <img src="{{Storage::url('public/posts/' . $style->image )}}" class="gb-konten img-fluid" alt="" height="400" width="400">

          <a href="{{route('berita_full',[$style->id])}}" class="news-link">{{ $style->title }}</a>

          <br>
          <p class="paragraf">{{ $style->thumbnail }}</br></p>
        </div>
        @empty
        @endforelse

        <div class="col-sm-12">
          <a href="{{ route('posts.style', 'Style') }}"><button type="button" class="btn btn-secondary btn-lg btn-lain">Lihat
              lainnya</button></a>

        </div>
      </div>


  </section>



  <!--Contact-->

  <section id="contact">
    <div class="container">
      <h2 class="text-center">Hubungi Kami</h2>
    </div>
    <div class="row contact">
      <div class="col-md-6 fdbck">
        <img src="{{Storage::url('public/img/feedback.png')}}" alt="" class="img-fluid" height="700" width="700" style="display:block">
      </div>
      <div class="col-md-6">
        <form>
          <div class="form-group">
            <label for="exampleFormControlInput1">Nama</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Aldi Dharmawan">
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Email</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="aldidharmawan700@gmail.com">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Feedback</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <button class="btn btn-secondary" style="width:750px">Kirim</button>
          <hr>
        </form>
      </div>
    </div>
  </section>



  <!--Footer-->
  <section id="footer">
    <div class="container">
      <b>
        <p class="text-center">© Copyright ALLRARIM</p>
      </b>

    </div>
  </section>





  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>