<?php
/**
 * Template Name: Strona główna
 */
get_header();

// Pobieranie pól grup
$hero = get_field('hero');
$about = get_field('about');
$masai = get_field('masai');
$offer = get_field('offer');

// Pomocnicze zmienne
$template_uri = get_template_directory_uri();
?>

<head>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=IBM+Plex+Sans:wght@400;500;600;700&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body <?php body_class(); ?>>

<?php if ($hero) : 
  $hero_bg_image = $hero['hero_background_image']['url'] ?? $template_uri . '/images/webp/tlo.webp';
  $hero_img = $hero['hero_image']['url'] ?? $template_uri . '/images/webp/blok.webp';
  $cta_link = esc_url($hero['hero_cta_link'] ?? '/oferta');
?>
<section class="hero-section" style="position:relative; overflow:visible; color:white; margin-top:-40px;">
  <img 
    src="<?php echo $hero_bg_image; ?>" 
    alt="Tło wydarzenia" 
    style="position:fixed; top:0; left:0; width:100%; height:100%; object-fit:cover; z-index:-10;"
  >

  <div style="position:absolute; inset:0; background-color:rgba(15,23,42,0.6);"></div>

  <div class="hero-content" style="position:relative; margin-left:16.66vw; max-width:55vw; z-index:2;">
    
    <p class="text-main" style="opacity:0.8; margin-bottom:1vw; line-height:1.3; font-size:2vw; font-family:'Manrope', sans-serif;">
      <?php echo esc_html($hero['hero_main_text']); ?>
    </p>

    <p class="text-title" style="opacity:0.9; margin-bottom:1vw; line-height:1.6; font-size:3.2vw; font-family:'Manrope', sans-serif;">
      <?php 
        $title_parts = explode(',', esc_html($hero['hero_title']), 2); // Zakładam, że podświetlony tekst to pierwszy element
        $highlight = trim($title_parts[0]);
        $rest_of_title = isset($title_parts[1]) ? trim($title_parts[1]) : '';
      ?>
      <span class="text-highlight" style="background-color:#0BA0D880; opacity:0.9; padding:0.5vw 1.2vw; border-top-right-radius:9999px; border-bottom-right-radius:9999px; color:white; font-weight:800; display:inline-block; box-decoration-break:clone; -webkit-box-decoration-break:clone;">
        <?php echo $highlight; ?>
      </span><?php echo $rest_of_title; ?>
    </p>

    <p class="text-desc" style="opacity:0.9; margin-bottom:2vw; max-width:48vw; font-family:'IBM Plex Sans', sans-serif; font-size:1.25vw; line-height:1.6;">
      <?php echo esc_html($hero['hero_description']); ?>
    </p>

    <a href="<?php echo $cta_link; ?>" 
       class="cta-btn"
       style="display:inline-block; background:white; color:black; font-family:'Inter', sans-serif; font-size:1.25vw; font-weight:500; padding:1vw 2.5vw; border-radius:10px; text-decoration:none; transition:background 0.3s;">
       <?php echo esc_html($hero['hero_cta_text']); ?>
    </a>

    <?php if (have_rows('hero_icons', 'hero')) : ?>
    <div class="icon-row" style="margin-top:3vw; display:flex; gap:4vw; align-items:center; font-size:1vw; padding-bottom:5.78vw;">
      <?php while (have_rows('hero_icons', 'hero')) : the_row(); 
        $icon = get_sub_field('ikonka');
        $alt = get_sub_field('alt');
      ?>
      <div style="text-align:center;">
        <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($alt); ?>" class="icon" style="height:5.46vw; margin-bottom:0.5vw;">
        <?php if ($alt) : ?>
          <p style="color:white; font-size:1vw; margin:0; font-family:'IBM Plex Sans', sans-serif;"><?php echo esc_html($alt); ?></p>
        <?php endif; ?>
      </div>
      <?php endwhile; ?>
    </div>
    <?php else : ?>
    <!-- Patronaty -->
    <div class="patron-section" style="margin-top:3vw; padding-bottom:5.78vw;">
      <p class="patron-title" style="color:white; font-size:1vw; font-family:'IBM Plex Sans', sans-serif; margin-bottom:1.5vw; opacity:0.9; font-weight:500;">
        Nasze projekty objęte patronatem:
      </p>
      <div class="patron-logos" style="display:flex; gap:2vw; align-items:center; justify-content:flex-start; flex-wrap:wrap;">
        <div class="patron-logo-box" style="background:white; padding:0.8vw 1.2vw; border-radius:8px; min-width:9vw; height:4vw; display:flex; align-items:center; justify-content:center; box-shadow:0 3px 10px rgba(0,0,0,0.1);">
          <img src="<?php echo $template_uri; ?>/images/urzad-bydgoszcz.png" alt="Urząd Miasta Bydgoszczy" style="max-height:3vw; max-width:100%; width:auto; object-fit:contain;">
        </div>
        <div class="patron-logo-box" style="background:white; padding:0.8vw 1.2vw; border-radius:8px; min-width:9vw; height:4vw; display:flex; align-items:center; justify-content:center; box-shadow:0 3px 10px rgba(0,0,0,0.1);">
          <img src="<?php echo $template_uri; ?>/images/wsglogo.png" alt="Wyższa Szkoła Gospodarki" style="max-height:3vw; max-width:100%; width:auto; object-fit:contain;">
        </div>
        <div class="patron-logo-box" style="background:white; padding:0.8vw 1.2vw; border-radius:8px; min-width:9vw; height:4vw; display:flex; align-items:center; justify-content:center; box-shadow:0 3px 10px rgba(0,0,0,0.1);">
          <img src="<?php echo $template_uri; ?>/images/forumlogo.png" alt="Forum Rozwoju Regionalnego" style="max-height:3vw; max-width:100%; width:auto; object-fit:contain;">
        </div>
      </div>
    </div>
    <?php endif; ?>
  </div>

  <div class="hero-image" 
    style="
      position:absolute; 
      right:-2vw; 
      bottom:-2vw; 
      width:34.54vw; 
      height:17.13vw; 
      background:white; 
      border-radius:2vw; 
      overflow:visible; 
      z-index:30;
    "
  >
    <img 
      src='<?php echo $hero_img; ?>' 
      alt='Zdjęcie wydarzenia' 
      style='
        position:absolute; 
        top:1.25vw; 
        left:1.25vw; 
        height:26.19vw; 
        width:auto; 
        object-fit:cover; 
        border-radius:2vw;
      '
    >
  </div>
  
  <?php if (have_rows('hero_social_links', 'hero')) : ?>
  <div 
    class="social-icons" 
    style="
      position:absolute; 
      top:30%; 
      right:0; 
      transform:translateY(-50%); 
      z-index:100; 
      display:flex; 
      flex-direction:column; 
      gap:1.2vw;
      padding-right:3vw;
    "
  >
    <?php while (have_rows('hero_social_links', 'hero')) : the_row(); 
      $icon = get_sub_field('ikonka');
      $link = get_sub_field('link');
    ?>
    <a href="<?php echo esc_url($link); ?>" aria-label="<?php echo esc_attr($icon['alt'] ?? 'Social Link'); ?>" style="display:block; width:2.5vw; height:2.5vw; border-radius:50%; overflow:hidden; background-color:rgba(0,0,0,0.5); padding:0.3vw;">
      <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt'] ?? 'Social Icon'); ?>" 
           style="width:100%; height:100%; object-fit:contain; filter: brightness(0) invert(1);">
    </a>
    <?php endwhile; ?>
  </div>
  <?php else : ?>
  <!-- Fallback: Domyślne social media -->
  <div 
    class="social-icons" 
    style="
      position:absolute; 
      top:30%; 
      right:0; 
      transform:translateY(-50%); 
      z-index:100; 
      display:flex; 
      flex-direction:column; 
      gap:1.2vw;
      padding-right:3vw;
    "
  >
    <a href="#" aria-label="LinkedIn" style="display:block; width:2.5vw; height:2.5vw; border-radius:50%; overflow:hidden; background-color:rgba(0,0,0,0.5); padding:0.3vw;">
      <img src="<?php echo $template_uri; ?>/images/webp/linkedin.webp" alt="LinkedIn" 
           style="width:100%; height:100%; object-fit:contain; filter: brightness(0) invert(1);">
    </a>
    <a href="#" aria-label="Facebook" style="display:block; width:2.5vw; height:2.5vw; border-radius:50%; overflow:hidden; background-color:rgba(0,0,0,0.5); padding:0.3vw;">
      <img src="<?php echo $template_uri; ?>/images/webp/facebook.webp" alt="Facebook" 
           style="width:100%; height:100%; object-fit:contain; filter: brightness(0) invert(1);">
    </a>
    <a href="#" aria-label="Instagram" style="display:block; width:2.5vw; height:2.5vw; border-radius:50%; overflow:hidden; background-color:rgba(0,0,0,0.5); padding:0.3vw;">
      <img src="<?php echo $template_uri; ?>/images/webp/instagram.webp" alt="Instagram" 
           style="width:100%; height:100%; object-fit:contain; filter: brightness(0) invert(1);">
    </a>
    <a href="#" aria-label="YouTube" style="display:block; width:2.5vw; height:2.5vw; border-radius:50%; overflow:hidden; background-color:rgba(0,0,0,0.5); padding:0.3vw;">
      <img src="<?php echo $template_uri; ?>/images/webp/youtube.webp" alt="YouTube" 
           style="width:100%; height:100%; object-fit:contain; filter: brightness(0) invert(1);">
    </a>
  </div>
  <?php endif; ?>
