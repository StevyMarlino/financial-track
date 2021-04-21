@extends('layouts.dashboard')

@section('title')
    My Domain
@endsection

@section('heading')
    My Domain
@endsection

@section('content')

    <div class="col-12 col-md-9">

        <!-- Card -->
        <div class="card card-bleed shadow-light-lg mb-6">
            <div class="card-header">

                <!-- Heading -->

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Register New Domain
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">New Order Domain / Host Account</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                            </div>
                            <div class="modal-body">
                                <!-- Form -->
                                <form>
                                    <div class="row">
                                        <div class="col-12 col-md-6">

                                            <!-- Name of customer-->
                                            <div class="form-group">
                                                <input class="form-control" id="name" type="text" placeholder="Name Of Customer">
                                            </div>

                                        </div>
                                        <div class="col-12 col-md-6">

                                            <!-- Name of Host -->
                                            <div class="form-group">
                                                <input class="form-control" id="lastname" type="text" placeholder="Name Of Host">
                                            </div>

                                        </div>
                                        <div class="col-12 col-md-6">

                                            <!-- Amount -->
                                            <div class="form-group">
                                                <select class="form-control">
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

                                            <!-- Service -->
                                            <div class="form-group">
                                                <input class="form-control" id="phone" type="number" placeholder="Phone Number">
                                            </div>

                                        </div>
                                        <div class="col-12 col-md-6">

                                            <!-- Email -->
                                            <div class="form-group">
                                                <input class="form-control" id="phone" type="number" placeholder="Phone Number">
                                            </div>

                                        </div>
                                        <div class="col-12 col-md-6">

                                            <!-- Email -->
                                            <div class="form-group">
                                                 <input class="form-control" id="phone" type="number" placeholder="Phone Number">
                                            </div>

                                        </div>

                                    </div>
                                </form>                           </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Saves Changes</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

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

    </div>

@endsection
