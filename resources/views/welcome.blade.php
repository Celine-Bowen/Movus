<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>MOVUS</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
    crossorigin="anonymous">
  <link rel="stylesheet" href="css/Style.css" />
  <link rel="stylesheet" href="css/mobile-style.css">

  <style>
  
   .button a:hover{
      background: #03e9f4;
      color: orangered;
      box-shadow: 0 0 5px #03e9f4,
                  0 0 25px #03e9f4,
                  0 0 50px #03e9f4,
                  0 0 200px #03e9f4;
    }

.containers{
  width: 1280px;
  margin: 70px auto 0;
  display: flex;
  flex-direction: row;
  flex-wrap: wrap; 
}

.containers .box{
  position: relative;
  width: 300px;
  height: 300px;
  background: rgb(236, 61, 61);
  margin: 10px;
  box-sizing: border-box;
  display: inline-block;
}

.containers .box .imgBox{
  position: relative;
  overflow: hidden;
}

.containers .box .imgBox img{
  max-width: 100%;
  height: 300px;
  transition: transform 2s;
}

.containers .box:hover .imgBox img{
  transform: scale(1.2s);
}

.containers .box .details{
  position: absolute;
  top: 10px;
  left: 10px;
  bottom: 10px;
  right: 10px;
  background: rgba(0, 0, 0, .8);
  transform: scaleY(0);
  transition: transform .5s;
}

.containers .box:hover .details{
  transform: scaleY(1);
}

.containers .box .details .content{
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  text-align: center;
  padding: 15px;
  color: #fff;
}

.containers .box .details .content h2{
  margin: 10px 0 0;
  padding: 0;
}

  </style>
</head>

<body>
  <header>
    <div class="container-fluid p-0">
      <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="/">
        <i class="fa fa-truck"></i> MOVUS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
          aria-label="Toggle navigation">
          <i class="fas fa-align-right text-light"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <div class="mr-auto"></div>
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="/">HOME
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">ABOUT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#price">SERVICES</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">LOGIN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">REGISTER</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="container text-center">
      <div class="row">
        <div class="col-md-7 col-sm-12  text-white">
          <h1>WELCOME TO</h1>
          <h1>MOVUS</h1>
          <p>
            "Let's help you Relocate."
          </p>
          <div class="button">
          <a href="{{ route('login') }}" class="btn btn-light px-5 py-2 primary-btn">
            Book Now
          </a>
        </div>
        </div>
        <!--
        <div class="col-md-5 col-sm-12  h-25 pt-5">
          <img class="m-5 pt-5" src="../assets/truck.jpg" alt="" />
        </div>
