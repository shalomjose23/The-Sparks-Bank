<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Customers/Transfer Money</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/table.css">
        <link rel="stylesheet" type="text/css" href="css/navbar.css">
        <link rel="icon" href="img/bank.png" type="image/x-icon">
        <style type="text/css">
            body{
                background: linear-gradient(135deg, rgba(166, 255, 203, 0.5), rgba(18, 216, 250, 0.8), rgba(166, 255, 203, 0.8));
            }
            button{
                border:none;
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
                text-shadow: 1px 1px 2px grey;
            }
            h2:hover{
                transition: 0.3s;
                transform: scale(1.05);
            }
        </style>
    </head>

    <body>
        <?php
            include 'config.php';
            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn,$sql);
        ?>
        <?php include 'navbar.php'; ?>
        <div class="container">
            <h2 class="text-center pt-4"><b>View Customers/Transfer Money</b></h2>
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                        <table class="table table-hover table-sm table-striped table-condensed table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center py-2">ID</th>
                                    <th scope="col" class="text-center py-2">Name</th>
                                    <th scope="col" class="text-center py-2">E-Mail</th>
                                    <th scope="col" class="text-center py-2">Balance</th>
                                    <th scope="col" class="text-center py-2">Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($rows=mysqli_fetch_assoc($result)){ ?>
                                <tr>
                                    <td class="py-2"><?php echo $rows['ID'] ?></td>
                                    <td class="py-2"><?php echo $rows['Name']?></td>
                                    <td class="py-2"><?php echo $rows['Email']?></td>
                                    <td class="py-2"><?php echo $rows['Balance']?></td>
                                    <td><a href="selecteduserdetail.php?id= <?php echo $rows['ID'] ;?>"> <button type="button" class="btn">Transfer</button></a></td> 
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
    </body>
</html>