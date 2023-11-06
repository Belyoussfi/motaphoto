<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header(); ?>

<pre>
<?php 
$terms = get_the_terms(get_the_ID(), 'categorie');
$format = get_the_terms(get_the_ID(), 'format');
?>
</pre>



<section>
    <div>
        <h2><?php echo the_title(); ?></h2>
        <ul>
            <li>Référence: <?php the_field('référence', get_the_ID() ); ?></li>
            <li>Catégorie: <?php echo ($terms[0]->name)  ?></li>
            <li>Format: <?php echo ($format[0]->name)  ?></li>
            <li>Type: <?php the_field('type', get_the_ID() ); ?></li>
            <li>Année: <?php echo get_the_date( 'Y',) ?></li>
        </ul>
        <div>
            <p><?php the_post_thumbnail('medium'); ?></p>
        </div>
    </div>

    <section>
        <?php wpb_posts_nav(); ?>
    </section>

   



    <section>
        <p>Cette photo vous intéresse ?</p>
        <div id="myModal" class="popup modal">
            <!-- Modal content -->
            <div class="content modal-content animate-top">
                <span class="x" id="x">&times;</span>
                <div id="container">
                    <?php echo do_shortcode( '[contact-form-7 id="0e13fe9" title="Formulaire de contact 1"]' ); ?>
                </div>
            </div>
        </div> 
        <p><button class="click">CONTACT</button></p> 
    </section>
</section>    

<div><?php example_cats_related_post() ?></div>

   
<?php get_footer(); ?>

