// accordion-menu
$(function () {
  $('.triangle-btn').click(function () {
    $(this).toggleClass('active');
    if ($(this).hasClass('active')) {
      $('.accordion-menu').addClass('active');
    } else {
      $('.accordion-menu').removeClass('active');
    }
  });
});


// modal
$(function () {
  $('.modalopen').each(function () {
    $(this).on('click', function () {
      $('.modal-main').fadeIn();
      var post = $(this).attr('post');
      var post_id = $(this).attr('post_id');
      $('.edit-post').val(post);
      $('.edit-id').val(post_id);
      return false;
    });

    $('.modal-inner').on('click', function () {
      $('.modal-main').fadeOut();
      return false;
    });
  });
});
