$(document).ready(function() {
    $(".m2-inventory").each(function(index) {
        $(this).css('width', ($(this).data('m2-width') * 32) + 'px');
        $(this).css('height', ($(this).data('m2-height') * 32) + 'px');

        var width = $(this).data('m2-width');

        // Initialise items in
        $(this).find('.m2-item').each(function(index) {
            console.log('item');

            var pos = $(this).data('m2-pos');

            $(this).css('top', Math.floor(pos / width) * 32);
            $(this).css('left', Math.floor(pos % width) * 32);
        });
    });
});