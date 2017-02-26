<?php

/*
  =============================================
                ADMIN PAGE
  =============================================
*/

function nazar_add_admin_settings()
{
    add_menu_page('Nazar Theme Options', 'Theme Options', 'manage_options', 'nazar_theme_general_settings', 'nazar_theme_settings_page', '', 63);
    add_submenu_page('nazar_theme_general_settings', 'Nazar Theme Options', 'General', 'manage_options', 'nazar_theme_general_settings', 'nazar_theme_settings_page');
    add_submenu_page('nazar_theme_general_settings', 'Nazar CSS Options', 'Custom CSS', 'manage_options', 'nazar-theme-css', 'nazar_theme_custom_css_page');

    add_action('admin_init', 'nazar_profile_settings');
}
add_action('admin_menu', 'nazar_add_admin_settings');

function nazar_profile_settings()
{
    register_setting('nazar-settings-group', 'profile_picture');
    register_setting('nazar-settings-group', 'profile_first_name');
    register_setting('nazar-settings-group', 'profile_last_name');
    register_setting('nazar-settings-group', 'profile_description');
    register_setting('nazar-settings-group', 'profile_twitter');
    register_setting('nazar-settings-group', 'profile_instagram');
    register_setting('nazar-settings-group', 'profile_facebook');
    register_setting('nazar-settings-group', 'profile_google');
    register_setting('nazar-settings-group', 'profile_github');
    register_setting('nazar-settings-group', 'profile_linkedin');

    add_settings_section('nazar-profile-options', 'Profile Options', 'nazar_profile_options', 'nazar_theme_general_settings');
    add_settings_field('profile-first-name', 'Full Name', 'nazar_profile_name', 'nazar_theme_general_settings', 'nazar-profile-options');
    add_settings_field('profile-description', 'Description', 'nazar_profile_description', 'nazar_theme_general_settings', 'nazar-profile-options');
    add_settings_field('profile-picture', 'Profile picture', 'nazar_profile_picture', 'nazar_theme_general_settings', 'nazar-profile-options');
    add_settings_field('profile-twitter', 'Twitter', 'nazar_profile_twitter', 'nazar_theme_general_settings', 'nazar-profile-options');
    add_settings_field('profile-instagram', 'Instagram', 'nazar_profile_instagram', 'nazar_theme_general_settings', 'nazar-profile-options');
    add_settings_field('profile-facebook', 'Facebook', 'nazar_profile_facebook', 'nazar_theme_general_settings', 'nazar-profile-options');
    add_settings_field('profile-google', 'Google+', 'nazar_profile_google', 'nazar_theme_general_settings', 'nazar-profile-options');
    add_settings_field('profile-github', 'Github', 'nazar_profile_github', 'nazar_theme_general_settings', 'nazar-profile-options');
    add_settings_field('profile-linkedin', 'LinkedIn', 'nazar_profile_linkedin', 'nazar_theme_general_settings', 'nazar-profile-options');
}

// Custom fields for profile
function nazar_profile_options()
{
    echo 'Customize your Profile Information';
}
function nazar_profile_name()
{
    $firstName = esc_attr(get_option('profile_first_name'));
    $lastName = esc_attr(get_option('profile_last_name'));
    echo '<input type="text" name="profile_first_name" value="'. $firstName .'" placeholder="First Name" /><input type="text" name="profile_last_name" value="'. $lastName .'" placeholder="Last Name" />';
}
function nazar_profile_description()
{
    $profileDescription = esc_attr(get_option('profile_description'));
    echo '<textarea name="profile_description" class="" cols="50" rows="4">' . $profileDescription  . '</textarea>';
    echo '<p class="description">Write something about yourself</p>';
}
function nazar_profile_picture()
{
    $profilePicture = esc_attr(get_option('profile_picture'));
    echo '<input type="button" id="upload-media" class="button button-secondary" value="Upload Profile Picture" /><input type="hidden" id="profile_picture" name="profile_picture" value="'. $profilePicture .'"/>';
}
function nazar_profile_twitter()
{
    $socialTwitter = esc_attr(get_option('profile_twitter'));
    echo '<input type="text" name="profile_twitter" value="'. $socialTwitter .'" placeholder="Twitter Link" />';
}
function nazar_profile_instagram()
{
    $socialInstagram = esc_attr(get_option('profile_instagram'));
    echo '<input type="text" name="profile_instagram" value="'. $socialInstagram .'" placeholder="Instagram Link" />';
}
function nazar_profile_facebook()
{
    $socialFacebook = esc_attr(get_option('profile_facebook'));
    echo '<input type="text" name="profile_facebook" value="'. $socialFacebook .'" placeholder="Facebook Link" />';
}
function nazar_profile_google()
{
    $socialGoogle = esc_attr(get_option('profile_google'));
    echo '<input type="text" name="profile_google" value="'. $socialGoogle .'" placeholder="Google Plus Link" />';
}
function nazar_profile_github()
{
    $socialGithub = esc_attr(get_option('profile_github'));
    echo '<input type="text" name="profile_github" value="'. $socialGithub .'" placeholder="Github Link" />';
}
function nazar_profile_linkedin()
{
    $socialLinkedIn = esc_attr(get_option('profile_linkedin'));
    echo '<input type="text" name="profile_linkedin" value="'. $socialLinkedIn .'" placeholder="LinkedIn Link" />';
}

function nazar_theme_settings_page()
{
    ?>
  <div class="nazar-settings wrap">
    <h1>Nazar General Settings</h1>
    <?php settings_errors(); ?>
    <form action="options.php" method="post">
      <?php settings_fields('nazar-settings-group', 'first-name'); ?>
      <?php do_settings_sections('nazar_theme_general_settings'); ?>
      <?php submit_button(); ?>
    </form>
  </div>
  <div class="nazar-review">
    <div class="sidebar text-center">
      <img id="profile-picture" src="<?php print esc_attr(get_option('profile_picture')); ?>" height="170px" width="170px">
      <h2 id="profile-name"></h2>
      <p id="profile-description"></p>
      <div id="profile-socials"></div>
    </div>
  </div>
<?php

}

function nazar_theme_custom_css_page()
{
    echo '<h1>Nazar Custom CSS</h1>';
}
