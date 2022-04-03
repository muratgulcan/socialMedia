@extends('layouts.app')
@section('content')

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
    <title>müzik</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Favicons -->
    <link rel="shortcut icon" href="/images/favicon.ico">

    <!-- FONTS -->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,400italic,700'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Patua+One:100,300,400,400italic,700'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Poppins:300,400,400italic,500italic,700'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Crimson+Text:300,400,400italic,500italic,700'>

    <!-- CSS -->
    <link rel='stylesheet' href="{{ asset ('css/global.css') }}">
    <link rel='stylesheet' href="{{ asset ('css/structure.css') }}">
    <link rel='stylesheet' href="{{ asset ('css/club.css') }}">
    <link rel='stylesheet' href="{{ asset ('css/custom.css') }}">

    <!-- Revolution Slider -->
    <link rel="stylesheet" href="{{ asset ('rs-plugin/css/settings.css') }}">

</head>

<body class="home template-slider layout-full-width mobile-tb-left if-overlay no-content-padding header-classic header-fw minimalist-header sticky-header sticky-white ab-hide subheader-both-center menuo-right menuo-no-borders footer-copy-center">
    <!-- Main Theme Wrapper -->
    <div id="Wrapper">
        <!-- Header Wrapper -->
        
       
            

        <!-- Main Content -->
        
        <div id="Content">
            <div class="content_wrapper clearfix">
                <div class="sections_group">
                    <div class="entry-content">
                        <div class="section" style="padding-top:90px; padding-bottom:50px;">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">

                                    <!-- One Second (1/2) Column -->

                                        <div class="column_attr" style="margin:0 auto; width:50%" >
                                            <div class="column one" >
                                                <img src="/images/image1.jpg" style="width:100% " alt="test"  />
                                                </a>
                                            </div>
                                            <!-- One Second (1/2) Column -->
                                            <div class="column one-second" style="margin: 0 auto;">
                                                <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</h4>
                                            </div>
                                            <!-- One Second (1/2) Column -->
                                            <div class="column one-second" style="margin: 0 auto;">
                                                <p>
                                                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.
                                                </p>
                                            </div>
                                            
                                        </div>
                                        

                                    
                                </div>
                            </div>
                        </div>
                        <div class="section full-width section-border-bottom" style="padding-top:0px; padding-bottom:80px;">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- One full width row-->
                                    <div class="column one column_column">
                                        <div class="column_attr align_center">
                                            <h2>ÖNE ÇIKANLAR</h2>
                                        </div>
                                    </div>
                                    <!-- Page devider -->
                                    <!-- One full width row-->
                                    <div class="column one column_divider">
                                        <hr class="no_line hrmargin_b_30" />
                                    </div>
                                    <!-- One full width row-->
                                    <div class="column one column_blog_slider">
                                        <div class="blog_slider clearfix flat">

                                            <ul class="blog_slider_ul">
                                                <li class="post format-standard has-post-thumbnail  category-events category-photos  tag-grid">
                                                    <div class="item_wrapper">
                                                        <div class="image_frame scale-with-grid">
                                                            <div class="image_wrapper">
                                                                <a href="content/club/post.html"><img width="900" height="900" src="/images/image2.jpg" class="scale-with-grid wp-post-image" />
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="date_label">
                                                            May 9, 2014
                                                        </div>
                                                        <div class="desc">
                                                            <h4><a href="content/club/post.html">Vestibulum ante ipsum primis</a></h4>
                                                            <hr class="hr_color" />
                                                            <a href="content/club/post.html" class="button button_left button_js"><span class="button_icon"><i class="icon-layout"></i></span><span class="button_label">Read more</span></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="post format-standard has-post-thumbnail  category-events tag-video">
                                                    <div class="item_wrapper">
                                                        <div class="image_frame scale-with-grid">
                                                            <div class="image_wrapper">
                                                                <a href="content/club/post.html"><img width="900" height="900" src="/images/image2.jpg" class="scale-with-grid wp-post-image" />
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="date_label">
                                                            May 8, 2014
                                                        </div>
                                                        <div class="desc">
                                                            <h4><a href="content/club/post.html">Vestibulum commodo volutpat laoreet</a></h4>
                                                            <hr class="hr_color" />
                                                            <a href="content/club/post.html" class="button button_left button_js"><span class="button_icon"><i class="icon-layout"></i></span><span class="button_label">Read more</span></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="post format-standard has-post-thumbnail  category-events">
                                                    <div class="item_wrapper">
                                                        <div class="image_frame scale-with-grid">
                                                            <div class="image_wrapper">
                                                                <a href="content/club/post.html"><img width="900" height="900" src="/images/image2.jpg" class="scale-with-grid wp-post-image" />
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="date_label">
                                                            May 7, 2014
                                                        </div>
                                                        <div class="desc">
                                                            <h4><a href="content/club/post.html">Vivamus sit amet metus sem uspendisse pellen</a></h4>
                                                            <hr class="hr_color" />
                                                            <a href="content/club/post.html" class="button button_left button_js"><span class="button_icon"><i class="icon-layout"></i></span><span class="button_label">Read more</span></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="post format-standard has-post-thumbnail  category-photos tag-motion tag-video">
                                                    <div class="item_wrapper">
                                                        <div class="image_frame scale-with-grid">
                                                            <div class="image_wrapper">
                                                                <a href="content/club/post.html"><img width="900" height="900" src="/images/image2.jpg" class="scale-with-grid wp-post-image" />
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="date_label">
                                                            May 6, 2014
                                                        </div>
                                                        <div class="desc">
                                                            <h4><a href="content/club/post.html">Quisque lorem tortor fringilla</a></h4>
                                                            <hr class="hr_color" />
                                                            <a href="content/club/post.html" class="button button_left button_js"><span class="button_icon"><i class="icon-layout"></i></span><span class="button_label">Read more</span></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="post format-standard has-post-thumbnail  category-events tag-design">
                                                    <div class="item_wrapper">
                                                        <div class="image_frame scale-with-grid">
                                                            <div class="image_wrapper">
                                                                <a href="content/club/post.html"><img width="900" height="900" src="/images/image2.jpg" class="scale-with-grid wp-post-image" />
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="date_label">
                                                            May 5, 2014
                                                        </div>
                                                        <div class="desc">
                                                            <h4><a href="content/club/post.html">Pellentes malesuada fames</a></h4>
                                                            <hr class="hr_color" />
                                                            <a href="content/club/post.html" class="button button_left button_js"><span class="button_icon"><i class="icon-layout"></i></span><span class="button_label">Read more</span></a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="slider_pagination"></div>
                                        </div>
                                    </div>
                                    <!-- Page devider -->
                                    <!-- One full width row-->
                                    <div class="column one column_divider">
                                        <hr class="no_line hrmargin_b_30" />
                                    </div>
                                    <!-- One full width row-->
                                    <div class="column one column_column">
                                        <div class="column_attr align_center">
                                            <a class="button button_large button_theme button_js" href="content/club/upcoming-events.html"><span class="button_label">Daha fazla yükle</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section" style="padding-top:100px; padding-bottom:50px; background-image:url(/images/home_club_section_bg1.png); background-repeat:no-repeat; background-position:center;">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- One Second (1/2) Column -->

                                        <div class="column_attr" style="padding:0 10% 0 0;">
                                            <h3>We know how
												to party</h3>
                                            <hr class="no_line hrmargin_b_30" />
                                            <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. voluptatem accusantium doloremque laudantium, totam rem.</h4>
                                            <hr class="no_line hrmargin_b_30" />
                                            <p>
                                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem.
                                            </p>
                                            <p>
                                                Vivamus quam erat, tempor vel imperdiet vel, iaculis vel quam. Mauris ultrices odio sit amet mi molestie, nec ultrices nisi convallis. Etiam sollicitudin metus.
                                            </p>
                                        </div>

                                    <!-- One Second (1/2) Column -->

                                        <div class="column_attr" style="padding:0 10% 0 0;">
                                            <h3>Few words about
												BeCLUB</h3>
                                            <hr class="no_line hrmargin_b_30" />
                                            <h4>Incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</h4>
                                            <hr class="no_line hrmargin_b_30" />
                                            <p>
                                                Cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem.
                                            </p>
                                            <p>
                                                Etiam orci justo, molestie ut lobortis id, faucibus nec nulla. Pellentesque vulputate eleifend nunc, ac sollicitudin dolor tincidunt varius.
                                            </p>
                                            <hr class="no_line hrmargin_b_30" />
                                            <p class="contact_icons">
                                                <a href="#"><i class="icon-facebook-circled"></i></a><a href="#"><i class="icon-gplus-circled"></i></a><a href="#"><i class="icon-twitter-circled"></i></a><a href="#"><i class="icon-pinterest-circled"></i></a><a href="#"><i class="icon-linkedin-circled"></i></a>
                                            </p>
                                        </div>

                                </div>
                            </div>
                        </div>


    </div>

    <!-- JS -->
    <script src="{{ asset ('js/jquery-2.1.4.min.js') }}"></script>

    <script src="{{ asset ('js/mfn.menu.js') }}"></script>
    <script src="{{ asset ('js/jquery.plugins.js') }}"></script>
    <script src="{{ asset ('js/jquery.jplayer.min.js') }}"></script>
    <script src="{{ asset ('js/animations/animations.js') }}"></script>
    <script src="{{ asset ('js/scripts.js') }}"></script>

    <script src="{{ asset ('rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset ('rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset ('rs-plugin/js/extensions/revolution.extension.video.min.js') }}"></script>
    <script src="{{ asset ('rs-plugin/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset ('rs-plugin/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset ('rs-plugin/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset ('rs-plugin/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset ('rs-plugin/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset ('rs-plugin/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ asset ('rs-plugin/js/extensions/revolution.extension.parallax.min.js') }}"></script>

    <script>
        var tpj = jQuery;
        var revapi1;
        tpj(document).ready(function() {
            if (tpj("#rev_slider_1_2").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_1_2");
            } else {
                revapi1 = tpj("#rev_slider_1_2").show().revolution({
                    sliderType:"standard",
                    sliderLayout:"auto",
                    dottedOverlay:"none",
                    delay: 5000,
                    navigation: {
                        keyboardNavigation:"off",
                        keyboard_direction:"horizontal",
                        mouseScrollNavigation:"off",
                        onHoverStop:"off",
                        arrows: {
                            style:"custom",
                            enable: true,
                            hide_onmobile: false,
                            hide_onleave: false,
                            tmp: '',
                            left: {
                                h_align:"left",
                                v_align:"center",
                                h_offset: 0,
                                v_offset: 0
                            },
                            right: {
                                h_align:"right",
                                v_align:"center",
                                h_offset: 0,
                                v_offset: 0
                            }
                        }
                    },
                    gridwidth: 1790,
                    gridheight: 900,
                    lazyType:"none",
                    shadow: 0,
                    spinner:"sipnner3",
                    stopLoop:"off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle:"off",
                    autoHeight:"off",
                    disableProgressBar:"on",
                    hideThumbsOnMobile:"off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    startWithSlide: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll:"off",
                        nextSlideOnWindowFocus:"off",
                        disableFocusListener: false,
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
                var retinaEl = jQuery("#logo img.logo-main");
                var retinaLogoW = retinaEl.width();
                var retinaLogoH = retinaEl.height();
                retinaEl.attr("src","/images/retina-club.png").width(retinaLogoW).height(retinaLogoH);
                var stickyEl = jQuery("#logo img.logo-sticky");
                var stickyLogoW = stickyEl.width();
                var stickyLogoH = stickyEl.height();
                stickyEl.attr("src","/images/retina-club.png").width(stickyLogoW).height(stickyLogoH);
                var mobileEl = jQuery("#logo img.logo-mobile");
                var mobileLogoW = mobileEl.width();
                var mobileLogoH = mobileEl.height();
                mobileEl.attr("src","/images/retina-club.png").width(mobileLogoW).height(mobileLogoH);
            }
        });
    </script>

</body>

</html>

@endsection