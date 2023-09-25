<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div style="text-align:right;direction:rtl;padding:20px">
{{--    <div style="text-align:center"> <img src="{{asset('img_9.png')}}"> </div>--}}
    <div style="text-align:right">

        <h1 style="font-size:30px;margin-top:10px">أهلاً بك {{$details['clientname']}}!</h1>
        <p style="font-size:17px">
            أحب أرحب فيك في هذا الايفنت
            وجودك هنا دليل على رغبتك العالية في التطور ورغبتك في عيش الحياة اللي تستحقها
            حط في بالك انه مافي شي يحصل بالصدفة انت موجود في المكان الصحيح في الوقت المناسب لسبب
            <br>

            تبغى تستفيد قد ما تقدر من هالايفنت المجاني

            <br>

        <br>

        <br>


        <br>
        <p style="font-size:17px">
            خلال {{$details['headsection']->event_days}} أيام من {{$details['headsection']->event_from_day}} {{$details['headsection']->event_to_day}} راح نتكلم عن أفكار جداً قوية في هذا الإيفنت، تبغى تحضر معانا كل يوم الساعة ١١:٠٠ص

        </p><b>انضم لمجموعة الإيفنت الآن</b>
        <br>
        <a style="display: block;
    width: 221px;
    height: 75px;
    text-align: center;
    margin: 30px auto 0;
    background-color: #1D93D2;
    line-height: 75px;
    border-radius: 50px;
    color: #fff;" href="{{$SiteSetting->telegram}}" target="_blank">إنضم الآن  </a>

    </div>
    <div style="text-align:right"><br><b>تأكد تحضر معك:-</b>
        <ul>
            <li style="list-style:none">- قلب متفتح</li>
            <li style="list-style:none">- ورقة</li>
            <li style="list-style:none">- وقلم</li>
        </ul>
        <p>الإيفنت راح يكون مسجل وراح يبقى متاح لمدة اسبوع فلا تشيل هم اذا وقتك ما سمحلك في يوم من الأيام بس حط في بالك
            انك تبغى تخصص وقت الاشياء اللي تبغاها في الحياة!</p>
        <p>مستشار النجاح الخاص فيك راح يكون معاك خلال فترة الإيفنت وراح يحرص انه يقدم لك كل المساعدة اللي تحتاجها</p>
        <p>مستشارك هو:</p><h4 style="text-align:right">{{$details['name']}}</h4>
        <p> للتواصل مع المستشار:</p>
        <a href="https://wa.me/{{$details['advisorsphone']}}">تواصل من خلال الواتس اب</a>

        <p>**ملاحظة: إذا لم تتمكن من التواصل مع المستشار او واجهت أي مشاكل اخرى تواصل معنا على الوتساب مباشرة&nbsp;</p>
    </div>
    <div style="text-align:right"><p>رابط الزوم راح ينزل في المجموعة كل يوم قبل الإيفنت بخمس دقائق </p>
        <p>احرص على الدخول مبكراً لتفادي امتلاء قاعة الزوم </p>
        <p>وراح ننزل أيضاً رابط مشاهدة مباشر على اليوتيوب يمكن مشاركته للجميع</p><b>يمكنك الدخول الى الإيفنت عن طريق
            رابط الزوم التالي: </b>
        <p> Topic: {{$details['headsection']->head_text_ar}}</p>
        <p>
            {!! $details['headsection']->zoom_details !!}
        </p>
        <a style="display: block;
    width: 221px;
    height: 75px;
    text-align: center;
    margin: 30px auto 0;
    background-color: #1D93D2;
    line-height: 75px;
    border-radius: 50px;
    color: #fff;" href="{{$details['headsection']->zoom_url}}" target="_blank"> رابط الزوم </a>

        <a style="display: block;
    width: 221px;
    height: 75px;
    text-align: center;
    margin: 30px auto 0;
    background-color: #1D93D2;
    line-height: 75px;
    border-radius: 50px;
    color: #fff;" href="{{$details['headsection']->zoom_schedual_url}}"  target="_blank">
            إضافة إلى تقويمك
        </a>
        <p>Meeting ID:&nbsp;<span style="color:rgb(97,96,116);font-family:Helvetica;font-size:12px">{{$details['headsection']->meeting_id}}</span>
        </p>
        <p>Passcode: {{$details['headsection']->passcode}}</p>
        <p>رابط المجموعة: </p>
        <a href="{{$SiteSetting->telegram}}" target="_blank"
                                 data-saferedirecturl="https://www.google.com/url?q={{$SiteSetting->telegram}}&amp;source=gmail&amp;ust=1663940653554000&amp;usg=AOvVaw1Gx48Mzq9egKZON5XAwSaD">
            {{$SiteSetting->telegram}}
        </a>
    </div>
    <p>متحمس جداً للقائك في الإيفنت</p> <b>البيتي فيصل</b>
</div>
</body>
</html>
