<head>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=IBM+Plex+Sans:wght@400;500;600;700&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

</head>

<?php
/**
 * Template Name: Strona Realizacji
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
<section class="hero-section" style="position:relative; overflow:visible; color:white; margin-top:9.01vw;">
  <img 
    src="<?php echo esc_url($hero_bg_url); ?>" 
    alt="Tło wydarzenia" 
    style="position:fixed; top:0; left:0; width:100%; height:100%; object-fit:cover; z-index:-10;"
  >

  

  <div class="hero-content" style="position:relative; margin-left:16.66vw; max-width:55vw; z-index:2;">
    
  
    <p class="text-title" style="opacity:0.9; margin-bottom:1vw; line-height:1.6; font-size:3.2vw; font-family:'Manrope', sans-serif;">
      <span class="text-highlight" style="background-color:#0BA0D880; opacity:0.9; padding:0.5vw 1.2vw; border-top-right-radius:9999px; border-bottom-right-radius:9999px; color:white; font-weight:800; display:inline-block; box-decoration-break:clone; -webkit-box-decoration-break:clone;">
        Projekty
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
      <img src="<?php echo get_template_directory_uri(); ?>/images/webp/linkedin.webp" alt="LinkedIn" 
           style="width:100%; height:100%; object-fit:cover;">
    </a>
    <a href="#" aria-label="Facebook" style="display:block; width:2.5vw; height:2.5vw; border-radius:50%; overflow:hidden;">
      <img src="<?php echo get_template_directory_uri(); ?>/images/webp/facebook.webp" alt="Facebook" 
           style="width:100%; height:100%; object-fit:cover;">
    </a>
    <a href="#" aria-label="Instagram" style="display:block; width:2.5vw; height:2.5vw; border-radius:50%; overflow:hidden;">
      <img src="<?php echo get_template_directory_uri(); ?>/images/webp/instagram.webp" alt="Instagram" 
           style="width:100%; height:100%; object-fit:cover;">
    </a>
    <a href="#" aria-label="YouTube" style="display:block; width:2.5vw; height:2.5vw; border-radius:50%; overflow:hidden;">
      <img src="<?php echo get_template_directory_uri(); ?>/images/webp/youtube.webp" alt="YouTube" 
           style="width:100%; height:100%; object-fit:cover;">
    </a>
  </div>
</section>




<section class="realization-section" style="
    font-family: 'Manrope', sans-serif; 
    padding: 5vw 0 8vw; 
    background-color: white;
    color: #1a1a1a;
    /* Rozciągnięcie sekcji na całą szerokość ekranu */
    width: 100vw; 
    position: relative; 
    left: 50%; 
    transform: translateX(-50%);
