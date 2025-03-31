<?php get_header(); ?>


<div style="display: flex; justify-content: center; align-items: center; text-align: center; height: calc(100dvh - 200px);">
    <div class="container" style="height: 100%; display: flex; justify-content: center; align-items: center;">
        <div class="error-404" style="max-width: 600px; margin: 0 auto; display: flex; flex-direction:column; justify-content: center; align-items: center;">
            <h1 style="font-size: 3rem; margin-bottom: 1rem;">404 - Page Not Found</h1>
            <p style="font-size: 1.25rem; margin-bottom: 2rem;">Sorry, but the page you are looking for does not exist.</p>
            <a href="<?php echo home_url('/'); ?>" class="btn">Return to Homepage</a>
        </div>
    </div>
</div>



<?php get_footer(''); ?>