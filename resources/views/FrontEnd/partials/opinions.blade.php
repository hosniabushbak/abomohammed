<section>
    <div class="opinions">
        <div class="container">
            <div class="row">
                <div class="title">
                    <h2>قالوا عن البيتي فيصل </h2>
                </div>
            </div>
            <div class="row">
                <div class="owl-carousel  owl-theme" style="text-align:center">
                    @forelse($testiMonials as $testiMonial)
                        <div class=" item image wow slideInLeft" data-wow-offset="2">
                            <div class="item-content">
                                <h3 class="owl-title">
                                    {{$testiMonial->name}}
                                </h3>
                                <p>
                                    {{$testiMonial->text}}
                                </p>
                            </div>
                        </div>

                    @empty
                        <div class=" item image wow slideInLeft" data-wow-offset="2">

                        <div class="item-content">
                            <h3 class="owl-title">فاطمة محمد </h3>
                            <p>
                                اخذت دورات كثير وحضرت مع مدربين كثير
                                الحمدلله استفدت ووصلت ولكن مو زي الشيء
                                ...اللي شفته مع الكوتش البيتي
                            </p>

                        </div>
                    </div>
                        <div class=" item image wow slideInLeft" data-wow-offset="4">

                        <div class="item-content">
                            <h3 class="owl-title">سعيد عثمان </h3>
                            <p> بفضل الله ثم الكوتش البيتي وتدريباته سرت
                                اقرا واتعلم كثير، دحين حياتي تغيرت بأني سرت
                                ...افهم الحياة وقاعد افهم كل شي</p>

                        </div>
                    </div>
                        <div class=" item image wow slideInLeft" data-wow-offset="6">

                        <div class="item-content">
                            <h3 class="owl-title"> وليد حماد</h3>
                            <p>
                                استفدت كثيرا الحقيقة ولما فتحت الفديو الأول
                                مانتهيت الا مع الفديو الخامس ، الكوتش
                                ...البيتي معلم جيد
                            </p>

                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
