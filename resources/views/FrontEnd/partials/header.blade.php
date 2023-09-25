<head>
    <title>The Certain way</title>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WJPPW83');</script>
    <!-- End Google Tag Manager -->


    <script>
        (function () {
            var domainsToDecorate = [
                    'thecertainway.net',
                    'www.thecertainway.net'
                ],
                cu_queryParams = [
                    'utm_medium', //add or remove query parameters you want to transfer
                    'utm_source',
                    'utm_campaign',
                ]


            // store in localstorage
            function decorateLocalStorageUrl() {
                var collectedQueryParams = [];
                for (var queryIndex = 0; queryIndex < cu_queryParams.length; queryIndex++) {
                    if (getQueryParam(cu_queryParams[queryIndex])) {
                        collectedQueryParams.push(cu_queryParams[queryIndex] + '=' + getQueryParam(cu_queryParams[queryIndex]))
                    }
                }
                localStorage.setItem("cwlscoparams", collectedQueryParams.join('&'));
            }

            function getQueryParam(name) {
                if (name = (new RegExp('[?&]' + encodeURIComponent(name) + '=([^&]*)')).exec(window.location.search))
                    return decodeURIComponent(name[1]);
            }

            decorateLocalStorageUrl()

        })();
    </script>


{{--    <!-- Meta Pixel Code -->--}}
{{--    <script>--}}
{{--        !function(f,b,e,v,n,t,s)--}}
{{--        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?--}}
{{--            n.callMethod.apply(n,arguments):n.queue.push(arguments)};--}}
{{--            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';--}}
{{--            n.queue=[];t=b.createElement(e);t.async=!0;--}}
{{--            t.src=v;s=b.getElementsByTagName(e)[0];--}}
{{--            s.parentNode.insertBefore(t,s)}(window, document,'script',--}}
{{--            'https://connect.facebook.net/en_US/fbevents.js');--}}
{{--        fbq('init', '649676196487739');--}}
{{--        fbq('track', 'PageView');--}}
{{--    </script>--}}
{{--    <noscript><img height="1" width="1" style="display:none"--}}
{{--                   src="https://www.facebook.com/tr?id=649676196487739&ev=PageView&noscript=1"--}}
{{--        /></noscript>--}}
{{--    <!-- End Meta Pixel Code -->--}}




{{--    add nayef--}}

    <!-- Google Tag Manager -->
{{--    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':--}}
{{--                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],--}}
{{--            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=--}}
{{--            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);--}}
{{--        })(window,document,'script','dataLayer','GTM-KH69CNW');</script>--}}
    <!-- End Google Tag Manager -->


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('')}}/assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.lineicons.com/1.0.0/LineIcons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
          integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('')}}/assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('')}}/assets/css/owl.theme.default.css" type="text/css">
    <link rel="stylesheet" href="{{asset('')}}/assets/css/style.css">
    <link rel="stylesheet" href="{{asset('')}}/assets/css/respnsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <!----------------------------------------------------------------------->
    <link rel="stylesheet" href="{{asset('')}}/assets/build/css/intlTelInput.css">
    <link rel="stylesheet" href="{{asset('')}}/assets/build/css/demo.css">
{{--    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">--}}
    {!! htmlScriptTagJsApi() !!}
</head>
