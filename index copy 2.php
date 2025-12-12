<head>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=IBM+Plex+Sans:wght@400;500;600;700&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

</head>

<?php get_header(); ?>

<body>
<section class="hero-section" style="position:relative; overflow:visible; color:white; margin-top:-40px;">
  <img 
    src="<?php echo get_template_directory_uri(); ?>/images/tlo.png" 
    alt="Tło wydarzenia" 
    style="position:fixed; top:0; left:0; width:100%; height:100%; object-fit:cover; z-index:-10;"
  >

  <div style="position:absolute; inset:0; background-color:rgba(15,23,42,0.6);"></div>

  <div class="hero-content" style="position:relative; margin-left:16.66vw; max-width:55vw; z-index:2;">
    <p class="text-main" style="opacity:0.8; margin-bottom:1vw; line-height:1.3; font-size:2vw; font-family:'Manrope', sans-serif;">
      Łączymy ludzi, wiedzę i technologie
    </p>

    <p class="text-title" style="opacity:0.9; margin-bottom:1vw; line-height:1.6; font-size:3.2vw; font-family:'Manrope', sans-serif;">
      <span class="text-highlight" style="background-color:#0BA0D880; opacity:0.9; padding:0.5vw 1.2vw; border-top-right-radius:9999px; border-bottom-right-radius:9999px; color:white; font-weight:800; display:inline-block; box-decoration-break:clone; -webkit-box-decoration-break:clone;">
        Wydarzenia
      </span>, które łączą świat
    </p>

    <p class="text-desc" style="opacity:0.9; margin-bottom:2vw; max-width:48vw; font-family:'IBM Plex Sans', sans-serif; font-size:1.25vw; line-height:1.6;">
      Od konferencji i misji gospodarczych, przez projekty badawcze, po inicjatywy międzykulturowe — zapewniamy kompleksową obsługę wydarzeń, które budują dialog, innowacje i trwałe relacje.
    </p>

    <a href="#oferta" 
       class="cta-btn"
       style="display:inline-block; background:white; color:black; font-family:'Inter', sans-serif; font-size:1.25vw; font-weight:500; padding:1vw 2.5vw; border-radius:10px; text-decoration:none; transition:background 0.3s;">
       Dowiedz się więcej
    </a>

    <div class="icon-row" style="margin-top:3vw; display:flex; gap:4vw; align-items:center; font-size:1vw; padding-bottom:5.78vw;">
      <div style="text-align:center;">
        <img src="<?php echo get_template_directory_uri(); ?>/images/ikon1.png" alt="Biznes" class="icon" style="height:5.46vw; margin-bottom:0.5vw;">
      </div>
      <div style="text-align:center;">
        <img src="<?php echo get_template_directory_uri(); ?>/images/ikon2.png" alt="Innowacje" class="icon" style="height:5.46vw; margin-bottom:0.5vw;">
      </div>
      <div style="text-align:center;">
        <img src="<?php echo get_template_directory_uri(); ?>/images/ikon3.png" alt="Trendy" class="icon" style="height:5.46vw; margin-bottom:0.5vw;">
      </div>
      <div style="text-align:center;">
        <img src="<?php echo get_template_directory_uri(); ?>/images/ikon4.png" alt="Kultura" class="icon" style="height:5.46vw; margin-bottom:0.5vw;">
      </div>
    </div>
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
      src='<?php echo get_template_directory_uri(); ?>/images/blok.png' 
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


<!-- SEKCA: KIM JESTEŚMY -->
<section class="kim-jestesmy" style="background-color:white; color:#0f172a; padding:3.33vw 0;">
  <div style="width:100%;  margin:0 auto; padding:0 16.66vw; overflow:hidden;">
    
    <!-- Układ dwóch kolumn float -->
    <div style="width:43.96vw; float:left; ">
      <h3 style="font-size:1.67vw; font-family:'Manrope', sans-serif; font-weight:300;  line-height:100%;">Kim jesteśmy</h3>
      <h2 style="font-size:2.19vw; font-family:'Manrope', sans-serif; font-weight:600; margin-bottom:2.19vw; line: height 100%;">
        Profesjonalni partnerzy w organizacji wydarzeń i 
        <span style="
        display: inline-block; 
        position: relative; 
        padding: 0 0.5vw; 
        z-index: 1;
        width: 170%;
        background-color: #0BA0D882;
        border-radius: 40px;
        color:#fff;
        ">
          współpracy międzynarodowej
        </span>
      </h2>

      <h3 style="font-size:1.04vw; line-height:1.6; color:#444; margin-bottom:1.67vw; font-weight:400; font-family:'IBM Plex Sans', sans-serif;">
        Specjalizujemy się w kompleksowej obsłudze wydarzeń biznesowych, kulturalnych i naukowych.
        Od konferencji i misji gospodarczych, przez projekty badawcze, po inicjatywy międzykulturowe — 
        tworzymy przestrzeń, w której wiedza i doświadczenia spotykają się z innowacją. 
        Działamy z pasją, profesjonalizmem i otwartością na świat.
