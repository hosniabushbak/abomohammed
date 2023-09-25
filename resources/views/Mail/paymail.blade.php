<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>{{ $details['title'] }}</h1>
<p>

    <br />
عزيزي {{$details['name']}}
    مستشار الطريقة المعينة     <br />
    <br />
    <br />
    <br />
    <br />
    <br />
لديك عميل جديد في قائمتك .. يرجى الإطلاع على التفاصيل
    <br />
    التفاصيل:
    <br />
    الإسم : {{$details['clientname']}}
    <br />
    رقم الهاتف : {{$details['phone']}}
    <br />
    البريد الإلكتروني : {{$details['email']}}
    <br />
    <br />
    <br />
    <br />
    يمكنك التواصل مع العميل مباشرة من خلال الواتس اب
    لمزيد من المعلومات تواصل معنا على
    <a href="https://api.whatsapp.com/send/?phone={{$details['phone']}}&text&app_absent=0">الواتساب</a>
    <br />
    <br />
    <br />
    مع تحيات إدارة الطريقة المعينة
    <br />

</p>
<br />

<p>

    تحياتنا ومحبتنا
    <br />
    فريق الطريقة المعينة
    <br />
    {{url('/')}}

</p>
</body>
</html>
