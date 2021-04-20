<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="../css/theme.min.css">

  <title>My Domain</title>
</head>
<body>
    <!--header -->
    <header class="bg-dark pt-9 pb-11 d-none d-md-block">
        <div class="container-md">
          <div class="row align-items-center">
            <div class="col">

              <!-- Heading -->
              <h1 class="font-weight-bold text-white mb-2">
                My Domain
              </h1>

              <!-- Text -->
              <p class="font-size-lg text-white-75 mb-0">
                 for <a class="text-reset" href="mailto:dhgamache@gmail.com">dhgamache@gmail.com</a>
              </p>

            </div>
            <div class="col-auto">

              <!-- Button -->
              <button class="btn btn-sm btn-gray-300-20 text-white">
                Log Out
              </button>

            </div>
          </div> <!-- / .row -->
        </div> <!-- / .container -->
      </header>
      <!-- end header -->

      <!-- main -->
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
                      <li class="list-item">
                        <a class="list-link text-reset" href="#">
                          General
                        </a>
                      </li>
                      <li class="list-item active">
                        <a class="list-link text-reset" href="{{ route('mydomain') }}">
                          My Domains
                        </a>
                      </li>
                      <li class="list-item">
                        <a class="list-link text-reset" href="#">
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
                      <li class="list-item">
                        <a class="list-link text-reset" href="{{ route('setting') }}">
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
              <div class="card card-bleed shadow-light-lg mb-6">
                <div class="card-header">

                  <!-- Heading -->
                  {{-- <button type="submit" class="btn btn-primary">ADD Domain</button> --}}

                <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                        ADD Domain
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">ADD NEW DOMAIN / HOST ACCOUNT</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row">
                                      <div class="col-12 col-md-6">

                                        <!-- First name -->
                                        <div class="form-label-group">
                                          <input type="text" class="form-control form-control-flush" id="registrationFirstNameModal" placeholder="Name of custumer">
                                        </div>

                                      </div>
                                      <div class="col-12 col-md-6">

                                        <!-- Last name -->
                                        <div class="form-label-group">
                                          <input type="text" class="form-control form-control-flush" id="registrationLastNameModal" placeholder="Name of Host">
                                        </div>

                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-12 col-md-6">

                                        <!-- Amount -->
                                        <div class="form-label-group">
                                            <select id="inputState" class="form-control">
                                                <option selected>Amount...</option>
                                                <option>10 000 XAF</option>
                                                <option>15 000 XAF</option>
                                                <option>25 000 XAF</option>
                                                <option>30 000 XAF</option>
                                                <option>50 000 XAF</option>
                                            </select>
                                        </div>

                                      </div>
                                      <div class="col-12 col-md-6">

                                        <!-- ServiceS -->
                                        <div class="form-label-group">
                                            <select id="inputState" class="form-control">
                                                <option selected>Services</option>
                                                <option>REG</option>
                                                <option>REN</option>
                                                <option>SMS</option>
                                            </select>
                                        </div>

                                      </div>
                                    </div>

                                    <!-- Payment Method -->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <select id="inputState" class="form-control">
                                                    <option selected>Payment Method</option>
                                                    <option>CASH</option>
                                                    <option>MTN Money</option>
                                                    <option>Orange Money</option>
                                                    <option>Western Union</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-12">

                                        <!-- Submit -->
                                        <button class="btn btn-block btn-primary mt-3 lift">
                                          SAVE
                                        </button>

                                      </div>
                                    </div>
                                  </form>
                            </div>
                            {{-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Understood</button>
                            </div> --}}
                        </div>
                        </div>
                    </div>

                </div>
                {{-- <div class="card-body"> --}}
                <div class="table-responsive-md"> 
                  <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Name of Host</th>
                        <th scope="col">Name of Customers</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Services</th>
                        <th scope="col">Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>REG</td>
                        <td>12-01-2021</td>

                      </tr>
                      <tr>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>REG</td>
                        <td>12-01-2021</td>
                      </tr>
                      <tr>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>REG</td>
                        <td>12-01-2021</td>
                      </tr>
                    </tbody>
                  </table>

                </div>
                <div class="card-footer py-4">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end mb-0">
                          <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                              <span aria-hidden="true">&laquo;</span>
                            </a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                              <span aria-hidden="true">&raquo;</span>
                            </a>
                          </li>
                        </ul>
                      </nav>
                  </div>
              </div>



              <!-- Text -->
              <p class="text-center mb-0">
                <small class="text-muted">If you no longer want to use Landkit, you can <a class="text-danger" href="#!">delete your account</a>.</small>
              </p>

            </div>
          </div> <!-- / .row -->
        </div> <!-- / .container -->
      </main>
      <!-- end main -->

      <!-- Footer -->
      <!-- End Footer -->

      <script src="../js/theme.min.js"></script>
      {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> --}}
</body>
</html>
