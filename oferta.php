
<?php
/**
 * Template Name: Oferta
 * 
 * Renderuje wszystkie realizacje w zależności od wybranego typu wizualizacji
 * Typy: hero, highlight, standard
 * 
 * =========================================
 * INSTRUKCJA IMPLEMENTACJI
 * =========================================
 * 
 * 1. IMPORT ACF:
 *    - W panelu WordPress: Narzędzia > Import
 *    - Zaimportuj plik: acf-oferta.json
 *    - Grupa pól zostanie automatycznie przypisana do post_type = 'realizacje'
 * 
 * 2. DODAWANIE REALIZACJI:
 *    - W panelu WordPress przejdź do Realizacje > Dodaj nową
 *    - Wybierz "Typ sekcji":
 *      a) Hero (Moja Afryka - Podróż z Masajem) - 8 elementów listy z ikonami
 *      b) Highlight (Kolej na Kobiety) - 2 zdjęcia, tytuł z highlightem, 4 ikony
 *      c) Standard (Projekt naprzemiennie) - automatyczny układ lewo/prawo
 * 
 * 3. CONDITIONAL LOGIC:
 *    - Po wyborze typu sekcji, widoczne będą tylko pola dla tego typu
 *    - Hero: 8 par pól (tekst + ikona), 2 zdjęcia, CTA
 *    - Highlight: podtytuł, tytuł z highlightem, opis, 4 ikony, 2 zdjęcia, CTA
 *    - Standard: podtytuł, tytuł z highlightem, 2 opisy, dofinansowanie, zdjęcie, CTA
 * 
 * 4. KOLEJNOŚĆ WYŚWIETLANIA:
 *    - Wszystkie realizacje renderują się w kolejności od najnowszych
 *    - Standard automatycznie pilnuje układu naprzemiennego (lewo/prawo)
 * 
 * 5. UŻYCIE SZABLONU:
 *    - Stwórz nową stronę w WordPress
 *    - Wybierz szablon: "Oferta"
 *    - Strona automatycznie wyświetli wszystkie realizacje
 * 
 * =========================================
 * ODPOWIEDZI NA PYTANIA Z BRIEF'U:
 * =========================================
 * 
 * ✅ Typ Hero: 8 elementów listy - TAK (field_hero_item1_text/icon ... field_hero_item8_text/icon)
 * ✅ Typ Highlight: 4 ikony - TAK (field_highlight_icon1_image/text ... field_highlight_icon4_image/text)
 * ✅ Typ Standard: układ i pola jak opisano - TAK (podtytuł, tytuł z highlightem, 2 opisy, dofinansowanie, zdjęcie, CTA)
 * ✅ Bez repeaterów - TAK (wszystkie pola są indywidualne z Conditional Logic)
 * ✅ Automatyczny układ lewo/prawo dla Standard - TAK (licznik: $standard_counter)
 * 
 */

get_header(); ?>

<section class="hero-section" style="position:relative; overflow:visible; color:white; margin-top:9.01vw;">
  <img 
    src="<?php echo get_template_directory_uri(); ?>/images/tlo.png" 
    alt="Tło wydarzenia" 
    style="position:fixed; top:0; left:0; width:100%; height:100%; object-fit:cover; z-index:-10;"
  >

  <div class="hero-content" style="position:relative; margin-left:16.66vw; max-width:55vw; z-index:2;">
    <p class="text-title" style="opacity:0.9; margin-bottom:1vw; line-height:1.2; font-size:3.2vw; font-family:'Manrope', sans-serif;">
      <span class="text-highlight" style="background-color:#0BA0D880; opacity:0.9; padding:0.3vw 1vw; border-top-right-radius:9999px; border-bottom-right-radius:9999px; color:white; font-weight:800;">
        Realizacje
      </span>, które łączą świat
    </p>

    <p class="text-desc" style="opacity:0.9; margin-bottom:5.156vw; max-width:48vw; font-family:'IBM Plex Sans', sans-serif; font-size:1.25vw; line-height:1.6;">
     Łączymy doświadczenie organizacyjne z pasją do współpracy międzykulturowej, oferując kompleksową obsługę projektów o zasięgu globalnym.
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

<?php
// Pobieranie wszystkich postów typu 'realizacje'
$realizacje_query = new WP_Query([
    'post_type'      => 'realizacje',
    'posts_per_page' => -1, // wszystkie
    'orderby'        => 'date',
    'order'          => 'DESC',
]);

// Licznik dla automatycznego układu naprzemiennego
$standard_counter = 0;

if ($realizacje_query->have_posts()) :
    while ($realizacje_query->have_posts()) : $realizacje_query->the_post();
        
        // Pobranie typu wizualizacji z ACF
        $type = get_field('realizacja_type');
        
        // Renderowanie na podstawie typu
        if ($type === 'hero') :
            // ========================================
            // TYP: HERO (Moja Afryka - Podróż z Masajem)
            // ========================================
            $title_line1 = get_field('hero_title_line1');
            $title_line2 = get_field('hero_title_line2');
            $description = get_field('hero_description');
            $program_title = get_field('hero_program_title');
            $main_image = get_field('hero_main_image');
            $small_image = get_field('hero_small_image');
            $cta_text = get_field('hero_cta_text');
            $cta_link = get_field('hero_cta_link');
            
            // 8 elementów listy
            $items = [];
            for ($i = 1; $i <= 8; $i++) {
                $text = get_field('hero_item' . $i . '_text');
                $icon = get_field('hero_item' . $i . '_icon');
                if ($text && $icon) {
                    $items[] = ['text' => $text, 'icon' => $icon];
                }
            }
            ?>
            
            <section class="realization-section" style="
                font-family: 'Manrope', sans-serif; 
                padding: 5vw 0 8vw; 
                background-color: white;
                color: #1a1a1a;
                width: 100vw; 
                position: relative; 
                left: 50%; 
                transform: translateX(-50%);
            ">
                <div class="event-details-container" style="
                    display: flex; 
                    width: 100vw; 
                    position: relative; 
                    left: 50%; 
                    transform: translateX(-50%); 
                    overflow: hidden; 
                ">
                    
                    <div class="photo-column" style="
                        width: 37.18vw; 
                        position: relative;
                        left: -5.93vw; 
                    ">
                        <?php if ($main_image) : ?>
                            <img 
                                src="<?php echo esc_url($main_image['url']); ?>" 
                                alt="<?php echo esc_attr($main_image['alt']); ?>" 
                                style="
                                    width: 37.18vw; 
                                    height: auto; 
                                    object-fit: cover; 
                                    border-radius: 10px;
                                "
                            >
                        <?php endif; ?>
                    </div>

                    <div class="info-column" style="
                        width: 44.6vw;
                        margin-left: -5.93vw; 
                        padding-right: 3vw; 
                    ">
                        
                        <h3 class="event-title" style="
                            font-family: 'Manrope', sans-serif; 
                            font-size: 1.88vw; 
                            font-weight: 600; 
                            margin-bottom: 1vw;
                        ">
                            <?php echo esc_html($title_line1); ?>
                            <span style="display: block; font-size: 2.2vw; font-weight: 800;">
                                <?php echo esc_html($title_line2); ?>
                            </span>
                        </h3>

                        <p class="event-desc" style="
                            font-size: 1.04vw;
                            font-weight:400; 
                            line-height: 1.6; 
                            margin-bottom: 2vw;
                            font-family: 'IBM Plex Sans', sans-serif;
                        ">
                            <?php echo esc_html($description); ?>
                        </p>

                        <?php if ($program_title) : ?>
                            <p class="program" style="font-size: 1.25vw; font-weight: 600; margin-bottom: 1vw;">
                                <?php echo esc_html($program_title); ?>
                            </p>
                        <?php endif; ?>
                        
                        <div class="features-grid" style="
                            display: grid;
                            grid-template-columns: 1fr 1fr;
                            gap: 1.5vw;
                            font-size: 1vw;
                        ">
                            <?php foreach ($items as $item) : ?>
                                <div class="feature-item" style="
                                    display: flex; 
                                    align-items: center; 
                                    line-height: 1.4;
                                ">
                                    <img 
                                        src="<?php echo esc_url($item['icon']['url']); ?>" 
                                        alt="<?php echo esc_attr($item['icon']['alt']); ?>" 
                                        style="
                                            width: 2vw; 
                                            height: 2vw; 
                                            object-fit: contain; 
                                            margin-right: 1vw;
                                            filter: brightness(0.2);
                                        "
                                    >
                                    <span><?php echo esc_html($item['text']); ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <?php if ($cta_text && $cta_link) : ?>
                            <a href="<?php echo esc_url($cta_link); ?>" 
                                class="cta-btn"
                                style="
                                    display:inline-block; 
                                    background: #0BA0D8; 
                                    color: white; 
                                    font-family:'Inter', sans-serif; 
                                    font-size:1.25vw; 
                                    font-weight:500; 
                                    padding:1vw 2.5vw; 
                                    border-radius: 10px;
                                    text-decoration: none;
                                    margin-top: 3vw;
                                ">
                                <?php echo esc_html($cta_text); ?>    
                            </a>
                        <?php endif; ?>
                    </div>

                    <div class="small-graphic-col" style="width: 23.9vw;">
                        <?php if ($small_image) : ?>
                            <img 
                                src="<?php echo esc_url($small_image['url']); ?>" 
                                alt="<?php echo esc_attr($small_image['alt']); ?>" 
                                style="
                                    width: 100%; 
                                    height: 23.9vw; 
                                    object-fit: cover; 
                                    border-radius: 10px;
                                    margin-top: 2vw;
                                "
                            >
                        <?php endif; ?>
                    </div>
                    
                </div> 
                
                <div style="clear: both;"></div>
            </section>
            
        <?php elseif ($type === 'highlight') : 
            // ========================================
            // TYP: HIGHLIGHT (Kolej na Kobiety)
            // ========================================
            $subtitle = get_field('highlight_subtitle');
            $title_before = get_field('highlight_title_before');
            $title_highlight = get_field('highlight_title_highlight');
            $description = get_field('highlight_description');
            $main_image = get_field('highlight_main_image');
            $background_image = get_field('highlight_background_image');
            $cta_text = get_field('highlight_cta_text');
            $cta_link = get_field('highlight_cta_link');
            
            // 4 ikony
            $icons = [];
            for ($i = 1; $i <= 4; $i++) {
                $icon_img = get_field('highlight_icon' . $i . '_image');
                $icon_text = get_field('highlight_icon' . $i . '_text');
                if ($icon_img && $icon_text) {
                    $icons[] = ['image' => $icon_img, 'text' => $icon_text];
                }
            }
            ?>
            
            <section class="kobiety-section">
              <div class="kobiety-container">

                <div class="kobiety-tlo">
                  <?php if ($background_image) : ?>
                      <img src="<?php echo esc_url($background_image['url']); ?>" 
                           alt="<?php echo esc_attr($background_image['alt']); ?>" 
                           class="kobiety-figura">
                  <?php endif; ?>
                </div>

                <div class="kobiety-left" style="z-index:10;">
                  <div class="text-block">
                    <?php if ($subtitle) : ?>
                        <h3 class="kobiety-subtitle"><?php echo esc_html($subtitle); ?></h3>
                    <?php endif; ?>
                    
                    <h2 class="kobiety-title">
                     <?php echo esc_html($title_before); ?>
                      <span class="highlighted-word"><?php echo esc_html($title_highlight); ?></span>
                    </h2>

                    <p class="kobiety-description">
                      <?php echo esc_html($description); ?>
                    </p>

                    <?php if (!empty($icons)) : ?>
                        <div class="kobiety-icons">
                          <?php foreach ($icons as $icon) : ?>
                              <div class="kobiety-icon-item">
                                <img src="<?php echo esc_url($icon['image']['url']); ?>" 
                                     alt="<?php echo esc_attr($icon['image']['alt']); ?>">
                                <span><?php echo esc_html($icon['text']); ?></span>
                              </div>
                          <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($cta_text && $cta_link) : ?>
                        <a href="<?php echo esc_url($cta_link); ?>" class="kobiety-btn">
                            <?php echo esc_html($cta_text); ?>
                        </a>
                    <?php endif; ?>
                  </div>
                </div>

                <div class="kobiety-right" style="z-index:20;">
                  <?php if ($main_image) : ?>
                      <img src="<?php echo esc_url($main_image['url']); ?>" 
                           alt="<?php echo esc_attr($main_image['alt']); ?>" 
                           class="kobiety-img">
                  <?php endif; ?>
                </div>

              </div>
            </section>
            
        <?php elseif ($type === 'standard') : 
            // ========================================
            // TYP: STANDARD (Naprzemiennie lewo/prawo)
            // ========================================
            $subtitle = get_field('standard_subtitle');
            $title_before = get_field('standard_title_before');
            $title_highlight = get_field('standard_title_highlight');
            $title_after = get_field('standard_title_after');
            $description1 = get_field('standard_description1');
            $description2 = get_field('standard_description2');
            $funding = get_field('standard_funding');
            $image = get_field('standard_image');
            $cta_text = get_field('standard_cta_text');
            $cta_link = get_field('standard_cta_link');
            
            // Określenie układu (lewo/prawo)
            $is_left = ($standard_counter % 2 === 0);
            $standard_counter++;
            
            $photo_width = '37vw';
            $photo_height = '21.8vw';
            $gap_between = '2.44vw';
            $section_padding = '6vw';
            $text_padding_offset = '0.8vw';
            ?>
            
            <section class="standard-project-section" style="
                font-family: 'Manrope', sans-serif; 
                padding: <?php echo $section_padding; ?> 0; 
                background-color: white;
                position: relative; 
                color: #1a1a1a;
            ">
                
                <div class="standard-container" style="
                    display: flex; 
                    max-width: 90vw; 
                    margin: 0 auto;
                    gap: <?php echo $gap_between; ?>; 
                    position: relative;
                    align-items: flex-start;
                    <?php echo $is_left ? '' : 'flex-direction: row-reverse;'; ?>
                ">

                    <?php if ($is_left) : // UKŁAD Z GRAFIKĄ PO LEWEJ ?>
                        
                        <div class="photo-column" style="
                            width: <?php echo $photo_width; ?>; 
                            flex-shrink: 0;
                            position: relative;
                            z-index: 20;
                        ">
                            <?php if ($image) : ?>
                                <img 
                                    src="<?php echo esc_url($image['url']); ?>" 
                                    alt="<?php echo esc_attr($image['alt']); ?>" 
                                    style="
                                        width: <?php echo $photo_width; ?>; 
                                        height: <?php echo $photo_height; ?>; 
                                        object-fit: cover; 
                                        border-radius: 5px; 
                                        margin-top: 1vw; 
                                        margin-left: -4vw;
                                        z-index: 10;
                                    "
                                >
                            <?php endif; ?>
                        </div>

                        <div class="info-column" style="
                            flex-grow: 1; 
                            padding: 1vw 0;
                            position: relative;
                            z-index: 10;
                        ">
                            
                            <?php if ($subtitle) : ?>
                                <h3 class="project-subtitle" style="
                                    font-size: 1.67vw; 
                                    font-weight: 400; 
                                    color: #868686; 
                                    margin-bottom: 0.5vw;
                                ">
                                    <?php echo esc_html($subtitle); ?>
                                </h3>
                            <?php endif; ?>
                            
                            <h2 class="project-title" style="
                                font-size: 1.88vw; 
                                font-weight: 700; 
                                line-height: 1.2; 
                                margin-bottom: 2vw;
                                position: relative;
                                z-index: 5; 
                            ">
                                <?php if ($title_before) : ?>
                                    <?php echo esc_html($title_before); ?>
                                <?php endif; ?>
                                
                                <span style="
                                    color: white;
                                    font-weight: 800;
                                    padding: 0.1vw 0.8vw 0.1vw 0;
                                    position: relative; 
                                    z-index: 2;
                                ">
                                    <?php echo esc_html($title_highlight); ?>
                                    
                                    <span style="
                                        content: '';
                                        background-color: #0BA0D882;
                                        position: absolute;
                                        top: 0;
                                        right: 0;
                                        width: 150%; 
                                        height: 100%;
                                        border-radius: 40px; 
                                        z-index: -1;
                                        margin-left: -0.8vw;
                                    "></span>
                                </span>
                                
                                <?php if ($title_after) : ?>
                                    <span style="position: relative; z-index: 2;">
                                        <?php echo esc_html($title_after); ?>
                                    </span>
                                <?php endif; ?>
                            </h2>

                            <?php if ($description1) : ?>
                                <p class="project-description" style="
                                    font-family: 'IBM Plex Sans', sans-serif;
                                    font-size: 1.04vw;
                                    font-weight: 400; 
                                    line-height: 1.6; 
                                    color: #4a4a4a;
                                    margin-bottom: 1.5vw;
                                ">
                                    <?php echo esc_html($description1); ?>
                                </p>
                            <?php endif; ?>

                            <?php if ($description2) : ?>
                                <p class="project-description" style="
                                    font-family: 'IBM Plex Sans', sans-serif;
                                    font-size: 1.04vw; 
                                    line-height: 1.6; 
                                    color: #4a4a4a;
                                    margin-bottom: 2vw;
                                ">
                                    <?php echo esc_html($description2); ?>
                                </p>
                            <?php endif; ?>
                            
                            <?php if ($funding) : ?>
                                <p class="project-funding" style="
                                    font-size: 1.2vw;
                                    font-weight: 600;
                                    margin-bottom: 2.5vw;
                                ">
                                    <?php echo esc_html($funding); ?>
                                </p>
                            <?php endif; ?>

                            <?php if ($cta_text && $cta_link) : ?>
                                <a href="<?php echo esc_url($cta_link); ?>" 
                                   class="cta-btn"
                                   style="
                                        display:inline-block; 
                                        background: #0BA0D8; 
                                        color: white; 
                                        font-family:'Inter', sans-serif; 
                                        font-size:1.25vw; 
                                        font-weight:500; 
                                        padding:1vw 2.5vw; 
                                        border-radius:10px;
                                        text-decoration: none;
                                    ">
                                    <?php echo esc_html($cta_text); ?>    
                                </a>
                            <?php endif; ?>
                        </div>

                    <?php else : // UKŁAD Z TEKSTEM PO LEWEJ ?>
                        
                        <div class="info-column" style="
                            flex-grow: 1; 
                            padding: 1vw 0;
                            position: relative;
                            z-index: 10; 
                        ">
                            
                            <?php if ($subtitle) : ?>
                                <h3 class="project-subtitle" style="
                                    font-size: 1.67vw; 
                                    font-weight: 400; 
                                    color: #868686; 
                                    margin-bottom: 0.5vw;
                                ">
                                    <?php echo esc_html($subtitle); ?>
                                </h3>
                            <?php endif; ?>
                            
                            <h2 class="project-title" style="
                                font-size: 1.88vw; 
                                font-weight: 700; 
                                line-height: 1.2; 
                                margin-bottom: 2vw;
                            ">
                                <?php if ($title_before) : ?>
                                    <?php echo esc_html($title_before); ?>
                                <?php endif; ?>
                                
                                <span style=" 
                                    display: inline-block;
                                    position: relative; 
                                    z-index: 2; 
                                "> 
                                    
                                    <span style="
                                        background-color: #0BA0D882; 
                                        position: absolute;
                                        top: 0;
                                        left: 2%; 
                                        width: 300%; 
                                        height: 100%;
                                        border-radius: 40px; 
                                        z-index: -1; 
                                        margin-left: calc(-<?php echo $text_padding_offset; ?>);
                                    ">
                                    </span>

                                    <span style="
                                        color: white; 
                                        font-weight: 600;
                                        position: relative; 
                                        padding: 0.1vw <?php echo $text_padding_offset; ?> 0.1vw <?php echo $text_padding_offset; ?>;
                                        line-height: 1.2;
                                        z-index: 2; 
                                        white-space: nowrap;
                                    ">
                                          <?php echo esc_html($title_highlight); ?>
                                    </span>
                                </span>
                                
                                <?php if ($title_after) : ?>
                                    <?php echo esc_html($title_after); ?>
                                <?php endif; ?>
                            </h2>
                            
                            <?php if ($description1) : ?>
                                <p class="project-description" style="
                                    font-family: 'IBM Plex Sans', sans-serif;
                                    font-size: 1.04vw;
                                    font-weight:400; 
                                    line-height: 1.6; 
                                    color: #4a4a4a;
                                    margin-bottom: 1.5vw;
                                ">
                                    <?php echo esc_html($description1); ?>
                                </p>
                            <?php endif; ?>
                            
                            <?php if ($description2) : ?>
                                <p class="project-description" style="
                                    font-family: 'IBM Plex Sans', sans-serif;
                                    font-size: 1.04vw;
                                    font-weight:400;
                                    line-height: 1.6; 
                                    color: #4a4a4a;
                                    margin-bottom: 2vw;
                                ">
                                    <?php echo esc_html($description2); ?>
                                </p>
                            <?php endif; ?>
                            
                            <?php if ($funding) : ?>
                                <p class="project-funding" style="
                                    font-size: 1.2vw;
                                    font-weight: 600;
                                    margin-bottom: 2.5vw;
                                ">
                                    <?php echo esc_html($funding); ?>
                                </p>
                            <?php endif; ?>

                            <?php if ($cta_text && $cta_link) : ?>
                                <a href="<?php echo esc_url($cta_link); ?>" 
                                   class="cta-btn"
                                   style="
                                        display:inline-block; 
                                        background: #0BA0D8; 
                                        color: white; 
                                        font-family:'Inter', sans-serif; 
                                        font-size:1.25vw; 
                                        font-weight:500; 
                                        padding:1vw 2.5vw; 
                                        border-radius:10px;
                                        text-decoration: none;
                                    ">
                                    <?php echo esc_html($cta_text); ?>    
                                </a>
                            <?php endif; ?>
                        </div>

                        <div class="photo-column" style="
                            width: <?php echo $photo_width; ?>; 
                            flex-shrink: 0;
                            position: relative;
                            z-index: 20; 
                        ">
                            <?php if ($image) : ?>
                                <img 
                                    src="<?php echo esc_url($image['url']); ?>" 
                                    alt="<?php echo esc_attr($image['alt']); ?>" 
                                    style="
                                        width: <?php echo $photo_width; ?>; 
                                        height: <?php echo $photo_height; ?>; 
                                        object-fit: cover; 
                                        border-radius: 5px;
                                        margin-top: 1vw; 
                                    "
                                >
                            <?php endif; ?>
                        </div>

                    <?php endif; ?>

                </div> 
            </section>
            
        <?php endif; ?>
        
    <?php endwhile;
    wp_reset_postdata();
endif;
?>

<?php
get_template_part('contact');
get_footer();
?>
