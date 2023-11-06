<div class="row">
  <div class="col-md-8">
    <?php
      $args = array(
        'post_type' => 'photos_evenements',
        'posts_per_page' => -1,
      );
      $query = new WP_Query($args);
      if ($query->have_posts()) :
        while ($query->have_posts()) :
          $query->the_post();
          ?>
            <div class="post">
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <?php the_excerpt(); ?>
            </div>
          <?php
        endwhile;
        wp_reset_postdata();
      else :
        echo '<p>No posts found</p>';
      endif;
    ?>
  </div>

  <div class="col-md-4">
    <h3>Filter by Category</h3>
    <?php
      $categories = get_categories();
      echo '<ul>';
      foreach ($categories as $category) {
        echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
      }
      echo '</ul>';
    ?>
  </div>
</div>
