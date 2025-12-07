<?php
/**
 * Footer
 *
 * @package YourThemeName
 */

// Używamy stałego ID strony 'Ustawienia Globalne'
$global_settings_id = 332; 

// --- POBIERANIE PÓL GLOBALNYCH ---
// Dane kontaktowe i adresowe
$phone = get_field('global_phone', $global_settings_id);
$email = get_field('global_email', $global_settings_id);
$address1 = get_field('global_address_line1', $global_settings_id);
$address2 = get_field('global_address_line2', $global_settings_id);

// Prawa autorskie i linki
$copyright = get_field('global_copyright_text', $global_settings_id);
$privacy_url = get_field('global_privacy_url', $global_settings_id);

// Social Media
$linkedin = get_field('global_linkedin_url', $global_settings_id);
$facebook = get_field('global_facebook_url', $global_settings_id);
$instagram = get_field('global_instagram_url', $global_settings_id);
$youtube = get_field('global_youtube_url', $global_settings_id);

// Zmienne dla przycisku scroll-up (pozostają w PHP, bo są dynamicznie stylizowane)
$cta_color = '#0BA0D8';
$right_offset = '16.67vw';
$bottom_offset = '3vw';
?>

</main>

</div> <footer class="main-footer" style="
    background-image: url('<?php echo get_template_directory_uri(); ?>/images/tlo 2.png');
    background-color: #000C32; 
    background-size: cover; 
    background-repeat: no-repeat;
    background-position: center center;
    color: white;
    font-family: 'IBM Plex Sans', sans-serif;
    padding-top: 5vw; 
    padding-bottom: 2vw; 
