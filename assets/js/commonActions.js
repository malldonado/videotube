jQuery(document).ready(function() {
    jQuery('.navShowHide').on('click', function() {
        var main = jQuery('#mainSectionContainer');
        var nav = jQuery('#sideNavContainer');

        if(main.hasClass('leftPadding')) {
            nav.hide();
        } else {
            nav.show();
        }

        main.toggleClass('leftPadding');
    });
});