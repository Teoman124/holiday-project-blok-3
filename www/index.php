<?php

require "database_connect.php";

$sql = "SELECT * FROM holiday_db";

// laag-hoog hoog-laag
if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
    switch ($sort) {
        case 'hoog-laag':
            $sql .= " ORDER BY prijs DESC";
            break;
        case 'laag-hoog':
            $sql .= " ORDER BY prijs ASC";
            break;
        case 'none':
        default:
            $sql .= " ORDER BY id ASC"; // Standaard sortering
    }
} else {
    $sql .= " ORDER BY id ASC"; // Eerste keer laden
}

// text size 
$textSize = '16px'; // Default for 'normaal'
if (isset($_GET['size'])) {
    switch ($_GET['size']) {
        case 'klein':
            $textSize = '14px';
            break;
        case 'groot':
            $textSize = '18px';
            break;
        case 'normaal':
        default:
            $textSize = '16px';
    }
}

$result = mysqli_query($conn, $sql);
$holidays = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-size: <?= $textSize ?>;
        }
    </style>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="header_container">

            <a href="/" class="logo">
                <img src="foto's/reload_img.jpg" alt="Home">
            </a>

            <div class="searchcontainer">
                <div class="search_div">
                    <input type="text" placeholder="Zoek naar plaatsen">
                </div>
            </div>

            <div class="dropdown_group">

                <!-- prijs laag sorter -->
                <div class="dropdown_prijs">
                    <button onclick="toggleDropdown('prijsDropdown')" class="dropdown-btn">
                        Prijs opties ▼
                    </button>
                    <div id="prijsDropdown" class="dropdown-content">
                        <form method="GET" id="sortForm">
                            <label>
                                <input type="radio" name="sort" value="hoog-laag"
                                    <?php echo (  $_GET['sort'] ?? '')  == 'hoog-laag' ? 'checked' : '' ?>>
                                Hoog-laag
                            </label>
                            <label>
                                <input type="radio" name="sort" value="laag-hoog"
                                    <?php echo ( $_GET['sort'] ?? '')  == 'laag-hoog' ? 'checked' : '' ?>>
                                Laag-hoog
                            </label>
                        </form>
                    </div>
                </div>


                <div class="dropdown_type">
                    <button onclick="toggleDropdown('typeDropdown')" class="dropdown-btn">
                        vakantie types opties ▼
                    </button>
                    <div id="typeDropdown" class="dropdown-content">
                        <!-- php implemtatie -->
                        <label><input type="checkbox" id="Stad"> Stad</label>
                        <label><input type="checkbox" id="Strand"> Strand</label>
                        <label><input type="checkbox" id="Cultuur"> Cultuur</label>
                    </div>
                </div>

                <div class="dropdown_continent">
                    <button onclick="toggleDropdown('continentDropdown')" class="dropdown-btn">
                        continent opties ▼
                    </button>
                    <div id="continentDropdown" class="dropdown-content">
                        <!-- php implemtatie -->
                        <label><input type="checkbox" id="azie"> azie</label>
                        <label><input type="checkbox" id="europa"> europa</label>
                        <label><input type="checkbox" id="afrika"> afrika</label>
                        <label><input type="checkbox" id="noord-amerika"> noord-amerika</label>
                        <label><input type="checkbox" id="zuid-amerika"> zuid-amerika</label>
                    </div>
                </div>

                <div class="dropdown_text">
                    <button onclick="toggleDropdown('textDropdown')" class="dropdown-btn">
                        Text opties ▼
                    </button>
                    <div id="textDropdown" class="dropdown-content">
                        <!-- <form method="GET" id="textSizeForm"> -->
                        <!-- Input name veranderd naar "size" -->
                        <label><input type="radio" name="size" value="klein" <?= ($_GET['size'] ?? '') === 'klein' ? 'checked' : '' ?>> Klein</label>
                        <label><input type="radio" name="size" value="normaal" <?= !isset($_GET['size']) || ($_GET['size'] ?? '') === 'normaal' ? 'checked' : '' ?>> Normaal</label>
                        <label><input type="radio" name="size" value="groot" <?= ($_GET['size'] ?? '') === 'groot' ? 'checked' : '' ?>> Groot</label>
                        <!-- </form> -->
                    </div>
                </div>

            </div>

        </div>

    </header>

    <main>
        <div class="main_container">
            <div class="vakantie_container">
                <?php foreach ($holidays as $holiday): ?>
                    <!-- de continenten toevegen en de type vakanties -->

                    <div class="vakantie_items">
                        <a href="info_page.php?id=<?php echo $holiday['id'] ?>">
                            <img src="<?php echo $holiday['thumbnail_url'] ?>" alt="" class="vakantie_items_fotos">
                            <h2><?php echo $holiday['name'] ?></h2>
                            <h4> <?php echo $holiday['prijs'] ?></h4>
                            <h5> <?php echo $holiday['vakantietype'] ?></h5>
                            <h5> <?php echo $holiday['continent'] ?></h5>
                            <p> <?php echo $holiday['beschrijving'] ?></p>
                        </a>
                    </div>

                <?php endforeach ?>
            </div>
        </div>
    </main>

    <footer>

    </footer>

</body>

<script>
    // Sluit dropdowns bij klik buiten
    window.onclick = function(event) {
        if (!event.target.matches('.dropdown-btn')) {
            document.querySelectorAll('.dropdown-content').forEach(dropdown => {
                dropdown.classList.remove('show');
            });
        }
    };

    function toggleDropdown(dropdownId) {
        document.getElementById(dropdownId).classList.toggle("show");
    }

    // Auto-submit bij wijziging
    document.querySelectorAll('input[name="sort"]').forEach(radio => {
        radio.addEventListener('change', function() {
            document.getElementById('sortForm').submit();
        });
    });

    // **Tekstgrootte aanpassen**
    // const textRadios = document.querySelectorAll('input[name="textSize"]');\

    const textRadios = document.querySelectorAll('#textDropdown input');
    const textElement = document.querySelector('.worden'); // Controleer of dit element bestaat

    console.log(textRadios);

    textRadios.forEach(radio => {
        radio.addEventListener('click', function() {
            updateTextSize(radio.value);
        });
    });

    let body = document.querySelector('body');

    if (body) {
        function updateTextSize(size) {
            switch (size) {
                case 'klein':
                    body.style.fontSize = "14px";
                    break;
                case 'normaal':
                    body.style.fontSize = "16px";
                    break;
                case 'groot':
                    body.style.fontSize = "18px";
                    break;
                default:
                    body.style.fontSize = "16px"; // Standaardgrootte
            }
        }

        // **Geselecteerde tekstgrootte behouden bij herladen**
        const urlParams = new URLSearchParams(window.location.search);
        const selectedSize = urlParams.get("size"); // "klein", "normaal" of "groot"
        if (selectedSize) {
            updateTextSize(selectedSize);
        }
    }
</script>

</html>