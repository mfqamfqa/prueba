<?php
get_header();
?>
<main id="main" class="site-main container py-5">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-5' ); ?>>
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <section class="no-results not-found">
            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e( 'No se encontraron contenidos.', 'ecos-ruminahui' ); ?></h1>
            </header>
            <div class="page-content">
                <p><?php esc_html_e( 'Prueba a publicar contenido para ver algo aquí.', 'ecos-ruminahui' ); ?></p>
            </div>
        </section>
    <?php endif; ?>
</main>
<?php
get_footer();
