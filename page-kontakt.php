<head>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=IBM+Plex+Sans:wght@400;500;600;700&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

</head>

<?php
$pageTitle = "Oferta";
?>
<?php get_header(); ?>
<section class="hero-section" style="position:relative; overflow:visible; color:white; margin-top:9.01vw;">
  <img 
    src="<?php echo get_template_directory_uri(); ?>/images/webp/tlo.webp" 
    alt="Tło wydarzenia" 
    style="position:fixed; top:0; left:0; width:100%; height:100%; object-fit:cover; z-index:-10;"
  >

  

  <div class="hero-content" style="position:relative; margin-left:16.66vw; max-width:55vw; z-index:2;">
    
  
    <p class="text-title" style="opacity:0.9; margin-bottom:1vw; line-height:1.6; font-size:3.2vw; font-family:'Manrope', sans-serif;">
      <span class="text-highlight" style="background-color:#0BA0D880; opacity:0.9; padding:0.5vw 1.2vw; border-top-right-radius:9999px; border-bottom-right-radius:9999px; color:white; font-weight:800; display:inline-block; box-decoration-break:clone; -webkit-box-decoration-break:clone;">
        Skontaktuj się
      </span>, z nami
    </p>

    <p class="text-desc" style="opacity:0.9; margin-bottom:5.156vw; max-width:48vw; font-family:'IBM Plex Sans', sans-serif; font-size:1.25vw; line-height:1.6;">
     Wierzymy, że każda współpraca zaczyna się od rozmowy.
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




<section class="contact-section" style="
    font-family: 'Manrope', sans-serif; 
    padding: 6vw 0; 
    background-color: white;
    position: relative; 
    color: #1a1a1a;
">
    
    <div class="contact-container" style="
        display: flex; 
        max-width: 90vw; 
        margin: 0 auto;
        position: relative;
        z-index: 2; 
        align-items: flex-start;
    ">

        <div class="spacer-column" style="
            width: 0vw; 
            flex-shrink: 0;
            height: 1px; 
        ">
        </div>

        <div class="content-column" style="
            flex-grow: 1;
            max-width: 62.5vw; 
           
            position: relative;
            margin-left:16.67vw; 
        ">

            <h3 class="contact-subtitle" style="
                font-size: 1.67vw; 
                font-weight: 400; 
                color: #868686; 
                margin-bottom: 0.5vw;
                
            ">
                Napisz do nas
            </h3>
            
            <h2 class="contact-title" style="
                font-size: 1.88vw; 
                font-weight: 600; 
                line-height: 1.2; 
                margin-bottom: 2vw;
            ">
                Jesteśmy otwarci na współpracę i 
                <span style="
                    background-color: #79D6F0; /* Kolor podświetlenia */
                    color: #fff; 
                    padding: 0.1vw 0.8vw;
                    display: inline-block;
                    line-height: 1.2;
                    white-space: nowrap;
                    font-weight: 600;
                    border-radius: 5px;
                ">
                    nowe inicjatywy
                </span>
            </h2>

            <p class="contact-description" style="
                font-family: 'IBM Plex Sans', sans-serif;
                font-size: 1.04vw;
                font-weight:400; 
                line-height: 1.6; 
                color: #4a4a4a;
                max-width: 80%; 
                margin-bottom: 2vw;
            ">
                Zapraszamy do kontaktu – chętnie porozmawiamy o Twoim pomyśle lub planowanym wydarzeniu. 
                Prezes firmy wraz z Pełnomocnikiem są do Twojej dyspozycji i z przyjemnością doradzą w zakresie współpracy i realizacji projektów.
            </p>
            
        </div>
        
    </div>
    
</section>


<?php
include 'contact.php';?>




<?php
// Używamy zmiennej dla ułatwienia zmiany kolorów
$cta_color = '#0BA0D8'; 
?>

<section class="map-contact-section" style="
    font-family: 'Manrope', sans-serif; 
    padding: 4vw 0 0 0; 
    background-color: white;
    position: relative; 
    color: #1a1a1a;
">
    
    <div class="contact-cards-container" style="
        max-width: 90vw; 
        margin: 0 auto 3vw auto; 
        display: flex;
        justify-content: center; 
        gap: 3vw;
        position: relative;
        z-index: 2; 
    ">

        <div class="contact-card" style="
            display: flex;
            align-items: center;
            background: #f7f7f7;
            padding: 1vw;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            width: 25vw; 
        ">
            <img src="<?php echo get_template_directory_uri(); ?>/images/webp/michal.webp" 
                 alt="Zdjęcie Michała Cichorackiego" 
                 style="
                    width: 6vw; 
                    height: 6vw; 
                    object-fit: cover;
                    border-radius: 50%;
                    margin-right: 1.5vw;
                    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                 ">
            <div class="card-details">
                <p style="font-weight: 700; font-size: 1.1vw; margin: 0;">
                    Michał Cichoracki
                </p>
                <p style="font-size: 0.9vw; color: #868686; margin: 0 0 0.5vw 0;">
                    Prezes
                </p>
                <p style="font-size: 0.9vw; margin: 0;">
                    michal.cichoracki@byd.pl
                </p>
            </div>
        </div>

        <div class="contact-card" style="
            display: flex;
            align-items: center;
            background: #f7f7f7;
            padding: 1vw;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            width: 25vw; 
        ">
            <img src="<?php echo get_template_directory_uri(); ?>/images/webp/dorota.webp" 
                 alt="Zdjęcie Doroty Markiewicz" 
                 style="
                    width: 6vw; 
                    height: 6vw; 
                    object-fit: cover;
                    border-radius: 50%;
                    margin-right: 1.5vw;
                    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                 ">
            <div class="card-details">
                <p style="font-weight: 700; font-size: 1.1vw; margin: 0;">
                    Dorota Markiewicz
                </p>
                <p style="font-size: 0.9vw; color: #868686; margin: 0 0 0.5vw 0;">
                    Pełnomocnik Prezesa
                </p>
                <p style="font-size: 0.9vw; margin: 0;">
                    dorota.markiewicz@byd.pl
                </p>
            </div>
        </div>

    </div>


   <div class="map-area" style="
        width: 100%; 
        height: 30vw; 
        background-color: #e0e0e0; 
        position: relative;
    ">
        <img src="<?php echo get_template_directory_uri(); ?>/images/webp/mapa 3.webp"
             alt="Mapa lokalizacji firmy" 
             style="
                width: 100%;
                height: 100%;
                object-fit: cover;
                
             ">
        
     
            &bullet; </div>
    </div>
    
</section>





<?php
include 'footer.php';
  ?>