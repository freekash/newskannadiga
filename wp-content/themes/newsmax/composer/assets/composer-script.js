var newsmax_ruby_setup_sections;
var newsmax_ruby_setup_blocks;
var newsmax_ruby_composer_template;
var newsmax_ruby_page_composer_data;

jQuery(document).ready(function($) {
    "use strict";

    /*********** LAYOUT PAGE BUILDER *************/

    $('#page_template').change(function() {

        var template = $('#page_template').val();
        //enable page composer
        if ('page-composer.php' == template) {

            //show composer
            $('#newsmax_ruby_composer_editor').show();
            $('#newsmax_ruby_metabox_composer_options').show();

            $('#newsmax_ruby_page_options').hide();
            $('#newsmax_ruby_metabox_single_page_options').hide();
            $('#newsmax_ruby_metabox_sidebar_options').hide();
            $('#newsmax_ruby_metabox_box_comment_options').hide();
            $('#postdivrich').hide();
        } else {

            //hide composers
            $('#newsmax_ruby_composer_editor').hide();
            $('#newsmax_ruby_metabox_composer_options').hide();

            $('#postdivrich').show();
            $('#newsmax_ruby_page_options').show();
            $('#newsmax_ruby_metabox_single_page_options').show();
            $('#newsmax_ruby_metabox_sidebar_options').show();
            $('#newsmax_ruby_metabox_box_comment_options').show();
        }
    }).triggerHandler('change');


    /*********** CORE *************/
    var newsmax_ruby_page_builder = {

        upload_page: false,

        /*********** INIT *************/
        //init
        init: function() {
            if ('undefined' === typeof newsmax_ruby_composer_template) {
                return;
            }

            newsmax_ruby_page_builder.unload_page = false;
            newsmax_ruby_page_builder.setup_section_select();
            newsmax_ruby_page_builder.init_section();
            newsmax_ruby_page_builder.update_composer();
        },

        //Init sections
        init_section: function() {
            var sections = $('#newsmax_ruby_composer_editor').find('.ruby-sections-wrap');
            newsmax_ruby_page_builder.render_section();

            sections.sortable({
                handle: '.ruby-section-bar',
                placeholder: 'ruby-highlight',
                forcePlaceholderSize: true
            });

        },

        //Init blocks
        init_block: function(new_section, section_data) {

            //Load block select
            newsmax_ruby_page_builder.setup_block_select(new_section);

            //load block data
            if (section_data) {
                if (section_data['blocks']) {
                    $.each(section_data['blocks'], function(block_id, block_data) {
                        newsmax_ruby_page_builder.load_block(block_data['block_name'], new_section.find('.ruby-block-wrap'), block_data);
                    })
                }
            }

            //add sortable block
            var block = new_section.find('.ruby-block');

            block.sortable({
                start: function() {
                    var html_blocks = block.find('.is-custom-html');
                    newsmax_ruby_page_builder.custom_mce_stop(html_blocks);
                },

                handle: '.ruby-block-bar',
                placeholder: 'ruby-highlight',
                forcePlaceholderSize: true,
                stop: function() {
                    var html_blocks = block.find('.is-custom-html');
                    newsmax_ruby_page_builder.custom_mce_start(html_blocks);
                    block.sortable('refresh');
                }
            })
        },


        /***********CREATE SECTION SELECT*************/
        setup_section_select: function() {

            var select_list = $('#newsmax_ruby_section_select');

            //create section element
            $.each(newsmax_ruby_setup_sections, function(section_type, config) {
                var select_item = $('<div class="section-select-el"><a href="#"></a></div>');
                if (config['img']) {
                    select_item = $('<div class="section-select-el"><a href="#"><img alt="' + section_type + '" src="' + config['img'] + '"></a></div>');
                }
                select_item.find('a').data('section_type', section_type).append('<span>' + config.title + '</span>');

                //create section list
                select_list.append(select_item);
            });

            //add section
            select_list.find('a').click(newsmax_ruby_page_builder.add_section);

            //Toggle select section box
            $('#page_composer_section_select').click(function(e) {
                select_list.slideToggle(200);
                e.stopPropagation();
                return false;
            })

        },

        //add select block list
        setup_block_select: function(new_section) {

            var select_list = new_section.find('.block-select-wrap');

            $.each(newsmax_ruby_setup_blocks, function(block_name, config) {
                if (config['section'] === new_section['section_type']) {
                    var select_item = $('<div class="block-select-el"><a href="#"></a></div>');
                    if (config['img']) {
                        select_item = $('<div class="block-select-el"><a href="#"><img alt="' + block_name + '" src="' + config['img'] + '"></a></div>');
                    }
                    select_item.find('a').data('block_name', block_name).append('<span>' + config.title + '</span>');

                    //create block list
                    select_list.append(select_item);
                }
            });

            select_list.find('a').click(newsmax_ruby_page_builder.add_block);

            //Toggle select block box
            new_section.find('.add-block-select').click(function(e) {
                select_list.slideToggle(200);
                e.stopPropagation();
                return false;
            })
        },

        /***********CREATE SECTIONS*************/

        //click add section
        add_section: function() {

            newsmax_ruby_page_builder.unload_page = true;

            //get section type
            var section_type = $(this).data('section_type');

            //create section
            var new_section = newsmax_ruby_page_builder.load_section(section_type, false);

            //scroll to section
            if (undefined != new_section) {
                $('html,body').animate({
                    scrollTop: new_section.offset().top
                }, 300);
            }

            return false;
        },

        //load section
        load_section: function(section_type, section_data) {

            var default_sidebar;
            var uuid;
            if ('undefined' === typeof newsmax_ruby_composer_template[section_type]) return;

            //create unique id
            if ('undefined' === typeof section_data.section_id) {
                uuid = $.uuid();
            } else {
                uuid = section_data.section_id;
            }

            var section_id = 'newsmax_ruby_section_' + uuid;
            var new_section = $(newsmax_ruby_composer_template[section_type]);
            if (section_type == 'section_has_sidebar') {
                var sidebar_id = 'newsmax_ruby_sidebar_' + uuid;
                var sidebar_position_id = 'newsmax_ruby_meta_sidebar_position_' + uuid;
                var sidebar_sticky_id = 'newsmax_ruby_meta_sidebar_sticky_' + uuid;

                new_section.find('.ruby-section-sidebar').html(newsmax_ruby_composer_template['input']['sidebar']);
                if ('undefined' === typeof section_data['section_sidebar_position']) {
                    new_section.find('.ruby-sidebar-position').attr('name', sidebar_position_id);
                } else {
                    new_section.find('.ruby-sidebar-position').attr('name', sidebar_position_id).val(section_data['section_sidebar_position']);
                }

                if ('undefined' === typeof section_data['section_sidebar_sticky']) {
                    new_section.find('.ruby-sidebar-sticky').attr('name', sidebar_sticky_id);
                } else {
                    new_section.find('.ruby-sidebar-sticky').attr('name', sidebar_sticky_id).val(section_data['section_sidebar_sticky']);
                }

                var sidebar_select = new_section.find('.ruby-sidebar-select');
                if ('undefined' === typeof section_data['section_sidebar']) {
                    default_sidebar = 'newsmax_ruby_sidebar_default';
                } else {
                    default_sidebar = section_data['section_sidebar'];
                }

                sidebar_select.attr('name', sidebar_id).val(default_sidebar);
                new_section.find('.ruby-section-sidebar label').click(function() {
                    new_section.find('.ruby-sidebar-select-wrap').slideToggle(200);
                    return false;
                })
            }

            new_section.find('.ruby-section-type').attr('name', section_id).val(section_type);
            new_section.find('.ruby-section-order').val(uuid);
            new_section.find('.ruby-section-label').html(newsmax_ruby_setup_sections[section_type].title);

            var section_wrap = $('#newsmax_ruby_composer_editor').find('.ruby-sections-wrap');

            //append new section
            section_wrap.children('.ruby-section-empty').remove();
            section_wrap.append(new_section);

            //load button
            newsmax_ruby_page_builder.button_section(new_section);

            //init block
            new_section['section_type'] = section_type; //filter block of section
            newsmax_ruby_page_builder.init_block(new_section, section_data);

            return new_section;
        },

        //enable button section
        button_section: function(new_section) {
            new_section.find('.ruby-section-bar, .ruby-section-open-option').click(newsmax_ruby_page_builder.open_section_setting);
            new_section.find('.ruby-section-delete').click(newsmax_ruby_page_builder.delete_section);
        },

        //delete section
        delete_section: function(e) {

            newsmax_ruby_page_builder.unload_page = true;
            $(e.target).parents('.ruby-section').fadeOut(300, function() {
                $(this).remove()
            });

            //trigger
            $(document).trigger('newsmax_ruby_composer_delete');

            return false;
        },

        //open section
        open_section_setting: function(e) {
            var section_setting = $(e.target).parents('.ruby-section').find('.ruby-block-wrap');
            section_setting.slideToggle(200);
            return false;
        },

        /***********BLOCK*************/
        //click add block
        add_block: function() {

            newsmax_ruby_page_builder.unload_page = true;
            //get module
            var this_module = $(this);
            var block_name = this_module.data('block_name');
            var module_wrap = this_module.parents('.ruby-block-wrap');
            var new_block = newsmax_ruby_page_builder.load_block(block_name, module_wrap, false);

            if (undefined != new_block) {
                $('html,body').animate({
                    scrollTop: new_block.offset().top
                }, 300);

                //trigger open block
                setTimeout(function() {
                    new_block.find('.ruby-block-open-option').trigger('click');
                }, 300)
            }

            return false;
        },

        //load block
        load_block: function(block_name, module_wrap, block_data) {

            var block_name_title;
            var block_name_desc;
            var uuid;

            //create unique id
            if ('undefined' === typeof block_data.block_id) {
                uuid = $.uuid();
            } else {
                uuid = block_data.block_id;
            }

            //load block names
            block_name_title = newsmax_ruby_setup_blocks[block_name].title;
            block_name_desc = newsmax_ruby_setup_blocks[block_name].description;

            module_wrap.find('.ruby-section-empty').remove();
            var id = 'newsmax_ruby_block_' + uuid;
            var new_block = $(newsmax_ruby_composer_template['block']);
            var module_id = module_wrap.find('.ruby-section-order').val();
            new_block.find('.ruby-block-name').attr('name', id).val(block_name);
            new_block.find('.ruby-block-order').attr('name', 'newsmax_ruby_block_order[' + module_id + '][]').val(uuid);
            new_block.find('.ruby-block-description').html(block_name_desc);
            if (block_data && 'undefined' != typeof (block_data['block_options']['title']) && block_data['block_options']['title']) {
                new_block.find('.ruby-block-label').html(block_name_title + ' : ' + block_data['block_options']['title']);
            } else {
                new_block.find('.ruby-block-label').html(block_name_title);
            }

            var block_wrap = module_wrap.find('.ruby-block');

            //load block options
            newsmax_ruby_page_builder.block_setting_options(new_block, block_name, block_data['block_options']);

            //append new block
            block_wrap.append(new_block);

            //load button
            newsmax_ruby_page_builder.button_block(new_block);

            return new_block;
        },

        //enable button block
        button_block: function(new_block) {
            new_block.find('.ruby-block-bar, .ruby-block-open-option').click(newsmax_ruby_page_builder.open_block_setting);
            new_block.find('.ruby-block-delete').click(newsmax_ruby_page_builder.delete_block);
        },

        //delete block
        delete_block: function(e) {

            newsmax_ruby_page_builder.unload_page = true;
            $(e.target).parents('.ruby-block-item').fadeOut(400, function() {
                $(this).remove()
            });

            //trigger
            $(document).trigger('newsmax_ruby_composer_delete');

            return false;
        },

        //open block
        open_block_setting: function(e) {
            var block_setting = $(e.target).parents('.ruby-block-item').find('.ruby-block-options-wrap');
            block_setting.slideToggle(200);
            return false;
        },

        /*********** LOAD BLOCK OPTIONS *************/
        block_setting_options: function(new_block, block_name, composer_default_value) {
            var block_id = new_block.find('.ruby-block-name').attr('name');

            $.each(newsmax_ruby_setup_blocks, function(name, config) {

                //check option block
                if ($(config.block_options).length == 0) return;

                //check block and get setting option of block
                if (block_name == name) {

                    //remove hidden class
                    new_block.find('.ruby-block-options-wrap').removeClass('hidden');
                    var filter_active = true;

                    //render block options
                    $.each(config.block_options, function(tab, options) {

                        //check return
                        if ('object' != typeof (options)) {
                            return;
                        }

                        //render filter tab
                        var filter_link = '<a href="#" class="ruby-tab-filter-el" data-filter="ruby-tab-' + tab + '">' + tab + '</a>';
                        if (true == filter_active) {
                            filter_link = '<a href="#" class="ruby-tab-filter-el filter-active" data-filter="ruby-tab-' + tab + '">' + tab + '</a>';
                            filter_active = false;
                        }

                        var tab_wrapper = '<div class="ruby-tab ruby-tab-' + tab + '"></div>';

                        //add tab and filter
                        new_block.find('.ruby-filter-link').append(filter_link);
                        new_block.find('.ruby-block-content').append(tab_wrapper);

                        //render each option
                        $.each(options, function(option, value) {

                            var title, input, description;
                            var new_block_options = $(newsmax_ruby_composer_template['block_option']);

                            //check if false then return
                            if (value === false) {
                                return;
                            }

                            switch (option) {
                                case 'title' :
                                    title = newsmax_ruby_composer_template['title']['title'];
                                    description = newsmax_ruby_composer_template['desc']['title'];
                                    input = newsmax_ruby_composer_template['input']['text'];
                                    break;

                                case 'title_url' :
                                    title = newsmax_ruby_composer_template['title']['title_url'];
                                    description = newsmax_ruby_composer_template['desc']['title_url'];
                                    input = newsmax_ruby_composer_template['input']['text'];
                                    break;

                                case 'category_id' :
                                    title = newsmax_ruby_composer_template['title']['category_id'];
                                    description = newsmax_ruby_composer_template['desc']['category_id'];
                                    input = newsmax_ruby_composer_template['input']['category'];
                                    break;

                                case 'category_ids' :
                                    title = newsmax_ruby_composer_template['title']['category_ids'];
                                    description = newsmax_ruby_composer_template['desc']['category_ids'];
                                    input = newsmax_ruby_composer_template['input']['categories'];
                                    break;

                                case 'post_format' :
                                    title = newsmax_ruby_composer_template['title']['post_format'];
                                    description = newsmax_ruby_composer_template['desc']['post_format'];
                                    input = newsmax_ruby_composer_template['input']['post_format'];
                                    break;

                                case 'tags' :
                                    title = newsmax_ruby_composer_template['title']['tags'];
                                    description = newsmax_ruby_composer_template['desc']['tags'];
                                    input = newsmax_ruby_composer_template['input']['text'];
                                    break;

                                case 'authors' :
                                    title = newsmax_ruby_composer_template['title']['authors'];
                                    description = newsmax_ruby_composer_template['desc']['authors'];
                                    input = newsmax_ruby_composer_template['input']['authors'];
                                    break;

                                case 'posts_per_page' :
                                    title = newsmax_ruby_composer_template['title']['posts_per_page'];
                                    description = newsmax_ruby_composer_template['desc']['posts_per_page'];
                                    input = newsmax_ruby_composer_template['input']['posts_per_page'];
                                    break;

                                case 'slides_per_page' :
                                    title = newsmax_ruby_composer_template['title']['slides_per_page'];
                                    description = newsmax_ruby_composer_template['desc']['slides_per_page'];
                                    input = newsmax_ruby_composer_template['input']['posts_per_page'];
                                    break;

                                case 'offset' :
                                    title = newsmax_ruby_composer_template['title']['offset'];
                                    description = newsmax_ruby_composer_template['desc']['offset'];
                                    input = newsmax_ruby_composer_template['input']['num'];
                                    break;

                                case 'orderby' :
                                    title = newsmax_ruby_composer_template['title']['orderby'];
                                    description = newsmax_ruby_composer_template['desc']['orderby'];
                                    input = newsmax_ruby_composer_template['input']['orderby'];
                                    break;

                                case 'excerpt' :
                                    title = newsmax_ruby_composer_template['title']['excerpt'];
                                    description = newsmax_ruby_composer_template['desc']['excerpt'];
                                    input = newsmax_ruby_composer_template['input']['num'];
                                    break;

                                case 'excerpt_classic' :
                                    title = newsmax_ruby_composer_template['title']['excerpt_classic'];
                                    description = newsmax_ruby_composer_template['desc']['excerpt_classic'];
                                    input = newsmax_ruby_composer_template['input']['num'];
                                    break;

                                case 'readmore' :
                                    title = newsmax_ruby_composer_template['title']['readmore'];
                                    description = newsmax_ruby_composer_template['desc']['readmore'];
                                    input = newsmax_ruby_composer_template['input']['enable'];
                                    break;

                                case 'share' :
                                    title = newsmax_ruby_composer_template['title']['share'];
                                    description = newsmax_ruby_composer_template['desc']['share'];
                                    input = newsmax_ruby_composer_template['input']['share'];
                                    break;

                                case 'meta_info' :
                                    title = newsmax_ruby_composer_template['title']['meta_info'];
                                    description = newsmax_ruby_composer_template['desc']['meta_info'];
                                    input = newsmax_ruby_composer_template['input']['meta_info'];
                                    break;

                                case 'cat_info' :
                                    title = newsmax_ruby_composer_template['title']['cat_info'];
                                    description = newsmax_ruby_composer_template['desc']['cat_info'];
                                    input = newsmax_ruby_composer_template['input']['cat_info'];
                                    break;

                                case 'color' :
                                    title = newsmax_ruby_composer_template['title']['color'];
                                    description = newsmax_ruby_composer_template['desc']['color'];
                                    input = newsmax_ruby_composer_template['input']['color'];
                                    break;

                                case 'block_style' :
                                    title = newsmax_ruby_composer_template['title']['block_style'];
                                    description = newsmax_ruby_composer_template['desc']['block_style'];
                                    input = newsmax_ruby_composer_template['input']['block_style'];
                                    break;

                                case 'ajax_dropdown' :
                                    title = newsmax_ruby_composer_template['title']['ajax_dropdown'];
                                    description = newsmax_ruby_composer_template['desc']['ajax_dropdown'];
                                    input = newsmax_ruby_composer_template['input']['ajax_dropdown'];
                                    break;

                                case 'ajax_dropdown_id' :
                                    title = newsmax_ruby_composer_template['title']['ajax_dropdown_id'];
                                    description = newsmax_ruby_composer_template['desc']['ajax_dropdown_id'];
                                    input = newsmax_ruby_composer_template['input']['text'];
                                    break;

                                case 'ajax_dropdown_text' :
                                    title = newsmax_ruby_composer_template['title']['ajax_dropdown_text'];
                                    description = newsmax_ruby_composer_template['desc']['ajax_dropdown_text'];
                                    input = newsmax_ruby_composer_template['input']['text'];
                                    break;

                                case 'summary_type' :
                                    title = newsmax_ruby_composer_template['title']['summary_type'];
                                    description = newsmax_ruby_composer_template['desc']['summary_type'];
                                    input = newsmax_ruby_composer_template['input']['summary_type'];
                                    break;

                                case 'position' :
                                    title = newsmax_ruby_composer_template['title']['position'];
                                    description = newsmax_ruby_composer_template['desc']['position'];
                                    input = newsmax_ruby_composer_template['input']['position'];
                                    break;

                                case 'thumb_position' :
                                    title = newsmax_ruby_composer_template['title']['thumb_position'];
                                    description = newsmax_ruby_composer_template['desc']['thumb_position'];
                                    input = newsmax_ruby_composer_template['input']['position'];
                                    break;

                                case 'auto_play' :
                                    title = newsmax_ruby_composer_template['title']['auto_play'];
                                    description = newsmax_ruby_composer_template['desc']['auto_play'];
                                    input = newsmax_ruby_composer_template['input']['enable'];
                                    break;

                                case 'grid_style' :
                                    title = newsmax_ruby_composer_template['title']['grid_style'];
                                    description = newsmax_ruby_composer_template['desc']['grid_style'];
                                    input = newsmax_ruby_composer_template['input']['grid_style'];
                                    break;

                                case 'background' :
                                    title = newsmax_ruby_composer_template['title']['background'];
                                    description = newsmax_ruby_composer_template['desc']['background'];
                                    input = newsmax_ruby_composer_template['input']['text'];
                                    break;

                                case 'background_image' :
                                    title = newsmax_ruby_composer_template['title']['background_image'];
                                    description = newsmax_ruby_composer_template['desc']['background_image'];
                                    input = newsmax_ruby_composer_template['input']['text'];
                                    break;

                                case 'header_color' :
                                    title = newsmax_ruby_composer_template['title']['header_color'];
                                    description = newsmax_ruby_composer_template['desc']['header_color'];
                                    input = newsmax_ruby_composer_template['input']['text'];
                                    break;

                                case 'text_style' :
                                    title = newsmax_ruby_composer_template['title']['text_style'];
                                    description = newsmax_ruby_composer_template['desc']['text_style'];
                                    input = newsmax_ruby_composer_template['input']['text_style'];
                                    break;

                                case 'pagination' :
                                    title = newsmax_ruby_composer_template['title']['pagination'];
                                    description = newsmax_ruby_composer_template['desc']['pagination'];
                                    var input_buffer = newsmax_ruby_composer_template['input']['pagination'];
                                    input_buffer = jQuery.parseHTML(input_buffer);
                                    $.each(value, function(type, val) {
                                        if (val == false) {
                                            $(input_buffer).find('option[value=' + type + ']').remove();
                                        }
                                    });
                                    input = $(input_buffer)[0].outerHTML;
                                    break;

                                case 'wrap_mode' :
                                    title = newsmax_ruby_composer_template['title']['wrap_mode'];
                                    description = newsmax_ruby_composer_template['desc']['wrap_mode'];
                                    input = newsmax_ruby_composer_template['input']['wrap_mode'];
                                    break;

                                case 'big_first' :
                                    title = newsmax_ruby_composer_template['title']['big_first'];
                                    description = newsmax_ruby_composer_template['desc']['big_first'];
                                    input = newsmax_ruby_composer_template['input']['enable'];
                                    break;

                                case 'image_url' :
                                case 'image_url_1' :
                                case 'image_url_2' :
                                case 'image_url_3' :
                                case 'image_url_4' :
                                    title = newsmax_ruby_composer_template['title']['image_url'];
                                    description = newsmax_ruby_composer_template['desc']['image_url'];
                                    input = newsmax_ruby_composer_template['input']['text'];
                                    break;

                                case 'description' :
                                case 'description_1':
                                case 'description_2':
                                case 'description_3':
                                case 'description_4':
                                    title = newsmax_ruby_composer_template['title']['description'];
                                    description = newsmax_ruby_composer_template['desc']['description'];
                                    input = newsmax_ruby_composer_template['input']['textarea'];
                                    break;

                                case 'ad_title' :
                                    title = newsmax_ruby_composer_template['title']['ad_title'];
                                    description = newsmax_ruby_composer_template['desc']['ad_title'];
                                    input = newsmax_ruby_composer_template['input']['text'];
                                    break;

                                case 'ad_image' :
                                    title = newsmax_ruby_composer_template['title']['ad_image'];
                                    description = newsmax_ruby_composer_template['desc']['ad_image'];
                                    input = newsmax_ruby_composer_template['input']['text'];
                                    break;

                                case 'ad_url' :
                                    title = newsmax_ruby_composer_template['title']['ad_url'];
                                    description = newsmax_ruby_composer_template['desc']['ad_url'];
                                    input = newsmax_ruby_composer_template['input']['text'];
                                    break;

                                case 'ad_script' :
                                    title = newsmax_ruby_composer_template['title']['ad_script'];
                                    description = newsmax_ruby_composer_template['desc']['ad_script'];
                                    input = newsmax_ruby_composer_template['input']['textarea'];
                                    break;

                                case 'shortcode' :
                                    title = newsmax_ruby_composer_template['title']['shortcode'];
                                    description = newsmax_ruby_composer_template['desc']['shortcode'];
                                    input = newsmax_ruby_composer_template['input']['text'];
                                    break;

                                case 'col_title_1' :
                                case 'col_title_2' :
                                case 'col_title_3' :
                                case 'col_title_4' :
                                    title = newsmax_ruby_composer_template['title']['col_title'];
                                    description = newsmax_ruby_composer_template['desc']['col_title'];
                                    input = newsmax_ruby_composer_template['input']['text'];
                                    break;

                                case 'destination_1' :
                                case 'destination_2' :
                                case 'destination_3' :
                                case 'destination_4' :
                                    title = newsmax_ruby_composer_template['title']['destination'];
                                    description = newsmax_ruby_composer_template['desc']['destination'];
                                    input = newsmax_ruby_composer_template['input']['text'];
                                    break;

                                case 'num_of_col' :
                                    title = newsmax_ruby_composer_template['title']['num_of_col'];
                                    description = newsmax_ruby_composer_template['desc']['num_of_col'];
                                    input = newsmax_ruby_composer_template['input']['num_of_col'];
                                    break;

                                case 'col_img_style' :
                                    title = newsmax_ruby_composer_template['title']['col_img_style'];
                                    description = newsmax_ruby_composer_template['desc']['col_img_style'];
                                    input = newsmax_ruby_composer_template['input']['col_img_style'];
                                    break;

                                case 'raw_html_1' :
                                case 'raw_html_2' :
                                case 'raw_html_3' :
                                case 'raw_html_4' :
                                    title = newsmax_ruby_composer_template['title']['raw_html'];
                                    description = newsmax_ruby_composer_template['desc']['raw_html'];
                                    input = newsmax_ruby_composer_template['input']['raw_html'];
                                    break;

                                case 'custom_html' :

                                    new_block.addClass('is-custom-html');

                                    //set value
                                    title = newsmax_ruby_composer_template['title']['custom_html'];
                                    description = newsmax_ruby_composer_template['desc']['custom_html'];
                                    input = newsmax_ruby_composer_template['input']['custom_html'];

                                    var custom_html_param = {};
                                    custom_html_param.block_id = block_id;
                                    custom_html_param.block_name = 'newsmax_ruby_block_option[' + block_id + '][' + option + ']';

                                    //set default content
                                    if (composer_default_value && typeof composer_default_value[option] != 'undefined') {
                                        custom_html_param.block_content = composer_default_value[option];
                                    } else {
                                        custom_html_param.block_content = '';
                                    }

                                    new_block_options.find('.ruby-block-option-inner').attr('id', 'html-form-' + block_id);
                                    newsmax_ruby_page_builder.custom_html_config(new_block, custom_html_param, input);

                                    break;

                                default:
                                    title = '';
                                    description = '';
                                    input = '';

                                    break;
                            }

                            //create options
                            input = $(input);

                            if ('custom_html' != option) {
                                if (typeof value != 'boolean' && typeof value != 'object' && input.length) {
                                    input.val(value);
                                }

                                //set data
                                if (composer_default_value && typeof composer_default_value[option] != 'undefined') {
                                    switch (option) {
                                        case 'raw_html_1' :
                                        case 'raw_html_2' :
                                        case 'raw_html_3' :
                                        case 'raw_html_4' :
                                            input.html(composer_default_value[option]).text();
                                            break;
                                        default:
                                            input.val(composer_default_value[option]);
                                            break;
                                    }
                                }

                                if ('category_ids' == option) {
                                    input.attr('name', 'newsmax_ruby_block_option[' + block_id + '][' + option + '][]');
                                } else {
                                    input.attr('name', 'newsmax_ruby_block_option[' + block_id + '][' + option + ']');
                                }
                            }

                            new_block_options.find('.ruby-block-option-label').append(title);
                            new_block_options.find('.ruby-block-option-description').append(description);
                            new_block_options.find('.ruby-block-option-inner').append(input);

                            //append setting
                            new_block.find('.ruby-tab-' + tab).append(new_block_options);
                        });
                    });
                }
            });

            //filter action
            newsmax_ruby_page_builder.filter_link(new_block);

            return new_block;
        },

        filter_link: function(block) {
            block.find('.ruby-tab-filter-el').click(function(e) {

                e.preventDefault();
                var filter_el = $(this);
                var filter_name = filter_el.data('filter');
                var filter_wrap = filter_el.parent();
                filter_wrap.find('a').removeClass('filter-active');
                filter_el.addClass('filter-active');

                //show hide block
                block.find('.ruby-tab').hide();
                block.find('.' + filter_name).show();

                return false;
            })
        },

        /************CUSTOM HTML(WYSWYG)************/
        custom_html_config: function(new_block, param, input) {

            //append loading
            new_block.find('#html-form-' + param.block_id).append(input);

            //request wp editor
            $.ajax({
                type: 'POST',
                url: newsmax_ruby_ajax_admin_url,
                data: {
                    action: 'newsmax_ruby_ajax_composer_html',
                    data: param
                },
                success: function(data) {
                    //parse data
                    var mce_id = 'tinymce_' + param.block_id;
                    var mce_data = $.parseJSON(data);

                    new_block.find('.ruby-field-loading').remove();
                    new_block.find('#html-form-' + param.block_id).append(mce_data);

                    //reinstall tinyMCE
                    tinyMCE.init({
                        menubar: false,
                        height: 250
                    });

                    tinyMCE.execCommand('mceAddEditor', false, mce_id);
                    quicktags({ id: mce_id });

                    //trigger
                    $(document).trigger('newsmax_ruby_composer_mce');
                }
            });
        },

        //stop mce
        custom_mce_stop: function(blocks) {
            if (blocks.length > 0) {
                $.each(blocks, function() {
                    var block = $(this);
                    var mce_id = 'tinymce_' + block.find('.ruby-block-name').attr('name');
                    tinyMCE.execCommand('mceRemoveEditor', false, mce_id);
                })
            }
        },

        //restart mce
        custom_mce_start: function(blocks) {
            if (blocks.length > 0) {
                $.each(blocks, function() {
                    var block = $(this);
                    var mce_id = 'tinymce_' + block.find('.ruby-block-name').attr('name');
                    tinyMCE.execCommand('mceAddEditor', false, mce_id);
                })
            }
        },


        /*********** LOAD SAVED PAGE BUILDER*************/
        render_section: function() {
            var newsmax_ruby_composer_editor = $('#newsmax_ruby_composer_editor');

            if ('undefined' === typeof newsmax_ruby_page_composer_data) {
                newsmax_ruby_composer_editor.find('#ruby-composer-loading').fadeTo(400, 0, function() {
                    $(this).remove();
                });
                return;
            }

            $.each(newsmax_ruby_page_composer_data, function(section_id, section_data) {
                newsmax_ruby_page_builder.load_section(section_data['section_type'], section_data);
            });

            newsmax_ruby_composer_editor.find('#ruby-composer-loading').fadeTo(400, 0, function() {
                $(this).remove();
            })
        },

        //check update button
        update_composer: function() {
            //check click on
            $('body').find('#publishing-action').click(function() {
                newsmax_ruby_page_builder.unload_page = false;
            });

            //unload page
            $(window).on('beforeunload', function() {
                if (true === newsmax_ruby_page_builder.unload_page) {
                    newsmax_ruby_page_builder.unload_page = false;
                    return newsmax_ruby_composer_template['unload'];
                }
            })
        }
        /*********** END CORE *************/
    };

    //create unique id
    $.uuid = function() {
        return 'ruby_' + 'xxxxxxxx'.replace(/[xy]/g, function(c) {
            var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
        });
    };

    //init load
    newsmax_ruby_page_builder.init();

});