<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Transaction History</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/table.css">
        <link rel="stylesheet" type="text/css" href="css/navbar.css">
        <link rel="icon" href="img/bank.png" type="image/x-icon">
        <style type="text/css">
            body{
                background: linear-gradient(135deg, rgba(166, 255, 203, 0.5), rgba(18, 216, 250, 0.8), rgba(166, 255, 203, 0.8));
            }
            h2{
                text-shadow: 1px 1px 2px grey;
            }
            h2:hover{
                transition: 0.3s;
                transform: scale(1.05);
            }
        </style>
    </head>

    <body>
        <?php include 'navbar.php'; ?>
        <div class="container">
            <h2 class="text-center pt-4"><b>Transaction History</b></h2>
            <br>
            <div class="table-responsive-sm">
                <table class="table table-hover table-striped table-condensed table-bordered">
                    <thead>
                        <tr>
                            
                            <th class="text-center">Sender</th>
                            <th class="text-center">Receiver</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Date & Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include 'config.php';
                            $sql ="select * from transaction";
                            $query =mysqli_query($conn, $sql);
                        while($rows = mysqli_fetch_assoc($query)) 
                        {
                        ?>
                        <tr>
                            <td class="py-2"><?php echo $rows['Sender']; ?></td>
                            <td class="py-2"><?php echo $rows['Receiver']; ?></td>
                            <td class="py-2"><?php echo $rows['Balance']; ?> </td>
                            <td class="py-2"><?php echo $rows['DateTime']; ?> </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>