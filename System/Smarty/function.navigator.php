<?php

function smarty_function_navigator($params, Smarty_Internal_Template $template) {
    $current = $params['current'];
    $max = $params['max'];

    echo '<ul class="pagination" style="float: right">';
    echo '<li>';
    if($current <= 1) {
        echo '<a href="#" aria-label="Previous">';
    } else {
        echo '<a href="?page=' . ($current-1) . '" aria-label="Previous">';
    }
    echo '<span aria-hidden="true">&laquo;</span>';
    echo '</a>';
    echo '</li>';

    for($i = $current - 5; $i < $current + 5; $i++) {
        if($i < 1 || $i > $max) continue;

        echo '<li';
        if($i == $current)
            echo ' class="active"';

        echo '><a href="?page=' . $i . '">' . $i . '</a></li>';
    }

    echo '<li>';
    if($current >= $max - 1) {
        echo '<a href="#" aria-label="Next">';
    } else {
        echo '<a href="?page=' . ($current+1) . '" aria-label="Next">';
    }
    echo '<span aria-hidden="true">&raquo;</span>';
    echo '</a>';
    echo '</li>';
    echo '</ul>';
}