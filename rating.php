<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

$instructor_id = $_POST['instructor'];

$conn2 = mysqli_connect('localhost:3306', 'root', '','evaluation');
                    $sql2 = "SELECT * FROM rating WHERE instructor_id=$instructor_id";
                    $retval2 = mysqli_query($conn2, $sql2);

                    if(mysqli_num_rows($retval2) > 0)
                    {  
                        echo "Rated!";
                    }


else{

        ?>
        <form action="save_rating.php" method="POST">
            <input type="hidden" name="ins_id" value= "<?php echo $instructor_id;?>">
            <?php
                    $conn = mysqli_connect('localhost:3306', 'root', '','evaluation');
                    $sql = "SELECT * FROM sub_title";
                    $retval = mysqli_query($conn, $sql);
                    
                    if(mysqli_num_rows($retval) > 0)
                    {  
                        $temp = 1;
                        $temp2 = 1;
                        while($row = mysqli_fetch_assoc($retval))
                        {  
                            $eval_title_id = $row['eval_title_id'];
                            $sub_title_id = $row['ID'];
                        
                            $sql1 = "SELECT * FROM eval_title where ID = $eval_title_id";
                            $retval1 = mysqli_query($conn, $sql1);
                            $row1 = mysqli_fetch_assoc($retval1);
                                $title = $row1['title'];
                                    ?><strong><?php echo $title;?>  </strong><br>
                                    <?php
                                $sub_title = $row['sub_title'];
                                echo  $sub_title ?>     
                                    <input type="radio" value = "1" name="<?php echo 'title'."_".$sub_title_id; ?>" required>1
                                    <input type="radio" value = "2" name="<?php echo 'title'."_".$sub_title_id; ?>" required>2
                                    <input type="radio" value = "3" name="<?php echo 'title'."_".$sub_title_id; ?>" required>3
                                    <input type="radio" value = "4" name="<?php echo 'title'."_".$sub_title_id; ?>" required>4
                                    <input type="radio" value = "5" name="<?php echo 'title'."_".$sub_title_id; ?>" required>5   
                                    <br> <?php 
                        }
                    }
        
            ?> 
            <input type="submit">
        </form>

<?php
}
?>


</body>
</html>