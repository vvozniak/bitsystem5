<head>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=IBM+Plex+Sans:wght@400;500;600;700&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

</head>

<?php
$pageTitle = "Oferta";
?>
<?php get_header(); ?>
<?php 
$hero_background = get_field('offer_hero_background_image');
?>
<section class="hero-section" style="position:relative; overflow:visible; color:white; margin-top:9.01vw;">
  <?php if ($hero_background) : ?>
  <img 
    src="<?php echo esc_url($hero_background['url']); ?>" 
    alt="<?php echo esc_attr($hero_background['alt'] ?: 'Tło wydarzenia'); ?>" 
    style="position:fixed; top:0; left:0; width:100%; height:100%; object-fit:cover; z-index:-10;"
  >
  <?php else : ?>
  <img 
    src="<?php echo get_template_directory_uri(); ?>/images/tlo.png" 
    alt="Tło wydarzenia" 
    style="position:fixed; top:0; left:0; width:100%; height:100%; object-fit:cover; z-index:-10;"
  >
  <?php endif; ?>

  

  <div class="hero-content" style="position:relative; margin-left:16.66vw; max-width:55vw; z-index:2;">
    
  
    <?php 
    $hero_title_highlight = get_field('offer_hero_title_highlight') ?: 'Doświadczenia';
    $hero_title_rest = get_field('offer_hero_title_rest') ?: ', które łączą świat';
    $hero_description = get_field('offer_hero_description') ?: 'Łączymy doświadczenie organizacyjne z pasją do współpracy międzykulturowej, oferując kompleksową obsługę projektów o zasięgu globalnym.';
    ?>
    <p class="text-title" style="opacity:0.9; margin-bottom:1vw; line-height:1.2; font-size:3.2vw; font-family:'Manrope', sans-serif;">
      <span class="text-highlight" style="background-color:#0BA0D880; opacity:0.9; padding:0.3vw 1vw; border-top-right-radius:9999px; border-bottom-right-radius:9999px; color:white; font-weight:800;">
        <?php echo esc_html($hero_title_highlight); ?>
      </span><?php echo esc_html($hero_title_rest); ?>
    </p>

    <p class="text-desc" style="opacity:0.9; margin-bottom:5.156vw; max-width:48vw; font-family:'IBM Plex Sans', sans-serif; font-size:1.25vw; line-height:1.6;">
     <?php echo esc_html($hero_description); ?>
    </p>

  </div>
   
  <div 
    class="social-icons" 
    style="
      position:absolute; 
      top: 70%; 
      right:3vw; 
      transform:translateY(-50%); 
      z-index:100; 
      display:flex; 
      flex-direction:column; 
      gap:1.2vw;
      
    "
  >
    <a href="#" aria-label="LinkedIn" style="display:block; width:2.5vw; height:2.5vw; border-radius:50%; overflow:hidden;">
      <img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.png" alt="LinkedIn" 
           style="width:100%; height:100%; object-fit:cover;">
    </a>
    <a href="#" aria-label="Facebook" style="display:block; width:2.5vw; height:2.5vw; border-radius:50%; overflow:hidden;">
      <img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt="Facebook" 
           style="width:100%; height:100%; object-fit:cover;">
    </a>
    <a href="#" aria-label="Instagram" style="display:block; width:2.5vw; height:2.5vw; border-radius:50%; overflow:hidden;">
      <img src="<?php echo get_template_directory_uri(); ?>/images/instagram.png" alt="Instagram" 
           style="width:100%; height:100%; object-fit:cover;">
    </a>
    <a href="#" aria-label="YouTube" style="display:block; width:2.5vw; height:2.5vw; border-radius:50%; overflow:hidden;">
      <img src="<?php echo get_template_directory_uri(); ?>/images/youtube.png" alt="YouTube" 
           style="width:100%; height:100%; object-fit:cover;">
    </a>
  </div>
</section>






<section class="offer-section" style="
    font-family: 'Manrope', sans-serif; 
    padding: 5vw 0; 
    background-color: white;
