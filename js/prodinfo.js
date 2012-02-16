$(function(){

	var p = $("div.item-page div.product_info");
    var link = "https://shop.ifsta.org";
	if(p) {
		p.find('.product_price').html("Loading...");
		var pid = p.find('.prodid').text();
		var oid = $('.oscid').text();
		$.ajax({
			url: link + '/ext/tbg_api/product_info.php?cb=?&prod_id='+pid,
			dataType: 'json',
			timeout: 10000,
			success: function(d) {
				if(!d) {
					p.html('Something went wrong.');
				}
				else {
                    p.html('<strong>Price:</strong> <span>$'+d.price+'</span>');
                    if(d.publisher) { p.append('<div><strong>Publisher:</strong> '+d.publisher+'</div>'); 		}
                    if(d.ISBN10) 	{ p.append('<div><strong>ISBN10:</strong> '+d.ISBN10+'</div>'); 	}
					if(d.ISBN13) 	{ p.append('<div><strong>ISBN13:</strong> '+d.ISBN13+'</div>'); 	}
					if(d.edition) 	{ p.append('<div><strong>Edition:</strong> '+d.edition+'</div>'); 		}
					if(d.year) 		{ p.append('<div><strong>Year:</strong> '+d.year+'</div>'); 		}
                    if(d.pages) 	{ p.append('<div><strong>Pages:</strong> '+d.pages+'</div>'); 	}

					if(d.availability) {
						p.append('<form method="post" action="'+ link +'/ext/tbg_api/buy_ifsta_product.php?prod_id='+pid+'">\
									<input type="submit" class="cartbtn button" value="Add to Cart" />\
								</form>');
					} else {
						p.append('<span class="unavailable">Unavailable</span>');
					}
					p.append('<form method="get" action="'+ link +'/ext/tbg_api/ifsta_product.php">\
									<input type="hidden" name="prod_id" value="'+pid+'" />\
									<input type="submit" class="cartbtn button" value="Product Info"/>\
								</form>');
				}
                $(".button").button();
			},
			error: function() {
				p.find('.product_price').text('Error loading information.');
			}
		});

	}

    $("div#chapterlist").hide();
    $("#chapterlist_header").click(function() {
        $("#chapterlist").toggle(600);
    })

});