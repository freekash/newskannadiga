(function($) {
    $(document).ready(function() {
        "use strict";

        var ComposerSeoAnalytics = function() {

            YoastSEO.app.registerPlugin('ComposerSeoAnalytics', { status: 'ready' });
            YoastSEO.app.registerModification('content', this.addContent, 'ComposerSeoAnalytics', 5);

            // Re-analyse SEO when add or delete block
            $(document).on('newsmax_ruby_composer_mce', this.reloadAnalytics);
            $(document).on('newsmax_ruby_composer_delete', this.reloadAnalytics);
        };

        ComposerSeoAnalytics.prototype.reloadAnalytics = function() {
            setTimeout(function() {
                YoastSEO.app.pluginReloaded('ComposerSeoAnalytics');
            }, 200);
        };

        ComposerSeoAnalytics.prototype.addContent = function(data) {
            $('#newsmax_ruby_composer_editor').find('[id ^= "html-form"]').each(function() {
                var content;
                var mce_el = $(this);
                var mce_el_id = mce_el.find('.ruby-html').attr('id');
                var editor = tinyMCE.get(mce_el_id);
                if (editor) {
                    content = editor.getContent();
                } else {
                    content = $('#' + mce_el_id).val();
                }
                data += data + content;

            });
            return data.trim();
        };

        new ComposerSeoAnalytics();
    });
}(jQuery));