</section>
<?php endif; ?>

<?php if ($about) : 
  $about_cta_link = esc_url($about['about_cta_link'] ?? '/o-nas');
?>
<section class="kim-jestesmy" style="background-color:white; color:#0f172a; padding:3.33vw 0;">
  <div style="width:100%;  margin:0 auto; padding:0 16.66vw; overflow:hidden;">
    
    <div style="width:43.96vw; float:left; ">
      <h3 style="font-size:1.67vw; font-family:'Manrope', sans-serif; font-weight:300;  line-height:100%;">
        <?php echo esc_html($about['about_subtitle']); ?>
      </h3>
      
      <h2 style="font-size:2.19vw; font-family:'Manrope', sans-serif; font-weight:600; margin-bottom:2.19vw; line-height: 1.2;">
        <?php 
          // Wyszukiwanie frazy do podświetlenia, zakładam, że to ostatnia fraza
          $title_text = esc_html($about['about_title']);
          $last_phrase = 'współpracy międzynarodowej'; // Statyczny podświetlony fragment w HTML
          
          if (strpos($title_text, $last_phrase) !== false) {
              $parts = explode($last_phrase, $title_text);
              // Dodajemy niełamalną spację przed "i" i używamy span z white-space: nowrap dla fragmentu "wydarzeń i"
              $before_text = $parts[0];
              // Jeśli tekst kończy się na "wydarzeń i ", to opakowujemy "wydarzeń i" w span z white-space: nowrap (BEZ niebieskiego tła)
              if (preg_match('/(.*?)(wydarzeń\s+i\s*)$/', $before_text, $matches)) {
                  echo $matches[1];
                  echo '<span class="no-wrap-text" style="white-space: nowrap;">' . $matches[2] . '</span>';
              } else {
                  // Fallback: niełamalna spacja przed "i"
                  $before_text = str_replace(' i ', '&nbsp;i ', $before_text);
                  echo $before_text;
              }
              // Tylko "współpracy międzynarodowej" ma niebieskie tło - dodajemy klasę highlighted-text
              echo '<br class="mobile-break"><span class="highlighted-text" style="display: inline-block; position: relative; padding: 0 0.5vw; z-index: 1; width: 170%; background-color: #0BA0D882; border-radius: 40px; color:#fff;">' . $last_phrase . '</span>';
              if (isset($parts[1])) { echo $parts[1]; }
          } else {
              // Awaryjne wyświetlenie bez podświetlenia
              $title_text = str_replace(' i ', '&nbsp;i ', $title_text);
              echo $title_text;
          }
        ?>
      </h2>

      <h3 style="font-size:1.04vw; line-height:1.6; color:#444; margin-bottom:1.67vw; font-weight:400; font-family:'IBM Plex Sans', sans-serif;">
        <?php echo esc_html($about['about_description']); ?>
      </h3>
    </div>
   

    <div style="clear:both;"></div> 
    <a href="<?php echo $about_cta_link; ?>" class="btn-cta"
       style="display:inline-block; background:#0BA0D8; color:white; font-family:'Inter', sans-serif; font-size:1.25vw; font-weight:500; padding:1vw 2.5vw; border-radius:10px; text-decoration:none; transition:background 0.3s;">
      <?php echo esc_html($about['about_cta_text']); ?>
    </a>
  </div>
