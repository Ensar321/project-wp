<?php get_header(); ?>

<main class="single-posts container section-pad">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article <?php post_class( 'post-card' ); ?>>
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="post-thumb mb-3">
                    <?php the_post_thumbnail( 'large' ); ?>
                </div>
            <?php endif; ?>

            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>

            <?php if ( comments_open() || get_comments_number() ) : ?>
                <hr>
                <?php comments_template(); ?>
            <?php endif; ?>
        </article>
    <?php endwhile; else : ?>
        <p><?php esc_html_e( 'Post not found.', 'project-wp' ); ?></p>
    <?php endif; ?>