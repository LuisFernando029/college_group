conexao.php
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loja";

try {
    $conexao = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql_tabela_produto = "CREATE TABLE IF NOT EXISTS produto (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            nome VARCHAR(255) NOT NULL,
                            preco DECIMAL(10, 2) NOT NULL,
                            foto VARCHAR(255) NOT NULL
                        )";
    $conexao->exec($sql_tabela_produto);

    $sql_tabela_usuario = "CREATE TABLE IF NOT EXISTS usuario (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            nome VARCHAR(45) NOT NULL,
                            email VARCHAR(45) NOT NULL,
                            senha VARCHAR(255) NOT NULL
                        )";
    $conexao->exec($sql_tabela_usuario);

    $senha = password_hash("admin123", PASSWORD_DEFAULT);
    $sql = $conexao->prepare("SELECT COUNT(*) FROM usuario WHERE email = 'admin@email.com'");
    $sql->execute();
    $count = $sql->fetchColumn();
    if ($count == 0) {
        $sql_insert_usuario = "INSERT INTO usuario (nome, email, senha) VALUES ('admin', 'admin@email.com', '$senha')";
        $conexao->exec($sql_insert_usuario);
    }
} catch(PDOException $e) {
    echo "Falha na Conexão: " . $e->getMessage();
}
?>

login.php
<?php
session_start();
include('conexao.php');

if(isset($_SESSION['usuario'])) {
    header("Location: vendas.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuario WHERE email = :email";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario'] = $usuario['nome'];
        $_SESSION['tempo'] = time() + (30 * 60); // 30 minutos
        header("Location: vendas.php");
        exit();
    } else {
        $erro = "Usuário ou senha inválidos.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if(isset($erro)) { echo "<p>$erro</p>"; } ?>
    <form method="post">
        <label>Email:</label><br>
        <input type="text" name="email" required><br>
        <label>Senha:</label><br>
        <input type="password" name="senha" required><br><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>

cadastro.php
<?php
session_start();
include('conexao.php');

if(!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $foto = $_POST['foto'];

    $sql = "INSERT INTO produto (nome, preco, foto) VALUES (:nome, :preco, :foto)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':foto', $foto);
    $stmt->execute();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Produto</title>
</head>
<body>
    <h2>Cadastro de Produto</h2>
    <p>Usuário: <?php echo $_SESSION['usuario']; ?></p>
    <a href="logout.php">Sair</a>
    <br><br>
    <form method="post">
        <label>Nome:</label><br>
        <input type="text" name="nome" required><br>
        <label>Preço:</label><br>
        <input type="text" name="preco" required><br>
        <label>Foto:</label><br>
        <input type="text" name="foto" required><br><br>
        <button type="submit">Cadastrar Produto</button>
    </form>
</body>
</html>

vendas.php
<?php
session_start();
include('conexao.php');

if(!isset($_SESSION['usuario']) || time() > $_SESSION['tempo']) {
    session_destroy();
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM produto";
$stmt = $conexao->query($sql);
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Vendas</title>
</head>
<body>
    <h2>Página de Vendas</h2>
    <p>Usuário: <?php echo $_SESSION['usuario']; ?></p>
    <a href="logout.php">Sair</a>
    <br><br>
    <?php foreach($produtos as $produto): ?>
    <div style="border: 1px solid black; padding: 10px; margin-bottom: 10px;">
        <p>Nome: <?php echo $produto['nome']; ?></p>
        <p>Preço: R$ <?php echo $produto['preco']; ?></p>
        <img src="<?php echo $produto['foto']; ?>" width="100" height="100"><br>
        <a href="#">Comprar</a>
    </div>
    <?php endforeach; ?>
</body>
</html>

logout.php
<?php
session_start();
session_destroy();
header("Location: login.php");
exit();
?>