</section>
<?php endif; ?>


<?php if ($masai) : 
  $masai_bg = $masai['masai_main_image']['url'] ?? $template_uri . '/images/webp/africa 2.webp';
  $masai_small_img = $masai['masai_small_image']['url'] ?? $template_uri . '/images/webp/ms2.webp';
  $masai_cta_link = esc_url($masai['masai_cta_link'] ?? '#');
?>
<section class="masai-section" 
  style="background-color:#fff; background-image:url('<?php echo $masai_bg; ?>'); background-repeat:no-repeat; background-position:right center; background-size:contain;">

  <div class="masai-left">
    <img src='<?php echo $template_uri; ?>/images/webp/ms1.webp'  alt="Grupa Masajów w tradycyjnych strojach">
  </div>

  <div class="masai-right">
    <p class="masai-super-heading">
      <?php echo esc_html($masai['masai_super_heading']); ?>
    </p>
    
    <h2>
      <?php echo esc_html($masai['masai_title']); ?>
    </h2>
    
    <p class="masai-description" style="width:45.38vw;"> 
      <?php echo esc_html($masai['masai_description']); ?>
    </p>

    <div class="masai-content-block">
      <div class="masai-small-image-container">
        <img class="masai-small" src='<?php echo $masai_small_img; ?>' alt="Masaj">
      </div>
      
      <div class="masai-icons-and-button">
        <?php if (have_rows('masai_icons', 'masai')) : ?>
        <div class="masai-icons">
          <?php while (have_rows('masai_icons', 'masai')) : the_row(); 
            $icon = get_sub_field('ikona');
            $opis = get_sub_field('opis');
          ?>
          <div class="masai-icon-item">
            <img src='<?php echo esc_url($icon['url']); ?>' alt="<?php echo esc_attr($icon['alt'] ?? $opis); ?>">
            <span><?php echo esc_html($opis); ?></span>
          </div>
          <?php endwhile; ?>
        </div> 
        <?php else : ?>
        <!-- Fallback: Domyślne 3 ikony -->
        <div class="masai-icons">
          <div class="masai-icon-item">
            <img src='<?php echo $template_uri; ?>/images/webp/ikon5.webp' alt="Spotkanie kultur">
            <span>Spotkanie kultur</span>
          </div>
          <div class="masai-icon-item">
            <img src='<?php echo $template_uri; ?>/images/webp/ikon6.webp' alt="Autentyczna muzyka i taniec">
            <span>Autentyczna muzyka i taniec</span>
          </div>
          <div class="masai-icon-item">
            <img src='<?php echo $template_uri; ?>/images/webp/ikon7.webp' alt="Wspólne doświadczenie">
            <span>Wspólne doświadczenie</span>
          </div>
        </div>
        <?php endif; ?>
        
        <a href="<?php echo $masai_cta_link; ?>" 
          class="btn-cta" 
          style="display:inline-block; background:#0BA0D8; color:white; margin-top: 2.187vw; font-family:'Inter', sans-serif; font-size:0.937vw; font-weight:500; padding:12px 35px; border-radius:10px; text-decoration:none; transition:background 0.3s;">
            <?php echo esc_html($masai['masai_cta_text']); ?>
        </a>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php 
