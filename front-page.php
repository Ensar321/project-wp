<?php get_header(); ?>

<main>

    <section class="hero py-5 bg-light">
        <div class="container text-center">
            <h1 class="display-5 fw-bold">Welcome to Daily Brew</h1>
            <p class="lead text-muted">
                Freshly roasted, carefully crafted — your daily cup of goodness.
            </p>

            <div class="mt-4">
                <img class="hero-banner rounded shadow-sm"
                     src="<?php echo esc_url( get_theme_file_uri('beveragebanner.png') ); ?>"
                     alt="<?php echo esc_attr( get_bloginfo('name') ); ?>">
            </div>
        </div>
    </section>

    <section class="features py-5">
        <div class="container text-center">
            <hr>
            <h2 id="heading"><?php esc_html_e('Why choose us?', 'project-wp'); ?></h2>

            <div class="row g-4 justify-content-center mt-4">
                <div class="col-12 col-md-4">
                    <div class="theme-card h-100 p-4 text-start">
                        <h5 class="mb-2"><?php esc_html_e( 'Small-batch Roasting', 'project-wp' ); ?></h5>
                        <p class="small text-muted mb-0">
                            We roast in small batches to bring out nuanced flavors — fresher,
                            bolder, and more consistent than mass-roasted beans.
                        </p>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="theme-card h-100 p-4 text-start">
                        <h5 class="mb-2"><?php esc_html_e( 'Barista Expertise', 'project-wp' ); ?></h5>
                        <p class="small text-muted mb-0">
                            Our team trains regularly on extraction, latte art, and alternative
                            brews so every cup is made with skill and care.
                        </p>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="theme-card h-100 p-4 text-start">
                        <h5 class="mb-2"><?php esc_html_e( 'Community Space', 'project-wp' ); ?></h5>
                        <p class="small text-muted mb-0">
                            A welcoming place to work, meet, or relax — fast Wi-Fi, power
                            outlets, and a friendly atmosphere.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row g-4 justify-content-center mt-3">
                <div class="col-12 col-md-3">
                    <div class="theme-card p-3 text-start">
                        <strong><?php esc_html_e( 'Sustainable Sourcing', 'project-wp' ); ?></strong>
                        <p class="small text-muted mb-0">
                            We partner with farms that practice fair trade and regenerative agriculture.
                        </p>
                    </div>
                </div>

                <div class="col-12 col-md-3">
                    <div class="theme-card p-3 text-start">
                        <strong><?php esc_html_e( 'Simple, Honest Pricing', 'project-wp' ); ?></strong>
                        <p class="small text-muted mb-0">
                            Transparent pricing with seasonal options and loyalty perks for regulars.
                        </p>
                    </div>
                </div>

                <div class="col-12 col-md-3">
                    <div class="theme-card p-3 text-start">
                        <strong><?php esc_html_e( 'Seasonal Menu', 'project-wp' ); ?></strong>
                        <p class="small text-muted mb-0">
                            Rotating limited-time drinks featuring seasonal produce and flavors.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-pad">
        <div class="container text-center">

            <h3><?php esc_html_e('What We Serve', 'project-wp'); ?></h3>
            <p class="text-muted mb-4">
                A thoughtful menu that focuses on quality, seasonality, and variety.
            </p>

            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <div class="theme-card p-3 h-100 text-start">
                        <h5>Espresso Drinks</h5>
                        <p class="small text-muted mb-0">
                            Cappuccinos, lattes, americanos, and single-origin espresso shots.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="theme-card p-3 h-100 text-start">
                        <h5>Cold Brew & Iced</h5>
                        <p class="small text-muted mb-0">
                            Slow-steeped cold brew, iced lattes, and seasonal iced teas.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="theme-card p-3 h-100 text-start">
                        <h5>Milk Alternatives</h5>
                        <p class="small text-muted mb-0">
                            Oat, almond, soy, and other dairy-free options.
                        </p>
                    </div>
                </div>
            </div>
          
            <section class="our-story mb-5">
                <div class="theme-card mx-auto text-center p-4" style="max-width:900px;">
                    <h2 class="mb-3">Our Story</h2>
                    <p class="lead text-muted">
                        Daily Brew started as a small neighborhood cart where friends gathered
                        for morning espresso and late-night chats.
                    </p>
                </div>
            </section>

            <h4 class="mb-3">Best Sellers</h4>

            <div class="row">
                <?php
                $featured = new WP_Query(array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'category_name'  => 'drinks',
                    'meta_key'       => 'featured',
                    'meta_value'     => '1',
                ));

                if ($featured->have_posts()):
                    while ($featured->have_posts()): $featured->the_post(); ?>
                        <div class="col-md-4 mb-4">
                            <div class="card theme-card h-100">

                                <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
                                <?php endif; ?>

                                <div class="card-body text-center">
                                    <h5><?php the_title(); ?></h5>
                                    <?php the_excerpt(); ?>
                                </div>

                                <div class="card-footer bg-transparent text-center">
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">
                                        View Drink
                                    </a>
                                </div>

                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                else: ?>
                    <p>No featured drinks yet.</p>
                <?php endif; ?>
            </div>

        </div>
    </section>

</main>

<?php get_footer(); ?>