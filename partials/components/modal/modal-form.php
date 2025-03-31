<?php


?>


<div class="modal micromodal-slide" id="modal-form" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1">
        <div class="modal-container-wrap">
            <div class="modal__container modal-form-container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <div class="modal-form-close modal-close " aria-label="Close modal" data-micromodal-close> <?php get_template_part("img/close_x") ?></div>
                <?php get_template_part("partials/forms/contact-form") ?>
            </div>
        </div>
    </div>
</div>



<?php get_template_part("partials/components/modal-success") ?>