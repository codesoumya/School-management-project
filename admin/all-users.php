<h1 class="text-primary"><i class="fa fa-users" aria-hidden="true"></i> All Users <small class="text-dark"> Show All Users<small></h1>
<ol class="breadcrumb">
    <li class="active size1"><a class="text-primary  mr-4" href="index.php?page=dashbord"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
    <li class="active size1 "><i class="fa fa-users" aria-hidden="true"></i> All Users</li>
</ol>
<div class="table-responsive">
<table id="datatable" class="table table-bordered table-hover table-striped size2">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Username</th>
<th>Password</th>
<th>Photo</th>
</tr>
</thead>
<tbody>

        <?php
                require_once 'dbcon.php';

            $db_info = mysqli_query($dbconn,"SELECT * FROM `users`");
            while ($row = mysqli_fetch_assoc($db_info)){


        ?>







<tr>
<td><?php echo $row['id'];?></td>
<td><?php echo ucwords($row['name']);?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['username'];?></td>
<td>*******</td>
<td><img style="width:80px;" src="student_photos/<?php echo $row['photo'];?>" alt=""></td>
</tr>

<?php
            }
         ?>
</tbody>
</table>
</div>