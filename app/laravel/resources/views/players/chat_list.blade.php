@extends('layouts.layout')
@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <nav class="card mt-5" style="height:90vh">
                <div class="card-header">messageの来ているチーム</div>
                <div class="card-body bg-success">
                    <ul class="text-left">
                        @foreach($new_messages as $new_message) 
                        <li>
                            <a style="color:black" href="{{ route('chat', ['id'=>$new_message->id]) }}">{{ $new_message->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection