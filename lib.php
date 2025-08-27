<?php
defined('MOODLE_INTERNAL') || die();

/**
 * Injects Zammad chat bubble JS on every page.
 */
function local_zammadchat_before_footer() {
    global $PAGE;
    // Only add on normal pages (not during install, upgrade, etc)
    if ($PAGE->user_is_editing()) {
        // Don't inject during editing mode to avoid confusion.
        return;
    }

    // Add jQuery (if not already present)
    $PAGE->requires->js(new moodle_url('https://code.jquery.com/jquery-3.6.0.min.js'));

    // Add Zammad chat script
    $PAGE->requires->js(new moodle_url('https://support.operatortraining.academy/assets/chat/chat.min.js'));

    // Custom JS to launch chat bubble
    $js = <<<EOD
jQuery(function() {
  new ZammadChat({
    background: 'rgb(48,67,63)',
    fontSize: '12px',
    chatId: 1
  });
});
EOD;
    $PAGE->requires->js_init_code($js);
}