">
    
    <div class="header-content" style="
        /* Wyśrodkowanie nagłówka na standardowej szerokości */
        margin: 0 auto 3vw;
        padding: 0 5vw; 
    ">
        <p class="section-subtitle" style="
            font-size: 1.67vw; 
            font-weight: 300; 
            color: #1a1a1a; 
            margin-bottom: 0.5vw;
        ">
            Nasza oferta
        </p>
        <h1 class="section-title" style="
            font-size: 1.88vw; 
            font-weight: 600; 
            line-height: 1.2; 
            color: #1a1a1a; 
            margin-bottom: 1vw;
        ">
            Zanurz się z nami w świat 
            <span style="
                background-color: #0BA0D882; 
                color: white; 
                padding: 0.2vw 0.8vw;
                display: inline-block;
                line-height: 1.2;
                white-space: nowrap;
            ">
                wyjątkowych
            </span>
            doświadczeń
        </h1>
        <p class="section-description" style="
            font-size: 1.04vw; 
            line-height: 1.6; 
            color: #4a4a4a;
            font-family: 'IBM Plex Sans', sans-serif;
        ">
            Organizujemy wyjątkowe spotkania i wydarzenia kulturalne, które pozwalają uczestnikom przenieść się w niezwykły świat tradycji i kolorów Afryki.
        </p>
    </div>



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
            <img 
                src="<?php echo get_template_directory_uri(); ?>/images/webp/Component 19 (1).webp" 
                alt="Masaj i bawół" 
                style="
                    width: 37.18vw; 
                    height: auto; 
                    object-fit: cover; 
                    border-radius: 10px;
                    
                "
            >
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
                Eventy kulturowe
                <span style="display: block; font-size: 2.2vw; font-weight: 800;">
                    Moja Afryka – Podróż z Masajem
                </span>
            </h3>

            <p class="event-desc" style="
                font-size: 1.04vw;
                font-weight:400; 
                line-height: 1.6; 
                margin-bottom: 2vw;
                font-family: 'IBM Plex Sans', sans-serif;
            ">
                To niezapomniana podróż bez opuszczania sali – spotkanie z autentyczną kulturą Masajów, 
                jednym z najbardziej rozpoznawalnych ludów Afryki. W rytmie afrykańskiej muzyki i śpiewów 
                masajskich kobiet poznasz obyczaje, życie codzienne oraz rytuały tej wyjątkowej społeczności.
            </p>

            <p class="program"style="font-size: 1.25vw; font-weight: 600; margin-bottom: 1vw;">
                Program wydarzenia obejmuje:
            </p>
            <div class="features-grid" style="
                display: grid;
                grid-template-columns: 1fr 1fr; /* Dwie kolumny dla listy! */
                gap: 1.5vw;
                font-size: 1vw;
            ">
                <?php
                $features = [
                    ['text' => 'opowieści o życiu Masajów i ich historii', 'icon' => 'webp/powiesci.webp'],
                    ['text' => 'afrykańską muzykę i karaoke', 'icon' => 'webp/muzyka.webp'],
                    ['text' => 'pokaz tańca i tradycyjnych rytuałów', 'icon' => 'webp/taniec.webp'],
                    ['text' => 'degustację tradycyjnych smaków, wspólne gotowanie i parzenie herbaty', 'icon' => 'webp/degustacja.webp'],
                    ['text' => 'naukę języka masajskiego', 'icon' => 'webp/jezyk.webp'],
                    ['text' => 'warsztaty rękodzieła (m.in. afrykańskie koraliki)', 'icon' => 'webp/rekodzielo.webp'],
                    ['text' => 'konkursy i zabawy dla dzieci i dorosłych', 'icon' => 'webp/konkursy.webp'],
                    ['text' => 'pamiątkowe zdjęcia z Masajem', 'icon' => 'webp/zdjecia.webp'],
                ];
                
                foreach ($features as $feature) {
                    echo '<div class="feature-item" style="
                        display: flex; 
                        align-items: center; 
                        line-height: 1.4;
                    ">';
                    echo '<img 
                        src="' . get_template_directory_uri() . '/images/' . $feature['icon'] . '" 
                        alt="Ikona" 
                        style="
                            width: 2vw; 
                            height: 2vw; 
                            object-fit: contain; 
                            margin-right: 1vw;
                            filter: brightness(0.2);
                        "
                    >';
                    echo '<span>' . $feature['text'] . '</span>';
                    echo '</div>';
                }
                ?>
            </div>

            <a href="/oferta" 
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
                Dowiedz się więcej    
            </a>
        </div>

        <div class="small-graphic-col" style="
            width: 23.9vw;
        ">
            <img 
                src="<?php echo get_template_directory_uri(); ?>/images/webp/Component 21.webp" 
                alt="Masaj" 
                style="
                    width: 100%; 
                    height: 23.9vw; 
                    object-fit: cover; 
                    border-radius: 10px;
                    margin-top: 2vw; /* Przesunięcie w dół, by pasowało do wzoru */
                "
            >
        </div>
        
    </div> 
    
    <div style="clear: both;"></div>
</section>







