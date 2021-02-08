@extends("layout")
@section("fidps.show")



        <div class="card">


            @foreach($fidps as $fidp)
                <h2>{{$fidp->id}}</h2>


        </div>



@endsection
