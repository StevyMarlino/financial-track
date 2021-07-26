 @extends('layouts.dashboard')

 @section('title')
    Prevision
@endsection

@section('heading')
     Prevision
@endsection

@section('content')
<div class="col-12 col-md-12">
    <div class="col-md-6">
        <form action="" name="">
            <input type="month" name="month" id="">
        </form>
    </div>

    <!-- Card -->
    <div class="card card-bleed shadow-light-lg mb-6">
        <div class="text-left mt-2">
            <h1>Mois de janvier 2021</h1>
        </div>

        <div class="table-responsive-md-12" style="width: 99%;padding: 1%;">
            <table id="datatable" class="table table-striped table-bordered" style="width:100% " >
                <thead>
                <tr>
                    <th>Month</th>
                    <th>REGISTER</th>
                    <th>REN</th>
                    <th>SMS</th>
                    <th>TOTAL</th>
                </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>Janvier</td>
                        <td>145 000 Xaf</td>
                        <td>168 000 Xaf</td>
                        <td>16546 XAf</td>
                        <td>1 000 897</td>
                    </tr>

                </tbody>
            </table>

        </div>
    </div>

    <div class="card card-bleed shadow-light-lg mb-6">
        <div class="text-left mt-2">
            <h1>Mois de janvier 2022</h1>
        </div>

        <div class="table-responsive-md-12" style="width: 99%;padding: 1%;">
            <table id="datatable" class="table table-striped table-bordered" style="width:100% " >
                <thead>
                <tr>
                    <th>Month</th>
                    <th>REGISTER</th>
                    <th>REN</th>
                    <th>SMS</th>
                    <th>TOTAL</th>
                </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>Janvier</td>
                        <td>145 000 Xaf</td>
                        <td>168 000 Xaf</td>
                        <td>16546 XAf</td>
                        <td>1 000 897</td>
                    </tr>

                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
