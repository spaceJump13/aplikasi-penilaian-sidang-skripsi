<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tes.css">
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

        <div class="container-lg">
            
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