<script src="{{asset('')}}/assets/js/jquery3.3.1.js"></script>
<script src="{{asset('')}}/assets/js/popper.min.js"></script>
<script src="{{asset('')}}/assets/js/bootstrap.min.js"></script>
<script src="{{asset('')}}/assets/js/wow.js"></script>
<script src="{{asset('')}}/assets/js/owl.carousel.min.js"></script>
<script src="{{asset('')}}/assets/js/main.js"></script>
<!--script src="assets/js/vedio.js"></script-->
{{--<script src="{{asset('')}}/assets/js/wow.min.js"></script>--}}
<script src="{{asset('')}}/assets/js/smothscroll.js"></script>


<script src="{{asset('')}}/assets/build/js/intlTelInput.js"></script>
<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
        // allowDropdown: false,
        // autoHideDialCode: false,
        // autoPlaceholder: "off",
        // dropdownContainer: document.body,
        // excludeCountries: ["us"],
        formatOnDisplay: true,
        // geoIpLookup: function(callback) {
        //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
        //     var countryCode = (resp && resp.country) ? resp.country : "";
        //     callback(countryCode);
        //     alert(countryCode);
        //   });
        // },
        hiddenInput: "phone",
        initialCountry: "sa",
        // localizedCountries: { 'ps': 'Deutschland' },
        // nationalMode: false,
        onlyCountries: ['sa', 'ae', 'kw', 'om','qa','bh', 'ps'],
        // placeholderNumberType: "MOBILE",
        // preferredCountries: ['cn', 'jp'],
        // separateDialCode: true,
        utilsScript: "{{asset('')}}/assets/build/js/utils.js",
    });
</script>