$page_id = 43; // Używamy ID strony 43

// --- POBIERANIE PÓL (Statyczne pola dla ACF Free) ---
$stat_1_number = get_field('stat_1_number', $page_id);
$stat_1_description = get_field('stat_1_description', $page_id);
$stat_1_icon = get_field('stat_1_icon', $page_id); 

$stat_2_number = get_field('stat_2_number', $page_id);
$stat_2_description = get_field('stat_2_description', $page_id);
$stat_2_icon = get_field('stat_2_icon', $page_id); 

$stat_3_number = get_field('stat_3_number', $page_id);
$stat_3_description = get_field('stat_3_description', $page_id);
$stat_3_icon = get_field('stat_3_icon', $page_id); 

$stat_4_number = get_field('stat_4_number', $page_id);
$stat_4_description = get_field('stat_4_description', $page_id);
$stat_4_icon = get_field('stat_4_icon', $page_id); 

// Tworzymy tablicę dla ułatwienia pętli
$stats_array = [
    ['number' => $stat_1_number, 'description' => $stat_1_description, 'icon' => $stat_1_icon],
    ['number' => $stat_2_number, 'description' => $stat_2_description, 'icon' => $stat_2_icon],
    ['number' => $stat_3_number, 'description' => $stat_3_description, 'icon' => $stat_3_icon],
    ['number' => $stat_4_number, 'description' => $stat_4_description, 'icon' => $stat_4_icon],
];
?>

