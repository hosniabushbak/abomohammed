
<section>
    <div class="questionnaire thank">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 single-col">
                    <div class="thanks-part">

                        <h5> {{$client->name}}</h5>
                        <p>أهلا بك يرجى إضافة رقم الهاتف لتسهيل التواصل معك </p>

                        <form method="post" action="{{url('updatePhone')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$client->id}}">

                            <fieldset>
                                <div class="form-group">
                                    <label for="disabledTextInput">{{$headSection->mobile }}</label>
                                    <input type="tel" id="phone" name="phone" class="form-control" placeholder="{{$headSection->mobile_text }}">
                                </div>
                                <button type="submit" class="btn btn-primary"> {{$headSection->button }}</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