<section class="kobiety-section">
  <div class="kobiety-container">

    <!-- LEWA KOLUMNA - FIGURA -->
    <div class="kobiety-tlo">
      <img src="<?php echo get_template_directory_uri(); ?>/images/webp/Group 1.webp" 
           alt="figura dekoracyjna" 
           class="kobiety-figura">
    </div>

    <!-- ŚRODKOWA KOLUMNA - TEKST -->
    <div class="kobiety-left"style="z-index:10;">
      <div class="text-block">
        <h3 class="kobiety-subtitle">Konferencja</h3>
        <h2 class="kobiety-title">
         Kolej na
          <span class="highlighted-word">Kobiety</span>
        </h2>

        <p class="kobiety-description">
          To inicjatywa skierowana na wspieranie, rozwój i aktywizację kobiet. W ramach projektu organizujemy spotkania, warsztaty oraz wydarzenia, które pozwalają odkrywać potencjał, wzmacniać pewność siebie i budować przestrzeń do wzajemnej inspiracji.
        </p>

        <div class="kobiety-icons">
          <div class="kobiety-icon-item">
          <img src="<?php echo get_template_directory_uri(); ?>/images/webp/wsparcie.webp" alt="">
          <span>wspacie</span>
        </div>
        <div class="kobiety-icon-item">
          <img src="<?php echo get_template_directory_uri(); ?>/images/webp/rozwoj.webp" alt="">
          <span>rozwój</span>
        </div>
        <div class="kobiety-icon-item">
          <img src="<?php echo get_template_directory_uri(); ?>/images/webp/inspiracje.webp" alt="">
          <span>inspiracja</span>
        </div>
        <div class="kobiety-icon-item">
          <img src="<?php echo get_template_directory_uri(); ?>/images/webp/aktywizacja.webp" alt="">
          <span>aktywizacja</span>
        </div>
        </div>

        <a href="/oferta" class="kobiety-btn">Dowiedz się więcej</a>
      </div>
    </div>

    <!-- PRAWA KOLUMNA - GRAFIKA -->
    <div class="kobiety-right"style="z-index:20;">
      <img src="<?php echo get_template_directory_uri(); ?>/images/webp/kolej.webp" 
           alt="Obraz kolejowy" 
           class="kobiety-img">
    </div>

  </div>
</section>





<section class="senior-project-section" style="
    font-family: 'Manrope', sans-serif; 
    padding: 6vw 0; 
    background-color: white;
    position: relative; 
    color: #1a1a1a;
">
    
    <div class="senior-container" style="
        display: flex; 
        max-width: 90vw; 
        margin: 0 auto;
        gap: 2.44vw; 
        position: relative;
        align-items: flex-start;
    ">

        <div class="photo-column" style="
            
            width: 37vw; 
            flex-shrink: 0;
            position: relative;
             z-index: 20 ;
        ">
            <img 
                src="<?php echo get_template_directory_uri(); ?>/images/webp/senior.webp" 
                alt="Grupa seniorów klaszczących na spotkaniu" 
                style="
                    width: 37vw; 
                    height: 21.8vw; 
                    object-fit: cover; 
                    border-radius: 5px; 
                    margin-top: 1vw; 
                    margin-left: -4vw;
                    z-index: 10 ;
                "
            >
        </div>

        <div class="info-column" style="
            
            flex-grow: 1; 
            padding: 1vw 0;
            position: relative;
             z-index: 10 ;
        ">
            
            <h3 class="project-subtitle" style="
                font-size: 1.67vw; 
                font-weight: 400; 
                color: #868686; 
                margin-bottom: 0.5vw;
            ">
                Projekt
            </h3>
            
            <h2 class="project-title" style="
                font-size: 1.88vw; 
                font-weight: 700; 
                line-height: 1.2; 
                margin-bottom: 2vw;
                position: relative;
                z-index: 5; 
            ">
                <span style="
                    color: white; /* KLUCZOWE: Tekst biały */
                    font-weight: 800;
                    padding: 0.1vw 0.8vw 0.1vw 0;
                    position: relative; 
                    z-index: 2; /* Upewnia się, że tekst jest nad ::after */
                ">
                    Zdrowie dla seniora
                    
                    <span style="
                        content: '';
                        background-color: #0BA0D882; /* Ciemniejszy niebieski tła */
                        position: absolute;
                        top: 0;
                        right: 0;
                        width: 150%; 
                        height: 100%;
                        border-radius: 40px; 
                        z-index: -1; /
                        margin-left: -0.8vw;
                        
                        
                    "></span>
                </span>
                
                <span style="position: relative; z-index: 2;">
                    – Klub Seniora”
                </span>
            </h2>

            <p class="project-description" style="
                font-family: 'IBM Plex Sans', sans-serif;
                font-size: 1.04vw;
                font-weight: 400; 
                line-height: 1.6; 
                color: #4a4a4a;
                margin-bottom: 1.5vw;
            ">
                Celem projektu było zwiększenie dostępności usług społecznych, w szczególności 
                środowiskowych i opiekuńczych, a także wsparcia rodziny i pieczy zastępczej dla osób 
                zagrożonych ubóstwem lub wykluczeniem społecznym.
            </p>

            <p class="project-description" style="
                font-family: 'IBM Plex Sans', sans-serif;
                font-size: 1.1vw; 
                line-height: 1.6; 
                color: #4a4a4a;
                margin-bottom: 2vw;
            ">
                Projekt przyczynił się do poprawy jakości życia uczestników, integracji społecznej 
                oraz zwiększenia dostępności usług społecznych w regionie.
            </p>
            
            <p class="project-funding" style="
                font-size: 1.2vw;
                font-weight: 600;
                margin-bottom: 2.5vw;
            ">
                Dofinansowanie z UE: 50 000,00 zł
            </p>

            <a href="/oferta" 
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
                ">
                Dowiedz się więcej    
            </a>
        </div>
    </div> 
