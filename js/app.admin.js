jQuery(document).ready(function() {
    var mediaUploader;
    jQuery('#upload-media').on('click', function(e) {
        e.preventDefault();
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose a Profile Picture',
            button: {
                text: 'Choose Picture'
            },
            multiple: false
        });

        mediaUploader.on('select', function () {
          attachment = mediaUploader.state().get('selection').first().toJSON();
          jQuery('#profile_picture').val(attachment.url);
        });

        mediaUploader.open();
    });

    // Binding to preview
    previewValue();
    jQuery('.nazar-settings input, .nazar-settings textarea').on('keyup', function() {
        previewValue();
    });
    jQuery('.nazar-settings input, .nazar-settings textarea').on('change', function() {
        previewValue();
    });
    jQuery('.nazar-settings input, .nazar-settings textarea').on('keypress', function() {
        previewValue();
    });
    jQuery('.nazar-settings input, .nazar-settings textarea').on('keydown', function() {
        previewValue();
    });
});

function previewValue() {
    var firstName = jQuery("input[name='profile_first_name']").val();
    var lastName = jQuery("input[name='profile_last_name']").val();
    var name = firstName + ' ' + lastName;
    var description = jQuery("textarea[name='profile_description']").val();
    var picture = jQuery("#profile_picture").val();
    var twitter = jQuery("input[name='profile_twitter']").val();
    var instagram = jQuery("input[name='profile_instagram']").val();
    var facebook = jQuery("input[name='profile_facebook']").val();
    var google = jQuery("input[name='profile_google']").val();
    var github = jQuery("input[name='profile_github']").val();
    var linkedin = jQuery("input[name='profile_linkedin']").val();

    jQuery("#profile-picture").attr('src', picture);
    jQuery("#profile-name").html(name);
    jQuery("#profile-description").html(description);
    if (twitter !== '') {
        jQuery("#profile-socials a i[class*='twitter']").parent().remove();
        jQuery("#profile-socials").unbind().append('<a href=""><span class="fa-stack fa-lg twitter-square social-icon"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x profile-social-icon"></i></span></a>');
        jQuery("#profile-socials a i[class*='twitter']").parent().attr('href', twitter);
    } else jQuery("#profile-socials a i[class*='twitter']").parent().remove();
    if (instagram !== '') {
        jQuery("#profile-socials a i[class*='instagram']").parent().remove();
        jQuery("#profile-socials").unbind().append('<a href=""><span class="instagram-square social-icon"><i class="fa fa-instagram fa-2x profile-social-icon"></i></span></a>');
        jQuery("#profile-socials a i[class*='instagram']").parent().attr('href', instagram);
    } else jQuery("#profile-socials a i[class*='instagram']").parent().remove();
    if (facebook !== '') {
        jQuery("#profile-socials a i[class*='facebook']").parent().remove();
        jQuery("#profile-socials").unbind().append('<a href=""><span class="fa-stack fa-lg facebook-square social-icon"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x profile-social-icon"></i></span></a>');
        jQuery("#profile-socials a i[class*='facebook']").parent().attr('href', facebook);
    } else jQuery("#profile-socials a i[class*='facebook']").parent().remove();
    if (google !== '') {
        jQuery("#profile-socials a i[class*='google']").parent().remove();
        jQuery("#profile-socials").unbind().append('<a href=""><span class="fa-stack fa-lg google-square social-icon"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-google-plus fa-stack-1x profile-social-icon"></i></span></a>');
        jQuery("#profile-socials a i[class*='google']").parent().attr('href', google);
    } else jQuery("#profile-socials a i[class*='google']").parent().remove();
    if (github !== '') {
        jQuery("#profile-socials a i[class*='github']").parent().remove();
        jQuery("#profile-socials").unbind().append('<a href=""><span class="fa-stack fa-lg github-square social-icon"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-github fa-stack-1x profile-social-icon"></i></span></a>');
        jQuery("#profile-socials a i[class*='github']").parent().attr('href', github);
    } else jQuery("#profile-socials a i[class*='github']").parent().remove();
    if (linkedin !== '') {
        jQuery("#profile-socials a i[class*='linkedin']").parent().remove();
        jQuery("#profile-socials").unbind().append('<a href=""><span class="fa-stack fa-lg linkedin-square social-icon"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-linkedin fa-stack-1x profile-social-icon"></i></span></a>');
        jQuery("#profile-socials a i[class*='linkedin']").parent().attr('href', linkedin);
    } else jQuery("#profile-socials a i[class*='linkedin']").parent().remove();
}
