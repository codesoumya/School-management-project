<h3 class="text-center">Students Data List</h3>
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
</tr>

<?php
            }
            ?>






</tbody>
</table>

</div>