<section class="stats-section" style="
    display: flex; 
    justify-content: center; 
    align-items: center; 
    min-height: 40vh; 
    background-color: #0b2241; 
    position: relative; 
    overflow: hidden; 
    padding: 60px 0;
">
    
    <div class="stats-overlay" style="
        position: absolute; 
        top: 0; 
        left: 0; 
        width: 100%; 
        height: 100%; 
        background-image: url('<?php echo get_template_directory_uri(); ?>/images/footerbg.jpg');
        background-repeat: no-repeat; 
        background-size: cover; 
        background-position: center center;
        opacity: 0.3;
    "></div>

    <div class="stats-content" style="
        display: flex; 
        justify-content: space-around; 
        align-items: flex-start; 
        width: 80%; 
        max-width: 1200px; 
        position: relative; 
        z-index: 2; 
        text-align: center;
    ">
        
        <?php 
        $stats_count = count($stats_array);
        $index = 0;
        foreach ($stats_array as $stat) : 
            $index++;
            $is_last = ($index === $stats_count);
            $number = $stat['number'];
            $description = $stat['description'];
            $icon = $stat['icon']; 
        ?>

        <div class="stat-item" style="
            flex: 1; 
            margin: 0 15px; 
            max-width: 250px; 
            color: white;
        ">
            <?php if ($is_last) : ?>
                <!-- Ostatnia ikona - znak nieskończoności -->
                <div class="stat-icon-wrapper" style="
                    margin-bottom: 20px; 
                    height: 80px; 
                    display: flex; 
                    justify-content: center; 
                    align-items: center;
                ">
                    <svg class="stat-icon infinity-icon" 
                         viewBox="0 0 120 50" 
                         style="
                            width: 80px; 
                            height: 40px;
                            fill: none;
                            stroke: white;
                            stroke-width: 5;
                            stroke-linecap: round;
                            stroke-linejoin: round;
                         ">
                        <path d="M 30 25 C 30 12, 40 5, 50 5 C 60 5, 70 12, 70 25 C 70 38, 60 45, 50 45 C 40 45, 30 38, 30 25 Z" />
                        <path d="M 90 25 C 90 12, 80 5, 70 5 C 60 5, 50 12, 50 25 C 50 38, 60 45, 70 45 C 80 45, 90 38, 90 25 Z" />
                    </svg>
                </div>
            <?php elseif ($icon) : ?>
                <div class="stat-icon-wrapper" style="
                    margin-bottom: 20px; 
                    height: 80px; 
                    display: flex; 
                    justify-content: center; 
                    align-items: center;
                ">
                    <img class="stat-icon" 
                         src="<?php echo esc_url($icon['url']); ?>" 
                         alt="<?php echo esc_attr($icon['alt'] ?? $description); ?>" 
                         style="
                            width: 100%; 
                            max-width: 80px; 
                            height: auto;
                         ">
                </div>
            <?php else : ?>
                <h3 class="stat-number" style="
                    font-size: 3.5em; 
                    font-weight: 700; 
                    margin-bottom: 5px; 
                    color: #fff;
                ">
                    <?php echo esc_html($number); ?>
                </h3>
            <?php endif; ?>

            <p class="stat-description" style="
                font-size: 1.1em; 
                line-height: 1.4; 
                color: #b0c0d9;
            ">
                <?php echo esc_html($description); ?>
            </p>
        </div>
        
        <?php endforeach; ?>
        
    </div>
</section>



<?php 
$page_id = 43; 

// 1. POBIERANIE NAGŁÓWKÓW (zgodnie z nazwami pól z JSON)
$offer_subtitle = get_field('offer_left_subtitle', $page_id);
$offer_title_raw = get_field('offer_left_title', $page_id);
$offer_description = get_field('offer_left_description', $page_id);

// 2. TWORZENIE TABLICY KART (ręczne pobieranie statycznych grup)
$offer_cards_array = [];
for ($i = 1; $i <= 5; $i++) {
    // Pobieramy całą grupę pola (np. 'offer_card_1')
    $card_group = get_field('offer_card_' . $i, $page_id);
    if ($card_group) {
        $offer_cards_array[] = $card_group;
    }
}

