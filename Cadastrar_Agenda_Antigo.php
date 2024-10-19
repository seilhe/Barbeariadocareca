<?php
// Incluir o arquivo de conexão
include "conexao.php";

$start = strtotime('8:00:00');
$end = strtotime('12:00:00');
$mins = ($end - $start) / 60;

$qnt_de_agendamento = $mins / 30;
$acumulado = $start;

// Array para armazenar horários já agendados
$booked_slots = [];

// Consultar horários já agendados na tabela agenda
$sql = "SELECT horario_inicio FROM agenda WHERE dia_da_semana = ?";
$stmt = $conn->prepare($sql);

// Obtenha o dia da semana do formulário, se disponível
if (isset($_POST['dia_da_semana'])) {
    $dia_da_semana = intval($_POST['dia_da_semana']);
    $stmt->bind_param("i", $dia_da_semana);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $booked_slots[] = $row['horario_inicio'];
    }
}

$agendamentos = []; // Array para armazenar horários disponíveis
for ($i = 0; $i < $qnt_de_agendamento; $i++) {
    $horario = date('H:i', $acumulado);
    // Verifique se o horário não está agendado
    if (!in_array($horario, $booked_slots)) {
        $agendamentos[] = $horario;
    }
    $acumulado += 1800; // Adiciona 1800 segundos (30 minutos)
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cadastro da Agenda do Barbeiro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            width: 40%;
            margin: 50px auto;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            color: black;
            backdrop-filter: blur(30px);
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            height: 100vh;
            background-image: linear-gradient(170deg, black, gray);
            color: #ffffff;
        }
        h2,label {
            color:white;
        }
    </style>
</head>
<body>

<div class="container mt-3">
    <h2>Cadastro da Agenda do Barbeiro</h2>
    <form action="DadosAgenda.php" method="POST">
        <div class="mb-3 mt-3">
            <label for="barbeiro">Barbeiro</label>
            <select id="barbeiro" name="barbeiro" class="form-select" required>
                <option>Selecione um Barbeiro</option>
                <option>Jorge</option>
                <option>Cleiton</option>
                <option>Pedro</option>
                <option>Gabriel</option>
                <option>Paulo</option>
                <option>Marcos</option>
            </select>
        </div>

        <div class="mb-3 mt-3">
            <label for="dia_da_semana">Dia da semana</label>
            <select id="dia_da_semana" name="dia_da_semana" class="form-select" required>
                <option>Selecione o dia da semana</option>
                <option value="0">Domingo</option>
                <option value="1">Segunda-feira</option>
                <option value="2">Terça-feira</option>
                <option value="3">Quarta-feira</option>
                <option value="4">Quinta-feira</option>
                <option value="5">Sexta-feira</option>
                <option value="6">Sábado-feira</option>
            </select>
        </div>

        <div class="mb-3 mt-3">
            <label for="horario_inicio">Horário início:</label>
            <select class="form-select" id="horario_inicio" name="horario_inicio" required>
                <option value="">Selecione um horário</option>
                <?php foreach ($agendamentos as $horario): ?>
                    <option value="<?php echo $horario; ?>"><?php echo $horario; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="d-flex justify-content-between mt-3">
            <a href="index.php" class="btn btn-primary">Voltar</a>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </form>
</div>

</body>
</html>

<?php
// Fechar a conexão
$conn->close();
?>
