<?php
session_start();
include 'templates/header.php';

$users = [
    'wiener' => md5('peter'),
    'carlos' => md5('happy')
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = md5($_POST['password'] ?? '');
    
    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION['username'] = $username;
        if (!empty($_POST['stay_logged_in'])) {
            setcookie('stay-logged-in', base64_encode("$username:$password"), time() + 3600, "/");
        }
        header("Location: my-account.php?id=$username");
        exit;
    } else {
        echo "<p style='color:red'>Invalid login</p>";
    }
}
?>

<h2>Login</h2>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <label><input type="checkbox" name="stay_logged_in"> Stay logged in</label>
    <button type="submit">Login</button>
</form>

<?php include 'templates/footer.php'; ?>
