<head>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=IBM+Plex+Sans:wght@400;500;600;700&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

</head>

<?php
$pageTitle = "O nas";
?>
<?php get_header(); ?>

<?php 
// Get ACF fields with fallback values
$hero_background = get_field('aboutus_hero_background_image');
$hero_title_highlight = get_field('aboutus_hero_title_highlight') ?: 'Ludzie';
$hero_title_rest = get_field('aboutus_hero_title_rest') ?: ', którzy łączą światy';
$hero_description = get_field('aboutus_hero_description') ?: 'Od idei po realizację – wspieramy wydarzenia, które łączą ludzi, inspirują do współpracy i otwierają nowe perspektywy rozwoju.';
$social_links = get_field('aboutus_social_links');
?>

<body>
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
    
  
    <p class="text-title" style="opacity:0.9; margin-bottom:1vw; line-height:1.2; font-size:3.2vw; font-family:'Manrope', sans-serif;">
      <span class="text-highlight" style="background-color:#0BA0D880; opacity:0.9; padding:0.3vw 1vw; border-top-right-radius:9999px; border-bottom-right-radius:9999px; color:white; font-weight:800;">
        <?php echo esc_html($hero_title_highlight); ?>
      </span><?php echo esc_html($hero_title_rest); ?>
    </p>

    <p class="text-desc" style="opacity:0.9; margin-bottom:5.156vw; max-width:48vw; font-family:'IBM Plex Sans', sans-serif; font-size:1.25vw; line-height:1.6;">
     <?php echo nl2br(esc_html($hero_description)); ?>
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
    <?php if ($social_links && count($social_links) > 0) : ?>
      <?php foreach ($social_links as $social) : ?>
        <a href="<?php echo esc_url($social['link']); ?>" aria-label="<?php echo esc_attr($social['label']); ?>" style="display:block; width:2.5vw; height:2.5vw; border-radius:50%; overflow:hidden;">
          <img src="<?php echo esc_url($social['icon']['url']); ?>" alt="<?php echo esc_attr($social['label']); ?>" 
               style="width:100%; height:100%; object-fit:cover;">
        </a>
      <?php endforeach; ?>
    <?php else : ?>
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
    <?php endif; ?>
  </div>
</section>


<?php 
// Get ACF fields for "Kim jesteśmy" section
$kim_title = get_field('aboutus_kim_title') ?: 'Kim jesteśmy';
$kim_subtitle_before = get_field('aboutus_kim_subtitle_before') ?: 'Poznaj naszą ';
$kim_subtitle_highlight = get_field('aboutus_kim_subtitle_highlight') ?: 'misję';
$kim_description = get_field('aboutus_kim_description') ?: 'Bit System Sp. z o.o. to firma specjalizująca się w kompleksowej obsłudze wydarzeń na styku kultur, technologii i współpracy międzynarodowej. Wspieramy organizację konferencji, misji gospodarczych, projektów badawczych oraz działań międzykulturowych, tworząc przestrzeń do wymiany wiedzy, doświadczeń i innowacji.';
$team_members = get_field('aboutus_team_members');
?>

<section class="kim-jestesmy">
    <div class="kj-gora">
        <div class="kj-title">
            <?php echo esc_html($kim_title); ?> 
        </div>
        <div class ="kj-subtitle">
            <?php echo esc_html($kim_subtitle_before); ?><span class="text-highlight" style="background-color:#0BA0D880; opacity:0.9; padding:0.3vw 1vw; border-top-left-radius:9999px; border-bottom-left-radius:9999px; color:white; font-weight:800;"><?php echo esc_html($kim_subtitle_highlight); ?></span>
        </div>
            <p class="kj-tresc">
                <?php echo esc_html($kim_description); ?>
            </p>


    </div>
    <div class="kj-dol">
        <div class="bg-stripes"></div>
        <div class="bg-stripes"></div>
        <div class="bg-globe"></div>

        <?php if ($team_members && count($team_members) > 0) : ?>
            <?php foreach ($team_members as $member) : ?>
                <div class="person-row <?php echo esc_attr($member['row_class']); ?>">
                    <?php if ($member['photo']) : ?>
                        <img 
                            src="<?php echo esc_url($member['photo']['url']); ?>"
                            alt="<?php echo esc_attr($member['name']); ?>" 
                            class="person-image"
                        >
                    <?php endif; ?>
                    <div class="person-content">
                        <h2><?php echo esc_html($member['name']); ?></h2>
                        <p>
                            <?php echo esc_html($member['description']); ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="person-row michal-row">
                <img 
                    src="<?php echo get_template_directory_uri(); ?>/images/Component 19.png"
                    alt="Michał Cichoracki" 
                    class="person-image"
                    
                >
                <div class="person-content">
                    <h2>Michał Cichoracki</h2>
                    <p>
                        Współzałożyciel Bit System Sp. z o.o., ekspert w zakresie organizacji wydarzeń 
                        międzynarodowych, misji gospodarczych i projektów badawczych. Posiada bogate 
                        doświadczenie w pracy z instytucjami publicznymi, uczelniami oraz organizacjami 
                        międzynarodowymi. Zajmuje się strategicznym planowaniem, koordynacją projektów oraz 
                        budowaniem partnerstw międzysektorowych. Ceniony za profesjonalizm, umiejętność pracy 
                        w złożonym środowisku i skuteczne łączenie różnych perspektyw.
                    </p>
                </div>
            </div>

            <div class="person-row dorota-row">
                <img 
                    src="<?php echo get_template_directory_uri(); ?>/images/Component 20.png"
                    alt="Dorota Markiewicz" 
                    class="person-image"
                >
                <div class="person-content">
                    <h2>Dorota Markiewicz</h2>
                    <p>
                        Współzałożycielka Bit System Sp. z o.o., specjalistka w obszarze współpracy międzykulturowej, 
                        komunikacji i edukacji międzynarodowej. Przez lata angażowała się w projekty społeczne, 
                        kulturalne i naukowe o zasięgu krajowym i europejskim. W Bit System odpowiadała za rozwój 
                        koncepcji programowych, współpracę z ośrodkami naukowymi oraz realizację projektów 
                        wspierających dialog i integrację. Znana z zaangażowania, kreatywności i podejścia opartego 
                        na empatii i partnerstwie.
                    </p>
                </div>
            </div>
        <?php endif; ?>
