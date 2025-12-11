<?php
/**
 * Template Name: Pojedyncza Oferta
 * 
 * Szablon dla pojedynczej strony oferty/usługi.
 * Zawiera hero section, treść Gutenberga, obrazek wyróżniający i przycisk CTA.
 */
get_header();
?>

<!-- HERO SECTION -->
<section class="hero-section" style="position:relative; overflow:visible; color:white; margin-top:9.01vw;">
  <?php 
  // Pobierz opcjonalne tło z ACF lub użyj domyślnego
  $bg = get_field('offer_single_background');
  $bg_url = $bg ? esc_url($bg['url']) : get_template_directory_uri() . '/images/webp/tlo.webp';
  ?>
  <img 
    src="<?php echo $bg_url; ?>" 
    alt="Tło oferty" 
    style="position:fixed; top:0; left:0; width:100%; height:100%; object-fit:cover; z-index:-10;"
  >
  
  <!-- Cień overlay -->
  <div style="position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(15,23,42,0.6); z-index:-5;"></div>

  <div class="hero-content" style="position:relative; margin-left:16.66vw; padding-top:8vw; padding-bottom:8vw; z-index:2; max-width:60vw;">
    <h1 style="font-size:3.2vw; font-family:'Manrope', sans-serif; line-height:1.2; margin-bottom:1vw; font-weight:800;">
      <span style="background-color:#0BA0D880; padding:0.3vw 1vw; border-top-right-radius:9999px; border-bottom-right-radius:9999px; color:white;">
        <?php the_title(); ?>
      </span>
    </h1>
  </div>
</section>

<!-- TREŚĆ STRONY -->
<div style="background-color:white;">
  <div class="page-content" style="padding:5vw 10vw; max-width:1200px; margin:auto;">
    
    <?php 
    if (have_posts()) : 
      while (have_posts()) : the_post();
        
        // Wyświetl obrazek wyróżniający jeśli istnieje
        if (has_post_thumbnail()): ?>
          <div style="text-align:center; margin-bottom:3vw;">
            <?php the_post_thumbnail('large', array(
              'style' => 'max-width:100%; height:auto; border-radius:1.5vw; box-shadow:0 10px 25px rgba(0,0,0,0.2);',
              'alt' => get_the_title()
            )); ?>
          </div>
        <?php endif; ?>

        <!-- Treść Gutenberga -->
        <div class="entry-content" style="font-family:'IBM Plex Sans', sans-serif; font-size:1.15vw; line-height:1.7; color:#4a4a4a;">
          <?php the_content(); ?>
        </div>

        <?php 
        // Pobierz opcjonalny tekst i link CTA z ACF
        $cta_text = get_field('offer_single_cta_text');
        $cta_link = get_field('offer_single_cta_link');
        
        // Użyj wartości domyślnych jeśli pola ACF są puste
        if (!$cta_text) $cta_text = 'Skontaktuj się z nami';
        if (!$cta_link) $cta_link = home_url('/kontakt');
        ?>
        
        <!-- Przycisk CTA -->
        <div style="text-align:center; margin-top:4vw; margin-bottom:2vw;">
          <a href="<?php echo esc_url($cta_link); ?>" 
             style="display:inline-block; background-color:#0BA0D8; color:white; padding:1.2vw 3vw; 
                    font-family:'Manrope', sans-serif; font-size:1.1vw; font-weight:600; 
                    text-decoration:none; border-radius:50px; transition:all 0.3s ease; 
                    box-shadow:0 4px 10px rgba(11,160,216,0.3);"
             onmouseover="this.style.backgroundColor='#0888ba'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 15px rgba(11,160,216,0.4)';"
             onmouseout="this.style.backgroundColor='#0BA0D8'; this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 10px rgba(11,160,216,0.3)';">
            <?php echo esc_html($cta_text); ?>
          </a>
        </div>

      <?php
      endwhile;
    endif;
    ?>
  </div>
</div>

<!-- Style dla treści Gutenberga -->
<style>
.entry-content h2 {
    font-family: 'Manrope', sans-serif;
    font-size: clamp(1.5rem, 2vw, 2rem);
    font-weight: 600;
    color: #1a1a1a;
    margin-top: 3rem;
    margin-bottom: 1.5rem;
    line-height: 1.4;
}

.entry-content h3 {
    font-family: 'Manrope', sans-serif;
    font-size: clamp(1.25rem, 1.6vw, 1.625rem);
    font-weight: 600;
    color: #2a2a2a;
    margin-top: 2.5rem;
    margin-bottom: 1.25rem;
    line-height: 1.4;
}

.entry-content h4 {
    font-family: 'Manrope', sans-serif;
    font-size: clamp(1.125rem, 1.3vw, 1.375rem);
    font-weight: 600;
    color: #3a3a3a;
    margin-top: 2rem;
    margin-bottom: 1rem;
    line-height: 1.4;
}

.entry-content p {
    margin-bottom: 1.5rem;
}

.entry-content ul,
.entry-content ol {
    margin: 1.5rem 0 1.5rem 1.5rem;
    padding-left: 1rem;
}

.entry-content li {
    margin-bottom: 0.75rem;
    line-height: 1.7;
}

.entry-content a {
    color: #0BA0D8;
    text-decoration: underline;
    transition: color 0.3s ease;
}

.entry-content a:hover {
    color: #0888ba;
}

.entry-content strong {
    font-weight: 600;
    color: #2a2a2a;
}

.entry-content .wp-block-quote {
    border-left: 4px solid #0BA0D8;
    padding-left: 1.5rem;
    margin: 2rem 0;
    font-style: italic;
    color: #5a5a5a;
}

.entry-content .wp-block-image {
    margin: 2rem 0;
}

.entry-content .wp-block-image img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
}

/* Responsywność mobile */
@media (max-width: 768px) {
    .hero-content {
        margin-left: 5vw !important;
        max-width: 90vw !important;
        padding-top: 15vw !important;
        padding-bottom: 15vw !important;
    }
    
    .hero-content h1 {
        font-size: 6vw !important;
    }
    
    .page-content {
        padding: 8vw 5vw !important;
    }
    
    .entry-content {
        font-size: 3.5vw !important;
    }
    
    .entry-content a[href^="#"] {
        font-size: 3.5vw !important;
        padding: 3vw 6vw !important;
    }
}

/* Tablet */
@media (min-width: 769px) and (max-width: 1024px) {
    .hero-content {
        margin-left: 10vw !important;
        max-width: 80vw !important;
    }
    
    .hero-content h1 {
        font-size: 4vw !important;
    }
    
    .page-content {
        padding: 6vw 8vw !important;
    }
    
    .entry-content {
        font-size: 2vw !important;
    }
}
</style>

<?php get_footer(); ?>
