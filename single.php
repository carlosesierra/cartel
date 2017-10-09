<?php get_header();?>
<?php get_sidebar();?>
<div class="wrapp">
<div class="container">
  <?php 
  	if (have_posts() ) :  
  		while (have_posts() ) :the_post(); ?>
  			<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <article>
            <header><?php the_title(); ?></header> 
            <small><?php the_tags('', '', ''); ?></small> 
            <?php the_content(); ?> <?php wp_link_pages(); ?>
            <?php comments_template(); ?>
      	  </article>
        </section>
     <?php endwhile;
    endif;
  ?>
</div></div>
<?php get_footer();?>