		<?php if ($list): // list products ?>	
		
		
			<?php if (is_array($products)): ?>
			<div class="row">
			<?php foreach($products as $product): ?>
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
			
			
		<?php else: // show a single product ?>
			<div class="hero-unit">
                <h1><?=$product['name']?></h1>
				<p class="img"><img src="<?=BASE_PATH?>media/<?=$product['img']?>" alt="<?=$product['name']?>"/></p>
                <p class="text"><?=$product['text']?></p>
				<p class="price">
						<?=$product['price']?>
				</p>
                <p><a class="cart btn btn-primary btn-large" id="cart<?=$product['id']?>">Add to Cart &raquo;</a></p>
            </div>
		<?php endif; ?>