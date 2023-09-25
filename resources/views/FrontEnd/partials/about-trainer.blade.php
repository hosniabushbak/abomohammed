<section>
    <div class="about-trainer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="trainer-name">
                        {{$trainerSection->title}}
                    </h2>

                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4 col-lg-5">
                    <div  class="trainer-img image wow slideInRight" data-wow-offset="12">
                        <img src="{{$trainerSection->image->getUrl('')}}" width="100%">
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-8 col-lg-7">
                    <div class="trainer-info">
                        <h1>
                            {{$trainerSection->short_info}}
                        </h1>
                        <h3>مستشار معتمد في معهد بوب بروكتور</h3>
                        <h4>مستشار الدائرة الداخلية </h4>

                        <p>
                            {{$trainerSection->text}}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</section>
