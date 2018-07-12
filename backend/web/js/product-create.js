$('.category-create-button').click(function(e) {
    $.ajax({
        url: '/category/create-ajax',
        type: 'post',
        data: $(e.target.closest('.category-create-form-ajax')).serialize(),
        success: function() {
            console.log('success');
        },
        error: function() {
            console.log('fail');
        }
    });
});
