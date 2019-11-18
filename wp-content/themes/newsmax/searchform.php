<form method="get" class="searchform" action="<?php echo esc_url(home_url('/')) ?>">
	<div class="ruby-search">
		<span class="search-input"><input type="text" placeholder="<?php echo newsmax_ruby_translate('search_for'); ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php esc_attr_e('search for:', 'newsmax') ?>"/></span>
		<span class="search-submit"><input type="submit" value="" /><i class="icon-simple icon-magnifier"></i></span>
	</div>
</form>