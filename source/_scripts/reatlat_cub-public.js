jQuery(function ($) {
    $(document).ready(function () {


        if (is_shortcode_form_active()) {

            new Clipboard('td[data-copy]');

            $('#reatlat_cub_campaign-form').validate({
                rules: {
                    campaign_page: {
                        required: true,
                        url: true
                    },
                    campaign_name: {
                        required: true
                    }
                }
            });


            if ($_GET('page') !== 'reatlat_cub-settings-page' && $_GET('action') === 'edit') {
                $('.js-reatlat_cub--create-link').on('click', function () {

                    if ($('input[name="campaign_page"]').val().length > 9 && $('input[name="campaign_page"]').val().includes('//') && $('input[name="campaign_page"]').val().slice(0, 4) === 'http' && $('input[name="campaign_name"]').val().length > 1) {
                        $.ajax({
                            type: "POST",
                            url: REATLAT_CUB_APP.AJAXURL,
                            data: {
                                action: 'reatlat_cub_create_link',
                                campaign_page: $('input[name="campaign_page"]').val(),
                                campaign_source: $('select[name="campaign_source"]').val(),
                                campaign_medium: $('select[name="campaign_medium"]').val(),
                                campaign_name: $('input[name="campaign_name"]').val(),
                                campaign_term: $('input[name="campaign_term"]').val(),
                                campaign_content: $('input[name="campaign_content"]').val(),
                                custom_key_1: $('input[name="custom_key_1"]').val(),
                                custom_value_1: $('input[name="custom_value_1"]').val(),
                                custom_key_2: $('input[name="custom_key_2"]').val(),
                                custom_value_2: $('input[name="custom_value_2"]').val(),
                                custom_key_3: $('input[name="custom_key_3"]').val(),
                                custom_value_3: $('input[name="custom_value_3"]').val(),
                                submit_manage_links: $('input[name="submit_manage_links"]').val()
                            }
                        }).done(function (msg) {
                            if (msg.result) {
                                $('.reatlat_cub_notice--success').show();
                                setTimeout(function () {
                                    $('.reatlat_cub_notice--success').fadeOut("slow");
                                }, 450);

                                var tableRow = '<tr class="reatlat_cub_yellow-highlight animated fadeInUp">';
                                tableRow += '<td class="campaign_info"></td>';
                                tableRow += '<td class="campaign_name"><strong>' + msg.campaign_name + '</strong></td>';
                                if (msg.campaign_short_link.length > 6) {
                                    tableRow += '<td class="campaign_short_link tippy--hover" data-clipboard-text="' + msg.campaign_short_link + '" data-copy="true" data-original-title="Click cell to copy to clipboard">' + msg.campaign_short_link + '<span class="dashicons dashicons-clipboard"></span></td>';
                                } else {
                                    tableRow += '<td class="campaign_short_link">n/a</td>';
                                }
                                tableRow += '<td class="campaign_full_link tippy--hover" data-clipboard-text="' + msg.campaign_full_link + '" data-copy="true" data-original-title="Click cell to copy to clipboard">' + msg.campaign_full_link + '<span class="dashicons dashicons-clipboard"></span></td> ';
                                if ($('td.campaign_user_id').length) {
                                    tableRow += '<td></td>';
                                }
                                tableRow += '</tr>';
                                $(tableRow).insertAfter('.reatlat_cub_result__table tbody tr.reatlat_cub_result__table__headrow');

                                //TODO: tippy('.tippy--hover' );

                            } else {
                                $('.reatlat_cub_notice--error').show();
                                setTimeout(function () {
                                    $('.reatlat_cub_notice--error').fadeOut("slow");
                                }, 1000);
                            }
                            return false;
                        });
                    }

                    // do not reload page!
                    return false;
                });
            }
        }

        /**
         * Check is Campaign-URL-Builder shortcode used on current page
         * @returns {boolean}
         */
        function is_shortcode_form_active() {
            return Boolean( $('.Campaign-URL-Builder').length );
        }

    })
});