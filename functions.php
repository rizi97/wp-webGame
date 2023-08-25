<?php
/**
 * Astra Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Child
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define('CHILD_THEME_ASTRA_CHILD_VERSION', '1.0.0');

/**
 * Enqueue styles
 */
function child_enqueue_styles()
{

	wp_enqueue_style('astra-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_VERSION, 'all');

}

add_action('wp_enqueue_scripts', 'child_enqueue_styles', 15);




add_shortcode('game_embed_iframe', function () {
	$post_id    = get_the_ID();
	$iframe_src = get_field('game_iframe', $post_id);

	
	if( $iframe_src ){
		return "<iframe src='" . $iframe_src . "' width='100%' height='560px'></iframe>";
	}
	else {
		return "<p>No game iframe available.</p>";
	}
});


add_shortcode('game_random_rating', function () {
	$rand = rand(1000,100000);
	
	return '<h6 class="elementor-heading-title elementor-size-default">(' . $rand . ' lượt đánh giá)</h6>';
});


add_shortcode('recommended_games', function () {
	$post_id  = get_the_ID();
	$category = get_the_category();

	if( is_array($category) && !empty($category) ) {
		global $post;
		$args = array('numberposts' => 15, 'post__not_in' => array($post_id), 'category_name' => $category[0]->slug);
		$posts = get_posts( $args );
?>
		<style id="loop-348">.recommended_games_wrapper{height: 470px; overflow-y: scroll;} .recommended_games_wrapper .elementor-348 {margin-top: 15px} .elementor-348 h6.elementor-small-title {font-weight: 400; color: #fff;} .elementor-348 .elementor-element.elementor-element-71f2231:not(.elementor-motion-effects-element-type-background), .elementor-348 .elementor-element.elementor-element-71f2231 > .elementor-motion-effects-container > .elementor-motion-effects-layer{background-color:#F3F3F3;}.elementor-348 .elementor-element.elementor-element-71f2231, .elementor-348 .elementor-element.elementor-element-71f2231 > .elementor-background-overlay{border-radius:14px 14px 14px 14px;}.elementor-348 .elementor-element.elementor-element-71f2231{transition:background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;}.elementor-348 .elementor-element.elementor-element-71f2231 > .elementor-background-overlay{transition:background 0.3s, border-radius 0.3s, opacity 0.3s;}.elementor-348 .elementor-element.elementor-element-c782cab > .elementor-widget-wrap > .elementor-widget:not(.elementor-widget__width-auto):not(.elementor-widget__width-initial):not(:last-child):not(.elementor-absolute){margin-bottom:15px;}.elementor-348 .elementor-element.elementor-element-c782cab > .elementor-element-populated, .elementor-348 .elementor-element.elementor-element-c782cab > .elementor-element-populated > .elementor-background-overlay, .elementor-348 .elementor-element.elementor-element-c782cab > .elementor-background-slideshow{border-radius:14px 14px 14px 14px;}.elementor-348 .elementor-element.elementor-element-c782cab > .elementor-element-populated{padding:0px 0px 0px 0px;}.elementor-348 .elementor-element.elementor-element-b95a3a1 > .elementor-container > .elementor-column > .elementor-widget-wrap{align-content:center;align-items:center;}.elementor-348 .elementor-element.elementor-element-b95a3a1:not(.elementor-motion-effects-element-type-background), .elementor-348 .elementor-element.elementor-element-b95a3a1 > .elementor-motion-effects-container > .elementor-motion-effects-layer{background-color:#ff9900a8;}.elementor-348 .elementor-element.elementor-element-b95a3a1, .elementor-348 .elementor-element.elementor-element-b95a3a1 > .elementor-background-overlay{border-radius:14px 14px 14px 14px;}.elementor-348 .elementor-element.elementor-element-b95a3a1{transition:background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;}.elementor-348 .elementor-element.elementor-element-b95a3a1 > .elementor-background-overlay{transition:background 0.3s, border-radius 0.3s, opacity 0.3s;}.elementor-348 .elementor-element.elementor-element-17df7f4 img{width:100%;height:150px;object-fit:cover;object-position:center center;border-radius:14px 14px 14px 14px;}.elementor-348 .elementor-element.elementor-element-607a56f > .elementor-widget-wrap > .elementor-widget:not(.elementor-widget__width-auto):not(.elementor-widget__width-initial):not(:last-child):not(.elementor-absolute){margin-bottom:0px;}.elementor-348 .elementor-element.elementor-element-607a56f > .elementor-element-populated{padding:15px 20px 15px 20px;}.elementor-348 .elementor-element.elementor-element-45f07ca .elementor-heading-title{color:#FFFFFF;font-family:"Roboto", Sans-serif;font-size:18px;font-weight:600;}.elementor-348 .elementor-element.elementor-element-3bb5458 .elementor-star-rating i:before{color:#FFDF00;}.elementor-348 .elementor-element.elementor-element-3bb5458 > .elementor-widget-container{padding:0px 0px 0px 0px;}@media(min-width:768px){.elementor-348 .elementor-element.elementor-element-0bdfb2e{width:49.268%;}.elementor-348 .elementor-element.elementor-element-607a56f{width:50.732%;}}@media(max-width:1024px) and (min-width:768px){.elementor-348 .elementor-element.elementor-element-0bdfb2e{width:100%;}.elementor-348 .elementor-element.elementor-element-607a56f{width:100%;}}</style>

		<div class="recommended_games_wrapper">

<?php foreach($posts as $post) : 
		setup_postdata($post); 
		
		$rtp = get_field('rtp');		
		$img = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : 'http://localhost/webgame/wp-content/uploads/2023/07/0f600359-dbcd-38ee-8ab2-41b488f6f362-150x150.png';	
?>
		
			<div class="elementor elementor-348 e-loop-item-1 e-loop-item">
				<section class="elementor-section elementor-top-section elementor-element elementor-element-71f2231 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="71f2231" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
					<div class="elementor-container elementor-column-gap-default">
						<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-c782cab" data-id="c782cab" data-element_type="column">
							<div class="elementor-widget-wrap elementor-element-populated">
								<section class="elementor-section elementor-inner-section elementor-element elementor-element-b95a3a1 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="b95a3a1" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
									<div class="elementor-container elementor-column-gap-no">
										<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-0bdfb2e" data-id="0bdfb2e" data-element_type="column">
											<div class="elementor-widget-wrap elementor-element-populated">
												<div class="elementor-element elementor-element-17df7f4 elementor-widget elementor-widget-theme-post-featured-image elementor-widget-image" data-id="17df7f4" data-element_type="widget" data-widget_type="theme-post-featured-image.default">
													<div class="elementor-widget-container">
														<img width="150" height="150" src="<?php echo esc_url( $img ); ?>" class="attachment-thumbnail size-thumbnail wp-image-144" alt="" loading="lazy">															
													</div>
												</div>
											</div>
										</div>
										<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-607a56f" data-id="607a56f" data-element_type="column">
											<div class="elementor-widget-wrap elementor-element-populated">
												<div class="elementor-element elementor-element-45f07ca elementor-widget elementor-widget-heading" data-id="45f07ca" data-element_type="widget" data-widget_type="heading.default">
													<div class="elementor-widget-container">
														<h2 class="elementor-heading-title elementor-size-default"><?php the_title(); ?></h2>		
													</div>
												</div>
												<div class="elementor-element elementor-element-3bb5458 elementor--star-style-star_fontawesome elementor-widget elementor-widget-star-rating" data-id="3bb5458" data-element_type="widget" data-widget_type="star-rating.default">
													<div class="elementor-widget-container">	
														<div class="elementor-star-rating__wrapper">
															<div class="elementor-star-rating" title="5/5" itemtype="http://schema.org/Rating" itemscope="" itemprop="reviewRating"><i class="elementor-star-full"></i><i class="elementor-star-full"></i><i class="elementor-star-full"></i><i class="elementor-star-full"></i><i class="elementor-star-full"></i> <span itemprop="ratingValue" class="elementor-screen-only">5/5</span>
															</div>		
														</div>
													</div>
												</div>
												<div class="elementor-element elementor-element-45f07ca elementor-widget elementor-widget-heading" data-id="45f07ca" data-element_type="widget" data-widget_type="heading.default">
													<div class="elementor-container" style="margin-top: 5px">
														<div class="elementor-column elementor-col-70">
															<h6 class="elementor-small-title">RTP</h6>
														</div>
														<div class="elementor-column elementor-col-30">
															<h6 class="elementor-small-title"><?php echo $rtp ? esc_html( $rtp ) : "0%"; ?></h6>
														</div>	
													</div>
													<div class="elementor-container">
														<div class="elementor-column elementor-col-70">
															<h6 class="elementor-small-title">Pay-lines</h6>
														</div>
														<div class="elementor-column elementor-col-30">
															<h6 class="elementor-small-title">50</h6>
														</div>	
													</div>
													<div class="elementor-container">
														<div class="elementor-column elementor-col-70">
															<h6 class="elementor-small-title">Reel Layout</h6>
														</div>
														<div class="elementor-column elementor-col-30">
															<h6 class="elementor-small-title">5</h6>
														</div>	
													</div>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
						</div>
					</div>
				</section>
			</div>

<?php endforeach; ?>

		</div>	
<?php
	}
});