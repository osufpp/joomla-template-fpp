$(function(){

	var p = $("div.item-page div.product_info");
	if(p) {
		var pid = p.find('.prodid').text();
		var oid = $('.oscid').text();
		$.ajax({
			url: 'http://192.168.1.146/rpeters/shop/ext/tbg_api/product_info.php?cb=?&prod_id='+pid,
			dataType: 'json',
			timeout: 10000,
			success: function(d) {
				if(!d) {
					p.html('Something went wrong.');
				}
				else {
					console.log(d);
					
					p.find('.product_price').html('Price: <span>$'+d.price+'</span>');
					if(d.ISBN10) { p.append('<div>ISBN10: '+d.ISBN10+'</div>'); }
					if(d.ISBN13) { p.append('<div>ISBN13: '+d.ISBN13+'</div>'); }
					if(d.pages) { p.append('<div>'+d.pages+' Pages</div>'); }
					if(d.edition) { p.append('<div>'+d.edition+'</div>'); }
					if(d.year) { p.append('<div>Year: '+d.year+'</div>'); }

					if(d.availability) {
						p.append('<form method="post" action="http://192.168.1.146/rpeters/shop/product_info.php/products_id/'+oid+'/action/add_product">\
									<input type="submit" class="cartbtn" value="Add to Cart" />\
								</form>');
					} else {
						p.append('<span class="unavailable">Unavailable</span>');
					}
					p.append('<a class="btn" href="http://192.168.1.146/rpeters/shop/product_info.php/products_id/'+oid+'">\
									<button type="button" class="cartbtn">Product Info</button>\
								</a>');
				}
			},
			error: function() {
				p.find('.product_price').text('Error loading information.');
			}
		});

	}

});