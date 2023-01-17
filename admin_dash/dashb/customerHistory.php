<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Customer History</li>
        </ol>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Customer History</div>
                <div class="panel-body">
                    <?php
                    if (isset($_GET['deleteError'])) {
                        echo "<div class='alert alert-danger'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error on Deletion !
                            </div>";
                    }
                    if (isset($_GET['deleteSuccess'])) {
                        echo "<div class='alert alert-success'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Deleted Successfully !
                            </div>";
                    }
                    ?>
                    <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%" id="rooms">
                        <thead>
                        <tr>
                            <th>Sno.</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Booking_Date</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th>Room Number</th>
                            <th>Total Price</th>
                            <th>Remaining Price</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "SELECT * FROM booking NATURAL JOIN customer NATURAL JOIN room";
                        $result = mysqli_query($connection, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $num = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
        
                                $num++;
                                  ?>
                                <tr>
                                    <td><?php echo $num ;?></td>
                                    <td><?php echo $row['customer_name'] ?></td>
                                    <td><?php echo $row['contact_no'] ?></td>
                                    <td><?php echo $row['address'] ?></td>
                                    <td><?php echo $row['booking_date'] ?></td>
                                    <td><?php echo $row['check_in'] ?></td>
                                    <td><?php echo $row['check_out'] ?></td>
                                    <td><?php echo $row['room_no'] ?></td>
                                    <td><?php echo $row['total_price'] ?></td>
                                    <td><?php echo $row['remaining_price'] ?></td>
                                
                                    <td>
                                        <a href=""
                                           class="btn btn-danger" style="border-radius:60px;" onclick="return confirm('Are you Sure?')"><i
                                                class="fa fa-trash" alt="delete"></i></a>
                                    </td>
                            

                                  
                                </tr> 
                            <?php }
                        } else {
                            echo "No Rooms";
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


    <div class="row">
        <div class="col-sm-12">
        <p class="back-link">Developed By &hearts;</p>
        </div>
    </div>

</div>    <!--/.main-->