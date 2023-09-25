
<section>
    <div class="questionnaire thank">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 single-col">
                    <div class="thanks-part">

                        <h5> {{$question_title->title}}</h5>
                        <p>{{$question_title->short_info}}</p>

                        <form method="post" action="{{url('saveanswer')}}">
                            @csrf
                            <fieldset>
                                @forelse($questions as $question)
                                    <div class="form-group">
                                        <label for="disabledTextInput"> {{$question->question}} </label>
                                        <input type="text" name="answer[{{$question->id}}]" id="ask1" class="form-control" required placeholder="اكتب اجابتك هنا" >

                                    </div>
                                @empty
                                    <div class="form-group">
                                        <label for="disabledTextInput"> هل قمت بالتسجيل في التدريب ؟ </label>
                                        <input type="text" id="ask1" class="form-control" placeholder="اكتب اجابتك هنا" >
                                    </div>
                                    <div class="form-group">
                                        <label for="disabledTextInput"> هل قمت بالتسجيل في التدريب ؟  </label>
                                        <input type="email" id="ask2" class="form-control" placeholder="اكتب اجابتك هنا" >
                                    </div>
                                    <div class="form-group">
                                        <label for="disabledTextInput"> هل قمت بالتسجيل في التدريب ؟</label>
                                        <input type="text" id="ask3" class="form-control" placeholder="اكتب اجابتك هنا">
                                    </div>
                                @endforelse
                                    <input type="hidden" name="question_id" value="{{$question->id}}">
                                    <input type="hidden" name="client_id" value="{{$id}}">

                                <button type="submit" class="btn btn-primary">ارسل الرد </button>
                            </fieldset>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
