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

                    <form class="form-inline" action="/serviceRoute" method="get">
                        <div class="form-group mx-sm-3">
                            <input class="form-control" name='search' type="search" placeholder="Search">
                        </div>

                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>


                    <div class="container-fluid">
                        <div class="card-header">

                            <table class="table">
                                <tbody>
                                <tr>
                                    <th scope="row">Service Number</th>
                                    <td>

                                        @if (isset($service))

                                            {{$service->serviceNumber}}

                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Customer Name</th>
                                    <td>
                                        @if (isset($service))

                                            {{$service->customerName}}

                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Customer Address</th>
                                    <td>

                                        @if (isset($service))

                                            {{$service->customerAddress}}

                                        @endif

                                    </td>
                                </tr>
                                </tbody>
                            </table>


                        </div>
                    </div>



                    <div class="container-fluid">
                        <table class="table table-striped">
                            <thead class="text-primary fs-16">
{{--                            <th><strong>Device Type</strong></th>--}}
                            <th><strong>Device Name</strong></th>
                            <th><strong>Port Name</strong></th>

                            </thead>
                            @if (isset($service))
                            <tbody>
                            <tr>

{{--                                <td>FIDP</td>--}}
                                <td>
                                    @if(isset($service->fidpsinterface[0]))
                                        {{$service->fidpsinterface[0]->fidps->fidp_device_id}}
                                    @else
                                    @endif
                                </td>
                                <td>
                                    @if(isset($service->fidpsinterface[0]))
                                        {{$service->fidpsinterface[0]->port}}
                                    @else
                                    @endif
                                </td>
                            </tr>
                            <tr>
{{--                                <td>FDP</td>--}}
                                <td>
                                    @if(isset($service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps))
                                        {{$service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->fdp_device_id}}
                                    @else

                                    @endif
                                </td>
                                <td>
                                    @if(isset($service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface))
                                        {{$service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->port}}
                                    @else

                                    @endif
                                </td>
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>FDP-SPLITTER</td>--}}
{{--                                <td>SPLITTER-1|320-13|Male'_Henveiru_HSahara</td>--}}
{{--                                <td>OUT-3</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>FDP-SPLITTER</td>--}}
{{--                                <td>SPLITTER-1|320-13|Male'_Henveiru_HSahara</td>--}}
{{--                                <td>IN-1</td>--}}
{{--                            </tr>--}}
                            <tr>
{{--                                <td>FDP</td>--}}
                                <td>
                                    @if(isset($service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps))
                                        {{$service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->fdp_device_id}}
                                    @else

                                    @endif
                                </td>
                                <td>
                                    @if(isset($service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]))
                                        {{$service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]->port}}
                                    @else

                                    @endif
                                </td>
                            </tr>
                            <tr>
{{--                                <td>FCAB</td>--}}
                                <td>
                                    @if(isset($service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]->fcabinterface->fcabs))
                                        {{$service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]->fcabinterface->fcabs->fcab_device_id}}
                                    @else

                                    @endif</td>
                                </td>
                                <td>
                                    @if(isset($service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]->fcabinterface))
                                        {{$service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]->fcabinterface->port}}
                                    @else

                                    @endif</td>

                                </td>
                            </tr>
                            <tr>
{{--                                <td>FCAB-SPLITTER</td>--}}
                                <td>
                                    @if(isset($service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]->fcabinterface->fcabs->interface[0]->splitterinterface->splitter))
                                        {{$service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]->fcabinterface->fcabs->interface[0]->splitterinterface->splitter->fcab_splitter_device_id}}
                                    @else

                                    @endif</td>

                                </td>
                                <td>
                                    @if(isset($service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]->fcabinterface->fcabs->interface[2]->splitterinterface))
                                        {{$service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]->fcabinterface->fcabs->interface[2]->splitterinterface->port}}
                                    @else

                                    @endif</td>

                                </td>
                            </tr>
                            <tr>
{{--                                <td>FCAB-SPLITTER</td>--}}
                                <td>
                                    @if(isset($service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]->fcabinterface->fcabs->interface[0]->splitterinterface->splitter))
                                        {{$service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]->fcabinterface->fcabs->interface[0]->splitterinterface->splitter->fcab_splitter_device_id}}
                                    @else

                                    @endif</td>

                                </td>
                                <td>
                                    @if(isset($service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]->fcabinterface->fcabs->interface[0]->splitterinterface))
                                        {{$service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]->fcabinterface->fcabs->interface[0]->splitterinterface->port}}
                                    @else

                                    @endif</td>

                                </td>
                            </tr>
                            <tr>
{{--                                <td>FCAB</td>--}}
                                <td>
                                    @if(isset($service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]->fcabinterface->fcabs))
                                        {{$service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]->fcabinterface->fcabs->fcab_device_id}}
                                    @else

                                    @endif</td>
                                </td>
                                <td>
                                    @if(isset($service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]->fcabinterface->fcabs->interface[0]))
                                        {{$service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]->fcabinterface->fcabs->interface[0]->port}}
                                    @else

                                    @endif
                                </td>
                                </td></td>
                            </tr>
                            <tr>
{{--                                <td>ODF</td>--}}
                                <td>
                                    @if(isset($service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]->fcabinterface->fcabs->interface[0]->odfinterface->odfrack))
                                        {{$service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]->fcabinterface->fcabs->interface[0]->odfinterface->odfrack->odf_device_id}}
                                    @else

                                    @endif
                                </td>
                                <td>
                                    @if(isset($service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]->fcabinterface->fcabs->interface[0]->odfinterface->odfrack->interface[0]))
                                        ODF- {{$service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]->fcabinterface->fcabs->interface[0]->odfinterface->odfrack->interface[0]->odf_no}}
                                        |PORT-{{$service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]->fcabinterface->fcabs->interface[0]->odfinterface->odfrack->interface[0]->odf_port}}
                                    @else

                                    @endif
                                </td>
                            </tr>
                            <tr>
{{--                                <td>OLT</td>--}}
                                <td>
                                    @if(isset($service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]->fcabinterface->fcabs->interface[0]->odfinterface->oltinterface->olt))
                                        {{$service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]->fcabinterface->fcabs->interface[0]->odfinterface->oltinterface->olt->olt_device_id}}
                                    @else

                                    @endif
                                </td>
                                <td>
                                    @if(isset($service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]->fcabinterface->fcabs->interface[0]->odfinterface->oltinterface))
                                       {{$service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]->fcabinterface->fcabs->interface[0]->odfinterface->oltinterface->olt_frame}}/{{$service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]->fcabinterface->fcabs->interface[0]->odfinterface->oltinterface->olt_card}}/{{$service->fidpsinterface[0]->fidps->fidpsinterface[0]->fdpsinterface->fdps->interface[0]->fcabinterface->fcabs->interface[0]->odfinterface->oltinterface->olt_port}}


                                    @else

                                    @endif
                                </td>
                            </tr>
                            </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>


        </body>
        </html>


@endsection
