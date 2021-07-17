<?php
    include 'config.php';
    if(isset($_POST['submit']))
    {
        $from = $_GET['id'];
        $to = $_POST['to'];
        $amount = $_POST['amount'];

        $sql = "SELECT * from users where id=$from";
        $query = mysqli_query($conn,$sql);
        $sql1 = mysqli_fetch_array($query); 

        $sql = "SELECT * from users where id=$to";
        $query = mysqli_query($conn,$sql);
        $sql2 = mysqli_fetch_array($query);

        if(($amount) < 0)  
            $err_msg="Negative values cannot be transferred";
        else if($amount > $sql1['Balance']) 
            $err_msg="Insufficient Balance";
        else if($amount == 0)
            $err_msg="Zero value cannot be transferred";
        else
        {
            $newbalance = $sql1['Balance'] - $amount;
            $sql = "UPDATE users set balance=$newbalance where id=$from";
            mysqli_query($conn,$sql);

            $newbalance = $sql2['Balance'] + $amount;
            $sql = "UPDATE users set balance=$newbalance where id=$to";
            mysqli_query($conn,$sql);

            $sender = $sql1['Name'];
            $receiver = $sql2['Name'];
            $sql = "INSERT INTO transaction(`Sender`, `Receiver`, `Balance`) VALUES ('$sender','$receiver','$amount')";
            $query=mysqli_query($conn,$sql);

            if($query)
                $suc_msg="Transaction Successful";
            $newbalance=0;
            $amount=0;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Transaction</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/table.css">
        <link rel="stylesheet" type="text/css" href="css/navbar.css">
        <link rel="icon" href="img/bank.png" type="image/x-icon">
        <style type="text/css">
            body{
                background: linear-gradient(135deg, rgba(166, 255, 203, 0.5), rgba(18, 216, 250, 0.8), rgba(166, 255, 203, 0.8));
            }
            button{
                border-radius: 8px;
                background: rgba(166, 255, 203, 1);
                box-shadow: 2px 2px 5px #737373;
            }
            button:hover{
                background-color:#777E8B;
                transform: scale(1.1);
                transition: 0.3s;
                color:white;
            }
            h2{
                text-shadow: 1px 1px 2px #787575;
            }
            h2:hover{
                transition: 0.3s;
                transform: scale(1.05);
            }
            .card{
                width:50%; 
                background: linear-gradient(135deg, rgba(18, 216, 250, 0.1), rgba(18, 216, 250, 0.2), rgba(166, 255, 203, 0.9)); 
                border: 4px solid #f5cb42;
                border-radius: 8px;
                padding: 8px;
                box-shadow: 0px 0px 5px #737373;
                height: 300px;
            }
            p{
                text-shadow: 1px 1px 2px #787575;
            }
        </style>
    </head>

    <body>
        <?php include 'navbar.php'; ?>
        <div class="container">
            <?php
                if(isset($err_msg))
                {
                    echo '<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">'
                            .$err_msg.
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                          </div>';
                }
                if(isset($suc_msg))
                {
                    echo '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">'
                            .$suc_msg.
                            '</div>';
                    header( "refresh:4;url=customers.php" );
                }
            ?>
            <h2 class="text-center pt-4"><b>Transaction</b></h2>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  users where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <br>
            <table class="table table-striped table-condensed table-bordered">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Balance</th>
                </tr>
                <tr>
                    <td class="py-2"><?php echo $rows['ID'] ?></td>
                    <td class="py-2"><?php echo $rows['Name'] ?></td>
                    <td class="py-2"><?php echo $rows['Email'] ?></td>
                    <td class="py-2"><?php echo $rows['Balance'] ?></td>
                </tr>
            </table>
            <br>
            <form method="post" name="tcredit" class="tabletext">
                <div class="card m-auto" style=>
                    <div class="card-body">
                        <p>Transfer To:
                            <select name="to" class="form-control shadow rounded" required>
                                <option value="" disabled selected>Select a Receiver</option>
                                <?php
                                    include 'config.php';
                                    $sid=$_GET['id'];
                                    $sql = "SELECT * FROM users where id!=$sid";
                                    $result=mysqli_query($conn,$sql);   
                                    if(!$result)
                                    {
                                        echo "Error ".$sql."<br>".mysqli_error($conn);
                                }
                                    while($rows = mysqli_fetch_assoc($result)) {
                                ?>
                                <option class="table" value="<?php echo $rows['ID'];?>">
                                    <?php echo $rows['Name'] ;?> (Balance: 
                                    <?php echo $rows['Balance'] ;?> ) 
                                </option>
                                <?php } ?>
                            </select>
                        </p>
                        <br>
                        <p>Amount:
                            <input type="number" class="form-control shadow rounded" name="amount" required>
                        </p>
                        <div class="text-center" >
                            <button class="btn mt-3" name="submit" type="submit" id="myBtn">Transfer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>