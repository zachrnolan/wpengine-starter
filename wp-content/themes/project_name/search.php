<?php get_header(); ?>

<section class="search-results">
    <div class="inner">
        <?php if ( have_posts() ) : ?>
            <article role="main" class="primary-content type-page search">
                <?php get_template_part( 'loop', 'search' ); ?>
		<?php else : ?>
                <h3 class="entry-title">Nothing Found</h3>
                <article class="entry-content">
                    <span><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.' ); ?></span>
                    <?php /*?><?php get_search_form(); ?><?php */?>
                </article><!-- .entry-content -->
            </article>
        <?php endif; ?>
        </div>
    </section>

<section>
    <div class="inner">
        
    </div>
</section>

<?php get_footer(); ?>