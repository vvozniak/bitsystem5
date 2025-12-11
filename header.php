<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> style="background: transparent; color: black; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;">

<?php do_action('tailpress_site_before'); ?>

<header class="site-header">
  <div class="container-header">
    <nav class="nav-main">
      <div class="nav-inner">
        <!-- Logo -->
        <a href="<?php echo home_url(); ?>" class="logo-link">
          <img src="<?php echo get_template_directory_uri(); ?>/images/webp/Property 1=Default.webp" alt="Logo" class="logo-img">
        </a>

        <!-- 🔹 Przycisk hamburger -->
        <button class="menu-toggle" aria-label="Otwórz menu">
          <span></span>
          <span></span>
          <span></span>
        </button>

        <!-- 🔹 Menu WordPress -->
        <?php
        wp_nav_menu(array(
          'theme_location' => 'primary',
          'container' => false,
          'menu_class' => 'menu-list',
          'walker' => new class extends Walker_Nav_Menu {
            function start_lvl(&$output, $depth = 0, $args = null) {
              $output .= '<ul class="submenu">';
            }
            function end_lvl(&$output, $depth = 0, $args = null) {
              $output .= '</ul>';
            }
            function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
              $classes = empty($item->classes) ? array() : (array) $item->classes;
              $has_children = in_array('menu-item-has-children', $classes);
              
              $output .= '<li class="' . ($has_children ? 'has-submenu' : '') . '">';
              $output .= '<a href="' . esc_url($item->url) . '">' . esc_html($item->title);
              if ($has_children && $depth == 0) {
                $output .= ' <span class="dropdown-arrow">▼</span>';
              }
              $output .= '</a>';
            }
            function end_el(&$output, $item, $depth = 0, $args = null) {
              $output .= '</li>';
            }
          },
          'fallback_cb' => false,
          'depth' => 2,
        ));
        ?>
      </div>
    </nav>
  </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const toggle = document.querySelector('.menu-toggle');
  const menu = document.querySelector('.menu-list');
  const links = document.querySelectorAll('.menu-list a');
  const hasSubmenuItems = document.querySelectorAll('.has-submenu');

  // Funkcja zamykająca menu i submenu
  function closeAllMenus() {
    if (menu) {
      menu.classList.remove('active');
    }
    if (toggle) {
      toggle.classList.remove('active');
    }
    document.querySelectorAll('.submenu').forEach(sub => {
      sub.style.display = 'none';
    });
  }

  if (toggle && menu) {
    toggle.addEventListener('click', function() {
      menu.classList.toggle('active');
      toggle.classList.toggle('active');
    });

    // Zamykanie po kliknięciu w link (bez submenu)
    links.forEach(link => {
      if (!link.parentElement.classList.contains('has-submenu')) {
        link.addEventListener('click', closeAllMenus);
      }
    });
  }

  // Obsługa dropdown dla elementów z submenu
  hasSubmenuItems.forEach(item => {
    const link = item.querySelector(':scope > a');
    const submenu = item.querySelector('.submenu');
    let hoverTimeout = null;
    
    if (link && submenu) {
      // Desktop TYLKO: hover z opóźnieniem przy zamykaniu
      item.addEventListener('mouseenter', function() {
        if (window.innerWidth > 768) {
          // Anuluj timeout zamykania jeśli istnieje
          if (hoverTimeout) {
            clearTimeout(hoverTimeout);
            hoverTimeout = null;
          }
          submenu.style.display = 'block';
        }
      });
      
      // Desktop TYLKO: Obsługa hover na submenu - utrzymaj otwarte
      submenu.addEventListener('mouseenter', function() {
        if (window.innerWidth > 768) {
          if (hoverTimeout) {
            clearTimeout(hoverTimeout);
            hoverTimeout = null;
          }
          submenu.style.display = 'block';
        }
      });
      
      // Desktop TYLKO: Zamykanie przy opuszczeniu parent item
      item.addEventListener('mouseleave', function() {
        if (window.innerWidth > 768) {
          // Opóźnienie zamykania - daje czas na przejście myszy do submenu
          hoverTimeout = setTimeout(function() {
            submenu.style.display = 'none';
          }, 200);
        }
      });
      
      // Desktop TYLKO: Zamykanie przy opuszczeniu submenu
      submenu.addEventListener('mouseleave', function() {
        if (window.innerWidth > 768) {
          hoverTimeout = setTimeout(function() {
            submenu.style.display = 'none';
          }, 200);
        }
      });
      
      // Klik — działa na mobile i desktop
      link.addEventListener('click', function(e) {
        // Na mobile (<= 768px) zawsze preventDefault
        // Na desktop tylko jeśli submenu istnieje
        if (window.innerWidth <= 768 || submenu) {
          e.preventDefault();
          
          const isOpen = submenu.style.display === 'block';
          
          // Zamknij wszystkie inne submenu
          document.querySelectorAll('.submenu').forEach(sub => {
            if (sub !== submenu) {
              sub.style.display = 'none';
            }
          });
          
          // Toggle obecne submenu
          submenu.style.display = isOpen ? 'none' : 'block';
        }
      });
    }
  });

  // Zamknij submenu po kliknięciu w link submenu
  document.querySelectorAll('.submenu a').forEach(link => {
    link.addEventListener('click', closeAllMenus);
  });
});
</script>