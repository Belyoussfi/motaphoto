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

<!--<section class="main_container">-->
<main>    
    <div class="presentation">
        <div class="single_title">
            <h1><?php echo the_title(); ?></h1>
                <ul class="infos">
                    <li>Référence: <span class="reference"><?php the_field('référence', get_the_ID() ); ?></span></li>
                    <li>Catégorie: <?php echo ($terms[0]->name)  ?></li>
                    <li>Format: <?php echo ($format[0]->name)  ?></li>
                    <li>Type: <?php the_field('type', get_the_ID() ); ?></li>
                    <li>Année: <?php echo get_the_date( 'Y',) ?></li>
                </ul>
            </li> 
        </div>     

        <div class="bloc_image">
            <?php the_post_thumbnail('medium'); ?>
        </div>
    </div>

    <section class="second_container">
        <section class="single_contact">
            <p>Cette photo vous intéresse ?</p>
            <button class="click btn_contact">Contact</button>
        </section>

        <section class="navigation_image">
            <div class="display_image"><?php wpb_posts_nav(); ?></div>
            <div class="arrows">
                <div>
                    <strong>
                        <svg class="left-arrow" viewBox="0 0 24 24" width="24" height="24"><path d="M13.775,18.707,8.482,13.414a2,2,0,0,1,0-2.828l5.293-5.293,1.414,1.414L9.9,12l5.293,5.293Z"/></svg>
                    </strong>
                </div>
                <div>
                    <strong>
                        <svg class="right-arrow" viewBox="0 0 24 24" width="24" height="24"><path d="M10.811,18.707,9.4,17.293,14.689,12,9.4,6.707l1.415-1.414L16.1,10.586a2,2,0,0,1,0,2.828Z"/></svg>
                    </strong>
                </div>
            </div>    
        </section>
    </section>

    <section class="post_related">
        <span>VOUS AIMEREZ AUSSI</span>
        <div class="last_container"><?php example_cats_related_post() ?></div>

        <div class="lightbox" id="lightbox">
   
	<button class="lightbox_close">X</button>
	<button class="lightbox_next" id="lightbox_next"></button>
	<button class="lightbox_prev"></button>
	<div class="lightbox_container">
	    <img id="lightbox-img" src="">
	</div>
	
</div>	
       
    </section>

    <div class="btn_photos"><button class="btn_contact">Toutes les photos</button></div>
   



</main>    
<!--</section>  -->  



   
<?php get_footer(); ?>

