@extends('FrontEnd.layout.app')
    @section('content')
        @include('FrontEnd.partials.thank-section')
        @if($msg->id == 3 || $msg->id == 5)
        @include('FrontEnd.partials.questionnaire')
        @elseif($msg->id == 8)
            @include('FrontEnd.partials.email')

            <!----------------------------------Scripts Files--------------------------------------->
            @include('FrontEnd.partials.script')
        @endif
@endsection