">
    
    <?php 
    $section_subtitle = get_field('offer_section_subtitle') ?: 'Nasza oferta';
    $section_title_before = get_field('offer_section_title_before') ?: 'Wydarzenia bez granic –';
    $section_title_highlight = get_field('offer_section_title_highlight') ?: 'łączymy ludzi, idee i kultury';
    $section_description = get_field('offer_section_description') ?: 'Działamy na styku biznesu, nauki i kultury. Organizujemy wydarzenia, które łączą ludzi, wiedzę i technologie, wspierając rozwój współpracy ponad granicami. Sprawdź, czym się zajmujemy:';
    ?>
    <div class="header-content" style="
        margin: 0 auto 3vw;
        padding: 0 3vw; /* Przykładowy margines boczny dla nagłówka */
    ">
        <p class="section-subtitle1" style="
            font-size: 1.67vw; 
            font-weight: 300; 
            color: #1a1a1a; 
            margin-bottom: 0.5vw;
        ">
            <?php echo esc_html($section_subtitle); ?>
        </p>
        <h1 class="section-title" style="
            font-size: 1.88vw; 
            font-weight: 600; 
            line-height: 1.2; 
            color: #1a1a1a; 
            margin-bottom: 1vw;
        ">
            <?php echo esc_html($section_title_before); ?> 
            <span style="
                background-color: #0BA0D882;
                color: white;
                padding: 0.2vw 0.8vw;
                display: inline-block;
                white-space: nowrap;
            ">
                <?php echo esc_html($section_title_highlight); ?>
            </span>
        </h1>
        <p class="section-description" style="
          font-family: 'IBM Plax Sans', sans-serif:
            font-weight: 400;
            font-size: 1.04vw; 
            line-height: 1.5; 
            color: #4a4a4a;
        ">
            <?php echo esc_html($section_description); ?>
        </p>
    </div>
    <!-- 🔹 KAFELKI (Z ACF POZOSTAJĄCE, UKŁAD LEWO-PRAWO) -->
    <div class="offer-grid" style="width:100vw;position:relative;left:50%;transform:translateX(-50%);padding:0 1.04vw;overflow:hidden;">
        <?php
        // Pobieranie kafelków z ACF
        $cards = [];
        for ($i = 1; $i <= 6; $i++) {
            $card = get_field('offer_card_' . $i);
            if ($card) {
                $cards[] = $card;
            } else {
                // Domyślne wartości jeśli ACF nie jest ustawiony
                $defaults = [
                    1 => ['title'=>'Konferencje i wydarzenia','description'=>'Od planowania po realizację – zapewniamy pełną obsługę konferencji, spotkań i eventów.','icon'=>'conference (1) 1.png','color'=>'#000C32','width'=>'35%'],
                    2 => ['title'=>'Misje gospodarcze i naukowe','description'=>'Organizujemy i koordynujemy wyjazdy biznesowe, kulturalne i akademickie w kraju i za granicą.','icon'=>'economic 1.png','color'=>'#0BA0D8','width'=>'65%'],
                    3 => ['title'=>'Wsparcie projektów badawczych','description'=>'Pomagamy w organizacji projektów naukowych i eksperckich.','icon'=>'scientist 1.png','color'=>'#000C32','width'=>'50%'],
                    4 => ['title'=>'Inicjatywy międzykulturowe','description'=>'Budujemy mosty między różnymi środowiskami poprzez projekty edukacyjne, szkoleniowe i integracyjne.','icon'=>'culture 1.png','color'=>'#0BA0D8','width'=>'50%'],
                    5 => ['title'=>'Rozwiązania technologiczne dla eventów','description'=>'Zapewniamy nowoczesne rozwiązania technologiczne dla eventów, obejmujące obsługę techniczną.','icon'=>'economic 1 (1).png','color'=>'#000C32','width'=>'40%'],
                    6 => ['title'=>'Eventy specjalne','description'=>'Organizujemy spotkania integracyjne dla firm, uroczystości tematyczne oraz bale dla dzieci i dorosłych.','icon'=>'economic 1 (2).png','color'=>'#0BA0D8','width'=>'60%'],
                ];
                $cards[] = $defaults[$i];
            }
        }

        $height = '13.48vw';
        $margin = '1.04vw';

        echo '<div style="overflow:hidden;">';
        for ($i = 0; $i < count($cards); $i++) {
            $b = $cards[$i];
            $card_color = isset($b['color']) ? $b['color'] : '#000C32';
            $card_width = isset($b['width']) ? $b['width'] : '50%';
            $card_title = isset($b['title']) ? $b['title'] : '';
            $card_description = isset($b['description']) ? $b['description'] : '';
            
            // Pobranie ikony - z ACF lub domyślnej
            $icon_url = '';
            if (isset($b['icon']) && is_array($b['icon'])) {
                $icon_url = $b['icon']['url'];
            } elseif (isset($b['icon']) && is_string($b['icon'])) {
                $icon_url = get_template_directory_uri().'/images/'.$b['icon'];
            }
            
            echo '<div class="kafelek" style="
                float:left;
                width:calc('.$card_width.' - '.$margin.');
                height:'.$height.';
                background-color:'.$card_color.';
                color:white;
                padding:2vw;
                border-radius:10px;
                box-sizing:border-box;
                margin:0 '.$margin.' '.$margin.' 0;
                display:flex;
                flex-direction:column;
                justify-content:space-between;
            ">';

            echo '<div style="display:flex;align-items:flex-start;margin-bottom:1vw;">';
            if ($icon_url) {
                echo '<img src="'.esc_url($icon_url).'" alt="'.esc_attr($card_title).'" style="width:3.5vw;height:3.5vw;object-fit:contain;margin-right:1.5vw;">';
            }
            echo '<h3 style="font-size:1.25vw;font-weight:600;line-height:1.3;">'.esc_html($card_title).'</h3>';
            echo '</div>';

            echo '<p style="font-size:1.04vw;font-weight:400;line-height:1.5;opacity:0.9;">'.esc_html($card_description).'</p>';
            echo '</div>';

            // Naprzemienne ustawienie lewej/prawej
            if ($i % 2 == 1) echo '<div style="clear:both;"></div>';
        }
        echo '</div>';
        ?>
    </div>

    <?php 
    $cta_text = get_field('offer_cta_text') ?: 'Zobacz nasze realizacje';
    $cta_link = get_field('offer_cta_link') ?: '#realizacje';
    ?>
    <div style="text-align:center;margin-top:4vw;">
        <a href="<?php echo esc_url($cta_link); ?>" style="display:inline-block;background:#0BA0D8;color:white;font-family:'Inter',sans-serif;font-size:1.25vw;font-weight:500;padding:1vw 2.5vw;border-radius:10px;text-decoration:none;"><?php echo esc_html($cta_text); ?></a>
    </div>