// 3. PRZYPISANIE KART DO ZMIENNYCH DLA ŁATWIEJSZEGO UŻYCIA
$card_1 = $offer_cards_array[0] ?? null; 
$card_2 = $offer_cards_array[1] ?? null;
$card_3 = $offer_cards_array[2] ?? null;
$card_4 = $offer_cards_array[3] ?? null;
$card_5 = $offer_cards_array[4] ?? null;

// Funkcja pomocnicza do pobierania URL ikony
function get_card_icon_url($card) {
    if (!empty($card['icon']['url'])) {
        return esc_url($card['icon']['url']);
    }
    return '';
}

// Funkcja pomocnicza do pobierania linku karty
function get_card_link($card) {
    // Jeśli karta ma link, użyj go; w przeciwnym razie użyj domyślnego /oferta
    return !empty($card['link']) ? esc_url($card['link']) : esc_url('/oferta');
}
?>

<section class="offer-section-v4">
  
  <div class="offer-grid-v4">
    
    <div class="offer-left-box-v2">
      <p class="offer-subtitle"><?php echo esc_html($offer_subtitle); ?></p>
      <h2 class="offer-title">
        <?php 
        // Wyszukujemy i zamieniamy "międzynarodowych" na statyczny span z klasą, 
        // lub wyświetlamy cały tytuł bez zmian, jeśli nie używałeś tego pola do formatowania.
        // Jeśli pole ma zawierać tylko tekst, użyj $offer_title_raw
        
        // Zakładamy, że używasz tego pola ACF tylko do tekstu, formatowanie zostawiamy w HTML:
        $title_parts = explode('<br>', $offer_title_raw);
        echo esc_html($title_parts[0]); ?>
        <?php echo esc_html($title_parts[1]); ?>
        <span class="highlighted-word">
            <?php 
            // Zakładam, że ostatnie słowo "międzynarodowych" było oddzielone w ACF <br> lub było w oddzielnym polu.
            // Jeśli title_parts[2] istnieje, użyj go. Jeśli nie, to użyj tego co było.
            echo 'międzynarodowych'; 
            ?>
        </span>
      </h2>
      <p class="offer-description" style="padding-top: 1vw; padding-bottom: 2vw;">
        <?php echo esc_html($offer_description); ?>
      </p>
    </div>
    
    <?php if ($card_1) : ?>
    <a href="<?php echo get_card_link($card_1); ?>" class="offer-card dark-bg card-1" style="text-decoration: none; color: white; display: block; cursor: pointer; transition: transform 0.3s ease, box-shadow 0.3s ease;">
      <div class="card-icon"><img src='<?php echo get_card_icon_url($card_1); ?>' alt="<?php echo esc_attr($card_1['title']); ?>"></div> 
      <h3 class="card-title"><?php echo esc_html($card_1['title']); ?></h3>
      <p class="card-text"><?php echo esc_html($card_1['text']); ?></p>
    </a>
    <?php endif; ?>

    <?php if ($card_2) : ?>
    <a href="<?php echo get_card_link($card_2); ?>" class="offer-card dark-bg card-2" style="text-decoration: none; color: white; display: block; cursor: pointer; transition: transform 0.3s ease, box-shadow 0.3s ease;">
      <div class="card-icon"><img src='<?php echo get_card_icon_url($card_2); ?>' alt="<?php echo esc_attr($card_2['title']); ?>"></div> 
      <h3 class="card-title"><?php echo esc_html($card_2['title']); ?></h3>
      <p class="card-text"><?php echo esc_html($card_2['text']); ?></p>
    </a>
    <?php endif; ?>
    
    <?php if ($card_3) : ?>
    <a href="<?php echo get_card_link($card_3); ?>" class="offer-card dark-bg card-3" style="text-decoration: none; color: white; display: block; cursor: pointer; transition: transform 0.3s ease, box-shadow 0.3s ease;">
      <div class="card-icon"><img src='<?php echo get_card_icon_url($card_3); ?>' alt="<?php echo esc_attr($card_3['title']); ?>"></div> 
      <h3 class="card-title"><?php echo esc_html($card_3['title']); ?></h3>
      <p class="card-text"><?php echo esc_html($card_3['text']); ?></p>
    </a>
    <?php endif; ?>
    
    <?php if ($card_4) : ?>
    <a href="<?php echo get_card_link($card_4); ?>" class="offer-card dark-bg card-4" style="text-decoration: none; color: white; display: block; cursor: pointer; transition: transform 0.3s ease, box-shadow 0.3s ease;">
      <div class="card-icon"><img src='<?php echo get_card_icon_url($card_4); ?>' alt="<?php echo esc_attr($card_4['title']); ?>"></div> 
      <h3 class="card-title"><?php echo esc_html($card_4['title']); ?></h3>
      <p class="card-text"><?php echo esc_html($card_4['text']); ?></p>
    </a>
    <?php endif; ?>

    <?php if ($card_5) : ?>
    <a href="<?php echo get_card_link($card_5); ?>" class="offer-card light-bg card-5" style="text-decoration: none; color: white; display: block; cursor: pointer; transition: transform 0.3s ease, box-shadow 0.3s ease;">
      <div class="card-icon"><img src='<?php echo get_card_icon_url($card_5); ?>' alt="<?php echo esc_attr($card_5['title']); ?>"></div> 
      <h3 class="card-title"><?php echo esc_html($card_5['title']); ?></h3>
      <p class="card-text"><?php echo esc_html($card_5['text']); ?></p>
    </a>
    <?php endif; ?>
    
    <div class="offer-cta-container-v2" style="grid-column: 3; grid-row: 3; display: flex; justify-content: flex-end; align-items: flex-start; padding-top: 2vw;">
      <a href="/oferta" class="btn-cta-offer">Poznaj nasze usługi</a>
    </div>
    
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
                'link' => $logo_link
            ];
        }
    }
    wp_reset_postdata();
}

