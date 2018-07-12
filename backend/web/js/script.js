$('[data-pjax]').click(function(e){
    e.preventDefault();
    $('#pModal').modal('show')
        .find('.modal-content')
        .load($(this).attr('href'));
});