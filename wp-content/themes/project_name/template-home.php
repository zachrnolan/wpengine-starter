<?php
/*
Template Name: Home
*/
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_header(); ?>
  <?php get_template_part('templates/content', 'home'); ?>
  <?php get_footer(); ?>
<?php endwhile; ?>