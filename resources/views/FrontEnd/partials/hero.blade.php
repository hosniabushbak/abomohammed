<section>

    <div class="hero-Section" @if($headSection->image) style="background-image:url('{{$headSection->image->getUrl('')}}')" @endif>
        <div class="overlay"></div>
        <div class="hero-content">
        <nav class="navbar navbar-light ">
            <a class="navbar-brand" href="#">
                <img src="{{$SiteSetting->logo->getUrl('')}}" alt="our-logo">
            </a>
        </nav>

        <div class="main-title">
            <p>{{$headSection->welcome_text}}</p>
            <h1><b>{{$headSection->head_text}}</b></h1>
            <h2>{{$headSection->sup_head}}</h2>
            <h1></h1>
        </div>
        <ul class="course-deatials">
            <li>
                <svg id="calendar-Bold" xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                     viewBox="0 0 36 36">
                    <rect id="Path" width="36" height="36" fill="rgba(255,255,255,0)" />
                    <path id="calendar-Bold_1_"
                          d="M419.5,1965.5a1.5,1.5,0,0,0-3,0h-9a1.5,1.5,0,0,0-3,0,7.509,7.509,0,0,0-7.5,7.5v13.5a7.509,7.509,0,0,0,7.5,7.5h15a7.509,7.509,0,0,0,7.5-7.5V1973A7.509,7.509,0,0,0,419.5,1965.5Zm-15,3v1.5a1.5,1.5,0,0,0,3,0v-1.5h9v1.5a1.5,1.5,0,0,0,3,0v-1.5a4.506,4.506,0,0,1,4.5,4.5H400A4.506,4.506,0,0,1,404.5,1968.5Zm15,22.5h-15a4.506,4.506,0,0,1-4.5-4.5V1976h24v10.5A4.506,4.506,0,0,1,419.5,1991Zm0-10.5a1.5,1.5,0,1,1-1.5-1.5A1.5,1.5,0,0,1,419.5,1980.5Zm-6,0a1.5,1.5,0,1,1-1.5-1.5A1.5,1.5,0,0,1,413.5,1980.5Zm-6,0a1.5,1.5,0,1,1-1.5-1.5A1.5,1.5,0,0,1,407.5,1980.5Zm12,6a1.5,1.5,0,1,1-1.5-1.5A1.5,1.5,0,0,1,419.5,1986.5Zm-6,0a1.5,1.5,0,1,1-1.5-1.5A1.5,1.5,0,0,1,413.5,1986.5Zm-6,0a1.5,1.5,0,1,1-1.5-1.5A1.5,1.5,0,0,1,407.5,1986.5Z"
                          transform="translate(-394 -1961)" fill="#fff" />
                </svg>
                <span>
                    {{\Carbon::parse($headSection->start_date)->locale('ar')->translatedFormat('l j F')}}
                    -
                     {{\Carbon::parse($headSection->end_date)->locale('ar')->translatedFormat('l j F')}}
                </span>

            </li>

            <li>
                <svg id="clock-Bold" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36">
                    <rect id="Path" width="36" height="36" fill="rgba(255,255,255,0)" />
                    <path id="clock-Bold_1_"
                          d="M316,1964a15,15,0,1,0,15,15A15.017,15.017,0,0,0,316,1964Zm0,27a12,12,0,1,1,12-12A12.014,12.014,0,0,1,316,1991Zm7.5-12a1.5,1.5,0,0,1-1.5,1.5h-6a1.5,1.5,0,0,1-1.5-1.5v-7.5a1.5,1.5,0,0,1,3,0v6H322A1.5,1.5,0,0,1,323.5,1979Z"
                          transform="translate(-298 -1961)" fill="#fff" />
                </svg>

                <span>من الساعة   {{\Carbon::parse($headSection->start_date)->locale('ar')->translatedFormat('H:i A')}} </span>
            </li>
            <li>
                <svg id="clock-Bold" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36">
                    <rect id="Path" width="36" height="36" fill="rgba(255,255,255,0)" />
                    <path id="clock-Bold_1_"
                          d="M316,1964a15,15,0,1,0,15,15A15.017,15.017,0,0,0,316,1964Zm0,27a12,12,0,1,1,12-12A12.014,12.014,0,0,1,316,1991Z"
                          transform="translate(-298 -1961)" fill="#fff" />
                    <path id="Path_139" data-name="Path 139"
                          d="M33.1,40.316c-.011.56-.46.749-.9.439-.811-.568-1.617-1.144-2.426-1.715,0,.264,0,.887,0,1.157a.664.664,0,0,1-.762.747H22.429a2.19,2.19,0,0,1-2.34-2.281V34.371c0-.509.242-.747.76-.747,1.778.034,4.884,0,6.626,0a2.169,2.169,0,0,1,2.278,1.9c.817-.577,1.631-1.158,2.451-1.732.378-.274.876-.186.9.44C33.106,36.2,33.112,38.348,33.1,40.316Z"
                          transform="translate(-9.089 -19.624)" fill="#f1f1f1" />
                </svg>

                <span>{{$headSection->place}}</span>
            </li>
        </ul>
        @if(\Carbon::now()->format('m/d/Y H:m:i') >= \Carbon::parse($headSection->start_date)->format('m/d/Y H:m:i'))
            <div  class="course-start">
                <p>
                   {{$thecorseisstart->title}}
                </p>
            </div>
        @else
            <div class="counter-date">
                <div id="countdown">
                    <ul>
                        <li><span id="seconds" class="wow slideInRight" data-wow-offset="2"  ></span>Seconds</li>
                        <li><span id="minutes" class="wow slideInRight" data-wow-offset="4"  ></span>Minutes</li>
                        <li><span id="hours"class="wow slideInRight" data-wow-offset="6"  ></span>Hours</li>
                        <li><span id="days" class="wow slideInRight" data-wow-offset="8" data-start="{{\Carbon::parse($headSection->start_date)->locale('ar')->translatedFormat('m/d/Y H:m:i')}}" day-start="{{\Carbon::parse($headSection->start_date)->locale('ar')->translatedFormat('m/d')}}" ></span>days</li>
                    </ul>
                </div>
                <div id="content" class="emoji">
                    <span>0</span>
                    <span>0</span>
                    <span>0</span>
                    <span>0</span>
                </div>
            </div>
        @endif
            <div class="main-title">
                <h3>{{$headSection->sent_text}}</h3>
                <h1></h1>
            </div>
        <div class="rjestration-form">
            <div class="container">
                @if (count($errors) > 0)
                    <div class = "alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form id="formid" action="{{url('save')}}" method="post">
                    @csrf
                    <fieldset>
                        <div class="form-group">
                            <label for="disabledTextInput">{{$headSection->name }}</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="{{$headSection->name_text }}" required>
                            @if($userid != null)
                                <input type="hidden" name="user_id" value="{{$userid}}">
                            @endif

                            @if($providerid != null)
                                <input type="hidden" name="provider_id" value="{{$providerid}}">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="disabledTextInput"> {{$headSection->email }}</label>
                            <input type="email" id="mail" name="email" class="form-control" placeholder="{{$headSection->email_text }}" required>
                        </div>
                        <div class="form-group">
                            <label for="disabledTextInput">{{$headSection->mobile }}</label>
                            <input type="tel" id="phone" name="phone" class="form-control" placeholder="{{$headSection->mobile_text }}">
                        </div>
                        <div class="form-group">
                            <label for="disabledTextInput">
                                {{$headSection->note}}
                            </label>
                            <input type="text" name="note" id="message" class="form-control" placeholder="{{$headSection->note_text }}">
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <input type="checkbox" id="mailing_list" name="mailing_list" checked value="true" style="    height: 21px;--}}
{{--    width: 26px;">--}}
{{--                            <label for="mailing_list">أوافق على الشروط والأحكام وسياسة الخصوصية</label><br>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <input type="checkbox" id="mailing_list" name="mailing_list" checked value="true" style="    height: 21px;--}}
{{--    width: 26px;">--}}
{{--                            <label for="mailing_list">أوافق على تلقي رسائل التسويق الإلكترونية والعروض الخاصة</label><br>--}}
{{--                        </div>--}}
                        {!! htmlFormSnippet() !!}
                        <button type="submit" class="btn btn-primary"> {{$headSection->button }}</button>
                    </fieldset>

                </form>
            </div>
        </div>
        </div>
    </div>
</section>
