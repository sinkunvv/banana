    <!DOCTYPE HTML>
    <!--
    Twenty by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
    -->
    <html>
    <head>
        <title>ばななメーカー</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src={{asset('/js/ie/html5shiv.js')}}></script><![endif]-->
        <link rel="stylesheet" href={{asset('/css/main.css')}} />
        <!--[if lte IE 8]><link rel="stylesheet" href={{asset('/css/ie8.css')}} /><![endif]-->
        <!--[if lte IE 9]><link rel="stylesheet" href={{asset('/css/ie9.css')}} /><![endif]-->
        {{ Html::favicon(asset('/img/icon.png'))}}
    </head>
    <body class="no-sidebar">
        <div id="page-wrapper">

            <!-- Header -->
                <header id="header">
                    <h1 id="logo"><a href="/">Banana <span>Maker</span></a></h1>
                </header>

            <!-- Main -->
                <article id="main">

                    <header class="container">
                        <a class="twitter-timeline" width="100%" height="50%" data-dnt="true" href="https://twitter.com/hashtag/%E3%81%B0%E3%81%AA%E3%81%AA%E3%83%A1%E3%83%BC%E3%82%AB%E3%83%BC" data-widget-id="916648470034784256">#ばななメーカー のツイート</a>
                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                    </header>

                    <!-- One -->
                        <section class="wrapper style4 container">
                            <!-- Content -->
                                <div class="content">
                                    @yield('content')
                                </div>

                        </section>

                </article>

            <!-- Footer -->
                <footer id="footer">
                    {{-- <ul class="icons">
                        <li><a href="#" class="icon circle fa-twitter"><span class="label">Twitter</span></a></li>
                        <li><a href="#" class="icon circle fa-facebook"><span class="label">Facebook</span></a></li>
                        <li><a href="#" class="icon circle fa-google-plus"><span class="label">Google+</span></a></li>
                        <li><a href="#" class="icon circle fa-github"><span class="label">Github</span></a></li>
                        <li><a href="#" class="icon circle fa-dribbble"><span class="label">Dribbble</span></a></li>
                    </ul> --}}

                    <ul class="copyright">
                        <li>&copy; S.DEVELOP</li>
                        <li><a href='/agreement' target='_blank'>利用規約</a></li>
                        <li>Developer : <a href="https://twitter.com/sinkunvv">@@sinkunvv</a></li>
                        <li>iori-fonts : <a href="http://susu.cc/">煤式自動連結器</a></li>
                        <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                    </ul>

                </footer>

        </div>

        <!-- Scripts -->
            <script src={{asset('/js/jquery.min.js')}}></script>
            <script src={{asset('/js/jquery.dropotron.min.js')}}></script>
            <script src={{asset('/js/jquery.scrolly.min.js')}}></script>
            <script src={{asset('/js/jquery.scrollgress.min.js')}}></script>
            <script src={{asset('/js/skel.min.js')}}></script>
            <script src={{asset('/js/util.js')}}></script>
            <!--[if lte IE 8]><script src={{asset('/js/ie/respond.min.js')}}></script><![endif]-->
            <script src={{asset('/js/main.js')}}></script>

    </body>
    </html>
