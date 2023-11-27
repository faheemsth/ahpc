@extends('site.sitelayout.app')
<style>
    .dis-heading{
        color: rgb(5, 186, 65) ; font-family: sans-serif; font-size: 3rem;
    }

.list-item {
            padding: 6px 0px;
            font-size: 14px;
            font-family: sans-serif;
        }

        .dis-border {
            border: 2px solid rgb(5, 186, 65);
            width: 60px;
            margin: auto;
        }
    @media only screen  and (min-device-width : 320px)  and (max-device-width : 480px) {
        .dis-heading{
            font-size: 2rem
        }
        .sub-head{
            font-size: 1.3rem;
        }
        .list-item{
            font-size: 16px;
        }
    }



</style>
@section('content')
<div class="container my-5 ">
    <h1 class="dis-heading text-center my-3 fw-bold  " >Our Disciplines</h1>
    <div class="dis-border "></div>
    <div class="dis-list ">
        <h2 class="sub-head my-4" >List of disciplines categorized as allied health professionals:</h2>
        <ul class="list ">
            @foreach($Disciplines as $discipline)
                <li class=" list-item ">{{$discipline->discipline_name}}</li>
            @endforeach

        </ul>
    </div>
</div>

@endsection
