<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Motaphoto: Photographe Event</title>
  <?php wp_head(); ?>
</head>
<body>
  
  <header class="header">
    <a href="<?php echo home_url( '/' ); ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo">
    </a>  

    <?php wp_nav_menu( array( 'theme_location' => 'main' ) ); ?>

    <!-- The Modal -->
    <div id="myModal" class="popup modal">
      <!-- Modal content -->
      <div class="content modal-content animate-top">
        <span class="x" id="x">&times;</span>
        <div id="container">
          <?php echo do_shortcode( '[contact-form-7 id="0e13fe9" title="Formulaire de contact 1"]' ); ?>
        </div>
      </div>
    </div>  
  </header> 
 


 




