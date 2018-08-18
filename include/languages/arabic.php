<?php
function lang($phase)
{
    static $lang = array(
        'MESSAGE' => 'welcom in arabic',
        'ADMIN'  => 'adminstratror in arabic'
    );
    return $lang[$phase];
}
?>