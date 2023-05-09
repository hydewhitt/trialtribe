jQuery(document).ready(function($) {
    // Flags to find the start and ending of loading
    var pflag = false;
    var endpflag = false;
    var selector = '.site-main';
    $('div.blog-loader').css({"display":"none"});

    // On scroll check.
    $('div.blog-loader-btn .read-more').click(function(e) {
        e.preventDefault();
        $('div.blog-loader-btn').css({"display":"none"});
        $('div.blog-loader').css({"display":"block"});
        if (!pflag && !endpflag) {

            pflag = true;

            // Get next page link
            var p_next_href = jQuery('nav.pagination.navigation .next.page-numbers').attr('href');
            if (typeof( p_next_href ) != "undefined") {

                $( '<div>' ).load( p_next_href + ' .site-main', function() {
                    var pcontent = $(this).find('.site-main article');
                    var paginationpcontent = $(this).find(".site-main nav.pagination.navigation");

                    $(pcontent).insertAfter('.site-main article:last');
                    $('.site-main nav.pagination.navigation').replaceWith( paginationpcontent );
                    
                    // If the next link is the last, change endpflag to true.
                    var p_next_href = jQuery('.site-main nav.pagination.navigation .next.page-numbers').attr('href');
                    $('div.blog-loader').css({"display":"none"});
                    $('div.blog-loader-btn').css({"display":"block"});
                    if (typeof( p_next_href ) == "undefined") {
                        endpflag = true;
                        $('div.blog-loader').css({"display":"none"});
                        $('div.blog-loader-btn').css({"display":"none"});
                    }
                    pflag = false;
                });
            } else {
                $('div.blog-loader').css({"display":"none"});
                $('div.blog-loader-btn').css({"display":"none"});
            }
        }
    });

});