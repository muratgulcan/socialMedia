<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]><html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>

    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>Be</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Favicons -->
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- FONTS -->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,400italic,700'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lato:100,300,400,400italic,700'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Patua+One:100,300,400,400italic,700'>

    <!-- CSS -->
    <link rel='stylesheet' href="{{ asset('css/global.css')}} ">
    <link rel='stylesheet' href="{{ asset('css/structure.css')}} ">
    <link rel='stylesheet' href="{{ asset('css/press.css')}} ">
    <link rel='stylesheet' href="{{ asset('css/custom.css')}} ">

    <!-- Revolution Slider -->
    <link rel="stylesheet" href="{{ asset('plugins/rs-plugin/css/settings.css') }}">

</head>

<body class="with_aside aside_right layout-full-width header-stack header-magazine minimalist-header sticky-header sticky-white hide-title-area no-content-padding">
    <!-- Main Theme Wrapper -->
    <div id="Wrapper">
        <!-- Header Wrapper -->
        <div id="Header_wrapper">
            <!-- Header -->
            <header id="Header">
                <!-- Header Top -  Info Area -->
                <div id="Action_bar">
                    <div class="container">
                        <div class="column one">
                            <!-- Header - contact info area-->
                            <ul class="contact_details">
                                <li class="slogan">
                                    Have any questions?
                                </li>
                                <li class="phone">
                                    <i class="icon-phone"></i><a href="tel:+61383766284">+61 383 766 284</a>
                                </li>
                                <li class="mail">
                                    <i class="icon-mail-line"></i><a href="mailto:noreply@envato.com">noreply@envato.com</a>
                                </li>
                            </ul>
                            <!--Social info area-->
                            <ul class="social">
                                <li class="facebook">
                                    <a href="#" title="Facebook"><i class="icon-facebook"></i></a>
                                </li>
                                <li class="googleplus">
                                    <a href="#" title="Google+"><i class="icon-gplus"></i></a>
                                </li>
                                <li class="twitter">
                                    <a href="#" title="Twitter"><i class="icon-twitter"></i></a>
                                </li>
                                <li class="vimeo">
                                    <a href="#" title="Vimeo"><i class="icon-vimeo"></i></a>
                                </li>
                                <li class="youtube">
                                    <a href="#" title="YouTube"><i class="icon-play"></i></a>
                                </li>
                                <li class="flickr">
                                    <a href="#" title="Flickr"><i class="icon-flickr"></i></a>
                                </li>
                                <li class="pinterest">
                                    <a href="#" title="Pinterest"><i class="icon-pinterest"></i></a>
                                </li>
                                <li class="instagram">
                                    <a href="#" title="Instagram"><i class="icon-instagram"></i></a>
                                </li>
                                <li class="behance">
                                    <a href="#" title="Behance"><i class="icon-behance"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Header -  Logo and Menu area -->
                <div id="Top_bar">
                    <div class="container">
                        <div class="column one">
                            <div class="top_bar_left clearfix">
                                <!-- Logo-->
                                <div class="logo">
                                    <h1><a id="logo" href="index-press.html" title="BePress - BeTheme"><img class="scale-with-grid" src="images/press.png" /></a></h1>
                                </div>
                                <!-- Main menu-->
                                <div class="menu_wrapper">
                                    <nav id="menu">
                                        <ul id="menu-main-menu" class="menu">
                                            <li class="current_page_item">
                                                <a href="index-press.html"><span>Home</span></a>
                                            </li>
                                            <li>
                                                <a href="lifestyle.html"><span>Lifestyle</span></a>
                                            </li>
                                            <li>
                                                <a href="sport.html"><span>Sport</span></a>
                                            </li>
                                            <li>
                                                <a href="technology.html"><span>Technology</span></a>
                                            </li>
                                            <li>
                                                <a href="news.html"><span>News</span></a>
                                            </li>
                                        </ul>
                                    </nav><a class="responsive-menu-toggle" href="#"><i class="icon-menu"></i></a>
                                </div>
                                <!-- Secondary menu area - only for certain pages -->
                                <div class="secondary_menu_wrapper"></div>
                                <!-- Banner area - only for certain pages-->
                                <div class="banner_wrapper">
                                    <a href="#" target="_blank"><img src="images/468x60.gif">
                                    </a>
                                </div>
                                <!-- Header Searchform area-->
                                <div class="search_wrapper">
                                    <form method="get" action="#">
                                        <i class="icon_search icon-search"></i><a href="#" class="icon_close"><i class="icon-cancel"></i></a>
                                        <input type="text" class="field" name="s" placeholder="Enter your search" />
                                        <input type="submit" class="submit flv_disp_none" value="" />
                                    </form>
                                </div>
                            </div>
                            <div class="top_bar_right">
                                <div class="top_bar_right_wrapper">
                                    <a id="search_button" href="#"><i class="icon-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </div>

        @yield('content')



        <footer id="Footer" class="clearfix">
            <!-- Footer - First area -->
            <div class="footer_action">
                <div class="container">
                    <!-- One full width row-->
                    <div class="column one column_column">
                        <span>Vestibulum commodo <span class="themecolor">volutpat</span> convallis ac laoreet turpis faucibus</span>
                    </div>
                </div>
            </div>
            <div class="widgets_wrapper">
                <div class="container">
                    <div class="one-fourth column">
                        <!-- Text Area -->
                        <aside id="text-7" class="widget widget_text">
                            <div class="textwidget"><img src="images/logo_footer.png">
                                <p>
                                    <span class="big">We love who we are and we are very proud to be the part of your business</span>
                                </p>
                                <p>
                                    Curabitur sit amet magna quam. Praesent in libero vel <span class="tooltip" data-tooltip="Quis accumsan dolor">turpis pellentesque</span> egestas sit amet vel nunc. Nunc lobortis dui neque quis.
                                </p><a href="#" class="icon_bar icon_bar_facebook icon_bar_small"><span class="t"><i class="icon-facebook"></i></span><span class="b"><i class="icon-facebook"></i></span></a><a href="#" class="icon_bar icon_bar_google icon_bar_small"><span class="t"><i class="icon-gplus"></i></span><span class="b"><i class="icon-gplus"></i></span></a><a href="#" class="icon_bar icon_bar_twitter icon_bar_small"><span class="t"><i class="icon-twitter"></i></span><span class="b"><i class="icon-twitter"></i></span></a><a href="#" class="icon_bar icon_bar_vimeo icon_bar_small"><span class="t"><i class="icon-vimeo"></i></span><span class="b"><i class="icon-vimeo"></i></span></a><a href="#" class="icon_bar icon_bar_youtube icon_bar_small"><span class="t"><i class="icon-play"></i></span><span class="b"><i class="icon-play"></i></span></a>
                            </div>
                        </aside>
                    </div>
                    <div class="one-fourth column">
                        <!-- Recent Comments Area -->
                        <aside class="widget widget_mfn_recent_comments">
                            <h4>Recent comments</h4>
                            <div class="Recent_comments">
                                <ul>
                                    <li>
                                        <span class="date_label">November 17, 2015</span>
                                        <p>
                                            <i class="icon-user"></i><strong>admin</strong> commented on <a href="post.html#comment-6" title="admin | Aenean ligula mol stie viverra">Aenean ligula mol stie viverra</a>
                                        </p>
                                    </li>
                                    <li>
                                        <span class="date_label">November 17, 2015</span>
                                        <p>
                                            <i class="icon-user"></i><strong>admin</strong> commented on <a href="post.html#comment-5" title="admin | Aenean ligula mol stie viverra">Aenean ligula mol stie viverra</a>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                    <div class="one-fourth column">
                        <!-- Recent posts -->
                        <aside class="widget widget_mfn_recent_posts">
                            <h4>Recent posts</h4>
                            <div class="Recent_posts">
                                <ul>
                                    <li class="post format-standard has-post-thumbnail">
                                        <a href="post.html">
                                            <div class="photo"><img width="80" height="80" src="images/home_press_blog_1-80x80.jpg" class="scale-with-grid wp-post-image" />
                                            </div>
                                            <div class="desc">
                                                <h6>Aenean ligula mol stie viverra</h6><span class="date"><i class="icon-clock"></i>May 12, 2015</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="post format-standard has-post-thumbnail">
                                        <a href="post.html">
                                            <div class="photo"><img width="80" height="80" src="images/home_press_blog_2-80x80.jpg" class="scale-with-grid wp-post-image" />
                                            </div>
                                            <div class="desc">
                                                <h6>Vitae adipiscing turpis aenean</h6><span class="date"><i class="icon-clock"></i>May 11, 2015</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                    <div class="one-fourth column">
                        <!-- Meta Links Area -->
                        <aside id="meta-2" class="widget widget_meta">
                            <h4>Meta</h4>
                            <ul>
                                <li>
                                    <a href="#">Log in</a>
                                </li>
                                <li>
                                    <a href="#">Entries <abbr title="Really Simple Syndication">RSS</abbr></a>
                                </li>
                                <li>
                                    <a href="#">Comments <abbr title="Really Simple Syndication">RSS</abbr></a>
                                </li>

                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
            <!-- Footer copyright-->
            <div class="footer_copy">
                <div class="container">
                    <div class="column one">
                        <a id="back_to_top" href="#" class="button button_left button_js"><span class="button_icon"><i class="icon-up-open-big"></i></span></a>
                        <div class="copyright">
                            &copy; 2017 BePress - BeTheme. Muffin group - HTML by <a target="_blank" rel="nofollow" href="http://bit.ly/1M6lijQ">BeantownThemes</a>
                        </div>
                        <!--Social info area-->
                        <ul class="social">
                            <li class="facebook">
                                <a href="#" title="Facebook"><i class="icon-facebook"></i></a>
                            </li>
                            <li class="googleplus">
                                <a href="#" title="Google+"><i class="icon-gplus"></i></a>
                            </li>
                            <li class="twitter">
                                <a href="#" title="Twitter"><i class="icon-twitter"></i></a>
                            </li>
                            <li class="vimeo">
                                <a href="#" title="Vimeo"><i class="icon-vimeo"></i></a>
                            </li>
                            <li class="youtube">
                                <a href="#" title="YouTube"><i class="icon-play"></i></a>
                            </li>
                            <li class="flickr">
                                <a href="#" title="Flickr"><i class="icon-flickr"></i></a>
                            </li>
                            <li class="pinterest">
                                <a href="#" title="Pinterest"><i class="icon-pinterest"></i></a>
                            </li>
                            <li class="instagram">
                                <a href="#" title="Instagram"><i class="icon-instagram"></i></a>
                            </li>
                            <li class="behance">
                                <a href="#" title="Behance"><i class="icon-behance"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- JS -->
    <script src="{{ asset('js/jquery-2.1.4.min.js')}}"></script>

    <script src="{{ asset('js/mfn.menu.js')}}"></script>
    <script src="{{ asset('js/jquery.plugins.js')}}"></script>
    <script src="{{ asset('js/jquery.jplayer.min.js')}}"></script>
    <script src="{{ asset('js/animations.js')}}"></script>
    <script src="{{ asset('js/scripts.js')}}"></script>

    <script src="{{ asset('plugins/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{ asset('plugins/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{ asset('plugins/rs-plugin/js/extensions/revolution.extension.video.min.js')}}"></script>
    <script src="{{ asset('plugins/rs-plugin/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{ asset('plugins/rs-plugin/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{ asset('plugins/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{ asset('plugins/rs-plugin/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{ asset('plugins/rs-plugin/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{ asset('plugins/rs-plugin/js/extensions/revolution.extension.migration.min.js')}}"></script>

    <script src="{{ asset('plugins/rs-plugin/js/extensions/revolution.extension.parallax.min.js')}}"></script>

    <script>
        var tpj = jQuery;
        tpj.noConflict();
        var revapi1;
        tpj(document).ready(function() {
            if (tpj("#rev_slider_1_1").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_1_1");
            } else {
                revapi1 = tpj("#rev_slider_1_1").show().revolution({
                    sliderType:"hero",
                    jsFileLocation:"plugins/rs-plugin/assets/js/",
                    sliderLayout:"auto",
                    dottedOverlay:"none",
                    delay: 9000,
                    gridwidth: 880,
                    gridheight: 600,
                    lazyType:"none",
                    shadow: 0,
                    spinner:"spinner3",
                    autoHeight:"off",
                    disableProgressBar:"on",
                    hideThumbsOnMobile:"off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll:"off",
                        disableFocusListener:"off",
                    }
                });
            }
        });
        /*]]>*/
    </script>

    <script>
        jQuery(window).load(function() {
            var retina = window.devicePixelRatio> 1 ? true : false;
            if (retina) {
                var retinaEl = jQuery("#logo img");
                var retinaLogoW = retinaEl.width();
                var retinaLogoH = retinaEl.height();
                retinaEl.attr("src","images/press.png").width(retinaLogoW).height(retinaLogoH)
            }
        });
    </script>

</body>

</html>