</h3>
    </div>
   

    <div style="clear:both;"></div> 
    <a href="#poznajnas" class="btn-cta"
       style="display:inline-block; background:#0BA0D8; color:white; font-family:'Inter', sans-serif; font-size:1.25vw; font-weight:500; padding:1vw 2.5vw; border-radius:10px; text-decoration:none; transition:background 0.3s;">
      Poznaj nasz zespół
    </a>
  </div>
</section>
<section class="masai-section" 
  style="background-color:#fff; background-image:url('<?php echo get_template_directory_uri(); ?>/images/africa 2.png'); background-repeat:no-repeat; background-position:right center; background-size:contain;">

  <div class="masai-left">
    <img src='<?php echo get_template_directory_uri(); ?>/images/ms1.png'  alt="Grupa Masajów w tradycyjnych strojach">
  </div>

  <div class="masai-right">
    <p class="masai-super-heading">Eventy kulturowe</p>
    
    <h2>Masajskie tradycje na wyciągnięcie ręki</h2>
    
    <p class="masai-description" style="width:45.38vw;"> 
      Organizujemy wyjątkowe wydarzenia kulturowe, które pozwalają doświadczyć autentycznej muzyki, tańców i rytuałów Masajów.
      To nie tylko spotkanie z tradycją, ale także okazja do zrozumienia bogactwa afrykańskiego dziedzictwa i wspólnego świętowania różnorodności.
    </p>

    <div class="masai-content-block">
      <div class="masai-small-image-container">
        <img class="masai-small" src='<?php echo get_template_directory_uri(); ?>/images/ms2.png' alt="Masaj">
      </div>
      
      <div class="masai-icons">
        <div class="masai-icon-item">
          <img src='<?php echo get_template_directory_uri(); ?>/images/ikon5.png' alt="Ikona spotkania kultur">
          <span>Spotkanie kultur</span>
        </div>
        <div class="masai-icon-item">
          <img src='<?php echo get_template_directory_uri(); ?>/images/ikon6.png' alt="Ikona muzyki i tańca">
          <span>Autentyczna muzyka i taniec</span>
        </div>
        <div class="masai-icon-item">
          <img src='<?php echo get_template_directory_uri(); ?>/images/ikon7.png' alt="Ikona wspólnego doświadczenia">
          <span>Wspólne doświadczenie</span>
        </div><a href="#" 
  class="btn-cta" 
  style="display:inline-block; background:#0BA0D8; color:white; margin-top: 2.187vw; font-family:'Inter', sans-serif; font-size:0.937vw; font-weight:500; padding:12px 35px; border-radius:10px; text-decoration:none; transition:background 0.3s;">
    Dowiedz się więcej
</a>
      </div> 
    </div>

   
    
  </div>
</section>

<section class="stats-section" style="
    position: relative;
    height: 18.07vw; 
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'IBM Plex Sans', sans-serif;
    color: white;
    overflow: hidden;
    background-image: url('<?php echo get_template_directory_uri(); ?>/images/tlo2.png'); 
    background-size: cover; 
    background-position: center;
