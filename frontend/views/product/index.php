<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<main>
	<div class="container">
		<article class="row">
			<div class="large-hero-header">
				<div class="large-hero-header-inner col-lg-7 col-xs-12 no-padding">
					<img alt="Wedding dress shopping" class="large-hero-header-image" src="<?= Yii::$app->request->baseUrl ?>/images/wedding-dress-shopping-3821ebf083abc5996e7d15acb0c10e10.jpg">
				</div>
				<div class="col-lg-5 col-xs-12">
					<div class="large-hero-header-text">
						<div class="center-wrapper">
							<div class="centered-content">
								<h1 class="topic-heading js-page-name">Dịch vụ tiệc cưới</h1>
								<p class="secondary-info">Các sản phẩm dùng trong tiệc cưới.</p>
							</div>
						</div>	
						<div id="tiers">
							<div class="content-links">
								<ul class="list-unstyled link-list xs-lg-divider">
									<?php foreach ($product_type as $key => $value): ?>
										<li class="tier">
											<a class="js-top-result-link" data-destination-product="marketplace" href="<?= Yii::$app->request->baseUrl ?>/san-pham/<?= $value->id ?>">
											<h2 style="display: inline"><?= $value->product_type_name ?></h2>
											<span class="icon icon-general-caret-right"></span>
											</a>
										</li>
									<?php endforeach ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- slide -->
			
	        <div class="clear"></div>
			<!-- end slide -->
			<div class="topic-page-ad spotlight-ad col-xs-12 col-lg-12 show">
				<div class="tier-1 topic-page-tier modules with-more-link">
					<div class="modules-header col-xs-12 col-lg-12">WEDDING DRESS GALLERY</div>
					<div class="tier-flex">
						<div class="col-xs-12 col-lg-3">
							<div class="photo-card real-weddings">
								<a class="js-entity-link" data-destination-product="marketplace" href="/fashion/short-wedding-dresses">
									<div class="panel-image">
										<img alt="Short Wedding Dresses" src="<?= Yii::$app->request->baseUrl ?>/images/ea12f6b6-aaf1-720d-0811-bcf431daa0d1.jpg">
									</div>
									<div class="panel-heading">
										<h2>Short Wedding Dresses</h2>
									</div>
								</a>
							</div>
						</div>
						<div class="col-xs-12 col-lg-3">
							<div class="photo-card real-weddings">
								<a class="js-entity-link" data-destination-product="fashion" href="/fashion/lace-wedding-dresses">
									<div class="panel-image">
										<img alt="Lace Wedding Dresses" src="//apis.xogrp.com/media-api/images/a5b80b99-5aa4-a68a-fad0-f65a0ba9f342">
									</div>
									<div class="panel-heading">
										<h2>Lace Wedding Dresses</h2>
									</div>
								</a>
							</div>
						</div>
						<div class="col-xs-12 col-lg-3">
							<div class="photo-card real-weddings">
								<a class="js-entity-link" data-destination-product="fashion" href="/fashion/tea-length-wedding-dresses">
									<div class="panel-image">
										<img alt="Tea Length Wedding Dresses" src="<?= Yii::$app->request->baseUrl ?>/images/812f01d0-5119-450f-5dda-d25f58daff81.jpg">
									</div>
									<div class="panel-heading">
										<h2>Tea Length Wedding Dresses</h2>
									</div>
								</a>
							</div>
						</div>
						<div class="col-xs-12 col-lg-3">
							<div class="photo-card real-weddings">
								<a class="js-entity-link" data-destination-product="fashion" href="/fashion/mermaid-wedding-dresses">
									<div class="panel-image">
										<img alt="Mermaid Wedding Dresses" src="<?= Yii::$app->request->baseUrl ?>/images/7def89fb-ca4f-c788-8927-6af6900ebb37.jpg">
									</div>
									<div class="panel-heading">
										<h2>Mermaid Wedding Dresses</h2>
									</div>
								</a>
							</div>
						</div>
						<div class="col-xs-12 col-lg-3">
							<div class="photo-card real-weddings">
								<a class="js-entity-link" data-destination-product="fashion" href="/fashion/ball-gown-wedding-dresses">
									<div class="panel-image">
										<img alt="Ball Gown Wedding Dresses" src="<?= Yii::$app->request->baseUrl ?>/images/477ce6f1-bb48-e9d5-2e10-21c82f561431.jpg">
									</div>
									<div class="panel-heading">
										<h2>Ball Gown Wedding Dresses</h2>
									</div>
								</a>
							</div>
						</div>
						<div class="col-xs-12 col-lg-3">
							<div class="photo-card real-weddings">
								<a class="js-entity-link" data-destination-product="fashion" href="/fashion/empire-waist-wedding-dresses">
									<div class="panel-image">
										<img alt="Empire Waist Wedding Dresses" src="<?= Yii::$app->request->baseUrl ?>/images/d7d0b8d0-e694-6a08-da2b-c87f9118443f.jpg">
									</div>
									<div class="panel-heading">
										<h2>Empire Waist Wedding Dresses</h2>
									</div>
								</a>
							</div>
						</div>
						<div class="col-xs-12 col-lg-3">
							<div class="photo-card real-weddings">
								<a class="js-entity-link" data-destination-product="fashion" href="/fashion/chiffon-wedding-dresses">
									<div class="panel-image">
										<img alt="Chiffon Wedding Dresses" src="<?= Yii::$app->request->baseUrl ?>/images/305d4df3-4b8e-8792-d705-e5b894d404f4.jpg">
									</div>
									<div class="panel-heading">
										<h2>Chiffon Wedding Dresses</h2>
									</div>
								</a>
							</div>
						</div>
						<div class="col-xs-12 col-lg-3">
							<div class="photo-card real-weddings">
								<a class="js-entity-link" data-destination-product="fashion" href="/fashion/organza-wedding-dresses">
									<div class="panel-image">
										<img alt="Organza Wedding Dresses" src="<?= Yii::$app->request->baseUrl ?>/images/cbb43d37-bf12-f84d-a84e-2faff58e4532.jpg">
									</div>
									<div class="panel-heading">
										<h2>Organza Wedding Dresses</h2>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="tier-2 topic-page-tier modules with-more-link">
					<div class="modules-header col-xs-12 col-lg-12">LOCAL BRIDAL SALONS</div>
					<div class="tier-flex">
						<div class="col-xs-12 col-lg-3">
							<div class="photo-card real-weddings">
								<a class="js-entity-link" data-destination-product="marketplace" href="#">
									<div class="panel-image">
										<img alt="Bridal Shops in Atlanta" src="<?= Yii::$app->request->baseUrl ?>/images/b5f85e34-ecf7-4623-8b50-a3ca015afa09.jpg">
									</div>
									<div class="panel-heading">
										<h2>Bridal Shops in Atlanta</h2>
									</div>
								</a>
							</div>
						</div>
						<div class="col-xs-12 col-lg-3">
							<div class="photo-card real-weddings">
								<a class="js-entity-link" data-destination-product="marketplace" href="#">
									<div class="panel-image">
										<img alt="Bridal Shops in Houston" src="<?= Yii::$app->request->baseUrl ?>/images/4d666bdf-f65b-4c77-9988-dcda885d3336.jpg">
									</div>
									<div class="panel-heading">
										<h2>Bridal Shops in Houston</h2>
									</div>
								</a>
							</div>
						</div>
						<div class="topic-page-ad col-xs-12 col-lg-3">
							<div style="display: inline;"><div class="photo-card real-weddings" tleid="0">
								<div class="panel-image">
									<a class="js-entity-link" data-destination-product="content">
										<img alt="Get a Sneak Peek of the <br> New Collection" src="<?= Yii::$app->request->baseUrl ?>/images/download.jpg">
									</a>
								</div>
								<div class="panel-heading" style="position:relative;">
									<span style="font-size: 11px;font-weight:500;font-family:Gotham A, Gotham B;display: block;float: left;background-color: #fff;border-radius: 0;border: 1px solid #e4e4e4;color: #888;text-transform: uppercase;padding: 7px 8px;position: absolute;top: -24px;left: 16px;">
									PROMOTION
									</span>
									<h2>Get a Sneak Peek of the <br> New Collection<span class="icon icon-general-caret-right" style="padding-left: 6px;font-size: 11px;"></span></h2>
								</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-lg-3">
							<div class="photo-card real-weddings">
								<a class="js-entity-link" data-destination-product="marketplace" href="#">
									<div class="panel-image">
										<img alt="Bridal Salons in NYC" src="<?= Yii::$app->request->baseUrl ?>/images/asdsa3425as.jpg">
									</div>
									<div class="panel-heading">
										<h2>Bridal Salons in NYC</h2>
									</div>
								</a>
							</div>
						</div>
					</div>
					
				</div>
				<div class="clear"></div>
				<div class="topic-copy centered-content">
					<p>
					Even if you haven't been envisioning your wedding dress since you were a little girl, odds are you want to make a statement on your wedding day. But between necklines, silhouettes, and other bridal gown details, there is a lot to keep in mind when you first start shopping for your wedding dress. Fortunately, we have all the advice and tips you need to make your wedding gown shopping trips go smoothly. First, do not be shy about shopping early. You want to start nine to 12 months before your wedding day to give yourself time to order a dress and get in all of your wedding dress fittings. If you start shopping less than six months out, you will probably have to be flexible about which dress you choose since most couture and custom wedding dress designers won't be able to produce the dress in time. Next, you need to find a good bridal salon. Word-of-mouth recommendations will be helpful for this, or you can check out our local resource guide for reputable bridal salons near you. For brides on a budget, bridal outlets or trunk shows can also be good options for wedding dress shopping. Outlets will stock "out of season" gowns (don't worry, this just means they were not in the most recent season's line, not that they won't be fashionable!) or dresses by lesser-known designers. Before you go shopping, it can be good to educate yourself on bridal gown lingo. Learn the parts of the dress -- from the train to the sleeve style -- and get a good idea about silhouettes like mermaid, trumpet, A-line, and sheath. You should also have an idea of what style dress you want -- if you are looking for a beach wedding dress, a formal princess ball gown might not fit into the look you are going for.
					</p>
				</div>
			</div>
		</article>
	</div>
</main>
<script>
    jQuery(document).ready(function ($) {
        var options = {
            $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
            $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
            $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
            $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
            $UISearchMode: 0,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).

            $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                $Loop: 1,                                       //[Optional] Enable loop(circular) of carousel or not, 0: stop, 1: loop, 2 rewind, default value is 1
                $SpacingX: 3,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                $SpacingY: 3,                                   //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                $DisplayPieces: 6,                              //[Optional] Number of pieces to display, default value is 1
                $ParkingPosition: 253,                          //[Optional] The offset position to park thumbnail,

                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 6                                       //[Optional] Steps to go for each navigation request, default value is 1
                }
            }
        };

        var jssor_slider1 = new $JssorSlider$("slider1_container", options);

        //responsive code begin
        //you can remove responsive code if you don't want the slider scales while window resizes
        function ScaleSlider() {
            var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
            if (parentWidth)
                jssor_slider1.$ScaleWidth(Math.min(parentWidth, 720));
            else
                window.setTimeout(ScaleSlider, 30);
        }
        ScaleSlider();

        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
        //responsive code end
    });
    </script>