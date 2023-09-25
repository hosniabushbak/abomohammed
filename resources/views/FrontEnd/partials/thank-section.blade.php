<section>
    <div class="thanks thank">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 single-col">
                    <div class="thanks-part">
                        <div class="logo">
                            <img src="{{$msg->image->getUrl('')}}">
                        </div>
                        <h5>{{$msg->title}}</h5>
                        <h4>{{$msg->short_info}}</h4>
                        <p>
                            {{$msg->text}}
                        </p>
                        <a href="{{$SiteSetting->telegram}}">
                            {{$SiteSetting->telegram_title}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="45.925" height="37.886"
                                 viewBox="0 0 45.925 37.886">
                                <g id="Group_153" data-name="Group 153" transform="translate(-17.569 -24.021)">
                                    <path id="Path_140" data-name="Path 140"
                                          d="M354.026,1056.737l5.042,13.956s.631,1.306,1.306,1.306,10.715-10.445,10.715-10.445l11.165-21.565-28.048,13.147Z"
                                          transform="translate(-325.258 -1011.131)" fill="#c8daea"/>
                                    <path id="Path_141" data-name="Path 141"
                                          d="M364.065,1072.274l-.968,10.287s-.405,3.152,2.746,0,6.168-5.582,6.168-5.582Z"
                                          transform="translate(-328.611 -1023.088)" fill="#a9c6d8"/>
                                    <g id="Group_150" data-name="Group 150" transform="translate(17.569 24.021)">
                                        <path id="Path_142" data-name="Path 142"
                                              d="M347.53,1054.39l-10.371-3.379s-1.238-.5-.841-1.643c.082-.235.248-.435.743-.78,2.3-1.6,42.538-16.066,42.538-16.066a3.437,3.437,0,0,1,1.808-.128.98.98,0,0,1,.667.728,3.286,3.286,0,0,1,.09.916c0,.266-.036.513-.06.9-.245,3.954-7.578,33.466-7.578,33.466s-.439,1.727-2.011,1.786a2.881,2.881,0,0,1-2.1-.81c-3.085-2.654-13.749-9.82-16.1-11.4a.452.452,0,0,1-.193-.317c-.033-.166.148-.372.148-.372s18.568-16.505,19.061-18.237c.038-.135-.105-.2-.3-.143-1.233.454-22.611,13.953-24.97,15.444A1.14,1.14,0,0,1,347.53,1054.39Z"
                                              transform="translate(-336.239 -1032.306)" fill="#fff"/>
                                    </g>
                                </g>
                            </svg>

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