// Fallback do starych pól ACF jeśli CPT nie ma logotypów
if (empty($logos)) {
    $page_id = 43; 
    for ($i = 1; $i <= 6; $i++) {
        $logo = get_field('partner_logo_' . $i, $page_id);
        if ($logo) {
            $logos[] = [
                'url' => $logo['url'],
                'alt' => $logo['alt'] ?: 'Partner Logo',
                'link' => ''
            ];
        }
    }
}

// Jeśli nie ma logotypów, nie wyświetlaj sekcji
if (empty($logos)) {
    return;
}

// Aby animacja była płynna, musimy PODWOIĆ listę logotypów.
$scrolling_logos = array_merge($logos, $logos);

?>

<section class="logos-section">
    <div class="logos-strip-container">
        <div class="logos-strip">
            
            <?php 
            // Pętla przechodzi przez podwojoną listę logotypów
            foreach ($scrolling_logos as $logo) : 
            ?>
                <?php if (!empty($logo['link'])) : ?>
                <a href="<?php echo esc_url($logo['link']); ?>" target="_blank" rel="noopener">
                    <img 
                        src="<?php echo esc_url($logo['url']); ?>" 
                        alt="<?php echo esc_attr($logo['alt']); ?>" 
                        class="logo-item" 
                        style="height: auto; max-height: 5vw;"
                    >
                </a>
                <?php else : ?>
                <img 
                    src="<?php echo esc_url($logo['url']); ?>" 
                    alt="<?php echo esc_attr($logo['alt']); ?>" 
                    class="logo-item" 
                    style="height: auto; max-height: 5vw;"
                >
                <?php endif; ?>
            <?php endforeach; ?>
            
        </div>
    </div>
</section>

<?php 
$page_id = 43; 

// --- POBIERANIE PÓL ---
$subtitle = get_field('approach_subtitle', $page_id);
$title = get_field('approach_title', $page_id);
$description = get_field('approach_description', $page_id);

$highlight_normal = get_field('approach_highlight_text_normal', $page_id);
$highlight_accent = get_field('approach_highlight_text_accent', $page_id);
$image_small = get_field('approach_image_small', $page_id); // Array
$image_large = get_field('approach_image_large', $page_id); // Array

// Funkcja pomocnicza dla URL obrazu i alt
$get_img_url = fn($img) => is_array($img) && !empty($img['url']) ? esc_url($img['url']) : '';
$get_img_alt = fn($img, $default = 'Image') => is_array($img) && !empty($img['alt']) ? esc_attr($img['alt']) : esc_attr($default);
?>

