<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/librares/css/head.css">
    <link rel="stylesheet" href="/librares/css/bootstrapcss/bootstrap.min.css">
    <link rel="icon" href="/images/logo.png">
</head>

<body>
    <header>
        <div class="container">
            <div class="logo">
                <a href="/home"><img src="/images/logoSemCor.png" alt=""></a>
                <a href="/home" class="link-light">Schron</a>
            </div>
            <div class="menu">
                <nav>
                    <li><a href="/home" class="nav-link" style="color: #F2F5F9; font-size: 17px;">Home</a></li>
                    <li><a href="/construct" class="nav-link" style="color: #F2F5F9; font-size: 17px;">Horario</a></li>
                    <li><a href="/sobre" class="nav-link" style="color: #F2F5F9; font-size: 17px;">Sobre</a></li>
                    <li class="dropdown-center">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #F2F5F9; font-size: 17px;">
                            <?php echo $_SESSION['usuario']?>
                        </a>
                        <ul class="dropdown-menu">
                            <span style="cursor: default;">Usuário: <br><?php echo $_SESSION['usuario']?> </span>
                            <span style="cursor: default;">Instituição: <br><?php echo $_SESSION['instituto']?></span>
                            <hr>
                            <a class="dropdown-item" href="/login/deslog">Sair</a>
                        </ul>
                    </li>
                </nav>
            </div>
        </div>
    </header>
    <main>