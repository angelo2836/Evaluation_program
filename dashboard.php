<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="../Evaluation_program/fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/css/fontawesome.css">
    <link rel="stylesheet"
        href="../Evaluation_program/fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Document</title>
</head>

<body>
    <div class="container-fluid nav-width">

        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Student's Faculty Evaluation</a>
                </div>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><i class="fa-solid fa-house"></i>home</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </nav>

        <div class="content container">

            <div class="navigation-buttons ">
                <button type="button" class="btn btn-add-instructor" data-toggle="modal" data-target="#addModal">Add
                    Instructor <i class="fa-solid fa-plus"></i></button>
                <input type="text" placeholder="Search..." class="input-search">
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="padding-20">Instructor</th>
                        <th class="rate-col padding-20">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="padding-20">Angelo Salvacion</td>
                        <td class="text-center padding-20"><i class="fa-solid fa-list-check"></i> <i
                                class="fa-solid fa-pencil" data-toggle="modal" data-target="#editModal"></i></td>
                    </tr>
                    <tr>
                        <td class="padding-20">Angelo Salvacion</td>
                        <td class="text-center padding-20"><i class="fa-solid fa-list-check"></i> <i
                                class="fa-solid fa-pencil"></i></td>
                        </td>
                    </tr>
                </tbody>

            </table>

        </div>

        <div class="container">
            <form action="rating.php" method="POST">
                <label for="instructor">Instructor:</label>
                <select name="instructor" id="instructor">

                    <?php
                $conn = mysqli_connect('localhost:3306', 'root', '', 'evaluation');
                $sql = "SELECT * FROM instructor ";
                $retval = mysqli_query($conn, $sql);

                if (mysqli_num_rows($retval) > 0) 
                {
                    while ($row = mysqli_fetch_assoc($retval))
                    {
                        $ins_id = $row['ID'];
                        $instructor_name = $row['instructor'];
                        ?>
                    <option value="<?php echo $ins_id  ?>"><?php echo $instructor_name  ?></option><?php
                    }
                }
            ?>
                    <input type="submit">
            </form>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title" id="exampleModalLabel">Add Instructor</h5>
                    </div>
                    <div><button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button></div>
                </div>
                <div class="modal-body">
                    <form action="" class="form-inline">
                        <input type="text" placeholder="Name of Instructor" class="input-instructor">
                        <button type="button" class="btn btn-save-instructor">Save</button>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Instructor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" placeholder="Name of Instructor" class="input-instructor">
                    <button type="button" class="btn btn-update-instructor">Update</button>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <script src="../Evaluation_program/fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/js/fontawesome.js">
    </script>
    <script src="../Evaluation_program/fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/js/all.js"></script>

</body>

</html>