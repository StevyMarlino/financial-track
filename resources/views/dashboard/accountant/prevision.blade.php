@extends('layouts.dashboard')

@section('title')
   Prevision
@endsection

@section('heading')
    Prevision
@endsection

@section('content')
<div class="col-12 col-md-12">
   <div class="col-md-3">
       <form action="" name="" style="display: flex;
    margin-bottom: 35px">
           <input type="month" class="form-control" name="date" id="" style="margin-right: 6px;">
           <button class="btn btn-info btn-small">Submit</button>
       </form>
   </div>

   <!-- Card -->
   <div class="card card-bleed shadow-light-lg mb-6">

            <div class="text-left mt-2">
                <h1>   {{ isset($prevision['date']) ? ' Mois De '. $prevision['date']->format('F Y') : " " }} </h1>
            </div>

       <div class="table-responsive-md-12" style="width: 99%;padding: 2%;">
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
                    @if(isset($prevision['date']))

                    <tr>
                        <td>{{ $prevision['date']->format('F') }}</td>
                        <td>{{ $prevision["totalRegistration"] }} XAF</td>
                        <td>{{ $prevision["totalRenewal"] }} XAF</td>
                        <td>0 XAF</td>
                        <td>{{ $prevision["sum"] }} XAF</td>
                    </tr>

                    @else
                    <tr>
                        <td> No data to display </td>
                    </tr>

                    @endif
               </tbody>
           </table>

       </div>
   </div>


   <div class="card card-bleed shadow-light-lg mb-6" style="width: 99%;padding: 1%;">
       <div class="text-left mt-2">
        <h1>   {{ isset($prevision['date']) ? ' Mois De '. $prevision['date']->format('F') .' for Next Year' : " " }} </h1>
       </div>

       <div class="table-responsive-md-6" style="width: 99%;padding: 1%;">
           <table id="datatable" class="table table-striped table-bordered" style="width:100% " >
               <thead>
               <tr>
                   <th>Month</th>
                   <th>REN</th>
                   <th>TOTAL</th>
               </tr>
               </thead>
               <tbody>
                 @if(isset($prevision['date']))

                   <tr>
                       <td>{{ $prevision['date']->format('F') }}</td>
                       <td>{{ $prevision["nextYearRenewal"] }} XAF</td>
                       <td>{{ $prevision["nextYearRenewal"]  }} XAF</td>
                   </tr>

                   @else
                   <tr>
                       <td> No data to display </td>
                   </tr>

                @endif


               </tbody>
           </table>

       </div>
   </div>

</div>
@endsection
