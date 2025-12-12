<?php
/**
 * Template Name: Strona Bloga
 * Szablon strony bloga z ACF (lista wpisów)
 */
get_header();

// Pobieranie tła hero - Featured Image lub fallback
$hero_bg_url = get_template_directory_uri() . '/images/webp/tlo.webp'; // Domyślne tło
if (has_post_thumbnail()) {
    $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
    if ($featured_image) {
        $hero_bg_url = $featured_image;
    }
}
?>

<!-- HERO -->
<section class="hero-section" style="position:relative; overflow:visible; color:white; margin-top:9.01vw;">
  <img 
    src="<?php echo esc_url($hero_bg_url); ?>" 
    alt="Tło bloga" 
    style="position:fixed; top:0; left:0; width:100%; height:100%; object-fit:cover; z-index:-10;"
  >
  <div class="hero-content" style="position:relative; margin-left:16.66vw; max-width:55vw; z-index:2;">
    <p class="text-title" style="opacity:0.9; margin-bottom:1vw; line-height:1.6; font-size:3.2vw; font-family:'Manrope', sans-serif;">
      <span class="text-highlight" style="background-color:#0BA0D880; opacity:0.9; padding:0.5vw 1.2vw; border-top-right-radius:9999px; border-bottom-right-radius:9999px; color:white; font-weight:800; display:inline-block; box-decoration-break:clone; -webkit-box-decoration-break:clone;">
        Blog
      </span>, pełen inspiracji
    </p>
    <p class="text-desc" style="opacity:0.9; margin-bottom:5.156vw; max-width:48vw; font-family:'IBM Plex Sans', sans-serif; font-size:1.25vw; line-height:1.6;">
     Poznaj nasze wpisy, relacje z wydarzeń, porady i inspiracje ze świata kultury, biznesu i rozwoju społecznego.
    </p>
  </div>
</section>

<?php
$kafelek_size = '21.97vw';
$kafelek_gap = '2.44vw'; 
$figure_width = '10vw'; 
$content_max_width = '80vw'; 
$text_padding_left = '2.44vw'; 
$section_padding = '6vw';
$highlight_color = '#79D6F0';
$cta_color = '#0BA0D8';
$grid_total_width = 'calc(3 * ' . $kafelek_size . ' + 2 * ' . $kafelek_gap . ')';
?>

<!-- AKTUALNOŚCI / LISTA WPISÓW -->
<section class="aktualnosci-section" style="font-family: 'Manrope', sans-serif; padding: <?php echo $section_padding; ?> 0; background-color: white; position: relative; overflow: hidden; color: #1a1a1a;">
  <div class="aktualnosci-container" style="display: flex; max-width: 90vw; margin: 0 auto; position: relative; z-index: 2;">
      
      <div class="figure-column" style="width: <?php echo $figure_width; ?>; flex-shrink: 0; position: relative; height: 100%;">
          <img src="<?php echo get_template_directory_uri(); ?>/images/webp/Group 1.webp" alt="Figura tła" class="img-figura" style="width: 100%; height: auto; object-fit: contain; opacity: 1; display: block; margin-top: 5vw;">
      </div>

      <div class="content-column" style="flex-grow: 1; width: <?php echo $content_max_width; ?>; padding-left: <?php echo $text_padding_left; ?>;">
          
          <div class="header-block" style="margin-bottom: 4vw; position: relative;">
              <h2 class="section-title" style="font-size: 1.88vw; font-weight: 600; margin-bottom: 1.5vw; line-height:1.2;">
                  Sprawdź nasze 
                  <span style="background-color: <?php echo $highlight_color; ?>; color: #1a1a1a; padding: 0.1vw 0.8vw; display: inline-block; line-height: 1.2; white-space: nowrap; font-weight: 800; border-radius: 5px;">
                      aktualności
                  </span>
              </h2>
              <p class="section-description" style="font-family: 'IBM Plex Sans', sans-serif; font-size:1.04vw; font-weight:600; line-height:1.6; color:#4a4a4a; max-width:70%;">
                  Blog pełen inspiracji, relacji z wydarzeń i praktycznych porad. Każdy wpis zawiera tytuł, lead oraz wyróżniony obrazek.
              </p>
          </div>

          <?php
          $aktualnosci_query = new WP_Query([
              'posts_per_page' => 6,
              'post_type' => 'post',
              'orderby' => 'date',
              'order' => 'DESC',
          ]);
          if ($aktualnosci_query->have_posts()) :
          ?>
          <div class="articles-grid-wrapper" style="width: <?php echo $grid_total_width; ?>; margin:0 auto; display:flex; flex-wrap:wrap; gap:<?php echo $kafelek_gap; ?>;">
              <?php while ($aktualnosci_query->have_posts()) : $aktualnosci_query->the_post(); ?>
                  
                  <?php 
                  // Pobranie pól ACF
                  $tytul = get_field('tytul');
                  $obrazek = get_field('obraz_tytulowy');
                  $lead = get_field('lead');
                  ?>

                  <a href="<?php the_permalink(); ?>" class="grid-item" style="width: <?php echo $kafelek_size; ?>; height: <?php echo $kafelek_size; ?>; text-decoration:none; color:white; display:block; border-radius:8px; overflow:hidden; position:relative; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                      
                      <?php if ($obrazek): ?>
                          <img src="<?php echo esc_url($obrazek['url']); ?>" alt="<?php echo esc_attr($obrazek['alt']); ?>" style="width:100%; height:100%; object-fit:cover;">
                      <?php else: ?>
                          <img src="<?php echo get_template_directory_uri(); ?>/images/webp/default.webp" alt="<?php the_title(); ?>" style="width:100%; height:100%; object-fit:cover;">
                      <?php endif; ?>

                      <div class="overlay" style="position:absolute; bottom:0; left:0; width:100%; height:100%; background:linear-gradient(to top, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0) 50%); z-index:5;"></div>

                      <div class="item-content" style="position:absolute; bottom:0; left:0; padding:1vw; z-index:10; width:100%;">
                          <?php if ($tytul): 
                              $parts = explode('-', $tytul, 2); ?>
                              <p class="item-title" style="font-weight:600; font-size:1.05vw; line-height:1.3; margin:0; color:white;">
                                  <span><?php echo trim($parts[0]); ?></span><?php if(isset($parts[1])) echo ', '.trim($parts[1]); ?>
                              </p>
                          <?php else: ?>
                              <p class="item-title" style="font-weight:600; font-size:1.05vw; line-height:1.3; margin:0; color:white;"><?php the_title(); ?></p>
                          <?php endif; ?>
                          <?php if ($lead): ?>
                              <p class="item-lead" style="font-size:0.9vw; color:#ccc; margin-top:0.5vw;"><?php echo $lead; ?></p>
                          <?php endif; ?>
                      </div>
                  </a>

              <?php endwhile; ?>
          </div>
          <?php wp_reset_postdata(); endif; ?>

      </div>
  </div>

  <div style="position:absolute; bottom:0; left:0; width:100%; height:1px; background:#ccc;"></div>
</section>

<?php get_footer(); ?>
