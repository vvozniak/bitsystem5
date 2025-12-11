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

</div> 
<footer class="main-footer">
    <div class="footer-upper-section">
        <div class="footer-content-container">
            <div class="footer-col footer-col-logo">
                <img src="<?php echo get_template_directory_uri(); ?>/images/webp/logoW.webp" alt="BIT System Logo" class="footer-logo">
                <p class="footer-legal-info">
                    BIT System sp. z o. o.<br>
                    NIP: 5562759098<br>
                    REGON: 361439644
                </p>
            </div>
            
            <div class="footer-col footer-col-contact">
                <h4 class="footer-contact-heading">Kontakt</h4>
                
                <?php if ($phone) : ?>
                <div class="contact-detail">
                    <svg class="contact-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 5C3 3.89543 3.89543 3 5 3H8.27924C8.70967 3 9.09181 3.27543 9.22792 3.68377L10.7257 8.17721C10.8831 8.64932 10.6694 9.16531 10.2243 9.38787L7.96701 10.5165C9.06925 12.9612 11.0388 14.9308 13.4835 16.033L14.6121 13.7757C14.8347 13.3306 15.3507 13.1169 15.8228 13.2743L20.3162 14.7721C20.7246 14.9082 21 15.2903 21 15.7208V19C21 20.1046 20.1046 21 19 21H18C9.71573 21 3 14.2843 3 6V5Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <a href="tel:<?php echo esc_attr(str_replace(' ', '', $phone)); ?>" class="contact-link">
                        <?php echo esc_html($phone); ?>
                    </a>
                </div>
                <?php endif; ?>

                <?php if ($email) : ?>
                <div class="contact-detail">
                    <svg class="contact-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 8L10.89 13.26C11.2187 13.4793 11.6049 13.5963 12 13.5963C12.3951 13.5963 12.7813 13.4793 13.11 13.26L21 8M5 19H19C19.5304 19 20.0391 18.7893 20.4142 18.4142C20.7893 18.0391 21 17.5304 21 17V7C21 6.46957 20.7893 5.96086 20.4142 5.58579C20.0391 5.21071 19.5304 5 19 5H5C4.46957 5 3.96086 5.21071 3.58579 5.58579C3.21071 5.96086 3 6.46957 3 7V17C3 17.5304 3.21071 18.0391 3.58579 18.4142C3.96086 18.7893 4.46957 19 5 19Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <a href="mailto:<?php echo esc_attr($email); ?>" class="contact-link">
                        <?php echo esc_html($email); ?>
                    </a>
                </div>
                <?php endif; ?>

                <?php if ($address1 && $address2) : ?>
                <div class="contact-detail">
                    <svg class="contact-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.364 3.63604C20.0518 5.32387 21 7.61305 21 10Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <div class="contact-address">
                        <?php echo esc_html($address1); ?><br><?php echo esc_html($address2); ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="footer-col footer-col-social contact-social-icons">
                <?php if ($linkedin) : ?>
                <a href="<?php echo esc_url($linkedin); ?>" aria-label="LinkedIn">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/webp/linkedin.webp" alt="LinkedIn">
                </a>
                <?php endif; ?>
                
                <?php if ($facebook) : ?>
                <a href="<?php echo esc_url($facebook); ?>" aria-label="Facebook">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/webp/facebook.webp" alt="Facebook">
                </a>
                <?php endif; ?>

                <?php if ($instagram) : ?>
                <a href="<?php echo esc_url($instagram); ?>" aria-label="Instagram">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/webp/instagram.webp" alt="Instagram">
                </a>
                <?php endif; ?>

                <?php if ($youtube) : ?>
                <a href="<?php echo esc_url($youtube); ?>" aria-label="YouTube">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/webp/youtube.webp" alt="YouTube">
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <div class="footer-bottom-bar">
        <?php if ($copyright) : ?>
            <p class="copyright"><?php echo esc_html($copyright); ?></p>
        <?php endif; ?>
        
        <div class="footer-links">
            <a href="#" class="footer-link">Regulamin</a>
            <?php if ($privacy_url) : ?>
                <a href="<?php echo esc_url($privacy_url); ?>" class="footer-link">Polityka prywatności</a>
            <?php endif; ?>
            <span class="design-by">
                Design by <span class="design-by-logo">S</span>
            </span>
        </div>
    </div>
</footer>

<style>
.main-footer {
    background-color: #000C32;
    color: white;
    font-family: 'IBM Plex Sans', sans-serif;
    position: relative;
}

.footer-upper-section {
    background-image: url('<?php echo get_template_directory_uri(); ?>/images/footerbg.jpg');
    background-color: #000C32;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    position: relative;
    padding-top: 5vw;
    padding-bottom: 3vw;
}

.footer-upper-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 12, 50, 0.5);
    backdrop-filter: blur(1px);
}

.footer-content-container {
    position: relative;
    z-index: 1;
    margin: 0 16.67vw;
    padding-bottom: 3vw;
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    display: flex;
    justify-content: space-between;
    gap: 3vw;
}

.footer-col-logo {
    max-width: 30%;
}

.footer-logo {
    width: 20.41vw;
    height: auto;
    margin-bottom: 2vw;
}

.footer-legal-info {
    font-size: 0.83vw;
    line-height: 1.4;
    color: rgba(255, 255, 255, 0.7);
}

.footer-col-contact {
    min-width: 25%;
}