</section>

<?php 
// Get ACF fields for "Co robimy?" section
$what_subtitle = get_field('aboutus_what_subtitle') ?: 'Co robimy?';
$what_title_before = get_field('aboutus_what_title_before') ?: 'Kompleksowa obsługa <br>wydarzeń i projektów<br>';
$what_title_highlight = get_field('aboutus_what_title_highlight') ?: 'międzynarodowych';
$what_description = get_field('aboutus_what_description') ?: 'Wierzymy, że każde wydarzenie to szansa na tworzenie wartości, <br>dlatego dbamy o każdy detal – od koncepcji po realizację i komunikację.';
$what_cta_text = get_field('aboutus_what_cta_text') ?: 'Poznaj nasze usługi';
$what_cta_link = get_field('aboutus_what_cta_link') ?: '#oferta';
$what_video_mp4 = get_field('aboutus_what_video_mp4');
$what_video_webm = get_field('aboutus_what_video_webm');
$what_video_poster = get_field('aboutus_what_video_poster');
?>

<section class="what-we-do" style="position:relative; overflow:hidden; color:white;"> 
    
    <video 
      autoplay 
      loop 
      muted 
      playsinline 
      poster="<?php echo $what_video_poster ? esc_url($what_video_poster['url']) : get_template_directory_uri() . '/images/USŁUGI.png'; ?>" 
      style="
        position:absolute;
        top:0; 
        left:0; 
        width:100%; 
        height:auto;
        object-fit:contain; 
        z-index:-10; 
      "
    >
        <?php if ($what_video_mp4) : ?>
            <source src="<?php echo esc_url($what_video_mp4['url']); ?>" type="video/mp4">
        <?php else : ?>
            <source src="<?php echo get_template_directory_uri(); ?>/videos/tlov.mp4" type="video/mp4">
        <?php endif; ?>
        
        <?php if ($what_video_webm) : ?>
            <source src="<?php echo esc_url($what_video_webm['url']); ?>" type="video/webm">
        <?php else : ?>
            <source src="<?php echo get_template_directory_uri(); ?>/videos/tlov.webm" type="video/webm">
        <?php endif; ?>
    </video>
  
  <div class ="text-column">
    <p class="subtitle"><?php echo esc_html($what_subtitle); ?></p>
    <h2><?php echo wp_kses_post(str_replace('<br>', '<br>', $what_title_before)); ?><span class="highlight">
        <?php echo esc_html($what_title_highlight); ?></span>
    </h2>
    <p class="tresc">
        <?php echo wp_kses_post(str_replace('<br>', '<br>', $what_description)); ?>
    </p>

    <a href="<?php echo esc_url($what_cta_link); ?>" 
           class="cta-btn"
           style="display:inline-block; background:white; color:black; font-family:'Inter', sans-serif; font-size:1.25vw; font-weight:500; padding:1vw 2.5vw; border-radius:10px;">
        <?php echo esc_html($what_cta_text); ?>    
    </a>
  </div>
</section>


<?php 
// Get ACF fields for Realizations section
$realizations_subtitle = get_field('aboutus_realizations_subtitle') ?: 'Z pasją do perfekcji';
$realizations_title_before = get_field('aboutus_realizations_title_before') ?: 'Nasze ';
$realizations_title_highlight = get_field('aboutus_realizations_title_highlight') ?: 'Realizacje';
$realizations_cta_text = get_field('aboutus_realizations_cta_text') ?: 'Zobacz wszystkie';
$realizations_cta_link = get_field('aboutus_realizations_cta_link') ?: '/realizacje';
?>

<section class="realizations-section">
  <div class="realizations-header-container">
    <div class="realizations-text-col">
      <p class="realizations-subtitle"><?php echo esc_html($realizations_subtitle); ?></p>
      <h2 class="realizations-title"><?php echo esc_html($realizations_title_before); ?><span><?php echo esc_html($realizations_title_highlight); ?></span></h2>
    </div>
    <a href="<?php echo esc_url($realizations_cta_link); ?>" class="btn-realizations-cta"><?php echo esc_html($realizations_cta_text); ?></a>
  </div>

  <div class="realizations-grid">
    <?php
    $args = array(
      'post_type' => 'realizacje',
      'posts_per_page' => 3,
      'orderby' => 'date',
      'order' => 'DESC'
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) :
      while ($query->have_posts()) : $query->the_post();

        $tytul = get_field('realizacja_tytul');
        $obrazek = get_field('obrazek_tytulowy');
        $tlo = $obrazek ? esc_url($obrazek['url']) : get_template_directory_uri() . '/images/tlo3.png';

        // Rozdziel tytuł po myślniku, by zakreślić tylko pierwszy fragment
        $parts = explode('-', $tytul, 2);
        $tytul_html = '<span>' . trim($parts[0]) . '</span>';
        if (isset($parts[1])) {
          $tytul_html .= ' - ' . trim($parts[1]);
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
      wp_reset_postdata();
    else :
      echo '<p>Brak realizacji do wyświetlenia.</p>';
    endif;
    ?>
  </div>
</section>


<?php
include 'contact.php';
include 'footer.php';
  ?>