<?php
function lang($phase)
{
    static $lang = array(
        'Home_Admin' => 'Admin Area',
        'CATAGRIOES'  => 'Categories',
        'MEMBER' =>'MEBER',
        'COMMENT' => 'Comments',
        'STASTAISIC' =>'Stastic',
        "LOGS" =>'LOGS',
        "ITEMS" => 'Items'
    );
    return $lang[$phase];
}
?>