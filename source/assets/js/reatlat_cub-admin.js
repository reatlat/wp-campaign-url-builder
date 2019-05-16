jQuery(function ($) {

    var $_GET = function (param) {
        var vars;
        vars = {};
        window.location.href.replace(location.hash, '').replace(/[?&]+([^=&]+)=?([^&]*)?/gi, function (m, key, value) {
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

    $.fn.simulateClick = function () {
        return this.each(function () {
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

    $(document).ready(function () {

        class Campaign_URL_Builder_WPAdmin {
            constructor() {
                this.plugin_name = 'Campaign-URL-Builder';
                this.ajax_url = REATLAT_CUB_APP.AJAXURL;
                this.debug_js = REATLAT_CUB_APP.DEBUG_JS;
                this._init(this);
            }

            /**
             * Initial scripts and triggers
             * @private
             */
            _init(self) {
                this._debugLog('debug log activated');

                this._triggers(this);
                this._copyToClipboard();
                this._tippy();
                this._formValidator();
                this._formAjaxPost(this);

                if ($('#reatlat_cub_result__table').length) {
                    this._tablePagination(this);
                }
            }

            /**
             * init Clipboard script
             * @private
             */
            _copyToClipboard() {
                this._debugLog('copy to clipboard activated');
                new window[REATLAT_CUB_APP.CLIPBOARD]('td[data-copy]');
            }

            /**
             * event/click triggers
             * @param self
             * @private
             */
            _triggers(self) {

                $('td[data-copy]').on('click', function (e) {
                    e.preventDefault();
                    $('.reatlat_cub_notice--clipboard').show();
                    setTimeout(function () {
                        $('.reatlat_cub_notice--clipboard').fadeOut("slow");
                    }, 450);
                });

                $('.reatlat_cub_add_custom-params').on('click', function (e) {
                    e.preventDefault();
                    if ($('.reatlat_cub_custom-params.disabled').length === 1) {
                        $(this).hide();
                    }
                    var element = $('.reatlat_cub_custom-params.disabled').first();
                    element.removeClass('disabled');
                    element.show();
                });

                $('.reatlat_cub_tabs li a, a.reatlat_cub_tab_link').on('click', function (e) {
                    $('.reatlat_cub_tab, .reatlat_cub_tabs li a').removeClass('active');
                    $(this).addClass('active');
                    $('.reatlat_cub_tab.' + $(this).attr('href').substr(1) + ', .reatlat_cub_tabs li a[href="' + $(this).attr('href') + '"]').addClass('active');
                });

                if ($_GET('page') === 'reatlat_cub-settings-page' && window.location.hash.substr(0, 17) === '#reatlat_cub_tab-' && window.location.hash.slice(-1) !== '0') {
                    $('.reatlat_cub_tabs li a[href="' + window.location.hash + '"]').simulateClick();
                }
            }

            _tippy() {
                if ( typeof tippy === "function" ) {
                    this._debugLog('TippyJS activated');
                    tippy('.tippy', {
                        trigger: 'click'
                    });
                    tippy('.tippy--hover');
                } else {
                    this._debugLog('TippyJS not founded');
                }
            }

            /**
             * FormValidator
             * @private
             */
            _formValidator() {
                this._debugLog('Run _formValidator()');
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
             * Form Ajax Post request
             * @param self
             * @private
             */
            _formAjaxPost(self) {
                if ($_GET('page') !== 'reatlat_cub-settings-page' && $_GET('action') === 'edit') {
                    $('.js-reatlat_cub--create-link').on('click', function () {

                        if ($('input[name="campaign_page"]').val().length > 9 && $('input[name="campaign_page"]').val().includes('//') && $('input[name="campaign_page"]').val().slice(0, 4) === 'http' && $('input[name="campaign_name"]').val().length > 1) {
                            $.ajax({
                                type: "POST",
                                url: ajaxurl,
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
                                    "Campaign-URL-Builder__submit_manage_links--nonce": $('input[name="Campaign-URL-Builder__submit_manage_links--nonce"]').val(),
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

                                    if ( $('.reatlat_cub_result__table_pagination').attr('data-page-count') > 1 ) {
                                        $(tableRow).insertAfter('.reatlat_cub_result__table tbody tr.reatlat_cub_result__table__headrow');
                                    } else {
                                        $(tableRow).insertBefore('.reatlat_cub_result__table tbody tr.reatlat_cub_link-on-list.first-link');
                                    }

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

                $('.js-export_to_csv').on('click', function () {
                    if (confirm('Campaign URL Builder\n\nExport UTM links list to CSV file?')) {
                        $.ajax({
                            type: "POST",
                            url: ajaxurl,
                            data: {
                                action: 'reatlat_cub_export_csv',
                                "Campaign-URL-Builder__export_to_csv--nonce": $('input[name="Campaign-URL-Builder__export_to_csv--nonce"]').val()
                            }
                        }).done(function (data) {
                            if ( data !== 'error' ) {
                                var timestamp, element;

                                timestamp = new Date();

                                element = document.createElement('a');
                                element.setAttribute('href', 'data:application/octet-stream,' + encodeURIComponent(data));
                                element.setAttribute('download', 'UTM_links_' + self._formatDate(timestamp) + '-' + Math.floor(timestamp.getTime() / 1000) + '.csv');
                                element.style.display = 'none';

                                document.body.appendChild(element);

                                element.click();

                                document.body.removeChild(element);
                            } else {
                                console.log('Export to CSV status:  ' + data);
                            }
                        });
                    }
                    return false;
                });

            }

            /**
             * Pormat Date
             * @param date
             * @returns {string}
             * @private
             */
            _formatDate(date) {
                var d = new Date(date),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();

                if (month.length < 2) month = '0' + month;
                if (day.length < 2) day = '0' + day;

                return [year, month, day].join('-');
            }

            /**
             * Table pagination
             * @link https://codepen.io/bastony/pen/eBvOGv
             * @param self
             * @private
             */
            _tablePagination(self) {
                // get the table element
                var table, rowsPerPage, rowCount, firstRow, tableRows, $i, $ii, $j, pagination, info, pageCount, hasHead, tableHead;

                table = document.getElementById("reatlat_cub_result__table");

                pagination = $('.reatlat_cub_result__table_pagination');

                info = $('.table_pagination__currentpage');

                // number of rows per page
                rowsPerPage = pagination.attr('data-rows-per-page') ? parseInt(pagination.attr('data-rows-per-page')) : 10;

                // number of rows of the table
                rowCount = table.rows.length;

                // get the first cell's tag name (in the first row)
                firstRow = table.rows[0].firstElementChild.tagName;

                // boolean var to check if table has a head row
                hasHead = (firstRow === "TH");

                // an array to hold each row
                tableRows = [];

                // loop counters, to start count from rows[1] (2nd row) if the first row has a head tag
                $j = (hasHead) ? 1 : 0;

                // holds the first row if it has a (<TH>) & nothing if (<TD>)
                tableHead = (hasHead ? table.rows[(0)].outerHTML : "");


                // count the number of pages
                pageCount = Math.ceil((rowCount - 1) / rowsPerPage);

                pagination.attr('data-page-count', pageCount);
                // if we had one page only, then we have nothing to do ..
                if (pageCount > 1) {

                    // assign each row outHTML (tag name & innerHTML) to the array
                    for ($i = $j, $ii = 0; $i < rowCount; $i++, $ii++)
                        tableRows[$ii] = table.rows[$i].outerHTML;

                    // the first sort, default page is the first one
                    sortTable(1);
                    info.html('Page 1 of ' + pageCount);
                }

                // Trigger Prev page
                $('.js-sortTable--prev').on('click', function (event) {
                    event.preventDefault();
                    var currentPage = parseInt(pagination.attr('data-current-page'));
                    if (currentPage > 1) {
                        var page = currentPage - 1;
                        sortTable(page);
                        pagination.attr('data-current-page', page);
                        info.html('Page ' + page + ' of ' + pageCount);
                    }
                });

                // Trigger Next page
                $('.js-sortTable--next').on('click', function (event) {
                    event.preventDefault();
                    var currentPage = parseInt(pagination.attr('data-current-page'));
                    if (currentPage < pageCount) {
                        var page = currentPage + 1;
                        sortTable(page);
                        pagination.attr('data-current-page', page);
                        info.html('Page ' + page + ' of ' + pageCount);
                    }
                });

                // ($page) is the selected page number. it will be generated when a user clicks a button
                function sortTable($page) {
                    /* create ($rows) a variable to hold the group of rows
                    ** to be displayed on the selected page,
                    ** ($s) the start point .. the first row in each page, Do The Math
                    */
                    var $rows = tableHead, $s = ((rowsPerPage * $page) - rowsPerPage);
                    for ($i = $s; $i < ($s + rowsPerPage) && $i < tableRows.length; $i++)
                        $rows += tableRows[$i];


                    // now the table has a processed group of rows ..
                    table.innerHTML = $rows;
                    tippy('.tippy--hover');
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

        }

        window['Campaign-URL-Builder-WPAdmin'] = new Campaign_URL_Builder_WPAdmin();


    });

});