">
    
      <div class="stats-overlay" style="
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background-color: rgba(0, 0, 50, 0.7); 
          z-index: 1;
      "></div>

      <div class="stats-content" style="
          position: relative;
          z-index: 2;
          width: 66.66vw;
          display: flex;
          justify-content: space-between;
          gap: 2.5vw;
      ">
          
          <div class="stat-item" style="
              text-align: center;
              flex-basis: 25%; 
          ">
              <h3 class="stat-number" style="
                  font-family: 'Manrope', sans-serif; 
                  font-size: 5.2vw; 
                  font-weight: 600; 
                  margin: 0; 
                  margin-bottom: 2.5vw;
              ">
                  10+
              </h3>
              <p class="stat-description" style="
                  font-size: 1.45vw; 
                  font-weight: 400; 
                  margin: 0; 
              ">
                  lat doświadczenia w branży eventowej
              </p>
          </div>
          
          <div class="stat-item" style="
              text-align: center;
              flex-basis: 25%;
          ">
              <h3 class="stat-number" style="
                  font-family: 'Manrope', sans-serif; 
                  font-size: 5.2vw; 
                  font-weight: 600; 
                  margin: 0; 
                  margin-bottom: 2.5vw;
              ">
                  12
              </h3>
              <p class="stat-description" style="
                  font-size: 1.45vw; 
                  font-weight: 400; 
                  margin: 0; 
                  line-height: 1.4;
              ">
                  krajów w których realizowaliśmy projekty
              </p>
          </div>
          
          <div class="stat-item" style="
              text-align: center;
              flex-basis: 25%;
          ">
              <h3 class="stat-number" style="
                  font-family: 'Manrope', sans-serif; 
                  font-size: 5.2vw; 
                  font-weight: 600; 
                  margin: 0; 
                  margin-bottom: 2.5vw;
              ">
                  100+
              </h3>
              <p class="stat-description" style="
                  font-size: 1.45vw; 
                  font-weight: 400; 
                  margin: 0; 
              ">
                  wydarzeń, konferencji, projektów
              </p>
          </div>
          
              <div class="stat-item" style="
                  text-align: center;
                  flex-basis: 25%;
              ">
                  <div class="stat-icon-wrapper" style="
                      height: 5.2vw; 
                      margin-bottom: 5vw; 
                      display: flex; 
                      justify-content: center;
                  ">
                      <img class="stat-icon" src="<?php echo get_template_directory_uri(); ?>/images/inf1.png" alt="Nieskończoność" style="
                          height: 7.13vw; 
                          width: auto; 
                      ">
                  </div>
                  
                  <p class="stat-description" style="
                      font-size: 1.45vw; 
                      font-weight: 400; 
                      margin: 0; 
                  ">
                      relacji budowanych ponad granicami
                  </p>
            </div>
          
      </div>
</section>











<section class="offer-section-v4">
  
  <div class="offer-grid-v4">
    
    <div class="offer-left-box-v2">
      <p class="offer-subtitle">Nasza oferta</p>
      <h2 class="offer-title">
        Kompleksowa obsługa<br>
        wydarzeń i projektów 
        <span class="highlighted-word" style="color: #FFFF; font-size=1.88vw">międzynarodowych</span>
      </h2>
      <p class="offer-description">
        Działamy na styku biznesu, nauki i kultury. Organizujemy wydarzenia, które łączą ludzi, wiedzę i technologie,
        wspierając rozwój współpracy ponad granicami.
      </p>
    </div>
    
    <div class="offer-card dark-bg card-1">
      <div class="card-icon"><img src='<?php echo get_template_directory_uri(); ?>/images/conference 1.png'></div> 
      <h3 class="card-title">Konferencje i wydarzenia</h3>
      <p class="card-text">Od planowania po realizację – zapewniamy pełną obsługę konferencji, spotkań i eventów.</p>
    </div>

    <div class="offer-card dark-bg card-2">
      <div class="card-icon"><img src='<?php echo get_template_directory_uri(); ?>/images/economic 1.png'></div> 
      <h3 class="card-title">Misje gospodarcze i naukowe</h3>
      <p class="card-text">Organizujemy i koordynujemy wyjazdy biznesowe, kulturalne i akademickie w kraju i za granicą.</p>
    </div>
    
    <div class="offer-card dark-bg card-3">
      <div class="card-icon"><img src='<?php echo get_template_directory_uri(); ?>/images/scientist 1.png'></div> 
      <h3 class="card-title">Wsparcie projektów badawczych</h3>
      <p class="card-text">Pomagamy w organizacji projektów naukowych i eksperckich.</p>
    </div>
    
    <div class="offer-card dark-bg card-4">
      <div class="card-icon"><img src='<?php echo get_template_directory_uri(); ?>/images/culture 1.png'></div> 
      <h3 class="card-title">Inicjatywy międzykulturowe</h3>
      <p class="card-text">Budujemy mosty między różnymi środowiskami poprzez projekty edukacyjne, szkoleniowe i integracyjne.</p>
    </div>

    <div class="offer-card light-bg card-5">
      <div class="card-icon"><img src='<?php echo get_template_directory_uri(); ?>/images/conference (1) 1.png'></div> 
      <h3 class="card-title">Konferencje i wydarzenia</h3>
      <p class="card-text">Od planowania po realizację – zapewniamy pełną obsługę konferencji, spotkań i eventów.</p>
    </div>
    
  </div>
  
  <div class="offer-cta-container-v2">
    <a href="#" class="btn-cta-offer">Poznaj nasze usługi</a>
  </div>
</section>










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





