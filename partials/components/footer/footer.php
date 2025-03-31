<?php
$HOME_PAGE_ID = get_option('page_on_front');
$logo = get_field('logo', $HOME_PAGE_ID);
$footer_copyright = get_field('footer_copyright', $HOME_PAGE_ID);

?>


<footer id="footer" class="footer">
    <section>
        <div class="container footer-container">

            <div class="footer-top">
                <div class="footer-link-logo header-link-logo">
                    <img src="<?php echo esc_url($logo) ?>" alt="company logo">
                </div>
            </div>

        </div>
    </section>
    <div class="footer-bot">
        <p><?php echo $footer_copyright ?></p>
    </div>
</footer>