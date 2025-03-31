<?php
add_action('wp_ajax_nopriv_send_form_to_email', 'send_form_to_email');
add_action('wp_ajax_send_form_to_email', 'send_form_to_email');


function safe_post_value($key, $callback = 'sanitize_text_field')
{
    $value = $_POST[$key] ?? '';
    return is_string($value) ? $callback($value) : '';
}


function send_form_to_email()
{
    if (
        isset($_POST['full_name']) &&
        isset($_POST['phone']) &&
        isset($_POST['email']) &&
        isset($_POST['message'])
    ) {
        $full_name = safe_post_value('full_name');
        $phone     = safe_post_value('phone');
        $email     = safe_post_value('email', 'sanitize_email');
        $message   = safe_post_value('message', 'sanitize_textarea_field');


        $to      = 'contact@topconstructionreviews.com';
        $subject = 'New Form Submission';
        $body    = "Full Name: $full_name\nPhone: $phone\nEmail: $email\nMessage: $message\n";
        wp_mail($to, $subject, $body);

        wp_send_json_success(['message' => 'Form submitted successfully!']);
    } else {
        wp_send_json_error(['message' => 'Please fill out all required fields.']);
    }
}
