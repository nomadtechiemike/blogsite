$(document).on('ready', function(){
    $('.arrow-submenu').click(function() {
      $('.toggle-sidebar').toggleClass('sidebar2').toggle();
      $('#toggle-submenu-right').toggle();
    });

    $('#form-filters input:checkbox[data-form=post_type]').click(function() {
      var form = $('#form-filters');
      var post_types = form.find('input:checkbox[data-form=post_type]:checked')
        .map(function(){ return this.value; }).get().join();
      form.find('input:hidden[name=t]').val(post_types);
      form.submit();
    });
});
