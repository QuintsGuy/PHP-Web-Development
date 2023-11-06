<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <title>Patients CRUD | Tristan Knott</title>
</head>
<body>
    
    <?php
        include __DIR__ . '/../../include/header.php';
        include __DIR__ . '/../../include/functions.php';

        if(!isset($_SESSION['user'])){
            header('Location: /../../include/restricted.php');
        }

        if(isset($_POST['deletePatient'])){
            $id = filter_input(INPUT_POST, 'patientId');
            deletePatient($id);
        }

        $patients = getPatients();
    ?>

    <div class="container">
        <div class="col-sm-12">
            <h1>Patients Directory</h1>
            <a href="edit_patient.php?action=Add">Add New Patient</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Birth Date</th>
                        <th>Married</th>
                        <th>Edit</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($patients as $p): ?>
                        <tr>
                            <td>
                                <form action="view_patients.php" method="POST">
                                    <input type="hidden" name="patientId" value="<?= $p['id']; ?>" />
                                    <input type="submit" name="deletePatient" value="Delete" />
                                </form>
                            </td>
                            <td><?= $p['patientFirstName']; ?></td>
                            <td><?= $p['patientLastName']; ?></td>
                            <td><?= $p['patientBirthDate']; ?></td>
                            <td><?= $p['patientMarried']==0?"No":"Yes" ?></td>
                            <td><a href="edit_patient.php?action=Update&patientId=<?= $p['id']; ?>">Edit</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include __DIR__ . '/../../include/footer.php'; ?>

</body>
</html>