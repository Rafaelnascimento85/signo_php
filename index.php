<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signos</title>
    <?php include('header.php'); ?>
    <!-- Link para o CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="text-center py-3 bg-primary text-white">
        <h1>Signos do Zodíaco</h1>
        
    </header>

    <div class="container mt-5">
        <form method="POST" action="show_zodiac_sign.php" class="needs-validation" novalidate>
            <!-- Campo Data de Nascimento -->
            <div class="text-center mb-3">
                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required style="width: 30%; margin: auto;">
                <div class="invalid-feedback">
                    Por favor, insira sua data de nascimento.
                </div>
            </div>
            <!-- Botão de Enviar -->
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Descobrir</button>
            </div>

            <div class="text-center mt-4">
            <img src="imagem/zoodiaco_300.jpg" alt="Zodíaco" class="img-fluid mt-3">
            </div>
            
        </form>
        
      
    </div>

    <!-- Script para o JavaScript do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