</section>







<?php 
// Pobieranie logotypów z Custom Post Type
$logos_query = new WP_Query([
    'post_type' => 'loga_klientow',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
]);

$logos = [];
if ($logos_query->have_posts()) {
    while ($logos_query->have_posts()) {
        $logos_query->the_post();
        $logo_image = get_field('logo_image');
        $logo_link = get_field('logo_link');
        $logo_alt = get_field('logo_alt');
        
        if ($logo_image) {
            $logos[] = [
                'url' => $logo_image['url'],
                'alt' => $logo_alt ?: get_the_title(),
                'link' => $logo_link,
                'height' => !empty($logo_image['height']) ? $logo_image['height'] : 100
            ];
        }
    }
    wp_reset_postdata();
}

// Jeśli są logotypy, wyświetl sekcję
if (!empty($logos)) :
    // Podwajamy listę dla płynnej animacji
    $scrolling_logos = array_merge($logos, $logos);
?>

<section class="logos-section">
  <div class="logos-strip-container">
    <div class="logos-strip">
      <?php foreach ($scrolling_logos as $logo) : ?>
      <?php if (!empty($logo['link'])) : ?>
      <a href="<?php echo esc_url($logo['link']); ?>" target="_blank" rel="noopener">
        <img src='<?php echo esc_url($logo['url']); ?>' 
             alt="<?php echo esc_attr($logo['alt']); ?>" 
             class="logo-item" 
             style="height: auto; max-height: 5vw;">
      </a>
      <?php else : ?>
      <img src='<?php echo esc_url($logo['url']); ?>' 
           alt="<?php echo esc_attr($logo['alt']); ?>" 
           class="logo-item" 
           style="height: auto; max-height: 5vw;">
      <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php else : ?>
