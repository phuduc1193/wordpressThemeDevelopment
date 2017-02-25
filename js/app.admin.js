jQuery(document).ready(function() {
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
  var twitter = jQuery("input[name='profile_twitter']").val();
  var instagram = jQuery("input[name='profile_instagram']").val();
  var facebook = jQuery("input[name='profile_facebook']").val();
  var google = jQuery("input[name='profile_google']").val();
  var github = jQuery("input[name='profile_github']").val();
  var linkedin = jQuery("input[name='profile_linkedin']").val();

  jQuery("#profile-name").html(name);
  jQuery("#profile-description").html(description);
  if(twitter !== '') {
    jQuery("#profile-socials a i[class*='twitter']").parent().remove();
    jQuery("#profile-socials").unbind().append('<a href=""><i class="fa fa-3x fa-twitter-square profile-social-icon"></i></a>');
    jQuery("#profile-socials a i[class*='twitter']").parent().attr('href', twitter);
  } else jQuery("#profile-socials a i[class*='twitter']").parent().remove();
  if(instagram !== '') {
    jQuery("#profile-socials a i[class*='instagram']").parent().remove();
    jQuery("#profile-socials").unbind().append('<a href=""><i class="fa fa-3x fa-instagram profile-social-icon"></i></a>');
    jQuery("#profile-socials a i[class*='instagram']").parent().attr('href', instagram);
  } else jQuery("#profile-socials a i[class*='instagram']").parent().remove();
  if(facebook !== '') {
    jQuery("#profile-socials a i[class*='facebook']").parent().remove();
    jQuery("#profile-socials").unbind().append('<a href=""><i class="fa fa-3x fa-facebook-square profile-social-icon"></i></a>');
    jQuery("#profile-socials a i[class*='facebook']").parent().attr('href', facebook);
  } else jQuery("#profile-socials a i[class*='facebook']").parent().remove();
  if(google !== '') {
    jQuery("#profile-socials a i[class*='google']").parent().remove();
    jQuery("#profile-socials").unbind().append('<a href=""><i class="fa fa-3x fa-google-plus-square profile-social-icon"></i></a>');
    jQuery("#profile-socials a i[class*='google']").parent().attr('href', google);
  } else jQuery("#profile-socials a i[class*='google']").parent().remove();
  if(github !== '') {
    jQuery("#profile-socials a i[class*='github']").parent().remove();
    jQuery("#profile-socials").unbind().append('<a href=""><i class="fa fa-3x fa-github-square profile-social-icon"></i></a>');
    jQuery("#profile-socials a i[class*='github']").parent().attr('href', github);
  } else jQuery("#profile-socials a i[class*='github']").parent().remove();
  if(linkedin !== '') {
    jQuery("#profile-socials a i[class*='linkedin']").parent().remove();
    jQuery("#profile-socials").unbind().append('<a href=""><i class="fa fa-3x fa-linkedin-square profile-social-icon"></i></a>');
    jQuery("#profile-socials a i[class*='linkedin']").parent().attr('href', linkedin);
  } else jQuery("#profile-socials a i[class*='linkedin']").parent().remove();
}
