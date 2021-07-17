<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="icon" href="img/bank.png" type="image/x-icon">
    <title>The Sparks Bank</title>
  </head>

  <body>
    <?php include 'navbar.php'; ?>
    <div class="container-fluid">
      <div class="row intro py-1">
        <div class="col-sm-12 col-md">
          <div class="heading text-center my-5">
            <h3>Welcome to</h3>
            <h1>THE SPARKS BANK</h1>
          </div>
        </div>
        <div class="col-sm-12 col-md img text-center">
          <img class="im" src="img/bank.png" class="img-fluid pt-2">
        </div>
      </div>     
      <br>
      <br>
      <h3 class="action"><b>CHOOSE AN ACTION</b></h3>
      <div class="column activity text-center">
        <div class="col-md act">
          <br>
          <a href="customers.php"><button>View Customers</button></a>
        </div>
        <div class="col-md act">
          <br>
          <a href="transactionhistory.php"><button>View Transaction History</button></a>
        </div>
      </div>
    </div>
    <footer class="text-center mt-5 py-2">
      <p>&#169; A Project by <b>SHALOM JOSE</b> for Graduate Rotational Internship Program <br> </p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>