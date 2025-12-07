<?php
/**
 * Template Name: Prosta strona (Plain)
 * 
 * Lekki szablon dla prostych stron statycznych (Regulamin, Polityka prywatności).
 * Zawiera tylko navbar, tytuł strony i treść Gutenberga.
 */
get_header();
?>

<main class="plain-page-content" style="
    min-height: 60vh;
    padding: 5vw 0;
    background-color: white;
    font-family: 'IBM Plex Sans', sans-serif;
">
    <div class="plain-page-container" style="
        max-width: 900px;
        margin: 0 auto;
        padding: 0 5vw;
    ">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
        ?>
            <!-- Tytuł strony -->
            <header class="plain-page-header" style="
                margin-bottom: 3vw;
                padding-bottom: 2vw;
                border-bottom: 2px solid #e0e0e0;
            ">
                <h1 class="plain-page-title" style="
                    font-family: 'Manrope', sans-serif;
                    font-size: 2.5vw;
                    font-weight: 600;
                    color: #1a1a1a;
                    line-height: 1.3;
                    margin: 0;
                ">
                    <?php the_title(); ?>
                </h1>
            </header>

            <!-- Treść Gutenberga -->
            <div class="plain-page-body" style="
                font-size: 1.1vw;
                line-height: 1.8;
                color: #4a4a4a;
            ">
                <?php the_content(); ?>
            </div>

        <?php
            endwhile;
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>
