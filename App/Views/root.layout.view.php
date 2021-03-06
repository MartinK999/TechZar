<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechZar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="public/css.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="public/skript.js"></script>

    <link rel="shortcut icon" type="image/jpg" href="public/images_hlavnaStranka/TechZarLogoZalozka.png"/>

</head>


<body>
<div class="row">
    <nav class="navbar navbar-expand-sm bg-white">

        <div class="container-fluid">

            <a class="navbar-brand" href="?c=home">
                <img src="public/images_hlavnaStranka/TechZarNapis.PNG" alt="logo">
                <p>...PC, hardvér bazár</p>
            </a>


            <ul class="navbar-nav gap-2">
                <?php if (\App\Auth::isLogged()) { ?>

                    <p class="vitajte" style="padding-top: 2%">Vitajte, <?php echo $_SESSION['name'] ?>!</p>

                    <li class="nav-item">
                        <a href="?c=profile&a=logout" class="btn btn-danger" role="button">Odhlásiť</a>
                    </li>
                <?php } else { ?>

                    <li class="nav-item">
                        <a href="?c=profile&a=loginForm" class="btn btn-dark" role="button">Prihlásenie</a>
                    </li>

                    <li class="nav-item">
                        <a href="?c=profile&a=registrationForm" class="btn btn-primary" role="button">Registrácia</a>
                    </li>
                <?php } ?>
            </ul>
        </div>

    </nav>
</div>
<div class="row ">
    <div class="col-sm">
        <div class="background" style="background-image: url(public/images_hlavnaStranka/searchBarFilter.jpeg)">
            <div class="post-content">
            <div class="container">
            <div class="form-group">
                <div class="input-group">

                    <input type="text" name="search_text" id="search_text" class="form-control me-2"  placeholder="Tu napíšte, čo hľadáte">
                </div>
                </div>
                <div id="result"></div>
            </div>
            </div>
        </div>
    </div>
</div>


<nav class="navbar navbar-expand-sm justify-content-center">


    <ul class="navbar-nav">
        <?php if (\App\Auth::isLogged()) { ?>
            <li class="nav-item">
                <a class="nav-link" href="?c=home">Domov</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="?c=profile&a=myList">Moje inzeráty</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?c=inzerat&a=inzeratForm">Pridať inzerát</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?c=profile&a=settings">Účet</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?c=home&a=contact">Kontakt</a>
            </li>

        <?php } else { ?>
            <li class="nav-item">
                <a class="nav-link" href="?c=home">Domov</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?c=profile&a=loginForm">Pridať inzerát</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?c=home&a=contact">Kontakt</a>
            </li>
        <?php } ?>
    </ul>


</nav>


<div class="container main">

    <?= $contentHTML ?>


</div>


<footer >
    <p>
        ©2021 TechZar.sk - <strong>Inzercia,bazár</strong>
    </p>

</footer>
</body>


</html>

