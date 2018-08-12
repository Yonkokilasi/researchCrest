    jQuery(document).ready(function ($) {
        $('.slicknav_icon').click(function () {
            $('.mobile-nav').slideToggle('display-none');
        });
        // var url = window.location.pathname, // in real app this would have to be replaced with window.location.pathname
        //     urlRegExp = new RegExp(url.replace(/\/$/, '')); // create regexp to match current url pathname and remove trailing slash if present as it could collide with the link in navigation in case trailing slash wasn't present there
       
        // var urlContainsId = urlRegExp.toString().includes("#");
        // // now grab every link from the navigation
        // $('.mobile-nav a').each(function () {
        //     // and test its href against the url pathname regexp
        //     if (urlRegExp.test(this.href)) {
        //         if (urlContainsId == false) {
                    
        //             $(this).addClass('active');
        //         }
        //     }
        // });


    });