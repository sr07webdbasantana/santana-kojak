<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SETEMERJ - Administrativo</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 40px;
            text-align: center;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1 {
            color: #333;
            margin-bottom: 10px;
        }

        p {
            color: #555;
        }
    </style>
</head>
    <body>
       <?php 
    // 1. Esqueça os requires manuais de classes. O Composer cuida disso.
    require './vendor/autoload.php'; 

    // 2. Use o caminho completo da classe (Namespace)
    $home = new \Core\ConfigController();
    $home->loadPage();
?>    </body>
</html>