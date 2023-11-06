<?php 

get_header(); 

?>

<div class="hero-header">
      <a>
        <img src="<?php echo get_template_directory_uri(); ?>/img/Header.png" alt="photo de photographe event">
      </a>
</div>

	

<main>


<!-- TEST FILTRES 2 -->

<div class="js-filter">
	<?php $terms = get_terms(['taxonomy' => 'categorie']);
	if ($terms) : ?>
        <select id="cat" name="cat">
			<option value="">Catégories</option>
			<?php foreach ($terms as $term): ?>
				<option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
			<?php endforeach; ?>
		</select>
	<?php endif; ?>
	<?php $terms = get_terms(['taxonomy' => 'format']);
	if ($terms) : ?>
        <select id="format" name="format">
			<option value="">Formats</option>
			<?php foreach ($terms as $term): ?>
				<option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
			<?php endforeach; ?>
		</select>
	<?php endif; ?>
	<select id="date" name="date">
	    <option>TRIER PAR</option>
		<option value="ASC">Plus anciens aux plus récents</option>
		<option value="DESC">Plus récents aux plus anciens</option>
	</select> 
</div>






<!-- PUBLICATION TOUS LES POSTS -->
<div class="cxc-post-wrapper">
	<div id="cxc-posts" class="cxc-posts">
		<?php
		$postsPerPage = 12;
		$args = array(
			'post_type' => 'photos_evenements',
			'post_status' => 'publish',
			'posts_per_page' => $postsPerPage,
		);
        $the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ){ 
				$the_query->the_post();
		?>
        <div class="cxc-inner-wrapper">
            <p><a href="<?php the_permalink(); ?>"><img class="oeil" src="<?php echo get_template_directory_uri(); ?>/img/oeil.png" alt="image d'un oeil">
			<img class="ecran" id="ecran" src="<?php echo get_template_directory_uri(); ?>/img/plein-ecran.png" alt="image d'un plein écran">
			<span class="thumbnail-container" data-full-screen-image="<?php echo get_the_post_thumbnail_url(); ?>"><?php echo the_post_thumbnail('medium'); ?></span></a></p>
        </div>
		<div class="response"></div>
		<?php
    }
}
wp_reset_postdata(); ?>
</div>

<button type="button" id="codex-load-more" class="codex-load-more" data-page=2>Load More</button>
</div>

<!--LIGHTBOX -->
<div class="lightbox" id="lightbox">
	<button class="lightbox_close">X</button>
	<button class="lightbox_next"></button>
	<button class="lightbox_prev"></button>
	<div class="lightbox_container">
		<img src="<?php echo the_post_thumbnail('medium'); ?>">
	</div>
</div>	



                    
          

</main>    
<?php get_footer(); 







