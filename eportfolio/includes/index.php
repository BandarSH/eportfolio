<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link type="text/css" rel="stylesheet" href="./style.css">
  <title>My Comments</title>
</head>
  <body>
    <?php 
    // enable mysql error reporting for debugging only
    // $driver = new mysqli_driver();
    // $driver->report_mode = MYSQLI_REPORT_ALL;
    require_once('./connection.php');
    require('./insert.php');
    require('./get.php');
    require('./update.php');
    require('./delete.php');
    
    // if the form is submitted by this page
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        // check which button submitted the POST request? add, delete, or mark as done
        if(isset($_POST['add_btn'])) {
            // insert a new todo item
            insert_task($_POST["new_task"],$_POST["User"]);
        }
        else if (isset($_POST['mark_done_btn'])) {
            // When a checkbox is selected, update the db to mark it as done
            if(!empty($_POST['checkBoxList'])) {
                mark_as_done($_POST['checkBoxList']);
            }
        }
        else if (isset($_POST['delete_btn'])) {
            // When a checkbox is selected, delete it in the db
            if(!empty($_POST['checkBoxList'])) {
                delete_item($_POST['checkBoxList']);
            }
        }

    }
?>

    <div id="content">
        <h1>My comments</h1>
        <form method="post" id="addForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
           <input type="text" name="new_task" id="new-item" placeholder="Comment" />
           <input type="text" name="User" id="new-item" placeholder="Name" />

           <button name="add_btn" id="add-btn">Add</button>
           <div class="buttons">
              <button type="submit" class="btn" name="delete_btn">Delete</button>
              <button type="submit" class="btn" name="mark_done_btn">Mark as checked</button>
           </div>
           <?php get_all_todos();?>
        </form>
    </div>
  </body>
</html>