</section>





<?php
$photo_width = '37vw';
$photo_height = '21.8vw';
$gap_between = '2.44vw';
$section_padding = '6vw';
$text_padding_offset = '0.8vw'; 
?>

<section class="mlody-duch-section" style="
    font-family: 'Manrope', sans-serif; 
    padding: <?php echo $section_padding; ?> 0; 
    background-color: white;
    position: relative; 
    color: #1a1a1a;
">
    
    <div class="mlody-duch-container" style="
        display: flex; 
        max-width: 90vw; 
        margin: 0 auto;
        gap: <?php echo $gap_between; ?>; 
        position: relative;
        align-items: flex-start;
    ">
        
        <div class="info-column" style="
            flex-grow: 1; 
            padding: 1vw 0;
            position: relative;
            z-index: 10; 
        ">
            
            <h3 class="project-subtitle" style="
                font-size: 1.67vw; 
                font-weight: 400; 
                color: #868686; 
                margin-bottom: 0.5vw;
            ">
                Projekt
            </h3>
            
         <h2 class="project-title" style="
    font-size: 1.88vw; 
    font-weight: 600; 
    line-height: 1.2; 
    margin-bottom: 2vw;
">
    
    Klub Seniorów    
    
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
              Młodych Duchem
              </span></span>
            <p class="project-description" style="
                font-family: 'IBM Plex Sans', sans-serif;
                font-size: 1.04vw;
                font-weight:400; 
                line-height: 1.6; 
                color: #4a4a4a;
                margin-bottom: 1.5vw;
            ">
                Projekt miał na celu poszerzenie oferty lokalnych usług społecznych poprzez działania 
                integracyjne, opiekuńcze i wspierające dla seniorów. Skierowany był do osób starszych 
                potrzebujących wsparcia w codziennym funkcjonowaniu oraz budowania relacji społecznych.
            </p>
            
            <p class="project-description" style="
                font-family: 'IBM Plex Sans', sans-serif;
                font-size: 1.04vw;
                font-weight:400;
                line-height: 1.6; 
                color: #4a4a4a;
                margin-bottom: 2vw;
            ">
                Projekt przyczynił się do poprawy jakości życia uczestników, integracji społecznej 
                oraz zwiększenia dostępności usług społecznych w regionie.
            </p>
            
            <p class="project-funding" style="
                font-size: 1.2vw;
                font-weight: 600;
                margin-bottom: 2.5vw;
            ">
                Dofinansowanie z UE: 50 000,00 zł
            </p>

            <a href="/oferta" 
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
                ">
                Dowiedz się więcej    
            </a>
        </div>

        <div class="photo-column" style="
            width: <?php echo $photo_width; ?>; 
            flex-shrink: 0;
            position: relative;
            z-index: 20; 
        ">
            <img 
                src="<?php echo get_template_directory_uri(); ?>/images/webp/senior klub.webp" 
                alt="Grupa seniorów klaszczących na spotkaniu" 
                style="
                    width: <?php echo $photo_width; ?>; 
                    height: <?php echo $photo_height; ?>; 
                    object-fit: cover; 
                    border-radius: 5px;
                    margin-top: 1vw; 
                "
            >
        </div>

    </div> 
</section>




<?php
include 'contact.php';
include 'footer.php';
  ?>