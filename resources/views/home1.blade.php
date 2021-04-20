<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Setting</title>

    <link rel="stylesheet" href="../css/theme.min.css">
</head>
<body>
    
        <!-- HEADER
        ================================================== -->
        <header class="bg-dark pt-9 pb-11 d-none d-md-block">
          <div class="container-md">
            <div class="row align-items-center">
              <div class="col">
    
                <!-- Heading -->
                <h1 class="font-weight-bold text-white mb-2">
                  Home
                </h1>
    
                <!-- Text -->
                <p class="font-size-lg text-white-75 mb-0">
                    for <a class="text-reset" href="mailto:dhgamache@gmail.com">dhgamache@gmail.com</a>
                </p>
    
              </div>
              <div class="col-auto">
    
                <!-- Button -->
                <button class="btn btn-sm btn-gray-300-20">
                  Log Out
                </button>
    
              </div>
            </div> <!-- / .row -->
          </div> <!-- / .container -->
        </header>
    
        <!-- MAIN
        ================================================== -->
        <main class="pb-8 pb-md-11 mt-md-n6">
          <div class="container-md">
            <div class="row">
                <div class="col-12 col-md-3">
  
                    <!-- Card -->
                    <div class="card card-bleed border-bottom border-bottom-md-0 shadow-light-lg">
        
                      <!-- Collapse -->
                      <div class="collapse d-md-block" id="sidenavCollapse">
                        <div class="card-body">
        
                          <!-- Heading -->
                          <h6 class="font-weight-bold text-uppercase mb-3">
                            Account
                          </h6>
        
                          <!-- List -->
                          <ul class="card-list list text-gray-700 mb-6">
                            <li class="list-item active">
                              <a class="list-link text-reset" href="{{ route('home') }}">
                                General
                              </a>
                            </li>
                            <li class="list-item">
                              <a class="list-link text-reset" href="account-security.html">
                                My Domains
                              </a>
                            </li>
                            <li class="list-item">
                              <a class="list-link text-reset" href="account-notifications.html">
                                All Domains
                              </a>
                            </li>
                          </ul>
        
                          <!-- Heading -->
                          <h6 class="font-weight-bold text-uppercase mb-3">
                            Settings
                          </h6>
        
                          <!-- List -->
                          <ul class="card-list list text-gray-700 mb-0">
                            <li class="list-item ">
                              <a class="list-link text-reset" href="billing-plans-and-payment.html">
                                  Settings
                              </a>
                            </li>
                          </ul>
        
                        </div>
                      </div>
        
                    </div>
        
                  </div>
              <div class="col-12 col-md-9">
    
                <!-- Card -->
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0 shadow-light-lg">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Traffic</h5>
                                        <span class="h2 font-weight-bold mb-0">350,897</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fas fa-chart-bar"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0 shadow-light-lg">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                                        <span class="h2 font-weight-bold mb-0">2,356</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                            <i class="fas fa-chart-pie"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                                    <span class="text-nowrap">Since last week</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
    
              </div>
            </div> <!-- / .row -->
          </div> <!-- / .container -->
        </main>
    
        
    
<!-- footer -->
<script src="../js/theme.min.js"></script> 
<!-- end footer -->
</body>
</html>