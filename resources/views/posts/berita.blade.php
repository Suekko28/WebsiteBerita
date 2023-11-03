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

            <!--Search-->
            <form class="form-inline my-2 my-lg-0 " style="display:block; margin:50px;" method="get" action="/search">
              <input class="form-control ml-sm-2" name="search" type="search" placeholder="Search" aria-label="Search" required>
              <button class="btn btn-outline-primary my-1 my-sm-0" type="submit">Search</button>
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


  <section id="berita">
    <div class="container">
      <div class="col mt-2 text-center">
        <div class="row">
        </div>
      </div>
      @foreach($data as $data)

      <h1 class="judul">{{ $data->title }}</h1>
      
      <img src="{{Storage::url('public/posts/' . $data->image )}}" class="gb-ctr img-fluid" alt="" style="width:auto;height:auto;margin:auto;">

      <div class="paragraf mb-5 ">{!!$data->content!!}

      <h6 class="kategori font-italic">Category : {{ $data->kategori}}</h6>
      </div>
      @endforeach
    </div>
    </div>
    </div>

  </section>
  <div class="container">

    <div class="row">
      <div class="col text-center">
        <h2>Latest News</h2>
        <hr color="black">
      </div>
    </div>
    <div class="card-deck" method="get" action="/berita">
      @foreach($latest as $latest)
      <div class="card">
        <img src="{{Storage::url('public/posts/' . $latest->image )  }}" class="gb-konten img-fluid" alt="" height="480" width="480">
        <div class="card-body">
          <a class="card-title justify-content" href="{{route('berita_full',[$latest->id])}}">{{ $latest->title }}</a>
          <p class="card-text mt-4">{{$latest->thumbnail}}</p>
          <hr>
          <p class="card-text"><small class="text-muted">{{$latest-> kategori}}</small></p>
        </div>
      </div>
      @endforeach
    </div>

  </div>

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