<!-- Fallback: hardcoded logos if CPT is empty -->
<section class="logos-section">
  <div class="logos-strip-container">
    <div class="logos-strip">
      <img src='<?php echo get_template_directory_uri(); ?>/images/logo1.png' 
           alt="Logo Partnera 1" 
           class="logo-item" 
           style="height: 1.7188vw;">
      
      <img src='<?php echo get_template_directory_uri(); ?>/images/logo2.png' 
           alt="Logo Partnera 2" 
           class="logo-item" 
           style="height: 4.3229vw;">
      
      <img src='<?php echo get_template_directory_uri(); ?>/images/logo3.png' 
           alt="Logo Partnera 3" 
           class="logo-item" 
           style="height: 5.7292vw;">
      
      <img src='<?php echo get_template_directory_uri(); ?>/images/logo1.png' 
           alt="Logo Partnera 1" 
           class="logo-item" 
           style="height: 1.7188vw;">
      
      <img src='<?php echo get_template_directory_uri(); ?>/images/logo2.png' 
           alt="Logo Partnera 2" 
           class="logo-item" 
           style="height: 4.3229vw;">
      
      <img src='<?php echo get_template_directory_uri(); ?>/images/logo3.png' 
           alt="Logo Partnera 3" 
           class="logo-item" 
           style="height: 5.7292vw;">
      
    </div>
  </div>
</section>
<?php endif; ?>





<section class="approach-section">
  <div class="approach-container">

    <!-- LEWA KOLUMNA -->
     <?php 
     $approach_background = get_field('offer_approach_background_image');
     ?>
     <div class= "approach-tlo">

          <?php if ($approach_background) : ?>
            <img src="<?php echo esc_url($approach_background['url']); ?>" 
               alt="<?php echo esc_attr($approach_background['alt'] ?: ''); ?>" 
               class="img-figura"
              style="height= 34.23vw">
          <?php else : ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/Group 1.png" 
               alt="12" 
               class="img-figura"
              style="height= 34.23vw">
          <?php endif; ?>

    
      </div>


    <?php 
    $approach_subtitle = get_field('offer_approach_subtitle') ?: 'Nasze podejście';
    $approach_title = get_field('offer_approach_title') ?: 'Dlaczego warto nam zaufać';
    $approach_description = get_field('offer_approach_description') ?: 'Każde wydarzenie traktujemy jako wyjątkową okazję do tworzenia przestrzeni dla dialogu, wymiany wiedzy i budowania relacji. Naszą siłą jest połączenie dbałości o detale, nowoczesnych technologii i otwartości na różnorodność kulturową. Dzięki temu realizujemy projekty, które inspirują i zostawiają trwały ślad.';
    $approach_highlight_word = get_field('offer_approach_highlight_word') ?: 'Międzynarodowa perspektywa';
    $approach_highlight_text = get_field('offer_approach_highlight_text') ?: 'Współpracujemy z partnerami na całym świecie, łącząc różne środowiska – od biznesu i nauki, po kulturę i sektor społeczny.';
    $approach_image_small = get_field('offer_approach_image_small');
    $approach_image_large = get_field('offer_approach_image_large');
    $approach_background_image = get_field('offer_approach_background_image');
    ?>
    <div class="approach-left">
      <div class="text-block">
        <h3 class="approach-subtitle"><?php echo esc_html($approach_subtitle); ?></h3>
        <h2 class="approach-title"><?php echo esc_html($approach_title); ?></h2>

        <p class="approach-description">
          <?php echo esc_html($approach_description); ?>
        </p>

        <div class="highlight-row">
          <p class="approach-highlight-text">
            <span class="highlighted-word1"><?php echo esc_html($approach_highlight_word); ?></span><br>
            <?php echo esc_html($approach_highlight_text); ?>
          </p>
        
          <?php if ($approach_image_small) : ?>
          <img src="<?php echo esc_url($approach_image_small['url']); ?>" 
               alt="<?php echo esc_attr($approach_image_small['alt'] ?: 'Uczestnicy konferencji'); ?>" 
               class="img-small">
          <?php else : ?>
          <img src="<?php echo get_template_directory_uri(); ?>/images/Component 22.png" 
               alt="Uczestnicy konferencji" 
               class="img-small">
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- PRAWA KOLUMNA -->
    <div class="approach-right">
      <?php if ($approach_image_large) : ?>
      <img src="<?php echo esc_url($approach_image_large['url']); ?>" 
           alt="<?php echo esc_attr($approach_image_large['alt'] ?: 'Prelegent na scenie'); ?>" 
           class="img-large">
      <?php else : ?>
      <img src="<?php echo get_template_directory_uri(); ?>/images/Component 23.png" 
           alt="Prelegent na scenie" 
           class="img-large">
      <?php endif; ?>
    </div>

  </div>
</section>





<?php
include 'contact.php';
include 'footer.php';
  ?>