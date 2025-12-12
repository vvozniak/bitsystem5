<?php
/**
 * Szablon pojedynczego wpisu bloga z ACF
 */
get_header();

// Pobieranie tła hero - Featured Image lub fallback
$hero_bg_url = get_template_directory_uri() . '/images/webp/tlo3.webp'; // Domyślne tło
if (has_post_thumbnail()) {
    $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
    if ($featured_image) {
        $hero_bg_url = $featured_image;
    }
}
?>

<!-- HERO SECTION -->
<section class="hero-section" style="position:relative; overflow:visible; color:white; margin-top:-40px;">

  <!-- Tło z Featured Image lub domyślne -->
  <img 
    src="<?php echo esc_url($hero_bg_url); ?>" 
    alt="Tło wpisu" 
    style="position:fixed; top:0; left:0; width:100%; height:100%; object-fit:cover; z-index:-10;"
  >

  <!-- Overlay -->
  <div style="position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(15,23,42,0.6); z-index:-5;"></div>

  <div class="hero-content" style="position:relative; margin-left:16.66vw; padding-top:10vw; padding-bottom:10vw; z-index:2; max-width:60vw;">
    <?php 
    // Tytuł z ACF
    $tytul = get_field('tytul'); // pole ACF
    if ($tytul) {
        $parts = explode('-', $tytul, 2); // podział na wyróżnioną część
        echo '<h1 style="font-size:3.2vw; font-family:\'Manrope\', sans-serif; line-height:1.6; margin-bottom:0;">';
        echo '<span style="background-color:#0BA0D880; padding:0.5vw 1.2vw; border-top-right-radius:9999px; border-bottom-right-radius:9999px; font-weight:800; display:inline-block; box-decoration-break:clone; -webkit-box-decoration-break:clone;">' 
            . trim($parts[0]) . '</span>';
        if (isset($parts[1])) {
            echo ', ' . trim($parts[1]);
        }
        echo '</h1>';
    } else {
        // fallback na domyślny tytuł WP
        echo '<h1 style="font-size:3.2vw; font-family:\'Manrope\', sans-serif; line-height:1.6; margin-bottom:0;">' . get_the_title() . '</h1>';
    }
    ?>
  </div>
</section>

<!-- TREŚĆ WPISU -->
<div style="background-color:white;">
  <div class="page-content" style="padding:5vw 10vw; max-width:1200px; margin:auto;">
    
    <?php 
    if (have_posts()) :
      while (have_posts()) : the_post();
        // Obrazek tytułowy z ACF
        $obrazek = get_field('obraz_tytulowy');
        if ($obrazek): ?>
          <div style="text-align:center; margin-bottom:3vw;">
            <img src="<?php echo esc_url($obrazek['url']); ?>" 
                 alt="<?php echo esc_attr($obrazek['alt']); ?>" 
                 style="max-width:100%; height:auto; border-radius:1.5vw; box-shadow:0 10px 25px rgba(0,0,0,0.2);">
          </div>
        <?php endif; ?>

        <!-- Lead / skrót -->
        <?php 
        $lead = get_field('lead'); // pole ACF
        if ($lead): ?>
            <div class="lead" style="font-family:'IBM Plex Sans', sans-serif; font-size:1.2vw; margin-bottom:2vw; color:#4a4a4a;">
                <?php echo $lead; ?>
            </div>
        <?php endif; ?>

        <div class="entry-content" style="font-family:'IBM Plex Sans', sans-serif; font-size:1.15vw; line-height:1.7; color:#1a1a1a;">
          <?php 
          $content = get_the_content();
          if (trim($content)) {
            the_content();
          } else {
            echo '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nec urna eu lectus gravida bibendum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer et sem euismod, consequat justo at, convallis neque. Donec a diam et sapien egestas tincidunt sit amet ac erat.</p>';
          }
          ?>
        </div>

        <!-- Nawigacja do poprzedniego/następnego wpisu -->
        <div class="post-navigation" style="display:flex; justify-content:space-between; margin-top:5vw; font-family:'IBM Plex Sans', sans-serif; font-size:1vw;">
          <div class="prev-post"><?php previous_post_link('%link', '&larr; Poprzedni wpis'); ?></div>
          <div class="next-post"><?php next_post_link('%link', 'Następny wpis &rarr;'); ?></div>
        </div>

      <?php endwhile;
    endif;
    ?>
  </div>
</div>

<?php get_footer(); ?>
