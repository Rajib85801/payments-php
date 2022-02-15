<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Checkout</title>

    <style>
      .formGroup {
          border: 1px solid #c3c3c3;
          padding: 8px;
      }
    </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">PayMents GateWay</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5 pt-5">
      <div class="row">
          <div class="col-md-5 mx-auto">
            <form method="post" action="php/checkout.php" id="form">
              <div class="form-group">
                <input type="text" class="form-control rounded-0" name="cardName" placeholder="Card Name">
              </div>
              <div class="form-group formGroup">
                <div id="card_number"></div>
              </div>



              <div class="row ">
                <div class="col-md-6">
                  <div class="form-group formGroup">
                    <div id="exp"></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group formGroup">
                    <div id="cvc"></div>
                  </div>
                </div>
              </div>

              <input type="hidden" name="token" id="token">

              <button type="submit" class="btn btn-info btn-block w-100 rounded-0 mt-3" name="submit">Pay Now $20</button>
            </form>
          </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://js.stripe.com/v3/"></script>

    <script type="text/javascript">
      const form = document.getElementById("form");
      const stripe = Stripe('pk_test_51JZah9Gk6raBaGt9PBWpW8uWd4MUWiTeaGG1ASoHhlkZ2AOkbtE4VFxaB2wNPoi3xX7KHprWHk77PkTWQQczXTsU00U7By8T26');
      const elements = stripe.elements();

      const cardNumber = elements.create('cardNumber',{
        style: {
          base: {
            iconColor: '#c4f0ff',
            color: '#666',
            fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
            fontSize: '15px',
          },
          invalid: {
            iconColor: 'red',
            color: 'red',
          },
          complete: {
            color: 'green',
          }
        },
      });
      cardNumber.mount("#card_number");
      const cardExpiry = elements.create('cardExpiry',{
        style: {
          base: {
            iconColor: '#c4f0ff',
            color: '#666',
            fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
            fontSize: '15px',
          },
          invalid: {
            iconColor: 'red',
            color: 'red',
          },
        },
      });
      cardExpiry.mount("#exp");
      const cardCvc = elements.create('cardCvc',{
        style: {
          base: {
            iconColor: '#c4f0ff',
            color: '#666',
            fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
            fontSize: '15px',
          },
          invalid: {
            iconColor: 'red',
            color: 'red',
          },
        },
      });
      cardCvc.mount("#cvc");


      form.addEventListener("submit", (event) => {
        event.preventDefault();



        stripe.createToken(cardNumber).then(function(result){
          console.log(result)
        })

      })

    </script>


  </body>
</html>
