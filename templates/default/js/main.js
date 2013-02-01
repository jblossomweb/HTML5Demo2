// adds commas to numbers
$.fn.digits = function(){ 
    return this.each(function(){ 
        $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
    })
}

// check to see if string is valid JSON
function isValidJSON(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}

$(document).ready(function() {

	// cool effect
	$("#container").fadeIn(100);

	// jblossom imgbox
	$(".product.span4 p.imgbox img").each(function( index ) {
		if ($(this).height() > $(this).parent().parent().height()) {
			var d = $(this).height() - $(this).parent().parent().height();
			$(this).css('marginTop', '-'+(d/2)+'px');
		}
	});
	
	// simple demo cart (I know I'm making redundant ajax calls, and its not ideal. I wrote it in a hurry, and did not refactor anything)
	
	// init event
	if ($.cookie(CART_COOKIE) && isValidJSON($.cookie(CART_COOKIE))) { 
		refreshCart();
		totalCart();
		//$("#cart-dropdown").parent("li.cart.dropdown").show();
	}
	
	// add to cart button event
	$("a.cart.btn").click(function() {
		var id = $(this).attr('id').substr(4);
		addToCart(id);
		refreshCart();
		// I am not friends with Bootstrap right now
		$("#cart-dropdown").show().delay(2000).fadeOut(250);
		$("#cart-dropdown").parent("li").children("a").attr('href',BASE_PATH+"cart").attr('data-toggle',null);
	});
	
	// cart details page qty change
	$("#largeCart table td.qty input").change(function() {
		var qty = $(this).val();
		var id = $(this).attr('id').substr(3);
		if(!isNaN(qty)){
			adjustCart(id,qty);
			$.ajax({ type: 'POST', url: BASE_PATH+"ajax/getProduct.php", data: { "id": id },
					success: function(data){
						$("span#subtotal"+id).html((data.price_numeric * qty)).digits();
						$("#cart-dropdown").append('<li><a>x'+qty+' <img src="'+BASE_PATH+"media/"+data.img+'" width="20"/> '+data.name+'</a></li>');
						totalCart();
					},
					dataType: "json",
					async:false //because we're looping
				});
			
			//refreshCart();
			
		}
	});

	
	function totalCart() {
		
		if (isValidJSON($.cookie(CART_COOKIE))) {
			var cartObject = JSON.parse($.cookie(CART_COOKIE));
			var total = 0;
			$.each(cartObject, function() {
					var qty = this.qty;
					var id = this.id;
					
					$.ajax({ type: 'POST', url: BASE_PATH+"ajax/getProduct.php", data: { "id": this.id },
						success: function(data){
							//
							total += (qty * data.price_numeric);
						},
						dataType: "json",
						async:false //because we're looping a total used on the following line
					});
			});
			$("#largeCart .totalbox p.price span").html(total).digits();
		}
	}
	
	function refreshCart(){
	
		if (isValidJSON($.cookie(CART_COOKIE))) {
			var cartObject = JSON.parse($.cookie(CART_COOKIE));
			
			
			if(Object.keys(cartObject).length > 0){
			
				$("#cart-dropdown").html('<li class="nav-header">Contents</li>'); // clear it for rebuild
				
				if (false && SITE_PAGE == 'cart' && $("#largeCart table").length > 0) { // we are on the cart page
					// not going to do this
				}
				
				$.each(cartObject, function() {
					var qty = this.qty;
					var id = this.id;
					$.ajax({ type: 'POST', url: BASE_PATH+"ajax/getProduct.php", data: { "id": this.id },
						success: function(data){
							$("#cart-dropdown").append('<li><a>x'+qty+' <img src="'+BASE_PATH+"media/"+data.img+'" width="20"/> '+data.name+'</a></li>');
						},
						dataType: "json",
						async:false //because we're looping
					});
				});
				
				$("#cart-dropdown").append('<li class="divider"></li>');
				$("#cart-dropdown").append('<li class="nav-header">Actions</li>');
				$("#cart-dropdown").append('<li><a href="'+BASE_PATH+'cart">Details / Checkout</a></li>');
				
				
			
			} else {
				$("#cart-dropdown").html('<li class="nav-header">(Cart is Empty)</li>');
			}
		
		}

		
	}

	function addToCart(id){
		// use global CART_COOKIE passed from php constant
		if ($.cookie(CART_COOKIE) && isValidJSON($.cookie(CART_COOKIE))) { 
			// CART_COOKIE exists: parse and check if product is here
			var inCart = false;
			
			var cartObject = JSON.parse($.cookie(CART_COOKIE));
			$.each(cartObject, function() {
				if (this.id == id) {
					inCart = true;
					// in cart: increment qty
					this.qty++;
				}
			});
			if(!inCart){
					// not in cart: add it
					cartObject[Object.keys(cartObject).length] = {"id":id,"qty":"1"};
			} 
			// save
			$.cookie(CART_COOKIE, JSON.stringify(cartObject), { expires: 30, path: '/',raw: true });
			
		} else {
			// CART_COOKIE does not exist: create it, add id as first item
			$.cookie(CART_COOKIE, JSON.stringify({0:{"id":id,"qty":1}}), { expires: 30, path: '/',raw: true });
		}
		
		window.location = BASE_PATH+'cart'; // just do a redirect and be done with it. better pay flow.
	}
	
	
	function adjustCart(id,qty){
		// use global CART_COOKIE passed from php constant
		if ($.cookie(CART_COOKIE) && isValidJSON($.cookie(CART_COOKIE))) { 
			// CART_COOKIE exists: parse and check if product is here
			var cartObject = JSON.parse($.cookie(CART_COOKIE));
			$.each(cartObject, function() {
				if (this.id == id) {
					// in cart: adjust qty
					this.qty = qty;
					if (this.qty < 1) {
						delete this;
					}
				}
			});
			// save
			$.cookie(CART_COOKIE, JSON.stringify(cartObject), { expires: 30, path: '/',raw: true });
			
		} else {
			// CART_COOKIE does not exist: do nothing
		}
	}
	
	
	


}); //document.ready