-->
      </div>
    </div>
  </header>
  <main>
    <section class="section-1" id="about">
      <div class="container text-center">
        <div class="row">
          <div class="col-md-6 col-12">
            <div class="pray">
              <img src="../assets/truck.jpg" alt="Pray" class="" />
            </div>
          </div>

          
          <div class="col-md-6 col-12">
            <div class="panel text-left">
              <h1>MOVUS</h1>
              <p class="pt-4">MOVUS</p>
                  <p>Those in need of relocation services</p>
              <p>
                The world getting more advance and expensive BUT with the help of our MOVUS, now you can go anywhere you want by just clicking the order button.
              </p>
            </div>
          </div>

        </div>
      </div>

    </section>


    <?php

    use App\Customer;
    use App\Driver;
    use App\Order;

    $customer = Customer::all()->count();
    $driver = Driver::all()->count();
    $order = Order::all()->count();

    ?>

    <section class="section-2 container-fluid p-0">
      <div class="cover">
        <div class="overlay"></div>
        <div class="content text-center">
          <h1>Latest Update MOVUS</h1>
          <p>
            How popular is this system?
          </p>
        </div>
      </div>
      <div class="container-fluid text-center">
        <div class="numbers d-flex flex-md-row flex-wrap justify-content-center">
          <div class="rect">
            <h1>
              <?php
                echo $customer;
              ?>
            </h1>
            <p>Customer</p>
          </div>
          <div class="rect">
            <h1>
              <?php
                echo $driver;
              ?>
            </h1>
            <p>Driver</p>
          </div>
          <div class="rect">
            <h1>
              <?php
                echo $order;
              ?>
            </h1>
            <p>Total Orders</p>
          </div>
        </div>
      </div>

      <!--
      <div class="purchase text-center" id="price">
       <h1>Easy Choice</h1>
        <p>
            Location That Provided
        </p>

        <div class="containers pb-5">

          <div class="box">
            <div class="imgBox">
              <img src="/images/ukm.jpg" alt="fail">
            </div>
            <div class="details">
              <div class="content">
                <h2>Kampus UKM,Bangi</h2>
                <p>Lingkungan 1:<br>KAB,KDO,KTHO,KKM,KRK,KIZ<br>Lingkungan 2:<br>KPZ,KIY,KUO,KBH</p>
              </div>
            </div>
          </div>

          <div class="box">
            <div class="imgBox">
              <img src="/images/airport.jpg" alt="fail">
            </div>
            <div class="details">
              <div class="content">
                <h2>Airport</h2>
                <p>KLIA 1<br>KLIA 2</p>
              </div>
            </div>
          </div>

          <div class="box">
            <div class="imgBox">
              <img src="/images/mrt.jpg" alt="fail">
            </div>
            <div class="details">
              <div class="content">
                <h2>MRT Station</h2>
                <p>MRT Kajang<br>MRT Stadium Kajang</p>
              </div>
            </div>
          </div>

          <div class="box">
            <div class="imgBox">
              <img src="/images/ktm.jpg" alt="fail">
            </div>
            <div class="details">
              <div class="content">
                <h2>KTM Station</h2>
                <p>KTM UKM<br>KTM Kajang</p>
              </div>
            </div>
          </div>

          <div class="box">
            <div class="imgBox">
              <img src="/images/tbs.jpg" alt="fail">
            </div>
            <div class="details">
              <div class="content">
                <h2>Bus Station</h2>
                <p>TBS<br>Hentian Kajang</p>
              </div>
            </div>
          </div>

          <div class="box">
            <div class="imgBox">
              <img src="/images/bangi.jpg" alt="fail">
            </div>
            <div class="details">
              <div class="content">
                <h2>Bangi</h2>
                <p>Bangi Gateway<br>Kipmall<br>PKNS<br>Bangi Sentral</p>
              </div>
            </div>
          </div>

          <div class="box">
            <div class="imgBox">
              <img src="/images/putrajaya.jpg" alt="fail">
            </div>
            <div class="details">
              <div class="content">
                <h2>Putrajaya</h2>
                <p>Alamanda<br>iOi City Mall</p>
              </div>
            </div>
          </div>

          <div class="box">
            <div class="imgBox">
              <img src="/images/kajang.jpg" alt="fail">
            </div>
            <div class="details">
              <div class="content">
                <h2>Kajang</h2>
                <p>Jalan Reko<br>Plaza Metro Kajang</p>
              </div>
            </div>
          </div>

        </div>

        {{-- <div class="cards pb-5">
          <div class="d-flex flex-row justify-content-center flex-wrap">
            <div class="card">
              <div class="card-body">
                <div class="title">
                  <h5 class="card-title">UKM Origin</h5>
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table">
                    <thead class=" text-primary">
                        <th>Name</th>
                    </thead>
                    <tbody>
                            <tr>
                                <td>KLIA</td>
                                <td>KLIA</td>
                            </tr>
                    </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
      </div>
        -->
    </section>
   
  </main>

  <footer>
    <div class="container-fluid p-0">
      <div class="row text-left">
        <div class="col-md-5 col-sm-5">
          <h4 class="text-light">Contact us</h4>
            <p class="text-muted text-sm">We believe in Safe, Care & Modern Design Standards with Responsive Approach. Browse the amazing work of our MOVUS.</p>
                <ul class="ml-4 mb-0 fa-ul text-muted">
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Nairobi,Kenya</li>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Email : celinebowen763@gmail.com</li>
                </ul>
          <p class="pt-4 text-muted">Copyrights &copy; 2022 All Rights Reserved MOVUS Company Inc.
          </p>
        </div>
        <div class="col-md-5 col-sm-12">
          {{-- <h4 class="text-light">Newsletter</h4>
          <p class="text-muted">Stay Updated</p>
          <form class="form-inline">
            <div class="col pl-0">
              <div class="input-group pr-5">
                <input type="text" class="form-control bg-dark text-white" id="inlineFormInputGroupUsername2" placeholder="Email">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-arrow-right"></i>
                  </div>
                </div>
              </div>
            </div>
          </form> --}}
        </div>
        <div class="col-md-2 col-sm-12">
          <h4 class="text-light">Follow Us</h4>
          <p class="text-muted">Let us be social</p>
          <div class="column text-light">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-youtube"></i>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <script src="js/main.js"></script>
</body>

</html>