<section class="approach-section">
    <div class="approach-container">
        
        <div class="approach-tlo">
            </div>

        <div class="approach-left">
            
            <?php if ($subtitle) : ?>
                <p class="approach-subtitle"><?php echo esc_html($subtitle); ?></p>
            <?php endif; ?>
            
            <?php if ($title) : ?>
                <h2 class="approach-title"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
            
            <?php if ($description) : ?>
                <p class="approach-description"><?php echo esc_html($description); ?></p>
            <?php endif; ?>
            
            <div class="highlight-row">
                
                <?php $url_small = $get_img_url($image_small); ?>
                
                <div class="approach-row-content" style="overflow: hidden;"> 
                    <?php if ($url_small) : ?>
                        <img 
                            src="<?php echo $url_small; ?>" 
                            alt="<?php echo $get_img_alt($image_small, 'Mały obrazek'); ?>" 
                            class="img-small"
                        >
                    <?php endif; ?>
                    
                    <div class="approach-highlight-text">
                        <?php if ($highlight_normal) : ?>
                            <?php echo esc_html($highlight_normal); ?>
                        <?php endif; ?>
                        
                        <?php if ($highlight_accent) : ?>
                            <span class="highlighted-word1">
                                <?php echo esc_html($highlight_accent); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </div> </div> </div> <div class="approach-right">
            <?php $url_large = $get_img_url($image_large); ?>
            <?php if ($url_large) : ?>
                <img 
                    src="<?php echo $url_large; ?>" 
                    alt="<?php echo $get_img_alt($image_large, 'Duży obrazek'); ?>" 
                    class="img-large"
                >
            <?php endif; ?>
        </div> </div> </section>

<section class="realizations-section">
  <div class="realizations-header-container">
    <div class="realizations-text-col">
      <p class="realizations-subtitle">Z pasją do perfekcji</p>
      <h2 class="realizations-title">Nasze <span>Realizacje</span></h2>
    </div>
    <a href="/zrealizowane-projekty" class="btn-realizations-cta">Zobacz wszystkie projekty</a>
  </div>

  <div class="realizations-grid">
    <?php
    // Definicja zapytania do pobrania 3 najnowszych wpisów typu 'realizacje'
    $args = array(
      'post_type' => 'realizacje',
      'posts_per_page' => 3,
      'orderby' => 'date',
      'order' => 'DESC',
      // Warto dodać, by ignorować sticky posts, jeśli masz taki zwyczaj
      'ignore_sticky_posts' => true
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) :
      while ($query->have_posts()) : $query->the_post();

        // Pobranie dynamicznych pól ACF dla bieżącego wpisu CPT
        $tytul = get_field('realizacja_tytul');
        $obrazek = get_field('obrazek_tytulowy'); // Oczekiwany format zwracany: Array
        
        // Ustawienie URL obrazu
        $tlo = '';
        if (is_array($obrazek) && !empty($obrazek['url'])) {
            $tlo = esc_url($obrazek['url']);
        } else {
            // Alternatywny obrazek, jeśli pole jest puste (upewnij się, że ta ścieżka jest poprawna!)
            $tlo = get_template_directory_uri() . '/images/webp/tlo3.webp'; 
        }

        // Logika dzielenia tytułu na część akcentowaną i resztę
        $tytul_html = '';
        if ($tytul) {
            $parts = explode('-', $tytul, 2);
            // Pierwsza część w span z klasą dla zakreślenia
            $tytul_html = '<span>' . trim($parts[0]) . '</span>';
            // Dodanie reszty tytułu, jeśli istnieje
            if (isset($parts[1])) {
                $tytul_html .= ' - ' . trim($parts[1]);
            }
        }
    ?>
        <a href="<?php the_permalink(); ?>" class="realization-card">
          <img src="<?php echo $tlo; ?>" alt="<?php echo esc_attr($tytul); ?>" class="card-image">
          <div class="card-overlay">
            <h3 class="card-title"><?php echo $tytul_html; ?></h3>
          </div>
        </a>
    <?php
      endwhile;
      // Zawsze resetuj dane posta po użyciu WP_Query
      wp_reset_postdata();
    else :
      // Komunikat, gdy nie ma wpisów
      echo '<p>Brak realizacji do wyświetlenia.</p>';
    endif;
    ?>
  </div>
</section>


<?php include 'contact.php'?>
<?php get_footer(); ?>
</body>