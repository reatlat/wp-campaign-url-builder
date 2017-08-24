jQuery(function($) {

    $( document ).ready(function() {

        new WOW().init();

		new Clipboard('td[data-copy]');

		$('td[data-copy]').on('click', function(e) {
			e.preventDefault();
            $('.reatlat_cub_notice').show();
            setTimeout(function () {
                $('.reatlat_cub_notice').fadeOut("slow");
            },450);
		});

        $( "#reatlat_cub_campaign-form" ).validate({
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

		if (window.location.hash.substr(0,17) == '#reatlat_cub_tab-') {
			$('.reatlat_cub_tabs li a[href="' + window.location.hash + '"]').simulateClick();
		}

		if( $('.reatlat_cub_promote_container').length == 0 || $('.reatlat_cub_promote_container').text().length == 0 ) {
			$('#reatlat_cub form p.submit').each(function(i) {
				$(this).find('input[type="submit"]').remove();
				$(this).html('<div class="reatlat_cub_error">The plugin is <strong>now inactive</strong> because it has been modified to hide original author information.<br>Please contact your administrator.</div>')
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