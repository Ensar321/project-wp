<?php
/*
Template Name: Contact
Description: Simple contact page template that posts to admin-post.php and emails the site admin.
*/
get_header();
?>

<main class="contact-page section-pad">
    <div class="container">
        <header class="mb-4">
            <h1><?php the_title(); ?></h1>
        </header>

        <?php if ( isset( $_GET['contact'] ) && 'sent' === $_GET['contact'] ) : ?>
            <div class="alert alert-success" role="alert">
                <?php esc_html_e( 'Thank you — your message was sent.', 'project-wp' ); ?>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-7">
                <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
                    <?php wp_nonce_field( 'project_wp_contact' ); ?>
                    <input type="hidden" name="action" value="contact_submit">

                    <div class="mb-3">
                        <label for="contact-name" class="form-label"><?php esc_html_e( 'Name', 'project-wp' ); ?></label>
                        <input id="contact-name" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="contact-email" class="form-label"><?php esc_html_e( 'Email', 'project-wp' ); ?></label>
                        <input id="contact-email" name="email" type="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="contact-message" class="form-label"><?php esc_html_e( 'Message', 'project-wp' ); ?></label>
                        <textarea id="contact-message" name="message" rows="6" class="form-control" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary"><?php esc_html_e( 'Send Message', 'project-wp' ); ?></button>
                </form>
            </div>

            <aside class="col-md-5">
                <div class="card theme-card">
                    <div class="card-body">
                        <h5 class="card-title"><?php esc_html_e( 'Contact Info', 'project-wp' ); ?></h5>
                        <p class="mb-1"><?php esc_html_e( 'Email:', 'project-wp' ); ?> <a href="mailto:ensarpushkolli17@gmail.com">ensarpushkolli17@gmail.com</a></p>
                        <p class="mb-1"><?php esc_html_e( 'Phone:', 'project-wp' ); ?> +1 (555) 123-4567</p>
                        <p class="mb-0"><?php esc_html_e( 'Address:', 'project-wp' ); ?> 123 Coffee Lane, Brew City</p>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</main>

<?php get_footer(); ?>
