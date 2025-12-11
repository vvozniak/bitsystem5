<?php
// Używamy stałego ID strony 'Ustawienia Globalne'
$global_settings_id = 332; 

// --- POBIERANIE DANYCH ---
$phone = get_field('global_phone', $global_settings_id);
$email = get_field('global_email', $global_settings_id);
$address1 = get_field('global_address_line1', $global_settings_id);
$address2 = get_field('global_address_line2', $global_settings_id);

$linkedin = get_field('global_linkedin_url', $global_settings_id);
$facebook = get_field('global_facebook_url', $global_settings_id);
$instagram = get_field('global_instagram_url', $global_settings_id);
$youtube = get_field('global_youtube_url', $global_settings_id);
$contact_form = get_field('contact-form-shortcode', $global_settings_id);
?>

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
<!--             <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="POST" class="contact-form">
                <input type="hidden" name="action" value="send_contact_form">
                <input type="text" name="name" placeholder="Imię i nazwisko" required class="contact-input">
                <input type="email" name="email" placeholder="Adres e-mail" required class="contact-input">
                <input type="text" name="subject" placeholder="Temat wiadomości" required class="contact-input">
                <textarea name="message" placeholder="Treść wiadomości" rows="1" required class="contact-textarea"></textarea>
                <div class="contact-consent">
                    <input type="checkbox" id="consent" required>
                    <label for="consent">Wyrażam zgodę na przetwarzanie moich danych osobowych...</label>
                </div>
                <button type="submit" class="contact-btn">Wyślij wiadomość</button>
            </form> -->
			<?php
			if ( ! empty( $contact_form ) ) {
				echo do_shortcode( $contact_form );
			}
			?>
        </div>

        <div class="contact-info-block">
            <h3 class="contact-info-title">Jesteśmy<br>do Twojej dyspozycji</h3>
            
            <?php if ($phone) : ?>
                <div class="contact-detail">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/telephone 1.png" alt="Telefon">
                    <div class="contact-detail-text"><a href="tel:<?php echo esc_attr(str_replace(' ', '', $phone)); ?>"><?php echo esc_html($phone); ?></a></div>
                </div>
            <?php endif; ?>

            <?php if ($email) : ?>
                <div class="contact-detail">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/mail 1.png" alt="Email">
                    <div class="contact-detail-text"><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></div>
                </div>
            <?php endif; ?>

            <?php if ($address1 && $address2) : ?>
                <div class="contact-detail-address">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/maps-and-flags 1.png" alt="Lokalizacja">
                    <div class="contact-detail-text">
                        <?php echo esc_html($address1); ?><br><?php echo esc_html($address2); ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="contact-social-icons">
                <?php if ($linkedin) : ?><a href="<?php echo esc_url($linkedin); ?>" aria-label="LinkedIn"><img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.png" alt="LinkedIn"></a><?php endif; ?>
                <?php if ($facebook) : ?><a href="<?php echo esc_url($facebook); ?>" aria-label="Facebook"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt="Facebook"></a><?php endif; ?>
                <?php if ($instagram) : ?><a href="<?php echo esc_url($instagram); ?>" aria-label="Instagram"><img src="<?php echo get_template_directory_uri(); ?>/images/instagram.png" alt="Instagram"></a><?php endif; ?>
                <?php if ($youtube) : ?><a href="<?php echo esc_url($youtube); ?>" aria-label="YouTube"><img src="<?php echo get_template_directory_uri(); ?>/images/youtube.png" alt="YouTube"></a><?php endif; ?>
            </div>
        </div>
    </div>
</section>