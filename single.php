<?php get_header();?>
<?php get_sidebar();?>
<div class="wrapp">
<div class="container">
  <?php 
  	if (have_posts() ) :  
  		while (have_posts() ) :the_post(); ?>
  			<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <div class="cont">
            <h1 class="title"> <?php the_title(); ?></a> </h1> 
            <small><?php the_tags('', '', ''); ?></small> 
            <article> <?php the_content(); ?> <?php wp_link_pages(); ?> </article>
            <?php comments_template(); ?>
      	  </div>
        </section>
     <?php endwhile;
    endif;
  ?>
</div></div>
<?php get_footer();?>