<?php

require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/config/autoload.php';
$heroManager = new HeroManager($db);

if (isset($_POST['hero_name']) && !empty($_POST['hero_name']) 
    && isset($_POST['hero_type']) && !empty($_POST['hero_type'])
) {

    switch ($_POST['hero_type']) {
        case 'Guerrier':
            $hero = new Guerrier(['name' => $_POST['hero_name'], 'type' => $_POST['hero_type']]);
            break;
        case 'Archer':
            $hero = new Archer(['name' => $_POST['hero_name'], 'type' => $_POST['hero_type']]);
            break;
        case 'Mage':
            $hero = new Mage(['name' => $_POST['hero_name'], 'type' => $_POST['hero_type']]);
            break;
        default:
            $hero = new Guerrier(['name' => $_POST['hero_name'], 'type' => $_POST['hero_type']]);
            break;
    }

    $heroManager->add($hero);
}
$heroes = $heroManager->findAllAlive();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <title>TP Combat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

    <header class="">
        <nav class="navbar bg-dark navbar-dark">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Navbar</span>
            </div>
        </nav>
    </header>
    <main class="container mt-5">
        <form method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Ajouter un nouveau personnage</label>
                <input type="text" class="form-control" placeholder="Nom du personnage" name="hero_name">
            </div>
            <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="hero_type">
                <option selected>Selectionner un type</option>
                <option value="Guerrier">Guerrier</option>
                <option value="Archer">Archer</option>
                <option value="Mage">Mage</option>
            </select>

            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>

        <div class="d-flex flex-wrap">
            <?php foreach ($heroes as $hero) { ?>
                <div class="card m-2" style="width: 18rem;">
                    <img src="https://www.pngmart.com/files/13/The-Legend-of-Zelda-Link-PNG-Image.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $hero->getName() ?></h5>
                        <p><?=$hero->getType()?></p>
                        <p class="card-text">
                            PV : <?= $hero->getHealthPoint() ?>
                            <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $hero->getHealthPoint() ?>" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-danger" style="width: <?= $hero->getHealthPoint() ?>%"></div>
                            </div>
                        </p>
                        <a href="./fight.php?hero_id=<?=$hero->getId()?>" class="btn btn-primary">Selectionner</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>