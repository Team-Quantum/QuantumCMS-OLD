$(document).ready(function() {
    // This is a clean tweak to allow links on tr
    $('tr[data-href]').each(function(index) {
        $(this).on('click', function() { document.location = $(this).data('href'); });
        $(this).mouseover(function() { $(this).css('background-color', '#d9d9d9'); });
        $(this).mouseout(function() { $(this).css('background-color', ''); });
        $(this).css('cursor', 'pointer');
    });
});