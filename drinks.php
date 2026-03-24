<?php
/* Template Name: Drinks (Posts Category)
   Description: Showcase drinks using posts assigned to the 'drinks' category. Optional postmeta keys: 'price' and 'ingredients'. */
get_header(); 
?>

<main class="drinks-page section-pad">
    <div class="container">
        <header class="page-intro mb-4">
            <h1 id="heading"><?php the_title(); ?></h1>
            <p class="text-muted"><?php esc_html_e('Explore our selection of beverages.', 'project-wp'); ?></p>
        </header>

        <?php
        $drinks = new WP_Query(array(
            'post_type'      => 'post',
            'posts_per_page' => -1,
            'category_name'  => 'drinks',
            'orderby'        => 'title',
            'order'          => 'ASC',
        ));
        ?>

        <?php if ( $drinks->have_posts() ) : ?>
            <div class="row">
                <?php while ( $drinks->have_posts() ) : $drinks->the_post();
                    $price = get_post_meta( get_the_ID(), 'price', true );
                    $ingredients = get_post_meta( get_the_ID(), 'ingredients', true );
                ?>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="drink-card card h-100">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="card-img-top overflow-hidden" style="max-height:220px;">
                                    <?php the_post_thumbnail( 'medium', array( 'class' => 'img-fluid w-100', 'alt' => get_the_title() ) ); ?>
                                </div>
                            <?php endif; ?>
                            <div class="card-body">
                                <h3 class="card-title"><?php the_title(); ?></h3>
                                <?php if ( $price ) : ?>
                                    <p class="mb-2"><strong><?php echo esc_html( $price ); ?></strong></p>
                                <?php endif; ?>
                                <p class="card-text"><?php the_excerpt(); ?></p>
                                <?php if ( $ingredients ) : ?>
                                    <p class="text-muted small mb-0"><strong><?php esc_html_e('Ingredients:', 'project-wp'); ?></strong> <?php echo esc_html( $ingredients ); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="card-footer bg-transparent">
                                <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-primary"><?php esc_html_e('View', 'project-wp'); ?></a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p class="text-center text-muted"><?php esc_html_e('No drinks found yet. Please add posts in the "drinks" category.', 'project-wp'); ?></p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>