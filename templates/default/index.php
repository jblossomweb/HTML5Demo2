<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?=SITE_NAME?><?=($this->title ? ' - '.ucwords($this->title) : '')?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
		<link href="<?=ASSET_PATH?>favicon.ico" rel="icon" type="image/x-icon" />
        <link rel="stylesheet" href="<?=ASSET_PATH?>css/bootstrap.min.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="<?=ASSET_PATH?>css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="<?=ASSET_PATH?>css/main.css">

        <script src="<?=ASSET_PATH?>js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="<?=BASE_PATH?>"><?=SITE_NAME?></a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li class="activate home"><a href="<?=BASE_PATH?>home">Home</a></li>
							<li class="activate products"><a href="<?=BASE_PATH?>products">Products</a></li>
							<li class="activate cart dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cart <b class="caret"></b></a>
                                <ul class="dropdown-menu" id="cart-dropdown">
                                    <li class="nav-header">(Cart is Empty)</li>
                                </ul>
                            </li>
                            
                        </ul>
                 
						
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div id="container" class="container">
		
			<!-- begin content -->
			<?=$this->content?>
			<!-- end content -->
            <hr>
            <footer>
                <p>&copy; <?=SITE_NAME?> <?=date("Y")?></p>
            </footer>

        </div> <!-- /container -->

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?=ASSET_PATH?>js/vendor/jquery-1.9.0.min.js"><\/script>')</script>

        <script src="<?=ASSET_PATH?>js/vendor/bootstrap.min.js"></script>
		<script src="<?=ASSET_PATH?>js/vendor/jquery.cookie.js"></script>
		<script>
			// pass php constants to client-side globals
			var SITE_NAME = '<?=SITE_NAME?>';
			var SITE_PAGE = '<?=SITE_PAGE?>';
			var BASE_PATH = '<?=BASE_PATH?>';
			var ASSET_PATH = '<?=ASSET_PATH?>';
			var CART_COOKIE =  '<?=CART_COOKIE?>';
			
			// navbar active page
			$(".navbar .activate.<?=SITE_PAGE?>").addClass('active');
		</script>
		
        <script src="<?=ASSET_PATH?>js/main.js"></script>
    </body>
</html>