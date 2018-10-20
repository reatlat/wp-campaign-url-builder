jQuery(function($) {

    var $_GET = function(param) {
        var vars;
        vars = {};
        window.location.href.replace(location.hash, '').replace(/[?&]+([^=&]+)=?([^&]*)?/gi, function(m, key, value) {
            vars[key] = value !== void 0 ? value : '';
        });
        if (param) {
            if (vars[param]) {
                return vars[param];
            } else {
                return null;
            }
        }
        return vars;
    };

    $( document ).ready(function() {

		new Clipboard('td[data-copy]');

        tippy('.tippy', { trigger: 'click' } );
        tippy('.tippy--hover' );

        $('td[data-copy]').on('click', function(e) {
			e.preventDefault();
            $('.reatlat_cub_notice--clipboard').show();
            setTimeout(function () {
                $('.reatlat_cub_notice--clipboard').fadeOut("slow");
            },450);
		});

        $( '#reatlat_cub_campaign-form' ).validate({
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

        $('.reatlat_cub_add_custom-params').on('click', function (e) {
            e.preventDefault();
            if ( $('.reatlat_cub_custom-params.disabled').length === 1 ) {
                $(this).hide();
            }
            var element = $('.reatlat_cub_custom-params.disabled').first();
            element.removeClass('disabled');
            element.show();
        });

		$('.reatlat_cub_tabs li a, a.reatlat_cub_tab_link').on('click', function(e) {
			$('.reatlat_cub_tab, .reatlat_cub_tabs li a').removeClass('active');
			$(this).addClass('active');
			$('.reatlat_cub_tab.' + $(this).attr('href').substr(1) + ', .reatlat_cub_tabs li a[href="' + $(this).attr('href') + '"]').addClass('active');
		});

		if ( $_GET('page') === 'reatlat_cub-settings-page' && window.location.hash.substr(0,17) === '#reatlat_cub_tab-' && window.location.hash.slice(-1) !== '0' )
		{
			$('.reatlat_cub_tabs li a[href="' + window.location.hash + '"]').simulateClick();
		}

        if ( $_GET('page') !== 'reatlat_cub-settings-page' && $_GET('action') === 'edit' )
        {
            $('.js-reatlat_cub--create-link').on('click', function () {

                if ( $('input[name="campaign_page"]').val().length > 9 && $('input[name="campaign_page"]').val().includes('//') && $('input[name="campaign_page"]').val().slice(0,4) === 'http' && $('input[name="campaign_name"]').val().length > 1 )
                {
                    $.ajax({
                        type: "POST",
                        url: ajaxurl,
                        data: {
                            action:              'reatlat_cub_create_link',
                            campaign_page:       $('input[name="campaign_page"]').val(),
                            campaign_source:     $('select[name="campaign_source"]').val(),
                            campaign_medium:     $('select[name="campaign_medium"]').val(),
                            campaign_name:       $('input[name="campaign_name"]').val(),
                            campaign_term:       $('input[name="campaign_term"]').val(),
                            campaign_content:    $('input[name="campaign_content"]').val(),
                            custom_key_1:        $('input[name="custom_key_1"]').val(),
                            custom_value_1:      $('input[name="custom_value_1"]').val(),
                            custom_key_2:        $('input[name="custom_key_2"]').val(),
                            custom_value_2:      $('input[name="custom_value_2"]').val(),
                            custom_key_3:        $('input[name="custom_key_3"]').val(),
                            custom_value_3:      $('input[name="custom_value_3"]').val(),
                            submit_manage_links: $('input[name="submit_manage_links"]').val()
                        }
                    }).done(function( msg ) {
                        console.log( "WP Campaign URL Builder: ", msg );
                        if (msg.result) {
                            $('.reatlat_cub_notice--success').show();
                            setTimeout(function () {
                                $('.reatlat_cub_notice--success').fadeOut("slow");
                            },450);

                            //TODO: JS append url to table


                        } else {
                            $('.reatlat_cub_notice--error').show();
                            setTimeout(function () {
                                $('.reatlat_cub_notice--error').fadeOut("slow");
                            },1000);
                        }
                        return false;
                    });
                }

                // do not reload page!
                return false;
            });
        }

    });

    $.fn.simulateClick = function() {
        return this.each(function() {
            if ('createEvent' in document) {
                var doc = this.ownerDocument,
                    evt = doc.createEvent('MouseEvents');
                evt.initMouseEvent('click', true, true, doc.defaultView, 1, 0, 0, 0, 0, false, false, false, false, 0, null);
                this.dispatchEvent(evt);
            } else {
                this.click();
            }
        });
    };

});