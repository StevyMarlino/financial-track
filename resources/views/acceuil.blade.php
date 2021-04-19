<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="../css/theme.min.css">

  <title>Genrale</title>
</head>
<body>
    <!--header -->
    <header class="bg-dark pt-9 pb-11 d-none d-md-block">
        <div class="container-md">
          <div class="row align-items-center">
            <div class="col">

              <!-- Heading -->
              <h1 class="font-weight-bold text-white mb-2">
                Account Settings
              </h1>

              <!-- Text -->
              <p class="font-size-lg text-white-75 mb-0">
                Settings for <a class="text-reset" href="mailto:dhgamache@gmail.com">dhgamache@gmail.com</a>
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
                      <li class="list-item active">
                        <a class="list-link text-reset" href="account-general.html">
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
                      <li class="list-item">
                        <a class="list-link text-reset" href="billing-plans-and-payment.html">
                            Settings
                        </a>
                      </li>
                      <li class="list-item">
                        <a class="list-link text-reset" href="billing-users.html">
                          Users
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
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
                    
                </div>
                {{-- <div class="card-body"> --}}
                <div class="table-responsive-md">
  
                  <!-- Form -->
                  {{-- <form>
                    <div class="row">
                      <div class="col-12 col-md-6">
  
                        <!-- Name -->
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input class="form-control" id="name" type="text" placeholder="Full name">
                        </div>
  
                      </div>
                      <div class="col-12 col-md-6">
  
                        <!-- Email -->
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input class="form-control" id="email" type="email" placeholder="name@address.com">
                        </div>
  
                      </div>
                      <div class="col-12">
  
                        <!-- Bio -->
                        <div class="form-group">
                          <label>Bio</label>
                          <div class="ql-toolbar ql-snow"><span class="ql-formats"><button type="button" class="ql-bold"><svg viewBox="0 0 18 18"> <path class="ql-stroke" d="M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z"></path> <path class="ql-stroke" d="M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z"></path> </svg></button><button type="button" class="ql-italic"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="7" x2="13" y1="4" y2="4"></line> <line class="ql-stroke" x1="5" x2="11" y1="14" y2="14"></line> <line class="ql-stroke" x1="8" x2="10" y1="14" y2="4"></line> </svg></button></span><span class="ql-formats"><button type="button" class="ql-link"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="7" x2="11" y1="7" y2="11"></line> <path class="ql-even ql-stroke" d="M8.9,4.577a3.476,3.476,0,0,1,.36,4.679A3.476,3.476,0,0,1,4.577,8.9C3.185,7.5,2.035,6.4,4.217,4.217S7.5,3.185,8.9,4.577Z"></path> <path class="ql-even ql-stroke" d="M13.423,9.1a3.476,3.476,0,0,0-4.679-.36,3.476,3.476,0,0,0,.36,4.679c1.392,1.392,2.5,2.542,4.679.36S14.815,10.5,13.423,9.1Z"></path> </svg></button><button type="button" class="ql-blockquote"><svg viewBox="0 0 18 18"> <rect class="ql-fill ql-stroke" height="3" width="3" x="4" y="5"></rect> <rect class="ql-fill ql-stroke" height="3" width="3" x="11" y="5"></rect> <path class="ql-even ql-fill ql-stroke" d="M7,8c0,4.031-3,5-3,5"></path> <path class="ql-even ql-fill ql-stroke" d="M14,8c0,4.031-3,5-3,5"></path> </svg></button><button type="button" class="ql-code"><svg viewBox="0 0 18 18"> <polyline class="ql-even ql-stroke" points="5 7 3 9 5 11"></polyline> <polyline class="ql-even ql-stroke" points="13 7 15 9 13 11"></polyline> <line class="ql-stroke" x1="10" x2="8" y1="5" y2="13"></line> </svg></button><button type="button" class="ql-image"><svg viewBox="0 0 18 18"> <rect class="ql-stroke" height="10" width="12" x="3" y="4"></rect> <circle class="ql-fill" cx="6" cy="7" r="1"></circle> <polyline class="ql-even ql-fill" points="5 12 5 11 7 9 8 10 11 7 13 9 13 12 5 12"></polyline> </svg></button></span><span class="ql-formats"><button type="button" class="ql-list" value="ordered"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="7" x2="15" y1="4" y2="4"></line> <line class="ql-stroke" x1="7" x2="15" y1="9" y2="9"></line> <line class="ql-stroke" x1="7" x2="15" y1="14" y2="14"></line> <line class="ql-stroke ql-thin" x1="2.5" x2="4.5" y1="5.5" y2="5.5"></line> <path class="ql-fill" d="M3.5,6A0.5,0.5,0,0,1,3,5.5V3.085l-0.276.138A0.5,0.5,0,0,1,2.053,3c-0.124-.247-0.023-0.324.224-0.447l1-.5A0.5,0.5,0,0,1,4,2.5v3A0.5,0.5,0,0,1,3.5,6Z"></path> <path class="ql-stroke ql-thin" d="M4.5,10.5h-2c0-.234,1.85-1.076,1.85-2.234A0.959,0.959,0,0,0,2.5,8.156"></path> <path class="ql-stroke ql-thin" d="M2.5,14.846a0.959,0.959,0,0,0,1.85-.109A0.7,0.7,0,0,0,3.75,14a0.688,0.688,0,0,0,.6-0.736,0.959,0.959,0,0,0-1.85-.109"></path> </svg></button><button type="button" class="ql-list" value="bullet"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="6" x2="15" y1="4" y2="4"></line> <line class="ql-stroke" x1="6" x2="15" y1="9" y2="9"></line> <line class="ql-stroke" x1="6" x2="15" y1="14" y2="14"></line> <line class="ql-stroke" x1="3" x2="3" y1="4" y2="4"></line> <line class="ql-stroke" x1="3" x2="3" y1="9" y2="9"></line> <line class="ql-stroke" x1="3" x2="3" y1="14" y2="14"></line> </svg></button></span></div><div data-quill="{&quot;placeholder&quot;: &quot;Quill WYSIWYG&quot;}" class="ql-container ql-snow"><div class="ql-editor ql-blank" data-gramm="false" contenteditable="true" data-placeholder="Quill WYSIWYG"><p><br></p></div><div class="ql-clipboard" contenteditable="true" tabindex="-1"></div><div class="ql-tooltip ql-hidden"><a class="ql-preview" rel="noopener noreferrer" target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div></div>
                        </div>
  
                      </div>
                      <div class="col-12 col-md-auto">
  
                        <!-- Button -->
                        <button class="btn btn-block btn-primary" type="submit">
                          Save changes
                        </button>
  
                      </div>
                    </div>
                  </form> --}}
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
