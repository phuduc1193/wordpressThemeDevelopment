var $ = jQuery.noConflict();

$(document).ready(function() {
    $("#contextual-help-link").click(function() {
        $("#contextual-help-wrap").css("cssText", "display: block !important;");
    });
    $("#show-settings-link").click(function() {
        $("#screen-options-wrap").css("cssText", "display: block !important;");
    });

    var mediaUploader;
    $('#upload-media').on('click', function(e) {
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

        mediaUploader.on('select', function() {
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#profile_picture').val(attachment.url).trigger('change');
        });

        mediaUploader.open();
    });

    $('#remove-media').on('click', function(e) {
        e.preventDefault();
        var confirmation = confirm("Are you sure you want to remove your Profile picture?");
        if (confirmation == true) {
            $('#profile_picture').val('').trigger('change');
            $('.nazar-general-form').submit();
        } else {
            console.log("No balls");
        }
    });

    // Binding to preview
    previewValue();
    $('.nazar-settings input, .nazar-settings textarea').on('keyup', function() {
        previewValue();
    });
    $('.nazar-settings input, .nazar-settings textarea').on('change', function() {
        previewValue();
    });
    $('.nazar-settings input, .nazar-settings textarea').on('keypress', function() {
        previewValue();
    });
    $('.nazar-settings input, .nazar-settings textarea').on('keydown', function() {
        previewValue();
    });
});

function previewValue() {
    var firstName = $("input[name='profile_first_name']").val();
    var lastName = $("input[name='profile_last_name']").val();
    var name = firstName + ' ' + lastName;
    var description = $("textarea[name='profile_description']").val();
    var pictureLink = $("#profile_picture").val();
    var twitter = $("input[name='profile_twitter']").val();
    var instagram = $("input[name='profile_instagram']").val();
    var facebook = $("input[name='profile_facebook']").val();
    var google = $("input[name='profile_google']").val();
    var github = $("input[name='profile_github']").val();
    var linkedin = $("input[name='profile_linkedin']").val();

    $("#profile-picture").attr('src', pictureLink);
    $("#profile-name").html(name);
    $("#profile-description").html(description);
    if (twitter !== '') {
        $("#profile-socials a i[class*='twitter']").parent().remove();
        $("#profile-socials").unbind().append('<a href=""><span class="fa-stack fa-lg twitter-square social-icon"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x profile-social-icon"></i></span></a>');
        $("#profile-socials a i[class*='twitter']").parent().attr('href', twitter);
    } else $("#profile-socials a i[class*='twitter']").parent().remove();
    if (instagram !== '') {
        $("#profile-socials a i[class*='instagram']").parent().remove();
        $("#profile-socials").unbind().append('<a href=""><span class="instagram-square social-icon"><i class="fa fa-instagram fa-2x profile-social-icon"></i></span></a>');
        $("#profile-socials a i[class*='instagram']").parent().attr('href', instagram);
    } else $("#profile-socials a i[class*='instagram']").parent().remove();
    if (facebook !== '') {
        $("#profile-socials a i[class*='facebook']").parent().remove();
        $("#profile-socials").unbind().append('<a href=""><span class="fa-stack fa-lg facebook-square social-icon"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x profile-social-icon"></i></span></a>');
        $("#profile-socials a i[class*='facebook']").parent().attr('href', facebook);
    } else $("#profile-socials a i[class*='facebook']").parent().remove();
    if (google !== '') {
        $("#profile-socials a i[class*='google']").parent().remove();
        $("#profile-socials").unbind().append('<a href=""><span class="fa-stack fa-lg google-square social-icon"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-google-plus fa-stack-1x profile-social-icon"></i></span></a>');
        $("#profile-socials a i[class*='google']").parent().attr('href', google);
    } else $("#profile-socials a i[class*='google']").parent().remove();
    if (github !== '') {
        $("#profile-socials a i[class*='github']").parent().remove();
        $("#profile-socials").unbind().append('<a href=""><span class="fa-stack fa-lg github-square social-icon"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-github fa-stack-1x profile-social-icon"></i></span></a>');
        $("#profile-socials a i[class*='github']").parent().attr('href', github);
    } else $("#profile-socials a i[class*='github']").parent().remove();
    if (linkedin !== '') {
        $("#profile-socials a i[class*='linkedin']").parent().remove();
        $("#profile-socials").unbind().append('<a href=""><span class="fa-stack fa-lg linkedin-square social-icon"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-linkedin fa-stack-1x profile-social-icon"></i></span></a>');
        $("#profile-socials a i[class*='linkedin']").parent().attr('href', linkedin);
    } else $("#profile-socials a i[class*='linkedin']").parent().remove();
}
