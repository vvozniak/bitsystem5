<?php
/**
 * Template Name: Prosta strona (Plain)
 * 
 * Lekki szablon dla prostych stron statycznych (Regulamin, Polityka prywatności).
 * Zawiera tylko navbar, tytuł strony i treść Gutenberga z optymalnymi marginesami.
 */
get_header();
?>

<style>
/* Główny kontener strony */
.plain-page-content {
    min-height: 70vh;
    padding: 4rem 0 6rem;
    background-color: #ffffff;
    font-family: 'IBM Plex Sans', sans-serif;
}

.plain-page-container {
    max-width: 880px;
    margin: 0 auto;
    padding: 0 2.5rem;
}

/* Nagłówek strony */
.plain-page-header {
    margin-bottom: 3rem;
    padding-bottom: 1.5rem;
    border-bottom: 2px solid #e5e7eb;
}

.plain-page-title {
    font-family: 'Manrope', sans-serif;
    font-size: clamp(1.75rem, 2.5vw, 2.5rem);
    font-weight: 600;
    color: #1a1a1a;
    line-height: 1.3;
    margin: 0;
}

/* Treść Gutenberga */
.plain-page-body {
    font-size: clamp(1rem, 1.1vw, 1.125rem);
    line-height: 1.8;
    color: #4a4a4a;
}

/* Style dla elementów Gutenberga */
.plain-page-body h2 {
    font-family: 'Manrope', sans-serif;
    font-size: clamp(1.5rem, 2vw, 2rem);
    font-weight: 600;
    color: #1a1a1a;
    margin-top: 3rem;
    margin-bottom: 1.5rem;
    line-height: 1.4;
}

.plain-page-body h3 {
    font-family: 'Manrope', sans-serif;
    font-size: clamp(1.25rem, 1.6vw, 1.625rem);
    font-weight: 600;
    color: #2a2a2a;
    margin-top: 2.5rem;
    margin-bottom: 1.25rem;
    line-height: 1.4;
}

.plain-page-body h4 {
    font-family: 'Manrope', sans-serif;
    font-size: clamp(1.125rem, 1.3vw, 1.375rem);
    font-weight: 600;
    color: #3a3a3a;
    margin-top: 2rem;
    margin-bottom: 1rem;
    line-height: 1.4;
}

.plain-page-body p {
    margin-bottom: 1.5rem;
    text-align: justify;
}

.plain-page-body ul,
.plain-page-body ol {
    margin: 1.5rem 0 1.5rem 1.5rem;
    padding-left: 1rem;
}

.plain-page-body li {
    margin-bottom: 0.75rem;
    line-height: 1.7;
}

.plain-page-body a {
    color: #0BA0D8;
    text-decoration: underline;
    transition: color 0.3s ease;
}

.plain-page-body a:hover {
    color: #0888ba;
}

.plain-page-body strong {
    font-weight: 600;
    color: #2a2a2a;
}

.plain-page-body em {
    font-style: italic;
}

/* Bloki Gutenberga */
.plain-page-body .wp-block-quote {
    border-left: 4px solid #0BA0D8;
    padding-left: 1.5rem;
    margin: 2rem 0;
    font-style: italic;
    color: #5a5a5a;
}

.plain-page-body .wp-block-separator {
    margin: 3rem auto;
    border-color: #e5e7eb;
}

.plain-page-body .wp-block-image {
    margin: 2rem 0;
}

.plain-page-body .wp-block-image img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
}

.plain-page-body .wp-block-table {
    margin: 2rem 0;
    overflow-x: auto;
}

.plain-page-body table {
    width: 100%;
    border-collapse: collapse;
}

.plain-page-body table th,
.plain-page-body table td {
    padding: 0.75rem;
    border: 1px solid #e5e7eb;
    text-align: left;
}

.plain-page-body table th {
    background-color: #f9fafb;
    font-weight: 600;
    color: #1a1a1a;
}

/* Responsywność mobile */
@media (max-width: 768px) {
    .plain-page-content {
        padding: 2rem 0 4rem;
    }
    
    .plain-page-container {
        padding: 0 1.5rem;
    }
    
    .plain-page-header {
        margin-bottom: 2rem;
        padding-bottom: 1rem;
    }
    
    .plain-page-title {
        font-size: 1.75rem;
    }
    
    .plain-page-body {
        font-size: 1rem;
        line-height: 1.7;
    }
    
    .plain-page-body h2 {
        font-size: 1.5rem;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }
    
    .plain-page-body h3 {
        font-size: 1.25rem;
        margin-top: 1.5rem;
        margin-bottom: 0.875rem;
    }
    
    .plain-page-body h4 {
        font-size: 1.125rem;
        margin-top: 1.25rem;
        margin-bottom: 0.75rem;
    }
    
    .plain-page-body ul,
    .plain-page-body ol {
        margin-left: 1rem;
        padding-left: 0.75rem;
    }
    
    .plain-page-body .wp-block-quote {
        padding-left: 1rem;
        margin: 1.5rem 0;
    }
}

/* Tablet */
@media (min-width: 769px) and (max-width: 1024px) {
    .plain-page-container {
        max-width: 720px;
        padding: 0 2rem;
    }
}

/* Większe ekrany */
@media (min-width: 1400px) {
    .plain-page-container {
        max-width: 960px;
    }
}

/* Style dla drukowania */
@media print {
    .plain-page-content {
        padding: 0;
        background: white;
    }
    
    .plain-page-container {
        max-width: 100%;
        padding: 0;
    }
    
    .plain-page-body {
        font-size: 11pt;
        line-height: 1.6;
        color: #000;
    }
    
    .plain-page-body h2 {
        font-size: 16pt;
        page-break-after: avoid;
    }
    
    .plain-page-body h3 {
        font-size: 14pt;
        page-break-after: avoid;
    }
    
    .plain-page-body a {
        color: #000;
        text-decoration: underline;
    }
    
    .plain-page-body a[href]:after {
        content: " (" attr(href) ")";
        font-size: 9pt;
        color: #666;
    }
}
</style>

<main class="plain-page-content">
    <div class="plain-page-container">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
        ?>
            <!-- Nagłówek strony -->
            <header class="plain-page-header">
                <h1 class="plain-page-title">
                    <?php the_title(); ?>
                </h1>
            </header>

            <!-- Treść Gutenberga -->
            <article class="plain-page-body">
                <?php the_content(); ?>
            </article>

        <?php
            endwhile;
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>
