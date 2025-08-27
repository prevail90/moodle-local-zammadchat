<?php
defined('MOODLE_INTERNAL') || die();

// Remove custom config settings
unset_config('zammadchat_customsetting', 'local_zammadchat');

// Remove custom user preferences
$DB->delete_records('user_preferences', ['name' => 'local_zammadchat_userpref']);

// Remove custom files (if any)
// $fs = get_file_storage();
// $fs->delete_area_files(context_system::instance()->id, 'local_zammadchat', 'customfilearea');

return true;
