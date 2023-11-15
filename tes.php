<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="hover.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <title>Document</title>
    <style>
    .error-message {
      color: red;
    }
  </style>
</head>
<body style="background-color: #ddd; padding-bottom: 2000px">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        
        <div class="container noselect">
            <div class="canvas">
            <div class="tracker tr-1"></div>
            <div class="tracker tr-2"></div>
            <div class="tracker tr-3"></div>
            <div class="tracker tr-4"></div>
            <div class="tracker tr-5"></div>
            <div class="tracker tr-6"></div>
            <div class="tracker tr-7"></div>
            <div class="tracker tr-8"></div>
            <div class="tracker tr-9"></div>
            <div class="tracker tr-10"></div>
            <div class="tracker tr-11"></div>
            <div class="tracker tr-12"></div>
            <div class="tracker tr-13"></div>
            <div class="tracker tr-14"></div>
            <div class="tracker tr-15"></div>
            <div class="tracker tr-16"></div>
            <div class="tracker tr-17"></div>
            <div class="tracker tr-18"></div>
            <div class="tracker tr-19"></div>
            <div class="tracker tr-20"></div>
            <div class="tracker tr-21"></div>
            <div class="tracker tr-22"></div>
            <div class="tracker tr-23"></div>
            <div class="tracker tr-24"></div>
            <div class="tracker tr-25"></div>
            <div id="card">
            <p id="prompt">HOVER OVER :D</p>
              <div class="title">look mom,<br>no JS</div>
              <div class="subtitle">
                mouse hover tracker
              </div>
      
    </div>
  </div>
</div>
        
</body>
<script>
    $(document).ready(function(){
        // Example starter JavaScript for disabling form submissions if there are invalid fields

            (() => {
  'use strict';

  // Fetch the form we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Add an event listener for form submission
  forms.addEventListener('submit', event => {
    // Validate only specific fields
    const valid1 = form.querySelector('#validationCustomUsername');
    const valid2 = form.querySelector('#validationCustom05');

    // Check the validity of the desired fields
    if (!valid1.checkValidity() || !valid2.checkValidity()) {
      // If any of the fields are not valid, prevent form submission
      event.preventDefault();
      event.stopPropagation();
    }

    // Add the 'was-validated' class to the form to apply Bootstrap styling
    form.classList.add('was-validated');
  }, false);
})();

        $('#hitung').on('click', function(){
            var angka = $('#angka').val();
            console.log(angka)

            angka = parseFloat(angka * 0.50);
            console.log(angka)

            $("#result").text("Hasil: " + angka);
            $("#showresult").show();
        })
    })
</script>
</html>