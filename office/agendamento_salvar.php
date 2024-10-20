<?php
// Conexão com o banco de dados (ajuste as configurações)
$host = 'localhost';
$dbname = 'seu_banco';
$user = 'seu_usuario';
$password = 'sua_senha';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Recebe os dados do formulário
    $id_pet = $_POST['id_pet'];
    $id_cliente = $_POST['id_cliente'];
    $id_servico = $_POST['id_servico'];
    $tipo = $_POST['tipo'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $dia_completo = isset($_POST['dia_completo']) ? 1 : 0;
    $status = $_POST['status'];
    $observacoes = $_POST['observacoes'];
    $data_reserva = date('Y-m-d H:i:s');

    // Insere no banco de dados
    $stmt = $pdo->prepare("INSERT INTO agendamentos (id_pet, id_cliente, id_servico, tipo, start, end, dia_completo, status, observacoes, data_reserva)
        VALUES (:id_pet, :id_cliente, :id_servico, :tipo, :start, :end, :dia_completo, :status, :observacoes, :data_reserva)");
    
    $stmt->bindParam(':id_pet', $id_pet);
    $stmt->bindParam(':id_cliente', $id_cliente);
    $stmt->bindParam(':id_servico', $id_servico);
    $stmt->bindParam(':tipo', $tipo);
    $stmt->bindParam(':start', $start);
    $stmt->bindParam(':end', $end);
    $stmt->bindParam(':dia_completo', $dia_completo);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':observacoes', $observacoes);
    $stmt->bindParam(':data_reserva', $data_reserva);

    $stmt->execute();

    echo "Agendamento salvo com sucesso!";

    // Chama a função para criar o evento no Google Calendar
    require 'agendamento_enviar_eventos_google.php';
    criarEventoGoogleCalendar($id_cliente, $tipo, $start, $end, $observacoes);
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}
?>