">
    
    <div class="footer-content-container" style="
        margin: 0 16.67vw; 
        padding-bottom: 3vw; 
        border-bottom: 1px solid rgba(255, 255, 255, 0.2); 
        display: flex;
        justify-content: space-between;
        gap: 3vw;
    ">
        
        <div class="footer-col footer-col-logo" style="max-width: 30%;">
            <img src="<?php echo get_template_directory_uri(); ?>/images/logoW.png" alt="BIT System Logo" 
                 style="width: 20.41vw; height: auto; margin-bottom: 2vw;">
            <p style="font-size: 0.83vw; line-height: 1.4; color: rgba(255, 255, 255, 0.7);">
                BIT System sp. z o. o.<br>
                NIP: 5562759098<br>
                REGON: 361439644
            </p>
        </div>
        
        <div class="footer-col footer-col-contact" style="min-width: 25%;">
            <h4 style="font-family: 'Manrope', sans-serif; font-size: 1.25vw; font-weight: 600; margin-bottom: 1.5vw;">
                Kontakt
            </h4>
            
            <?php if ($phone) : ?>
            <div class="contact-detail" style="display: flex; align-items: center; margin-bottom: 1.2vw; font-size: 0.94vw;">
                <img src="<?php echo get_template_directory_uri(); ?>/images/telephone 1.png" alt="Telefon" 
                     style="width: 1vw; height: 1vw; margin-right: 1vw; filter: sepia(100%) saturate(300%) hue-rotate(180deg) brightness(1.2);">
                <a href="tel:<?php echo esc_attr(str_replace(' ', '', $phone)); ?>" style="color: inherit; text-decoration: none;">
                    <?php echo esc_html($phone); ?>
                </a>
            </div>
            <?php endif; ?>

            <?php if ($email) : ?>
            <div class="contact-detail" style="display: flex; align-items: center; margin-bottom: 1.2vw; font-size: 0.94vw;">
                <img src="<?php echo get_template_directory_uri(); ?>/images/mail 1.png" alt="Email" 
                     style="width: 1vw; height: 1vw; margin-right: 1vw; filter: sepia(100%) saturate(300%) hue-rotate(180deg) brightness(1.2);">
                <a href="mailto:<?php echo esc_attr($email); ?>" style="color: inherit; text-decoration: none;">
                    <?php echo esc_html($email); ?>
                </a>
            </div>
            <?php endif; ?>

            <?php if ($address1 && $address2) : ?>
            <div class="contact-detail" style="display: flex; align-items: flex-start; margin-bottom: 1.2vw; font-size: 0.94vw;">
                <img src="<?php echo get_template_directory_uri(); ?>/images/maps-and-flags 1.png" alt="Lokalizacja" 
                     style="width: 1vw; height: 1vw; margin-right: 1vw; margin-top: 0.2vw; filter: sepia(100%) saturate(300%) hue-rotate(180deg) brightness(1.2);">
                <div style="color: inherit;">
                    <?php echo esc_html($address1); ?><br><?php echo esc_html($address2); ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
        
        <div class="footer-col footer-col-spacer" style="flex-grow: 1;"></div>
        
        <div class="footer-col footer-col-spacer" style="flex-grow: 1;">
        </div>
        
        <div class="footer-col footer-col-social" style="
            display: flex; 
            flex-direction: column; 
            gap: 1.2vw;
            padding-top: 1.25vw; 
        ">
            
            <?php if ($linkedin) : ?>
            <a href="<?php echo esc_url($linkedin); ?>" aria-label="LinkedIn" style="
                display:flex; 
                width: 2.5vw; 
                height: 2.5vw; 
                justify-content:center; 
                align-items:center;
            ">
                <img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.png" alt="LinkedIn" 
                     style="width:100%; height:100%; filter: brightness(0) invert(1);">
            </a>
            <?php endif; ?>
            
            <?php if ($facebook) : ?>
            <a href="<?php echo esc_url($facebook); ?>" aria-label="Facebook" style="
                display:flex; 
                width: 2.5vw; 
                height: 2.5vw; 
                justify-content:center; 
                align-items:center;
            ">
                <img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt="Facebook" 
                     style="width:100%; height:100%; filter: brightness(0) invert(1);">
            </a>
            <?php endif; ?>

            <?php if ($instagram) : ?>
            <a href="<?php echo esc_url($instagram); ?>" aria-label="Instagram" style="
                display:flex; 
                width: 2.5vw; 
                height: 2.5vw; 
                justify-content:center; 
                align-items:center;
            ">
                <img src="<?php echo get_template_directory_uri(); ?>/images/instagram.png" alt="Instagram" 
                     style="width:100%; height:100%; filter: brightness(0) invert(1);">
            </a>
            <?php endif; ?>

            <?php if ($youtube) : ?>
            <a href="<?php echo esc_url($youtube); ?>" aria-label="YouTube" style="
                display:flex; 
                width: 2.5vw; 
                height: 2.5vw; 
                justify-content:center; 
                align-items:center;
            ">
                <img src="<?php echo get_template_directory_uri(); ?>/images/youtube.png" alt="YouTube" 
                     style="width:100%; height:100%; filter: brightness(0) invert(1);">
            </a>
            <?php endif; ?>
        </div>
        
    </div>
    
    <div class="footer-bottom-bar" style="margin: 0 16.67vw; display: flex; justify-content: space-between; align-items: center; font-size: 0.73vw; color: rgba(255, 255, 255, 0.5); padding-top: 1.5vw;">
        
        <?php if ($copyright) : ?>
            <p class="copyright">
                <?php echo esc_html($copyright); ?>
            </p>
        <?php endif; ?>
        
        <div class="footer-links" style="display: flex; gap: 2vw;">
            <a href="#" style="color: white; text-decoration: none; font-weight: 500;">Regulamin</a>
            
            <?php if ($privacy_url) : ?>
                <a href="<?php echo esc_url($privacy_url); ?>" style="color: white; text-decoration: none; font-weight: 500;">Polityka prywatności</a>
            <?php endif; ?>
            
            <span class="design-by" style="color: rgba(255, 255, 255, 0.5); margin-left: 2vw;">
                Design by <span style="color: #FF0000; font-weight: 700;">S</span>
            </span>
        </div>
    </div>
    
</footer>

<?php wp_footer(); ?>

</body>
</html>