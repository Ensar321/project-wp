<?php
/*
Template Name: About Us
Template Post Type: page
*/
get_header();
?>

<main class="about-page section-pad">
    <div class="container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <header class="mb-4 text-center">
                <h1 class="display-6"><?php the_title(); ?></h1>
                <p class="text-muted"><?php echo get_the_excerpt() ? esc_html( get_the_excerpt() ) : esc_html__( 'Learn about our mission, values, and the people behind Daily Brew.', 'project-wp' ); ?></p>
            </header>

            <section class="about-hero mb-5">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="theme-card">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="mb-3 overflow-hidden" style="border-radius:8px;"><?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid w-100', 'alt' => get_the_title() ) ); ?></div>
                            <?php else : ?>
                                <img src="<?php echo esc_url( get_theme_file_uri( 'beveragebanner.png' ) ); ?>" class="img-fluid rounded mb-3" alt="Daily Brew">
                            <?php endif; ?>

                            <p class="mb-0"><?php the_content(); ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="theme-card h-100 d-flex flex-column justify-content-center">
                            <h3 class="mb-3"><?php esc_html_e( 'Our Mission', 'project-wp' ); ?></h3>
                            <p class="text-muted"><?php esc_html_e( 'To bring approachable, responsibly-sourced beverages to our community and create a warm place where people can connect.', 'project-wp' ); ?></p>

                            <h4 class="mt-4"><?php esc_html_e( 'What we believe', 'project-wp' ); ?></h4>
                            <ul class="list-unstyled mt-2">
                                <li>&#8226; <?php esc_html_e( 'Quality over quantity — small-batch roasting.', 'project-wp' ); ?></li>
                                <li>&#8226; <?php esc_html_e( 'Sustainable partnerships with farmers.', 'project-wp' ); ?></li>
                                <li>&#8226; <?php esc_html_e( 'A friendly, welcoming space for everyone.', 'project-wp' ); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section class="values mb-5 text-center">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="theme-card p-4">
                            <h5><?php esc_html_e( 'Carefully Sourced', 'project-wp' ); ?></h5>
                            <p class="small text-muted"><?php esc_html_e( 'We work directly with small farms to ensure fair prices and quality beans.', 'project-wp' ); ?></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="theme-card p-4">
                            <h5><?php esc_html_e( 'Brewed with Skill', 'project-wp' ); ?></h5>
                            <p class="small text-muted"><?php esc_html_e( 'Our baristas are trained to highlight the flavor of each bean and beverage.', 'project-wp' ); ?></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="theme-card p-4">
                            <h5><?php esc_html_e( 'Community First', 'project-wp' ); ?></h5>
                            <p class="small text-muted"><?php esc_html_e( 'We support local events and invite neighbors to gather here.', 'project-wp' ); ?></p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="team-preview mb-5">
                <h3 class="text-center mb-3"><?php esc_html_e( 'Meet the Team', 'project-wp' ); ?></h3>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8">
                        <div class="row g-3">
                            <div class="col-6 col-md-4">
                                <div class="theme-card text-center p-3">
                                    <img src="<?php echo esc_url( get_theme_file_uri( 'Coffe.jpg' ) ); ?>" alt="Founder" class="img-fluid rounded-circle mb-2" style="width:80px;height:80px;object-fit:cover;">
                                    <h6 class="mb-0">Alex Rivers</h6>
                                    <p class="small text-muted mb-0">Founder & Head Roaster</p>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="theme-card text-center p-3">
                                    <img src="<?php echo esc_url( get_theme_file_uri( 'Coffe.jpg' ) ); ?>" alt="Manager" class="img-fluid rounded-circle mb-2" style="width:80px;height:80px;object-fit:cover;">
                                    <h6 class="mb-0">Samira Lee</h6>
                                    <p class="small text-muted mb-0">Cafe Manager</p>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="theme-card text-center p-3">
                                    <img src="<?php echo esc_url( get_theme_file_uri( 'Coffe.jpg' ) ); ?>" alt="Barista" class="img-fluid rounded-circle mb-2" style="width:80px;height:80px;object-fit:cover;">
                                    <h6 class="mb-0">Riley Park</h6>
                                    <p class="small text-muted mb-0">Lead Barista</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="cta text-center mb-5">
                <div class="theme-card mx-auto p-4" style="max-width:640px;">
                    <h4 class="mb-2"><?php esc_html_e( 'Visit Us Today', 'project-wp' ); ?></h4>
                    <p class="text-muted mb-3"><?php esc_html_e( 'Drop by for a cup, or order online and pick up in-store — we look forward to serving you.', 'project-wp' ); ?></p>
                    <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Contact & Locations', 'project-wp' ); ?></a>
                </div>
            </section>

        <?php endwhile; else : ?>
            <div class="theme-card text-center p-4">
                <h2><?php esc_html_e( 'About Daily Brew', 'project-wp' ); ?></h2>
                <p class="text-muted"><?php esc_html_e( 'Daily Brew is a cozy neighborhood cafe focused on quality, community, and craft. We roast small batches and serve them fresh.', 'project-wp' ); ?></p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