<section class="approach-section">
  <div class="approach-container">

    <!-- LEWA KOLUMNA -->
     <div class= "approach-tlo">

          
            <img src="<?php echo get_template_directory_uri(); ?>/images/Group 1.png" 
               alt="12" 
               class="img-figura"
              style="height= 34.23vw">

    
      </div>


    <div class="approach-left">
      <div class="text-block">
        <h3 class="approach-subtitle">Nasze podejście</h3>
        <h2 class="approach-title">Dlaczego warto nam zaufać</h2>

        <p class="approach-description">
          Każde wydarzenie traktujemy jako wyjątkową okazję do tworzenia przestrzeni dla dialogu,
          wymiany wiedzy i budowania relacji. Naszą siłą jest połączenie dbałości o detale,
          nowoczesnych technologii i otwartości na różnorodność kulturową. Dzięki temu realizujemy
          projekty, które inspirują i zostawiają trwały ślad.
        </p>

        <div class="highlight-row">
          <p class="approach-highlight-text">
            <span class="highlighted-word1">Międzynarodowa perspektywa</span><br>
            Współpracujemy z partnerami na całym świecie, łącząc różne środowiska – od biznesu i nauki,
            po kulturę i sektor społeczny.
          </p>
        
          <img src="<?php echo get_template_directory_uri(); ?>/images/Component 22.png" 
               alt="Uczestnicy konferencji" 
               class="img-small">
        </div>
      </div>
    </div>

    <!-- PRAWA KOLUMNA -->
    <div class="approach-right">
      <img src="<?php echo get_template_directory_uri(); ?>/images/Component 23.png" 
           alt="Prelegent na scenie" 
           class="img-large">
    </div>

  </div>
</section>




<section class="realizations-section">
  <div class="realizations-header-container">
    <div class="realizations-text-col">
      <p class="realizations-subtitle">Z pasją do perfekcji</p>
      <h2 class="realizations-title">Nasze <span>Realizacje</span></h2>
    </div>
    <a href="/realizacje" class="btn-realizations-cta">Zobacz wszystkie</a>
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



      

<section class="contact-section">
    <div class="contact-content-container">
        <div class="contact-form-column">
            <h2 class="contact-title">
                <span class="contact-title-sub">Skontaktuj się z nami</span>
                <span class="contact-title-main">
                    <span class="contact-title-highlight">Porozmawiajmy</span> o Twoim wydarzeniu
                </span>
            </h2>
            <p class="contact-description">
                Chętnie odpowiemy na pytania i pomożemy zaplanować konferencję, misję czy projekt badawczy.
                Napisz do nas, a wspólnie stworzymy wydarzenie na miarę Twoich potrzeb.
            </p>
            <form action="#" method="POST" class="contact-form">
                <input type="text" placeholder="Imię i nazwisko" required class="contact-input">
                <input type="email" placeholder="Adres e-mail" required class="contact-input">
                <input type="text" placeholder="Temat wiadomości" required class="contact-input">
                <textarea placeholder="Treść wiadomości" rows="1" required class="contact-textarea"></textarea>
                <div class="contact-consent">
                    <input type="checkbox" id="consent" required>
                    <label for="consent">Wyrażam zgodę na przetwarzanie moich danych osobowych...</label>
                </div>
                <button type="submit" class="contact-btn">Wyślij wiadomość</button>
            </form>
        </div>
        <div class="contact-info-block">
            <h3 class="contact-info-title">Jesteśmy<br>do Twojej dyspozycji</h3>
            <div class="contact-detail">
                <img src="<?php echo get_template_directory_uri(); ?>/images/telephone 1.png" alt="Telefon">
                <div class="contact-detail-text">+48 609 521 608</div>
            </div>
            <div class="contact-detail">
                <img src="<?php echo get_template_directory_uri(); ?>/images/mail 1.png" alt="Email">
                <div class="contact-detail-text">kontakt@bitsystem.pl</div>
            </div>
            <div class="contact-detail-address">
                <img src="<?php echo get_template_directory_uri(); ?>/images/maps-and-flags 1.png" alt="Lokalizacja">
                <div class="contact-detail-text">
                    Karpacka 52<br>85-164 Bydgoszcz
                </div>
            </div>
            <div class="contact-social-icons">
                <a href="#" aria-label="LinkedIn"><img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.png" alt="LinkedIn"></a>
                <a href="#" aria-label="Facebook"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt="Facebook"></a>
                <a href="#" aria-label="Instagram"><img src="<?php echo get_template_directory_uri(); ?>/images/instagram.png" alt="Instagram"></a>
                <a href="#" aria-label="YouTube"><img src="<?php echo get_template_directory_uri(); ?>/images/youtube.png" alt="YouTube"></a>
            </div>
        </div>
    </div>
</section>







<?php get_footer(); ?>


</body>

    <?php the_content(); ?>
</div>



