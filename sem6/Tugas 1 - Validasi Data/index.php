<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .card {
            max-width: 450px;
            width: 100%;
            border-radius: 10px;
            overflow: hidden;
        }
        .card-body {
            padding: 2rem;
        }
        input[type="submit"] {
            width: 100%;
        }
    </style>
</head>
<body>
<?php
$success = false;
$errors = [];


$name = '';
$gender = '';
$alamat = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    if ($name === '' || strlen($name) < 3) {
        $errors['name'] = "Nama minimal 3 karakter.";
    }

    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    if ($gender !== 'Pria' && $gender !== 'Wanita') {
        $errors['gender'] = "Jenis kelamin harus dipilih.";
    }

    $alamat = isset($_POST['alamat']) ? trim($_POST['alamat']) : '';
    if ($alamat === '' || strlen($alamat) < 5) {
        $errors['alamat'] = "Alamat tidak boleh kosong dan minimal 5 karakter.";
    }

    if (empty($errors)) {
        $success = true;
        echo '<div class="alert alert-success text-center">Terima kasih, data telah disimpan.</div>';

        $name = '';
        $gender = '';
        $alamat = '';
    }
}
?>
<div class="card shadow-sm">
    <div class="card-header text-center bg-primary text-white">
        <h5>Form Submission</h5>
    </div>
    <div class="card-body">
        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" id="name" minlength="3" class="form-control <?php if(isset($errors['name'])) echo 'is-invalid'; ?>" value="<?php echo htmlspecialchars($name); ?>">
                <?php if(isset($errors['name'])) echo '<div class="invalid-feedback">'.$errors['name'].'</div>'; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="genderPria" value="Pria" <?php if($gender=='Pria') echo 'checked'; ?>>
                    <label class="form-check-label" for="genderPria">Pria</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="genderWanita" value="Wanita" <?php if($gender=='Wanita') echo 'checked'; ?>>
                    <label class="form-check-label" for="genderWanita">Wanita</label>
                </div>
                <?php if(isset($errors['gender'])) echo '<div class="text-danger">'.$errors['gender'].'</div>'; ?>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control <?php if(isset($errors['alamat'])) echo 'is-invalid'; ?>"><?php echo htmlspecialchars($alamat); ?></textarea>
                <?php if(isset($errors['alamat'])) echo '<div class="invalid-feedback">'.$errors['alamat'].'</div>'; ?>
            </div>
            <div>
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>