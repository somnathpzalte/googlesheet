<html>
    <head>
        <title>Google Sheet With PHP</title>
        <link rel="stylesheet" href="assets/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <?php include('googleinit.php');?>
        <div class="container-fluid">
            <center><h3>Google Sheet With PHP</h3></center>
            <button class="btn btn-primary pull-right" id="btn-add">Add New Record</button>
            <p>&nbsp;</p>
            
            <form method="POST" action="index.php" style="display:none;" id="userform">
            <div class="row">
                <div class="col-sm-3">
                    <input class="form-control" name="name" placeholder="Name" required/>
                </div>
                <div class="col-sm-3">
                    <input type="email" class="form-control" name="email" placeholder="Email Id" required/>
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="mobile" placeholder="Mobile Number" maxlength="10" minlength="10" required/>
                </div>
                <div class="col-sm-3">
                    <input type="submit" class="btn btn-primary" value="Submit" name="submit"/>
                    <input type="button" class="btn btn-warning" value="Cancel" id="btn-cancel"/>
                </div>
            </div>
            </form>
            <p>&nbsp;</p>
            <table class="table table-bordered">
                <tr>
                    <th>Sr.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>Site Visit Date</th>
                    <th>Site Visit Time</th>
                </tr>
                <!-- Get Api -->
                <?php $range      = "congress!A2:E100";
                $response   = $service->spreadsheets_values->get($spreadsheetId,$range);
                $values     = $response->getValues();
                foreach($values as $key=>$row){
                    echo "<tr>";
                    echo "<td>".($key+1)."</td>";
                    echo "<td>".$row[0]."</td>";
                    echo "<td>".$row[1]."</td>";
                    echo "<td>".$row[2]."</td>";
                    echo "<td>".$row[3]."</td>";
                    echo "<td>".$row[4]."</td>";
                    echo "</tr>";
                }
                
                ?>
            </table>
        </div>

        <script src="assets/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>
<script src="assets/custom.js"></script>

    </body>
</html>



