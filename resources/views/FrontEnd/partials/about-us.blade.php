<section>
    <div class="about-us">
        <div class="container">
            <div class="row top" >
                <div class="col-12 col-sm-12 col-md-7 ">
                    <h2>{{$aboutSection->title}}</h2>
                    <span>{{$aboutSection->short_info}}</span>
                    <p class=""  style="margin-top: 45px;">
                        {{$first_st = Str::of($aboutSection->text)->words(100, '')}} ...
                    </p>

                </div>
                <div class="col-12 col-sm-5">

                    <div  class="image wow slideInLeft" data-wow-offset="8">

                        <img src="{{$aboutSection->image->getUrl('')}}" width="100%">
                    </div>
                </div>

            </div>

            <div class="row down" style="margin-top: 45px">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <p>

                        {{Str::after($aboutSection->text,$first_st)}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
