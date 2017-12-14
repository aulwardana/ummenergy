<?php 
include_once('includes/_header.php');
include_once('includes/_top.php');

if ($role == "Administrator")  {
    $prep_stmt_user = 'SELECT id_account, username, email, role, first_name, last_name, date_joined FROM account';
    $stmt_user = $core->dbh->prepare($prep_stmt_user);
} else {
    header ("location:index.php");
    exit();
}

if (isset($_POST['del'])) {
    $idUser = filter_input(INPUT_POST, 'del', FILTER_SANITIZE_NUMBER_INT);
    $prep_stmt_user_del = 'DELETE FROM account WHERE id_account = :idUser LIMIT 1';
    $stmt_user_del = $core->dbh->prepare($prep_stmt_user_del);
    $stmt_user_del->bindParam(':idUser', $idUser, PDO::PARAM_INT);	
    $stmt_user_del->execute();
}

if (isset($_POST['role'], $_POST['idUser'])) {
    $idUser = filter_input(INPUT_POST, 'idUser', FILTER_SANITIZE_NUMBER_INT);
    $dataRole = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);
    $prep_stmt_role_up = 'UPDATE account SET role = :dataRole WHERE id_account = :idUser';
    $stmt_role_up = $core->dbh->prepare($prep_stmt_role_up);
    $stmt_role_up->bindParam(':dataRole', $dataRole);	
    $stmt_role_up->bindParam(':idUser', $idUser);	
    $stmt_role_up->execute();
}
  
?>

        <div id="container" class="row-fluid">
            <?php 
            include_once('includes/_sidebar.php');
            ?>
            <!--BEGIN CONTENT-->
            <div id="main-content">
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span12">
                            <h3 class="page-title">
                                Manage Account
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <i class="icon-home"></i><span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    Microhydro Monitoring<span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    Manage Account<span class="divider-last">&nbsp;</span>
                                </li>
                                <li class="pull-right search-wrap"></li>
                            </ul>
                        </div>
                    </div>

                    <div id="page" class="dashboard">
                        <div class="row-fluid">
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i> Manage Account </h4>
                                    <span class="tools">
                                    <a href="javascript:;" class="icon-chevron-down"></a>
                                    <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body">
                                    <table class="table table-striped table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                            <?php
                                                $stmt_user->execute();
                                                $row = $stmt_user->fetchAll(PDO::FETCH_NUM);
                            
                                                foreach($row as $row){
                                                    echo "<tr> 
                                                            <td>$row[1]</td> 
                                                            <td>$row[2]</td> 
                                                            <td>$row[3]</td>
                                                            <td>
                                                            <a href='#'><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal$row[0]'>Delete</button></a>
                                                            <div class='modal fade' id='exampleModal$row[0]' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'>
                                                                <div class='modal-dialog' role='document'>
                                                                <div class='modal-content'>
                                                                    <div class='modal-header'>
                                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                                                    <h4 class='modal-title' id='exampleModalLabel'>Delete confirmation</h4>
                                                                    </div>
                                                                    <div class='modal-body'>
                                                                    Apakah Anda yakin menghapus user ini?
                                                                    </div>
                                                                    <div class='modal-footer'>
                                                                    <form action='users.php' method='post'>
                                                                        <input type='hidden' name ='del' value='$row[0]'>
                                                                        <button type='submit' class='btn btn-danger'>Yes</button>
                                                                        <button type='button' class='btn btn-primary' data-dismiss='modal'>No</button>
                                                                    </form>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            </td> 
                                                        </tr>";
                                                }
                                            ?>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--FINISH CONTENT-->
        </div>

<?php 
include_once('includes/_footer.php');
?>