  <?php
    $HOME_PAGE_ID = get_option('page_on_front');



    $logo_dark = get_field('logo_dark', $HOME_PAGE_ID);

    $is_child_of_table = is_page() && wp_get_post_parent_id(get_the_ID()) && get_post_field('post_name', wp_get_post_parent_id(get_the_ID())) === 'table';

    $phone_icon = '<svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M1.81483 1.66675C1.7297 1.66667 1.64539 1.68338 1.56673 1.71592C1.48807 1.74847 1.41659 1.7962 1.3564 1.8564C1.2962 1.91659 1.24847 1.98807 1.21592 2.06673C1.18338 2.14539 1.16667 2.2297 1.16675 2.31483C1.16675 8.39958 6.10058 13.3334 12.1853 13.3334C12.2705 13.3335 12.3548 13.3168 12.4334 13.2842C12.5121 13.2517 12.5836 13.204 12.6438 13.1438C12.704 13.0836 12.7517 13.0121 12.7842 12.9334C12.8168 12.8548 12.8335 12.7705 12.8334 12.6853V10.4167C12.8334 10.3317 12.8166 10.2474 12.7841 10.1688C12.7515 10.0902 12.7037 10.0188 12.6436 9.95869C12.5834 9.89856 12.5119 9.85087 12.4333 9.81837C12.3547 9.78586 12.2704 9.76917 12.1853 9.76925C11.3762 9.76925 10.5987 9.63916 9.87008 9.40058C9.75646 9.36356 9.6348 9.35878 9.51863 9.3868C9.40246 9.41481 9.29634 9.47451 9.21208 9.55925L7.78583 10.9872C5.94744 10.0507 4.45256 8.55642 3.51525 6.71841L4.94092 5.28808C5.11942 5.11016 5.17191 4.85408 5.09958 4.63008C4.85499 3.88269 4.73055 3.10122 4.73091 2.31483C4.73099 2.22975 4.7143 2.14549 4.68179 2.06686C4.64929 1.98824 4.60161 1.91679 4.54147 1.8566C4.48134 1.79642 4.40993 1.74867 4.33134 1.71609C4.25274 1.68352 4.16849 1.66675 4.08341 1.66675H1.81483Z" fill="currentColor" /></svg>';
    $drop_down_icon = '<svg class="header-drop-down-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down"><path d="m6 9 6 6 6-6" /></svg>';
    $menu_burger_icon = '<svg class="menu-burger" width="32" height="32" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.33337 11.1667H16M9.33337 16.5H22.6667M16 21.8333H22.6667" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /></svg>';
    $menu_cross_icon  = '<svg class="menu-cross" width="32" height="32" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21.657 10.8431L10.3433 22.1568M21.657 22.1567L10.3433 10.843" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /></svg>';

    $about_pages = ['who-we-are', 'contact-us', 'privacy-policy', 'advertiser-disclosure'];

    function is_current_page($pages)
    {
        if ($pages === 'home' && is_front_page()) {
            return 'current-page';
        }
        if ($pages === 'blog' && is_home() && !is_front_page()) {
            return 'current-page';
        }
        if (is_page($pages)) {
            return 'current-page';
        }
        if ($pages === 'table-category' && false !== strpos($_SERVER['REQUEST_URI'], '/table-category/')) {
            return 'current-page';
        }
        return '';
    }
    ?>

  <header class="header" id="header" role="banner">
      <div class="header-container container">
          <a class="header-link-logo" href="/" aria-label="home page">
              <img src="<?php echo esc_url($logo_dark) . '?v=1'; ?>" alt="company logo">
          </a>
          <div class="header-menu-wrapper" data-mobile-menu>
              <nav class="header-nav">
                  <ul class="header-nav-list">
                      <li class="header-nav-item"><a class="header-nav-link <?php echo is_current_page('home') ?>" href="/">Home</a></li>
                      <li class="header-nav-item"><a class="header-nav-link <?php echo is_current_page('table-category') ?>" href="/table-category/home-remodeling/">Reviews</a></li>
                      <li class="header-nav-item"><a class="header-nav-link <?php echo is_current_page('blog') ?>" href="/blog">Blog</a></li>

                      <li class="header-drop-down-nav-item">
                          <div class="header-drop-down-title">
                              <div class="header-nav-link <?php echo is_current_page($about_pages) ?> ">About Us</div><?php echo $drop_down_icon ?>
                          </div>
                          <div class="header-drop-down-body">
                              <div class="header-drop-down-link-wrap">
                                  <a class="header-nav-link <?php echo is_current_page('who-we-are') ?>" href="/who-we-are">Who We Are</a>
                                  <a class="header-nav-link <?php echo is_current_page('contact-us') ?>" href="/contact-us">Contact Us</a>
                                  <a class="header-nav-link <?php echo is_current_page('privacy-policy') ?>" href="/privacy-policy">Privacy Policy</a>
                                  <a class="header-nav-link <?php echo is_current_page('advertiser-disclosure') ?>" href="/advertiser-disclosure">Advertiser Disclosure</a>
                              </div>
                          </div>
                      </li>

                  </ul>
              </nav>
          </div>


          <?php if ($is_child_of_table) : ?>
              <?php /* $company_tel = get_field("company_tel") ?>
              <?php if ($company_tel) : ?>
                  <a href="tel:<?= esc_attr($company_tel) ?>" class="header-btn"><?= $company_tel ?></a>
              <?php endif; */  ?>
          <?php else : ?>
              <div class="header-btn <?php echo $header_button_gtm_class ?>" role="button" tabindex="0" data-micromodal-trigger="modal-form" data-company-name="general"><?php echo $header_button_text ?></div>
          <?php endif; ?>

          <div class="menu-btn" data-burger-btn>
              <?php echo $menu_burger_icon ?>
              <?php echo $menu_cross_icon ?>
          </div>

      </div>
  </header>