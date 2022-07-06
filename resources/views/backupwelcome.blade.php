@extends('layouts.app')

@section('content')
    
<div class="container">

    <main role="main">

            <img src="" alt="">
            <div class="container">
                <div class="vidContent">
                    <p class="text-center">
                    "Let's help you Relocate."
                    </p>
                  
                </div>
            </div>
            <ul class="text-center list-inline">
                <li><a href=""><i class="fa fa-facebook" ></i></a></li>
                <li><a href=""><i class="fa fa-twitter" ></i></a></li>
                <li><a href=""><i class="fa fa-linkedin" ></i></a></li>
                <li><a href=""><i class="fa fa-google-plus" ></i></a></li>
                <li><a href=""><i class="fa fa-instagram" ></i></a></li>
            </ul>
      
          <!-- START THE FEATURETTES -->
      
          <hr class="featurette-divider">
    
          <div class="row featurette">
            <div class="col-12">
                   
                    <div class="row justify-content-center">
    
                        <div class="col-md-5">
                            <div class="card shadow">
                               <div class="inner">
                                    <img class="card-img-top" src="images/login.jpg" alt="Card image cap">
                               </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title ">Login</h5>
                                    <p class="card-text">
                                        Login into your account.
                                    </p>
                                    <a href="{{ route('login') }}" class="btn btn-success">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-md-5 order-md-1">
            </div>
          </div>
      
          <hr class="featurette-divider">
      
          <div class="row featurette">
            <div class="col-md-7">
              <h2 class="featurette-heading">Get to know about us</h2><br>
              <div class="pl-5">
                  <p>MOVUS</p>
                  <p>Those in need of relocation services</p>
              </div>
              <p>The world getting more advance and expensive BUT with the help of our MOVUS, now you can go anywhere you want by just clicking the order button.</p>
            </div>
            <div class="col-md-5">
              <img src='images/laptop.jpg' width="500" height="300" role="img" >
            </div>
          </div>
          
          <hr class="featurette-divider">
    
          <div class="row featurette pb-3">
            <div class="col-12">
    
                    <div class="row justify-content-center">
    
                        <div class="col-md-6 pr-4">
                            <div class="card shadow">
    
                                <div class="row d-flex">
                      
                                    <div class="card bg-light">
                                      <div class="card-header text-muted border-bottom-0">
                                        Professional Web Developer
                                      </div>
                                      <div class="card-body pt-0">
                                        <div class="row">
                                          <div class="col-7 pt-3">
                                            <h2 class="lead"><b>Celine Bowen</b></h2>
                                            <p class="text-muted text-sm"><b>About: </b> Software Developer & Data Scientist </p>
                                            <p class="text-muted text-sm">We believe in Safe, Care & Modern Design Standards with Responsive Approach. Browse the amazing work of our MOVUS.</p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                              <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Nairobi, Kenya</li>
                                              <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Email : celinebowen763@gmail.com</li>
                                            </ul>
                                          </div>
                                          <div class="col-5 text-center pt-4">
                                            <img src="images/ameein.jpg" alt="" width="70%" lenght="70%" class="img-circle img-fluid"> 
                                          </div>
                                        </div>
                                      </div>
                                      <div class="card-footer">
                                        
                                      </div>
                                    </div>
                                  
                                </div>
    
                            </div>
                        </div>
    
    
                        <div class="col-md-6 pt-3" >
                          <div id="contact-right">
                              <h3>Contact us</h3>
                              <form>
                                 <input type="text" name="full name" placeholder="Full Name" class="form-control mb-2">
                                 
                                 
                                 <input type="text" name="email" placeholder="Email Address" class="form-control mb-2">
                                 
                                                              
                                  <textarea rows="5" name="message" placeholder="message.." class="form-control mb-2"></textarea>
                                 
                                 <div class="pt-3" id="send-btn">
                                     <a href="" class="btn btn-success btn-block">Send</a>
                                 </div>
                              </form>
                          </div>
                      </div>
                                   
                              </div>
    
                          </div>
                      </div>
                    </div>
            </div>
            <div class="col-md-5 order-md-1">
            </div>
          </div>
    
          <hr class="featurette-divider">
      
          <!-- /END THE FEATURETTES -->
      
        </div><!-- /.container -->
      
      
        <!-- FOOTER -->
        <footer class="container">
          <p class="float-right"><a href="/">Back to top</a></p>
          <p>&copy; 2022 MOVUS Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
        </footer>
      </main>
    

</div>




@endsection
