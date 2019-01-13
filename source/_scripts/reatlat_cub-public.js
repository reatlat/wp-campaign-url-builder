jQuery(function ($) {
    $(document).ready(function () {

        class Campaign_URL_Builder {
            constructor() {
                this.location = window.location;
                this.plugin_name = 'Campaign-URL-Builder';
                this.ajax_url = REATLAT_CUB_APP.AJAXURL;
                this.shortcode_action = REATLAT_CUB_APP.SC_ACTION;
                this.debug_js = REATLAT_CUB_APP.DEBUG_JS;
                this._init(this);
            }

            /**
             * Initial scripts and triggers
             * @private
             */
            _init() {
                this._debugLog('debug log activated');

                if (this._is_shortcode_form_active()) {

                    this._triggers(this);

                }
            }

            /**
             * FormValidator
             * TODO: have to check it twice!
             * @private
             */
            _formValidator() {
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
            }

            /**
             * init Clipboard script
             * TODO: have to check it twice!
             * @private
             */
            _copyToClipboard() {
                new Clipboard('td[data-copy]');
            }

            /**
             * event/click triggers
             * @param self
             * @private
             */
            _triggers(self) {
                $('.js-reatlat_cub--create-link').on('click', function () {
                    self._debugLog('trigger .js-reatlat_cub--create-link');
                    self._formAjaxPost(self);
                    // do not reload page!
                    return false;
                });
            }

            /**
             * Form Ajax Post request
             * @param self
             * @private
             */
            _formAjaxPost(self) {

                //TODO: addd validayion form
                if ($('input[name="campaign_page"]').val().length > 9 && $('input[name="campaign_page"]').val().includes('//') && $('input[name="campaign_page"]').val().slice(0, 4) === 'http' && $('input[name="campaign_name"]').val().length > 1) {
                    $.ajax({
                        type: "POST",
                        url: self.ajax_url,
                        data: {
                            action: self.shortcode_action,
                            campaign_page: $('input[name="campaign_page"]').val(),
                            campaign_source: $('input[name="campaign_source"]').val(),
                            campaign_medium: $('input[name="campaign_medium"]').val(),
                            campaign_name: $('input[name="campaign_name"]').val(),
                            campaign_term: $('input[name="campaign_term"]').val(),
                            campaign_content: $('input[name="campaign_content"]').val(),
                            custom_key_1: $('input[name="custom_key_1"]').val(),
                            custom_value_1: $('input[name="custom_value_1"]').val(),
                            custom_key_2: $('input[name="custom_key_2"]').val(),
                            custom_value_2: $('input[name="custom_value_2"]').val(),
                            custom_key_3: $('input[name="custom_key_3"]').val(),
                            custom_value_3: $('input[name="custom_value_3"]').val(),
                            "Campaign-URL-Builder__submit_manage_links--nonce": $('input[name="Campaign-URL-Builder__submit_manage_links--nonce"]').val(),
                            submit_manage_links: $('input[name="submit_manage_links"]').val()
                        }
                    }).done(function (msg) {
                        self._debugLog('AJAX Success, respond:', msg);
                        if (msg.result) {
                            $('.Campaign-URL-Builder .notification--success').show();
                            setTimeout(function () {
                                $('.Campaign-URL-Builder .notification--success').fadeOut("slow");
                            }, 450);

                            // var tableRow = '<tr class="reatlat_cub_yellow-highlight animated fadeInUp">';
                            // tableRow += '<td class="campaign_info"></td>';
                            // tableRow += '<td class="campaign_name"><strong>' + msg.campaign_name + '</strong></td>';
                            // if (msg.campaign_short_link.length > 6) {
                            //     tableRow += '<td class="campaign_short_link tippy--hover" data-clipboard-text="' + msg.campaign_short_link + '" data-copy="true" data-original-title="Click cell to copy to clipboard">' + msg.campaign_short_link + '<span class="dashicons dashicons-clipboard"></span></td>';
                            // } else {
                            //     tableRow += '<td class="campaign_short_link">n/a</td>';
                            // }
                            // tableRow += '<td class="campaign_full_link tippy--hover" data-clipboard-text="' + msg.campaign_full_link + '" data-copy="true" data-original-title="Click cell to copy to clipboard">' + msg.campaign_full_link + '<span class="dashicons dashicons-clipboard"></span></td> ';
                            // if ($('td.campaign_user_id').length) {
                            //     tableRow += '<td></td>';
                            // }
                            // tableRow += '</tr>';
                            // $(tableRow).insertAfter('.reatlat_cub_result__table tbody tr.reatlat_cub_result__table__headrow');

                            //TODO: tippy('.tippy--hover' );

                        } else {
                            $('.Campaign-URL-Builder .notification--error').show();
                            setTimeout(function () {
                                $('.Campaign-URL-Builder .notification--error').fadeOut("slow");
                            }, 1000);
                        }
                        return false;
                    });
                } else {
                    self._debugLog('Something wrong, looks like one of important parameters empty 🤔');
                }

            }

            /**
             * Debug Log
             * @param args
             */
            _debugLog(...args) {
                if (this.debug_js) {
                    console.log('🦄 ' + this.plugin_name + ' =>\n', ...args);
                }
            }

            /**
             * Check is Campaign-URL-Builder shortcode used on current page
             * @returns {boolean}
             */
            _is_shortcode_form_active() {
                return Boolean($('.Campaign-URL-Builder').length);
            }

        }

        window['Campaign-URL-Builder'] = new Campaign_URL_Builder();

    })
});