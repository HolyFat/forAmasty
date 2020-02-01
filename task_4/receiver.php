<?php
ini_set('display_errors', 1);
include_once('simple_html_dom.php');
?>


<?php
$search = '';
$host = 'https://terrikon.com';
$checker = 'not found';

if (isset($_POST['team_name'])) {
    $search = $_POST['team_name'];
    $tables = file_get_html($host . '/football/italy/championship/archive');

    /**
     * find all championships
     */

    foreach ($tables->find('.maincol .news a') as $a) {

        $champioship_name = $a->plaintext;
        $getscore = file_get_html($host . $a->href);
        $table = $getscore->find('table.colored.big');

        /**
         * find command name in table cells and get position in championship from previous cell
         */

        foreach ($table[0]->find('td a') as $tr) {

            if (mb_strtolower($tr->plaintext) === $search) {
                $checker = "found";
                echo "Команда " . $tr->plaintext . " заняла " . $tr->parent()->prev_sibling()->plaintext . " место во время сезона " . $a->plaintext." <br>";
            }

        }

        $getscore->clear();

    }
    if($checker==='not found'){
        echo "Команда не найдена";
    }

    $tables->clear();
    $search = '';
    unset($html);
}
?>


