<h1 class="text-primary"><i class="fa fa-user-circle" aria-hidden="true"></i> All Sutdent <small class="text-dark">Statics Overview<small></h1>
<ol class="breadcrumb">
    <li class="active size1"><a class="text-primary  mr-4" href="index.php?page=dashbord"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
    <li class="active size1 "><i class="fa fa-user-circle" aria-hidden="true"></i> All Sutdent</li>
</ol>
<div class="table-responsive">
<table id="datatable" class="table table-bordered table-hover table-striped size2">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Roll</th>
<th>Class</th>
<th>City</th>
<th>Contact</th>
<th>Photo</th>
<th>Action</th>
</tr>
</thead>
<tbody>

        <?php
                require_once 'dbcon.php';
                $usrname = $_SESSION['user_login'];
            $db_info = mysqli_query($dbconn,"SELECT * FROM `studen_info` WHERE `username`='$usrname'");
            while ($row = mysqli_fetch_assoc($db_info)){


        ?>







<tr>
<td><?php echo $row['id'];?></td>
<td><?php echo ucwords($row['name']);?></td>
<td><?php echo $row['roll'];?></td>
<td><?php echo $row['class'];?></td>
<td><?php echo ucwords($row['city']);?></td>
<td><?php echo $row['p_contact'];?></td>
<td><img style="width:80px;" src="student_photos/<?php echo $row['photo'];?>" alt=""></td>
<td>
<a class="bg-warning text-light px-1" href="index.php?page=update_student&id=<?php echo base64_encode($row['id']);?>"><i class="fa fa-pencil"></i> Edit</a><br><hr>
<a class="bg-danger text-light px-1 " href="delete_student.php?id=<?php echo base64_encode($row['id']);?>"><i class="fa fa-trash"></i>Delete</a>

</td>
</tr>

<?php
            }
            ?>






</tbody>
</table>

</div>
