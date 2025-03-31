<div class="modal micromodal-slide" id="modal-success" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal-container-wrap">
            <div class="modal__container modal-form-container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <div class="modal-form-close modal-close" aria-label="Close modal" data-micromodal-close> <?php get_template_part("img/close_x") ?></div>
                <div class="modal__content success-modal-content" id="modal-success-content">
                    <div class="success-modal-content-wrap">
                        <?php get_template_part("img/done-icon") ?>
                        <div>
                            <p class="success-modal-title">Thank you for your request!</p>
                            <p class="success-modal-text">We will contact you shortly</p>
                        </div>

                        <button
                            data-micromodal-close
                            type="button"
                            class="btn-2"
                            aria-label="open contact modal">
                            <span class="btn-text">Close</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>