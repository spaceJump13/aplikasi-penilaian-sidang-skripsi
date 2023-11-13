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

        <!-- <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Active</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul> -->

    <label for="">Masukkan Angka</label>
    <input type="number" id="angka"><br>

    <button type="submit" class="btn btn-primary" id="hitung">Hitung</button>
    <div id="showresult" style="display: none;" >
        <h5 id="result">Hasil: </h5>
    </div>



    <!-- <div class="container-satu">
        <div class="kolom-utama">
            <h2>Judul Artikel</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis repudiandae voluptatibus exercitationem modi facilis repellendus minus fuga voluptas ab, pariatur sint a magni! Omnis, alias.</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo, cum, repellendus dolorem aperiam, asperiores aliquam nostrum magni maiores debitis aliquid soluta odio ipsa assumenda natus earum nisi exercitationem. Quam, accusamus.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique quod provident assumenda dolore impedit expedita deleniti sint eveniet. Vel sit consequatur blanditiis tenetur, pariatur vero dicta! Deleniti ab ratione numquam!</p>
        </div>
        <div class="sidebar-satu">
            <h3>Sidebar 1</h3>
            <ul>
                <li><a href="">Link 1</a></li>
                <li><a href="">Link 2</a></li>
                <li><a href="">Link 3</a></li>
                <li><a href="">Link 4</a></li>
                <li><a href="">Link 5</a></li>
            </ul>
        </div>
        <div class="sidebar-dua">
            <h3>Sidebar 2</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore error iure quibusdam dolor consequatur in!</p>
        </div>
    </div>

    <div class="container-dua">
        <div class="kotak">
            <h4>agujv</h4>
        </div>
    </div> -->
</body>
<script>
    $(document).ready(function(){
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