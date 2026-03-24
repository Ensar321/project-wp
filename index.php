<?php get_header(); ?>

<main class="container section-pad">

    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>

            <article <?php post_class( 'mb-4' ); ?>>
                <h2 class="entry-title"><?php the_title(); ?></h2>

                <div class="entry-content">
                    <?php the_excerpt(); ?>
                    <p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-primary">
                            <?php esc_html_e( 'Read more', 'project-wp' ); ?>
                        </a>
                    </p>
                </div>
            </article>

        <?php endwhile; ?>

        <nav class="pagination">
            <?php the_posts_pagination(); ?>
        </nav>

    <?php else : ?>

        <p><?php esc_html_e( 'No posts found.', 'project-wp' ); ?></p>

    <?php endif; ?>

</main>

<?php get_footer(); ?>