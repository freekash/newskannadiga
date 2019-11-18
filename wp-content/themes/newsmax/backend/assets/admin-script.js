(function($) {
    "use strict";

    $(document).ready(function() {
        newsmax_ruby_admin_post_format();
        newsmax_ruby_admin_post_review();
        newsmax_ruby_admin_primary_cat();
    });


    /**-------------------------------------------------------------------------------------------------------------------------
     * show hide post format
     */
    function newsmax_ruby_admin_post_format() {

        var newsmax_ruby_gallery_post = $('#newsmax_ruby_metabox_gallery_options');
        var newsmax_ruby_video_post = $('#newsmax_ruby_metabox_video_options');
        var newsmax_ruby_audio_post = $('#newsmax_ruby_metabox_audio_options');

        var select = $('#post-formats-select').find('[type="radio"]');
        select.live('change', function() {

            var val = $(this).val();

            newsmax_ruby_gallery_post.hide();
            newsmax_ruby_video_post.hide();
            newsmax_ruby_audio_post.hide();

            if ('gallery' == val) {
                newsmax_ruby_gallery_post.show();
            } else if ('video' == val) {
                newsmax_ruby_video_post.show();
            } else if ('audio' == val) {
                newsmax_ruby_audio_post.show();
            }
        }).filter(':checked').trigger('change');
    }


    /**-------------------------------------------------------------------------------------------------------------------------
     * show hide and cal review
     */
    function newsmax_ruby_admin_post_review() {

        //review post
        var score_wrap = $('#newsmax_ruby_metabox_review_options .inside .rwmb-meta-box > div:gt(0)');
        var newsmax_ruby_review_checkbox = $('#newsmax_ruby_meta_review_enable');

        //hide reviews
        score_wrap.wrapAll('<div class="ruby-enabled-review">').hide();

        if (newsmax_ruby_review_checkbox.is(":checked")) {
            score_wrap.show();
        }

        newsmax_ruby_review_checkbox.click(function() {
            score_wrap.toggle();
        });

        function newsmax_ruby_agv_score() {
            var i = 0;
            var newsmax_ruby_cs1 = 0;
            var newsmax_ruby_cs2 = 0;
            var newsmax_ruby_cs3 = 0;
            var newsmax_ruby_cs4 = 0;
            var newsmax_ruby_cs5 = 0;
            var newsmax_ruby_cs6 = 0;
            var newsmax_ruby_cs7 = 0;

            var newsmax_ruby_cd1 = $('input[name=newsmax_ruby_cd1]').val();
            var newsmax_ruby_cd2 = $('input[name=newsmax_ruby_cd2]').val();
            var newsmax_ruby_cd3 = $('input[name=newsmax_ruby_cd3]').val();
            var newsmax_ruby_cd4 = $('input[name=newsmax_ruby_cd4]').val();
            var newsmax_ruby_cd5 = $('input[name=newsmax_ruby_cd5]').val();
            var newsmax_ruby_cd6 = $('input[name=newsmax_ruby_cd6]').val();
            var newsmax_ruby_cd7 = $('input[name=newsmax_ruby_cd7]').val();


            if (newsmax_ruby_cd1) {
                i += 1;
                newsmax_ruby_cs1 = parseFloat($('input[name=newsmax_ruby_cs1]').val());
            } else {
                newsmax_ruby_cd1 = null;
            }
            if (newsmax_ruby_cd2) {
                i += 1;
                newsmax_ruby_cs2 = parseFloat($('input[name=newsmax_ruby_cs2]').val());
            } else {
                newsmax_ruby_cd2 = null;
            }
            if (newsmax_ruby_cd3) {
                i += 1;
                newsmax_ruby_cs3 = parseFloat($('input[name=newsmax_ruby_cs3]').val());
            } else {
                newsmax_ruby_cd3 = null;
            }
            if (newsmax_ruby_cd4) {
                i += 1;
                newsmax_ruby_cs4 = parseFloat($('input[name=newsmax_ruby_cs4]').val());
            } else {
                newsmax_ruby_cd4 = null;
            }
            if (newsmax_ruby_cd5) {
                i += 1;
                newsmax_ruby_cs5 = parseFloat($('input[name=newsmax_ruby_cs5]').val());
            } else {
                newsmax_ruby_cd5 = null;
            }
            if (newsmax_ruby_cd6) {
                i += 1;
                newsmax_ruby_cs6 = parseFloat($('input[name=newsmax_ruby_cs6]').val());
            } else {
                newsmax_ruby_cd6 = null;
            }

            if (newsmax_ruby_cd7) {
                i += 1;
                newsmax_ruby_cs7 = parseFloat($('input[name=newsmax_ruby_cs7]').val());
            } else {
                newsmax_ruby_cs7 = null;
            }

            var newsmax_ruby_as = $('#newsmax_ruby_as');

            var newsmax_ruby_temp_total = (newsmax_ruby_cs1 + newsmax_ruby_cs2 + newsmax_ruby_cs3 + newsmax_ruby_cs4 + newsmax_ruby_cs5 + newsmax_ruby_cs6 + newsmax_ruby_cs7);
            var newsmax_ruby_total = Math.round((newsmax_ruby_temp_total / i) * 10) / 10;

            newsmax_ruby_as.val(newsmax_ruby_total);

            if (isNaN(newsmax_ruby_total)) {
                newsmax_ruby_as.val('');
            }
        }

        $('.rwmb-input').on('change', newsmax_ruby_agv_score);
        $('#newsmax_ruby_cs1, #newsmax_ruby_cs2, #newsmax_ruby_cs3, #newsmax_ruby_cs4, #newsmax_ruby_cs5, #newsmax_ruby_cs6, #newsmax_ruby_cs7').on('slidechange', newsmax_ruby_agv_score);
    }

    //show hide primary category
    function newsmax_ruby_admin_primary_cat() {
        var primary_cat = $('#newsmax_ruby_meta_post_primary_cat');
        var cat_check_list = $('#categorychecklist');
        var cat;

        primary_cat.find('option').addClass('is-hide');
        var cat_checked = cat_check_list.find('input[type=checkbox]:checked');
        if (cat_checked.length > 0) {
            cat_checked.each(function() {
                primary_cat.find('option[value="' + $(this).val() + '"]').removeClass('is-hide');
            })
        }

        cat_check_list.on('change', 'input[type=checkbox]', function() {
            if ($(this).is(':checked')) {
                primary_cat.find('option[value="' + $(this).val() + '"]').removeClass('is-hide')
            } else {
                primary_cat.find('option[value="' + $(this).val() + '"]').addClass('is-hide')
            }
        });
    }

})(jQuery);