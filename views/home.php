       
			<div class="hero-unit">
                <h1><?=SITE_NAME?></h1>
                <p>This is a demo site I built for Mitesh over the weekend. The Rolex 24 was on, so my dummy products are cars.</p>
                <p><a class="btn btn-primary btn-large" href="<?=BASE_PATH?>about">How it works &raquo;</a></p>
            </div>
			
			<?php if (is_array($products)): ?>
			<div class="row">
			<?php foreach($products as $product): // model only pulls 3 ?>
                <div class="product span4">
                    <h2><?=$product['name']?></h2>
                    <p class="imgbox">
						<a href="<?=BASE_PATH?>products/<?=$product['id']?>"><img src="<?=BASE_PATH?>media/<?=$product['img']?>" alt="<?=$product['name']?>" /></a>
					</p>
					<p class="price">
						<?=$product['price']?>
					</p>
                    <p>
						<a class="btn" href="<?=BASE_PATH?>products/<?=$product['id']?>">View details</a>
						<a class="cart btn btn-primary" id="cart<?=$product['id']?>">Add to Cart &raquo;</a>
					</p>
                </div>
			<?php endforeach; ?> 
            </div> <!-- .row -->
			<?php endif; ?>
			
			