.footer-contact-heading {
    font-family: 'Manrope', sans-serif;
    font-size: 1.25vw;
    font-weight: 600;
    margin-bottom: 1.5vw;
    color: white;
}

.footer-col-contact .contact-detail {
    display: flex;
    align-items: center;
    margin-bottom: 1.2vw;
    font-size: 0.94vw;
    gap: 1vw;
    background-color: transparent !important;
    padding: 0 !important;
    border-radius: 0 !important;
}

.footer-col-contact .contact-detail:last-child {
    align-items: flex-start;
}

.contact-icon {
    width: 1.5vw;
    height: 1.5vw;
    min-width: 20px;
    min-height: 20px;
    flex-shrink: 0;
}

.contact-link,
.contact-address {
    color: white;
    text-decoration: none;
    line-height: 1.4;
}

.contact-link:hover {
    text-decoration: underline;
}

.footer-col-social.contact-social-icons {
    display: flex;
    flex-direction: column;
    gap: 2vw;
    padding-top: 1.25vw;
}

.footer-col-social.contact-social-icons a {
    display: block;
    width: 2.5vw;
    height: 2.5vw;
    border-radius: 50%;
    overflow: hidden;
}

.footer-bottom-bar {
    background-color: #000C32;
    margin: 0 16.67vw;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.73vw;
    color: rgba(255, 255, 255, 0.5);
    padding: 1.5vw 0;
}

.copyright {
    margin: 0;
    color: white;
}

.footer-links {
    display: flex;
    gap: 2vw;
    align-items: center;
}

.footer-link {
    color: white;
    text-decoration: underline;
    font-weight: 500;
}

.footer-link:hover {
    opacity: 0.8;
}

.design-by {
    color: rgba(255, 255, 255, 0.5);
    margin-left: 2vw;
}

.design-by-logo {
    color: #FF0000;
    font-weight: 700;
}

/* Mobile styles */
@media (max-width: 768px) {
    .footer-upper-section {
        padding-top: 8vw;
        padding-bottom: 5vw;
    }
    
    .footer-content-container {
        margin: 0 5vw;
        padding-bottom: 5vw;
        flex-direction: column;
        gap: 5vw;
    }
    
    .footer-col-logo {
        max-width: 100%;
    }
    
    .footer-logo {
        width: 50vw;
        max-width: 200px;
        margin-bottom: 3vw;
    }
    
    .footer-legal-info {
        font-size: 3.5vw;
    }
    
    .footer-col-contact {
        min-width: 100%;
    }
    
    .footer-contact-heading {
        font-size: 5vw;
        margin-bottom: 3vw;
    }
    
    .footer-col-contact .contact-detail {
        margin-bottom: 3vw;
        font-size: 4vw;
        justify-content: center;
        text-align: center;
    }
    
    .footer-col-contact .contact-detail:last-child {
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        gap: 1.5vw;
    }
    
    .footer-col-contact .contact-detail:last-child .contact-icon {
        margin-bottom: 0;
    }
    
    .contact-address {
        text-align: center;
    }
    
    .contact-icon {
        width: 5vw;
        height: 5vw;
        min-width: 20px;
        min-height: 20px;
    }
    
    .footer-col-social.contact-social-icons {
        flex-direction: row;
        justify-content: flex-start;
        gap: 3vw;
        padding-top: 0;
    }
    
    .footer-col-social.contact-social-icons a {
        width: 5vw !important;
        height: 5vw !important;
        min-width: 40px !important;
        min-height: 40px !important;
    }
    
    .footer-bottom-bar {
        margin: 0 5vw;
        flex-direction: column;
        align-items: flex-start;
        gap: 3vw;
        font-size: 3vw;
        padding: 3vw 0;
    }
    
    .footer-links {
        flex-direction: column;
        align-items: flex-start;
        gap: 2vw;
    }
    
    .design-by {
        margin-left: 0;
    }
}
</style>

<!-- Przycisk powrotu do góry -->
<button id="scroll-to-top" class="scroll-to-top-btn" aria-label="Powrót do góry">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M12 19L12 5M12 5L5 12M12 5L19 12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
</button>

<style>
.scroll-to-top-btn {
    position: fixed;
    right: 2rem;
    bottom: 2rem;
    width: 48px;
    height: 48px;
    background-color: #0BA0D8;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease;
    z-index: 1000;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
}

.scroll-to-top-btn:hover {
    background-color: #0988b8;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.scroll-to-top-btn.active {
    opacity: 1;
    visibility: visible;
}

.scroll-to-top-btn svg {
    width: 20px;
    height: 20px;
}

@media (max-width: 768px) {
    .scroll-to-top-btn {
        width: 56px; /* Powiększony z 44px */
        height: 56px;
        right: 1.5rem;
        bottom: 1.5rem;
    }
    
    .scroll-to-top-btn svg {
        width: 24px; /* Powiększony z 18px */
        height: 24px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const scrollToTopBtn = document.getElementById('scroll-to-top');
    
    // Pokaż/ukryj przycisk w zależności od pozycji scrolla
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            scrollToTopBtn.classList.add('active');
        } else {
            scrollToTopBtn.classList.remove('active');
        }
    });
    
    // Obsługa kliknięcia - płynne przewinięcie do góry
    scrollToTopBtn.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});
</script>

<?php wp_footer(); ?>

</body>
</html>