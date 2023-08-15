<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Online repairing & maintainece service management system</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />
    <!-- Favicon -->
    <link href="{{asset('frontend/img/favicon.icon')}}" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Icon Font Stylesheet -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
      rel="stylesheet"
    />

    <!-- Libraries Stylesheet -->
    <link href="{{asset('frontend/lib/animate/animate.min.css')}}" rel="stylesheet" />
    <link href="{{asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/css/dash.css') }}" />
  </head>

  <body>
    <!-- Spinner Start -->
    <div
      id="spinner"
      class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
    >
      <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav
      class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0"
    >
      <a href="index.html" class="navbar-brand d-flex align-items-center">
        <h1 class="m-0">
          <i class="fa fa-building text-primary me-3"></i>ORMS
        </h1>
      </a>
      <button
        type="button"
        class="navbar-toggler"
        data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-3 py-lg-0">
          <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
          <a href="{{ route('contact') }}" class="nav-item nav-link">contact Us</a>
          <a href="{{ route('service') }}" class="nav-item nav-link">service Details</a>
          @if (isset(auth()->user()->id))
          @if(auth()->user()->role == '1')
          <a href="{{route('admin.dashboard')}}" class="btn btn-primary my-3 mx-3">Dashboard</a>
          @elseif(auth()->user()->role == '2')
          <a href="{{route('user.dashboard')}}" class="btn btn-primary my-3 mx-3">Dashboard</a>
          @else
          <a href="{{route('technician.dashboard')}}" class="btn btn-primary my-3 mx-3">Dashboard</a>
          @endif
          <a href="{{route('logout')}}" class="btn btn-primary my-3 mx-3 ">Logout</a>
      @else        
          <a href="{{route('login')}}" class="btn btn-primary my-3 mx-3">login</a>
          <a href="{{route('register')}}" class="btn btn-primary my-3">register</a>
          @endif
      </div>
    </nav>
    <!-- Navbar End -->

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
      <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="w-100" src="{{asset('frontend/img/photo.jpg')}}" alt="Image" />
            <div class="carousel-caption">
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-12 col-lg-10">
                    <h5
                      class="text-light text-uppercase mb-3 animated slideInDown"
                    >
                      Welcome to ORMS
                    </h5>
                    <h1 class="display-2 text-light mb-3 animated slideInDown">
                      A Complete repairing and maintainece service
                    </h1>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="w-100" src="{{asset('frontend/img/carousel-1.jpg')}}" alt="Image" />
            <div class="carousel-caption">
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-12 col-lg-10">
                    <h5
                      class="text-light text-uppercase mb-3 animated slideInDown"
                    >
                      Welcome to ORMS
                    </h5>
                    <h1 class="display-2 text-light mb-3 animated slideInDown">
                      Professional Repairing & maintainece Services
                    </h1>
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#header-carousel"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#header-carousel"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <div
              class="position-relative overflow-hidden ps-5 pt-5 h-100"
              style="min-height: 400px"
            >
              <img
                class="position-absolute w-100 h-100"
                src="{{asset('frontend/img/about.jpg')}}"
                alt=""
                style="object-fit: cover"
              />
              <div
                class="position-absolute top-0 start-0 bg-white pe-3 pb-3"
                style="width: 200px; height: 200px"
              >
                <div
                  class="d-flex flex-column justify-content-center text-center bg-primary h-100 p-3"
                >
                  <h1 class="text-white">years</h1>
                  <h2 class="text-white">of</h2>
                  <h5 class="text-white mb-0">Experience</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="h-100">
              <div class="border-start border-5 border-primary ps-4 mb-5">
                <h6 class="text-body text-uppercase mb-2">About Us</h6>
                <h1 class="display-6 mb-0">
                  Unique Solutions For Personal services!
                </h1>
              </div>
              <p>
                we are always dedicated to serve our client & give them qualitiful services
              </p>
              <p class="mb-4">
                Our company is aware to give you relavent serivces at
                your area we have proiveded many repairnig services through out 
                the city we are concerned about provinding best facilities to our clients
              </p>
              <div class="border-top mt-4 pt-4">
                <div class="row g-4">
                  <div class="col-sm-4 d-flex wow fadeIn" data-wow-delay="0.1s">
                    <i
                      class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"
                    ></i>
                    <h6 class="mb-0">Ontime at services</h6>
                  </div>
                  <div class="col-sm-4 d-flex wow fadeIn" data-wow-delay="0.3s">
                    <i
                      class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"
                    ></i>
                    <h6 class="mb-0">24/7 hours services</h6>
                  </div>
                  <div class="col-sm-4 d-flex wow fadeIn" data-wow-delay="0.5s">
                    <i
                      class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"
                    ></i>
                    <h6 class="mb-0">Verified professionals</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- About End -->

    <!-- Facts Start -->
    <div class="container-fluid my-5 p-0">
      <div class="row g-0">
        <div class="col-xl-3 col-sm-6 wow fadeIn" data-wow-delay="0.1s">
          <div class="position-relative">
            <img class="img-fluid w-100" src="{{asset('frontend/img/fact-1.jpg')}}" alt="" />
            <div class="facts-overlay">
              <h1 class="display-1">01</h1>
              <h4 class="text-white mb-3">Construction repairing</h4>
          >
               <p>we provides services to repair any construction related repairnig at home</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 wow fadeIn" data-wow-delay="0.3s">
          <div class="position-relative">
            <img class="img-fluid w-100" src="{{asset('frontend/img/fact-2.jpg')}}" alt="" />
            <div class="facts-overlay">
              <h1 class="display-1">02</h1>
              <h4 class="text-white mb-3">Plumbing repairing service</h4>

              <p>we provides services in every type of pulmbing repairing </p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 wow fadeIn" data-wow-delay="0.5s">
          <div class="position-relative">
            <img class="img-fluid w-100" src="{{asset('frontend/img/fact-3.jpg')}}" alt="" />
            <div class="facts-overlay">
              <h1 class="display-1">03</h1>
              <h4 class="text-white mb-3">Painting services</h4>
             <p> we provide services of painting your home or your working areas at minimal cost</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 wow fadeIn" data-wow-delay="0.7s">
          <div class="position-relative">
            <img class="img-fluid w-100" src="{{asset('frontend/img/fact-4.jpg')}}" alt="" />
            <div class="facts-overlay">
              <h1 class="display-1">04</h1>
              <h4 class="text-white mb-3">Electronic Repairing </h4>
             <p> providing the facilites of any type of repairing like wire installation,maintainece</p>
          
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Facts End -->

    <!-- Features Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="border-start border-5 border-primary ps-4 mb-5">
              <h6 class="text-body text-uppercase mb-2">Why Choose Us!</h6>
              <h1 class="display-6 mb-0">
                Our Specialization And Company Features
              </h1>
            </div>
            <p class="mb-5">
              Our compnay policy is to serve our client with qualitiful
              service and make their life more easy
            </p>
            <div class="row gy-5 gx-4">
              <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="d-flex align-items-center mb-3">
                  <i
                    class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"
                  ></i>
                  <h6 class="mb-0">Large number of services provided</h6>
                </div>
               
              </div>
              <div class="col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                <div class="d-flex align-items-center mb-3">
                  <i
                    class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"
                  ></i>
                  <h6 class="mb-0"> years of professional experience</h6>
                </div>
                
              </div>
              <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="d-flex align-items-center mb-3">
                  <i
                    class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"
                  ></i>
                  <h6 class="mb-0">A large number of grateful customers</h6>
                </div>
                
                >
              </div>
              <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                <div class="d-flex align-items-center mb-3">
                  <i
                    class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"
                  ></i>
                  <h6 class="mb-0">Always reliable and on time service</h6>
                </div>
                >
              </div>
            </div>
          </div>
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
            <div
              class="position-relative overflow-hidden ps-5 pt-5 h-100"
              style="min-height: 400px"
            >
              <img
                class="position-absolute w-100 h-100"
                src="{{ asset('frontend/img/feature.jpg') }}"
                alt=""
                style="object-fit: cover"
              />
              <div
                class="position-absolute top-0 start-0 bg-white pe-3 pb-3"
                style="width: 200px; height: 200px"
              >
                <div
                  class="d-flex flex-column justify-content-center text-center bg-primary h-100 p-3"
                >
                  <h1 class="text-white">years</h1>
                  <h2 class="text-white">of</h2>
                  <h5 class="text-white mb-0">Experience</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Features End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5 align-items-end mb-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="border-start border-5 border-primary ps-4">
              <h6 class="text-body text-uppercase mb-2">Our Services</h6>
              <h1 class="display-6 mb-0">
                Complete repairing solution
              </h1>
            </div>
          </div>

        </div>
        <div class="row g-4 justify-content-center">
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="service-item bg-light overflow-hidden h-100">
              <img class="img-fluid" src="{{asset('frontend/img/construction.jpg')}}" alt="" />
              <div class="service-text position-relative text-center h-100 p-4">
                <h5 class="mb-3 comp">Construction Repairing</h5>
                <p  class="comp">
                   Your room's walls plaster is damage we are offering your
                   a fixing at surprising cost
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="service-item bg-light overflow-hidden h-100">
              <img class="img-fluid" src="{{asset('frontend/img/plumber-service.jpg')}}" alt="" />
              <div class="service-text position-relative text-center h-100 p-4">
                <h5 class="mb-3">Plumbing repairing service</h5>
                <p class="comp">
                 Needs to fix your kitchen tab or bathroom fittings you are at the right Place
                 we provide fast service at short time.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="service-item bg-light overflow-hidden h-100">
              <img class="img-fluid" src="{{asset('frontend/img/painting.jpg')}}" alt="" />
              <div class="service-text position-relative text-center h-100 p-4">
                <h5 class="mb-3">Painting service</h5>
                <p  class="comp">
                   want to renovate your house with painting thats will give a newlook 
                   we have the best option at low prize
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="service-item bg-light overflow-hidden h-100">
              <img class="img-fluid" src="{{asset('frontend/img/service-4.jpg')}}" alt="" />
              <div class="service-text position-relative text-center h-100 p-4">
                <h5 class="mb-3"> Eelectronic Repairnig</h5>
                <p class="comp">
                  Any electronic reparing needed we have the best solution at minimum price
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12   wow fadeInUp" data-wow-delay="0.1s">
        <a href="{{route('service')}}" class="btn btn-primary my-5 mx-6">view service details</a>
        </div>
    </div>
    <!-- Service End -->

     <!-- Appointment Start -->
     <div
     class="container-fluid appointment my-5 py-5 wow fadeIn"
     data-wow-delay="0.1s">
     <div class="container py-5">
       <div class="row g-5">
         <div class="col-lg-5 col-md-6 wow fadeIn" data-wow-delay="0.3s">
           <div class="border-start border-5 border-primary ps-4 mb-5">
             <h1 class="display-6 text-white mb-0">
               A Company Involved In Service And Maintenance
             </h1>
           </div>
           <p class="text-white mb-0">
             Our company is dedicated to give you relavent serivces at your area
             we have proiveded many repairnig services through out the city
             we are concerned about provinding best facilities to our clients
           </p>
         </div>
         <div class="col-lg-7 col-md-6 wow fadeIn" data-wow-delay="0.5s">
           
         </div>
       </div>
     </div>
   </div>
   <!-- Appointment End -->

    <!-- Team Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5 align-items-end mb-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="border-start border-5 border-primary ps-4">
              <h6 class="text-body text-uppercase mb-2 font">Our Team</h6>
              <h1 class="display-6 mb-0 font">Our Expert Worker</h1>
            </div>
          </div>
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
            <p class="mb-0 font">
              Our workers are very much proffesional to provide you the best
              services on times.
            </p>
          </div>
        </div>
        <div class="row g-4">
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="team-item position-relative">
              <img class="img-fluid" src="{{asset('frontend/img/team-1.jpg')}}" alt="" />
              <div class="team-text bg-white p-4">
                <h5>Md.khan</h5>
                <span>Plumber</span>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="team-item position-relative">
              <img class="img-fluid" src="{{asset('frontend/img/team-2.jpg')}}" alt="" />
              <div class="team-text bg-white p-4">
                <h5>MD.Rahman</h5>
                <span>Electrician</span>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="team-item position-relative">
              <img class="img-fluid" src="{{asset('frontend/img/team-3.jpg')}}" alt="" />
              <div class="team-text bg-white p-4">
                <h5>MD.Hasan</h5>
                <span>Painter</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Team End -->

    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
            <div class="border-start border-5 border-primary ps-4 mb-5">
              <h6 class="text-body text-uppercase mb-2 font ">Testimonial</h6>
              <h1 class="display-6 mb-0 font">We have Happy Clients</h1>
            </div>
            <p class="mb-4 font">
            our clients are prity much satisfied with our services.We have become a  
            turstable solution for the public facilities problems.
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- Testimonial End -->

    <!-- Footer Start -->
    <div
      class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn"
      data-wow-delay="0.1s"
    >
      <div class="container py-5">
        <div class="row g-5">
          <div class="col-lg-3 col-md-6">
            <h1 class="text-white mb-4">
              <i class="fa fa-building text-primary me-3"></i>ORMS
            </h1>
            <p>
              A complete solution for personal facilities services
            </p>
            <div class="d-flex pt-2">
              <a class="btn btn-square btn-outline-primary me-1" href=""
                ><i class="fab fa-twitter"></i
              ></a>
              <a class="btn btn-square btn-outline-primary me-1" href=""
                ><i class="fab fa-facebook-f"></i
              ></a>
              <a class="btn btn-square btn-outline-primary me-1" href=""
                ><i class="fab fa-youtube"></i
              ></a>
              <a class="btn btn-square btn-outline-primary me-0" href=""
                ><i class="fab fa-linkedin-in"></i
              ></a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <h4 class="text-light mb-4">Address</h4>
            <p>
              <i class="fa fa-map-marker-alt me-3"></i>123 Street, Dhaka,Bangladesh
            </p>
            <p><i class="fa fa-phone-alt me-3"></i>+017 345 67890</p>
            <p><i class="fa fa-envelope me-3"></i>info@example.com</p>
          </div>
          <div class="col-lg-3 col-md-6">
            <h4 class="text-light mb-4">Quick Links</h4>
            <a class="btn btn-link" href="{{route('contact')}}">Contact Us</a>
            
          </div>
          <div class="col-lg-3 col-md-6">
            <h4 class="text-light mb-4">Newsletter</h4>
           
            <div class="position-relative mx-auto" style="max-width: 400px">
              <input
                class="form-control bg-transparent w-100 py-3 ps-4 pe-5"
                type="text"
                placeholder="Your email"
              />
              <button
                type="button"
                class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2"
              >
                SignUp
              </button>
            </div>
          </div>
        </div>
      </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"
      ><i class="bi bi-arrow-up"></i
    ></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontend/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('frontend/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('frontend/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('frontend/js/main.js')}}"></script>
  </body>
</html>