<?php

function my_css() {
    wp_enqueue_style('mon-css', get_template_directory_uri() . '/css/styles.css'  , array(), '1.0');
    wp_enqueue_script('mon-js', get_template_directory_uri() . '/js/script.js', array('jquery'), true);
	wp_enqueue_script( 'custom-script', get_template_directory_uri(). '/js/ajax.js', array('jquery') );
	wp_register_style('googlFonts', '//fonts.googleapis.com/css2?family=Space+Mono&display=swap', array(), null);
    wp_enqueue_style('googlFonts');
	wp_register_style('poppinsFont','//fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap', array(), null);
	wp_enqueue_style('poppinsFont');
}
add_action( 'wp_enqueue_scripts', 'my_css' );  


// CREATION DES MENUS
register_nav_menus( array(
	'main' => 'Header Menu',
	'footer' => 'Footer Menu',
) );


//HOOK LOAD MORE BUTTON
add_action( 'wp_enqueue_scripts', 'cxc_theme_enqueue_script_style' );

function cxc_theme_enqueue_script_style() {
	// Localize the script with new data
	wp_localize_script( 'custom-script', 'ajax_posts', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'noposts' => __( 'No older posts found', 'cxc-codexcoach' ),
	));

}
add_action( 'wp_ajax_nopriv_codex_load_more_post_ajax', 'codex_load_more_post_ajax_call_back' );
add_action( 'wp_ajax_codex_load_more_post_ajax', 'codex_load_more_post_ajax_call_back' );

function codex_load_more_post_ajax_call_back(){

	$page = ( isset( $_POST['pageNumber'] ) ) ? $_POST['pageNumber'] : 1;

	$args = array(
		'post_type' => 'photos_evenements',
		'posts_per_page' => 12,
		'post_status' => 'publish', 
		'paged'    => $page,
	);

	$the_query = new WP_Query( $args );

	$html = '';
	ob_start();

	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts()) { $the_query->the_post();
			?>
			<div class="cxc-inner-wrapper">
				<div class="first-content">

					<span class="thumbnail-container" data-full-screen-image="<?php echo the_post_thumbnail_url(''); ?>">
					    <?php echo the_post_thumbnail(); ?> 
				    </span>

				    <a class="image" href="<?php the_permalink(); ?>">
				        <img class="oeil" src="<?php echo get_template_directory_uri(); ?>/img/eye.png" alt="image d'un oeil">

				        <span class="title">
						    <?php echo the_title(); ?>
					    </span>

				        <?php $terms = get_the_terms(get_the_ID(), 'categorie'); ?>

				        <span class="category">
							<?php echo ($terms[0]->name); ?>
					    </span>	

					    <img class="ecran" src="<?php echo get_template_directory_uri(); ?>/img/plein-ecran.png" alt="image d'un plein écran">	
			        </a>
				
			    </div>	
            </div>

			<?php
		}
	} 

	wp_reset_postdata();
	$html .= ob_get_clean();

	wp_send_json( array( 'html' => $html ) );
}


// FUNCTION POUR LES FILTRES

add_action('wp_ajax_filter_posts', 'filter_posts');
add_action('wp_ajax_nopriv_filter_posts', 'filter_posts');



