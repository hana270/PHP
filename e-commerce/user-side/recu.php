
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Messages reçus - Administration</title>
</head>

<body>

    <?php include_once('parts/navbar.php'); ?>

    <div class="container mt-5">
        <h2>Messages reçus</h2>

        <?php foreach ($messages as $message): ?>
            <div class="alert alert-info" role="alert">
                <strong>Nom:</strong> <?= htmlspecialchars($message['name']) ?><br>
                <strong>Email:</strong> <?= htmlspecialchars($message['email']) ?><br>
                <strong>Message:</strong> <?= htmlspecialchars($message['message']) ?>
            </div>
        <?php endforeach; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
