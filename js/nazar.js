var $ = jQuery.noConflict();

$(document).ready(function(){
  revealPosts();
});

var loading = $('.load-more');
if (loading.length > 0){
  $(window).scroll(function() {
    if($(window).scrollTop() + $(window).height() >= $(document).height()) {
        loading.css('opacity', 1);
        var page = loading.data('page');
        var ajaxURL = loading.data('url');

        $.ajax({
          url: ajaxURL,
          type: 'post',
          data: {
            page: page,
            action: 'nazar_load_more'
          },
          error: function(response) {
            console.log(response);
          },
          success: function(response) {
            loading.data('page', page+1);
            setTimeout(function () {
              $('.nazar-posts-container').append(response);
              loading.css('opacity', 0);
              revealPosts();
            }, 750);
          }
        });
    }
  });
} // endif

function revealPosts() {
  var posts = $('article:not(.reveal)');
  var i = 0;
  setInterval(function() {
    if (i >= posts.length) return false;
    var el = posts[i];
    $(el).addClass('reveal');
    i++;
  }, 200);
}