function filter_posts() {
    
	$test = [
		'post_type' => 'photos_evenements',
		'posts_per_page' => -1,
		'orderby' => 'date', // we will sort posts by date
		'order'	=> $_POST['date'] // ASC or DESC
	];
	
	$type = $_REQUEST['cat'];
	$format  = $_REQUEST['format'];
	
	
	if(!empty($type)) {
		$test['tax_query'] [] = [
			'taxonomy' => 'categorie', 
			'field' => 'slug',
			'terms' => $type,
		];
	}
	if(!empty($format)) {
		$test['tax_query'] [] = [
			'taxonomy' => 'format',
			'field' => 'slug',
			'terms' => $format,
		];
	} 

	$photos = new WP_Query($test);
	if($photos->have_posts()):
		while ($photos->have_posts()): $photos->the_post(); ?>

        <div class="cxc-inner-wrapper">
			<div class="first-content">

				<span class="thumbnail-container" data-full-screen-image="<?php echo the_post_thumbnail_url(''); ?>">
					<?php echo the_post_thumbnail(); ?> 
				</span>

				<a class="image" href="<?php the_permalink(); ?>">
				    <img class="oeil" src="<?php echo get_template_directory_uri(); ?>/img/eye.png" alt="image d'un oeil">

				    <span class="title">
						<?php echo the_title(); ?>
					</span>

				    <?php $terms = get_the_terms(get_the_ID(), 'categorie'); ?>

				    <span class="category">
						<?php echo ($terms[0]->name); ?>
					</span>	

					<img class="ecran" src="<?php echo get_template_directory_uri(); ?>/img/plein-ecran.png" alt="image d'un plein écran">	
			    </a>
				
			</div>		
        </div>
			
	<?php  endwhile;
	wp_reset_postdata();
	else:
		echo "POST NOT FOUND";
    endif;
	wp_die();
} 



// POST DE MEME CATEGORIE - SINGLE PAGE
function example_cats_related_post() {
	$post_id = get_the_ID();
	$cat_ids = array();
	global $post;
	$categories = get_the_terms( $post->ID, 'categorie' );
	
	
	if(!empty($categories) && !is_wp_error($categories)):
		foreach ($categories as $category):
			array_push($cat_ids, $category->term_id);
		endforeach;
	endif;

	$query_args = array(
		'post_type' => 'photos_evenements',
		'post__not_in' => array($post_id),
		'posts_per_page' => '2',
		'tax_query' => [
			'relation' => 'AND',
			[
				'taxonomy' => 'categorie',
				'field'    => 'term_id',
				'terms'    => $cat_ids[0],
			],
		],
	);
	

	$related_cats_post = new WP_Query($query_args);

	if($related_cats_post->have_posts()):
		while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
		
		<div class="cxc-inner-wrapper">
			<div class="first-content">

				<span class="thumbnail-container" data-full-screen-image="<?php echo the_post_thumbnail_url(''); ?>">
					<?php echo the_post_thumbnail(); ?> 
				</span>

				<a class="image" href="<?php the_permalink(); ?>">
				    <img class="oeil" src="<?php echo get_template_directory_uri(); ?>/img/eye.png" alt="image d'un oeil">

				    <span class="title">
						<?php echo the_title(); ?>
					</span>

				    <?php $terms = get_the_terms(get_the_ID(), 'categorie'); ?>

				    <span class="category">
						<?php echo ($terms[0]->name); ?>
					</span>	

					<img class="ecran" src="<?php echo get_template_directory_uri(); ?>/img/plein-ecran.png" alt="image d'un plein écran">	
			    </a>
				
			</div>	
        </div>	


		<?php endwhile;
		wp_reset_postdata();
	endif;
}


// PREV AND NEXT PHOTOS

function wpb_posts_nav(){
    $next_post = get_next_post();
    $prev_post = get_previous_post();
     
    if ( $next_post || $prev_post ) : ?>
     
        <div class="wpb-posts-nav">
            <div>
                <?php if ( ! empty( $prev_post ) ) : ?>
                    <a href="<?php echo get_permalink( $prev_post ); ?>">
                        <div class="nav_img_link">
                            <div class="wpb-posts-nav__thumbnail wpb-posts-nav__prev">
                                <?php echo get_the_post_thumbnail( $prev_post, [ 100, 100 ] ); ?>
                            </div>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
            <div>
                <?php if ( ! empty( $next_post ) ) : ?>
                    <a href="<?php echo get_permalink( $next_post ); ?>">
                        <div class="nav_img_link">
                            <div class="wpb-posts-nav__thumbnail wpb-posts-nav__next">
                                <?php echo get_the_post_thumbnail( $next_post, [ 100, 100 ] ); ?>
                            </div>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
        </div> <!-- .wpb-posts-nav -->
     
    <?php endif;
}