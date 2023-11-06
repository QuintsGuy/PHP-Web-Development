<?php 

    include __DIR__ . '/../../include/header.php';
    include __DIR__ . '/../../include/functions.php';

    if(!isset($_SESSION['user'])){
        header('Location: ../../include/restricted.php');
    }

    if(isset($_POST['deletePatient'])){
        $id = filter_input(INPUT_POST, 'patientId');
        deletePatient($id);
    }

    $patients = getPatients();

    if (isset($_POST['searchButton'])) {
        $firstName = filter_input(INPUT_POST, 'firstName');
        $lastName = filter_input(INPUT_POST, 'lastName');
        $married = filter_input(INPUT_POST, 'is_married');
    }else{
        $firstName = '';
        $lastName = '';
        $married = '';
    }

    $patients = searchPatients($firstName, $lastName, $married);

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <title>Patients CRUD | Tristan Knott</title>

    <style>
        .wrapper {
            display: flex;
            gap: 30px;
        }

        .label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="col-sm-12">
            <?php if(isset($_SESSION['user'])): ?>
                <h1>Patients Directory</h1>

                <form method="POST" name="searchPatients">
                    <div class="wrapper">
                        <div class="item">
                            <label class="label">First Name: </label>
                            <input type="text" name="firstName" value="<?= $firstName; ?>" />
                        </div>
                        <div class="item">
                            <label class="label">Last Name: </label>
                            <input type="text" name="lastName" value="<?= $lastName; ?>" />
                        </div>
                        <div class="item">
                            <label class="label">Married: </label>
                            <input type="radio" name="is_married" value=1 <?= $married=="yes"?"checked":""?>> Yes
                            <input type="radio" name="is_married" value=0 <?= $married=="no"?"checked":""?>> No
                        </div>

                        <input class="btn btn-sm btn-primary" type="submit" id="searchBtn" name="searchButton" value="Search" />

                    </div>
                </form>

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
            <?php else: ?>
                <div style="text-align: center; margin-top: 10px;">
                    <h1>Welcome to the Patient Intake Roster</h1>
                    <p>Please login above to view patient information.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php include __DIR__ . '/../../include/footer.php'; ?>

</body>
</html>