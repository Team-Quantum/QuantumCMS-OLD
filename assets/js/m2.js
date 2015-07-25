$(document).ready(function() {
    $(".m2-inventory").each(function(index) {
        $(this).css('width', ($(this).data('m2-width') * 32) + 'px');
        $(this).css('height', ($(this).data('m2-height') * 32) + 'px');

        var width = $(this).data('m2-width');

        var offX = $(this).offset().x;
        var offY = $(this).offset().y;

        // Create hover div
        var hover = $('<div>', { class: 'm2-hover' });
        var title = $('<b>');
        title.text('No title :(');
        hover.append(title);
        $('body').append(hover);

        // Initialise items in inventory
        $(this).find('.m2-item').each(function(index) {
            console.log('item');

            var pos = $(this).data('m2-pos');

            $(this).css('top', Math.floor(pos / width) * 32);
            $(this).css('left', Math.floor(pos % width) * 32);

            $(this).on('mouseover', function() {
                title.text($(this).data('m2-name'));
                hover.css('display', 'block');
            });
            $(this).on('mouseout', function() {
                hover.css('display', 'none');
            });
            $(this).on('mousemove', function(evt) {
                hover.css('left', (evt.pageX + 4) + 'px');
                hover.css('top', (evt.pageY + 4) + 'px');
            })
        });
    });
});