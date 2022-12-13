<?php 
function get_all_todos()
{
    $get_all_tasks_query = "SELECT id, comment, user, date_added, checked FROM comments WHERE checked = 0;";
    $response = $GLOBALS['conn']->query($get_all_tasks_query);
    if ($response && $response->num_rows > 0) {
        echo '<ul id="my-list">';
        while ($row = $response->fetch_array()) {
            echo "<li>".'<input type="checkbox" name="checkBoxList[]" value="'.$row["id"].'"><span>'.$row["comment"].' written by '.$row["user"]."</span></li>";
        }
        echo '</ul>';
    } else {
        echo '<h2>Your Comments list is empty!</h2>';
    }
}
?>
