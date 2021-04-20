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
            {{-- <button type="submit" class="btn btn-primary">ADD Domain</button> --}}
            <!-- Button trigger modal -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                    ADD Domain
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
                     tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">ADD NEW DOMAIN / HOST
                                    ACCOUNT</h5>
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
                                                <input type="text" class="form-control form-control-flush"
                                                       id="registrationFirstNameModal"
                                                       placeholder="Name of custumer">
                                            </div>

                                        </div>
                                        <div class="col-12 col-md-6">

                                            <!-- Last name -->
                                            <div class="form-label-group">
                                                <input type="text" class="form-control form-control-flush"
                                                       id="registrationLastNameModal"
                                                       placeholder="Name of Host">
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


        <!-- Text -->
        <p class="text-center mb-0">
            <small class="text-muted">If you no longer want to use Landkit, you can <a class="text-danger"
                                                                                       href="#!">delete your
                    account</a>.</small>
        </p>

    </div>

@endsection
