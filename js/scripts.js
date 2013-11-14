jQuery.noConflict();

jQuery(function(){

jQuery('.hidden').hide();


// Top button bar
    jQuery(".navbar a.hidden").parent('li').remove();
    jQuery('#HeaderRight .buttons').buttonset();
    jQuery('#HeaderRight .buttons li a:contains("Cart")').button( "option", "icons", {primary:'ui-icon-cart'});
    jQuery('#HeaderRight .buttons li a:contains("Account")').button( "option", "icons", {primary:'ui-icon-person'});
    jQuery('#HeaderRight .buttons li a:contains("Log In")').button( "option", "icons", {primary:'ui-icon-locked'});

// Make treeviews look nicer
    jQuery('li:last-child').addClass('last');

// Live product information
    var p = jQuery("div.item-page div.product_info");
    var link = "https://shop.ifsta.org";
    if(p) {
        p.find('.product_price').html("Loading...");
        var pid = p.find('.prodid').text();
        var oid = jQuery('.oscid').text();
        jQuery.ajax({
            url: link + '/ext/tbg_api/product_info.php?cb=?&prod_id='+pid,
            dataType: 'json',
            timeout: 10000,
            success: function(d) {
                if(!d) {
                    p.html('Something went wrong.');
                }
                else {
                    if(d.availability) {
                        p.html('<strong>Price:</strong> <span>$'+d.price+'</span>');
                    }
                    else {
                        p.html('<span class="unavailable">Unavailable</span>');
                    }
                    p.append('<div><strong>IFSTA Item Number:</strong> '+pid+'</div>');
                    if(d.publisher) { p.append('<div><strong>Publisher:</strong> '+d.publisher+'</div>'); 		}
                    if(d.ISBN13) 	{ p.append('<div><strong>ISBN:</strong> '+d.ISBN13+'</div>'); 	        }
                    if(d.edition) 	{ p.append('<div><strong>Edition:</strong> '+d.edition+'</div>'); 		    }
                    if(d.year) 		{ p.append('<div><strong>Year:</strong> '+d.year+'</div>'); 		        }
                    if(d.pages) 	{ p.append('<div><strong>Pages:</strong> '+d.pages+'</div>'); 	            }

                    if(d.availability) {
                        p.append('<a href="'+ link +'/ext/tbg_api/buy_ifsta_product.php?prod_id='+pid+'" class="cartbtn button ui-priority-primary">Add to Cart</a>');
                    }
                    p.append('<a href="'+ link +'/ext/tbg_api/ifsta_product.php?prod_id='+pid+'" class="prodbtn button ui-priority-primary">Product Info</a>');
                }

                // Product cart/info buttons
                jQuery(".cartbtn").button({ icons: {primary:'ui-icon-cart'}});
                jQuery(".prodbtn").button({ icons: {primary:'ui-icon-help'}});

            },
            error: function() {
                p.find('.product_price').text('Error loading information.');
            }
        });

    }

// Slideshow
    jQuery(".button").button();
    if(jQuery("ul#slideshow")) {
        jQuery("ul#slideshow").slideshow();
    }

// Chapter lists
    jQuery("div#chapterlist").hide();
    jQuery("#chapterlist_header").click(function() {
        jQuery("#chapterlist").toggle(600);
    })

// Search box autocompletion
    jQuery("#mod-search-searchword").autocomplete({
        source: function(request, response)
        {
            jQuery.ajax({
                url: "/templates/fpp/autocomplete_searches.php",
                dataType: "json",
                data: {
                    maxRows: 12,
                    term: request.term
                },
                success: function(data)
                {
                    response(jQuery.map(data.suggestions, function(item)
                    {
                        return {
                            label: item.title,
                            value: item.title,
                            url: item.url
                        }
                    }));
                },
                failure: function (errMsg)
                {
                    alert(errMsg);
                }
            });
        },
        width: 260,
        selectFirst: true,
        minLength: 2,
        select: function(event, ui)
        {
            window.location.href = ui.item.url;
        },
        open: function ()
        {
            jQuery(this).removeClass("ui-corner-all").addClass("ui-corner-top");

        },
        close: function ()
        {
            jQuery(this).removeClass("ui-corner-top").addClass("ui-corner-all");
        }

    });

    // ChronoForms field label width
    jQuery('div.ccms_form_element .nowrap').parent().find('label').addClass('tbg_longlabel');

    // Red-ification of search text field.
    var isIE = !!jQuery.browser.msie;
    var isFF = !!jQuery.browser.mozilla;
    var searchInput = jQuery('#mod-search-searchword');
    searchInput.css('border', '2px solid rgb(181, 9, 0)')
               .css('border-right', '0')
               .css('margin', '0')
               .css('padding', '0')
               .css('vertical-align', (isIE ? '13px' : '11px'))
               .css('height', '25px')
    ;
    searchInput.removeClass('ui-corner-all').addClass('ui-corner-left');
    console.log('is it msie? ' + isIE);
    var goButtonSrc = '/templates/fpp/images/' + (isIE ? 'GoButton_ie.png' : (isFF ? 'GoButton_ff.png' : 'GoButton.png'));
    var oldGoButton = jQuery('input[value=Go][type=submit]');
    oldGoButton.replaceWith('<input id="go-button" type="image" src="' + goButtonSrc + '" alt="Submit search button" class="ui-corner-right" />');
    jQuery('#go-button').css('vertical-align', (isIE ? '3px' : (isFF ? '0px' : '1px')));
    if (isIE) {
        searchInput.parent().css('margin-top', '33px');
    }

    // Add distance around lateral edges of myIFSTA icon to
    // see menu bar borders.
    var myIconThingy = jQuery('.my_icon');
    myIconThingy.css('margin-right', '1px');

});
