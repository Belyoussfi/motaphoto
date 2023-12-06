<?php /* Template Name: CustomAccueil */ ?>
<?php 

get_header(); 

?>

<div class="hero-header">
      <a>
        <img src="<?php echo get_template_directory_uri(); ?>/img/Header.png" alt="photo de photographe event">
      </a>
</div>

<main>
<!-- FILTRES -->
<div class="js-filter">
	<div class="box-filter">
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
	</div>
	<select id="date" name="date">
	    <option>Trier par</option>
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
		<div class="response"></div>
		<?php 
    } 	
} 
wp_reset_postdata(); ?>

    </div>

	<button type="button" id="codex-load-more" class="codex-load-more button" data-page=2>Charger plus</button>
	
</div>


<!-- LIGHTBOX -->
<div class="lightbox" id="lightbox">
   
	<button class="lightbox_close">X</button>
	<button class="lightbox_next" id="lightbox_next"></button>
	<button class="lightbox_prev"></button>
	<div class="lightbox_container">
	    <img id="lightbox-img" src="">
	</div>
</div>	

</main>    
<?php get_footer(); 







