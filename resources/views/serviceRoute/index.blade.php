@extends('layout')
@section('serviceRoute')



    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Service Route</h4>
                    </div>

                    <div class="container-fluid">
                        <form class="container">
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <span class="input-group-addon">
                            <i class="now-ui-icons ui-1_zoom-bold"></i>
                        </span>
                            </div>
                        </form>
                     </div>


                    <div class="container-fluid">
                    <div class="card-header">

                        <table class="table">
                            <tbody>
                            <tr>
                                <th scope="row">Service Number</th>
                                <td>BB1222545</td>
                            </tr>
                            <tr>
                                <th scope="row">Customer Name</th>
                                <td>HUSSAIN RASHEED ABDUL GAFOOR</td>
                            </tr>
                            <tr>
                                <th scope="row">Customer Address</th>
                                <td>Malé_Malé City_Maafannu_Dhon Umaruge Dhekunu Bai</td>
                            </tr>
                            </tbody>
                        </table>


                    </div>
                    </div>


                            <div class="container-fluid">
                            <table class="table table-striped">
                                <thead class="text-primary fs-16">
                                    <th><strong>Device Type</strong></th>
                                    <th><strong>Device Name</strong></th>
                                    <th><strong>Port Name</strong></th>
{{--                                    <th class="text-right">Actions</th>--}}
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>FIDP</td>
                                        <td>FIDP|320-13A|Male'_Henveiru_HSahara</td>
                                        <td>A/3</td>
{{--                                        <td class="td-actions text-right">--}}
{{--                                            <button type="button" rel="tooltip" class="btn btn-success">--}}
{{--                                                <i class="now-ui-icons ui-2_settings-90"></i>--}}
{{--                                            </button>--}}
{{--                                        </td>--}}
                                    </tr>
                                    <tr>
                                        <td>FDP</td>
                                        <td>FIDP|320-13|Male'_Henveiru_HSahara</td>
                                        <td>O/3</td>
                                    </tr>
                                    <tr>
                                        <td>FDP-SPLITTER</td>
                                        <td>SPLITTER-1|320-13|Male'_Henveiru_HSahara</td>
                                        <td>OUT-3</td>
                                    </tr>
                                    <tr>
                                        <td>FDP-SPLITTER</td>
                                        <td>SPLITTER-1|320-13|Male'_Henveiru_HSahara</td>
                                        <td>IN-1</td>
                                    </tr>
                                    <tr>
                                        <td>FDP</td>
                                        <td>FDP|320-13|Male'_Henveiru_HSahara</td>
                                        <td>P/3</td>
                                    </tr>
                                    <tr>
                                        <td>FCAB</td>
                                        <td>FCAB|320|Male'_Henveiru_HSahara</td>
                                        <td>N/3</td>
                                    </tr>
                                    <tr>
                                        <td>FCAB-SPLITTER</td>
                                        <td>SPLITTER-X1|320|Male'_Henveiru_HSahara</td>
                                        <td>OUT-3</td>
                                    </tr>
                                    <tr>
                                        <td>FCAB-SPLITTER</td>
                                        <td>SPLITTER-X1|320|Male'_Henveiru_HSahara</td>
                                        <td>IN-1</td>
                                    </tr>
                                    <tr>
                                        <td>FCAB</td>
                                        <td>FCAB|320|Male'_Henveiru_HSahara</td>
                                        <td>A/3</td>
                                    </tr>
                                    <tr>
                                        <td>ODF</td>
                                        <td>RACK-1|ODF-3|Male'_Henveiru_HSahara</td>
                                        <td>E/3</td>
                                    </tr>
                                    <tr>
                                        <td>OLT</td>
                                        <td>OLT|H.SAHARA-OLT-1|Male'_Henveiru_HSahara</td>
                                        <td>0/15/1</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </body>
        </html>


@endsection
