<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRP Scripts - Složky</title>
    <style>
        body {
            background-color: #f0f0f0; /* Bílo šedé pozadí */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .white-frame {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        #page-title {
            font-family: 'Bahnschrift SemiBold', sans-serif;
            font-size: 35px;
            font-weight: bold;
            color: black;
            margin-bottom: 26px;
        }
        .folder-button {
            font-family: 'Bahnschrift SemiBold', sans-serif;
            display: block;
            margin: 10px;
            padding: 10px;
            border: 2px solid #4caf50; /* Zelený rámec */
            border-radius: 8px;
            text-align: center;
            text-decoration: none;
            color: white; /* Bílá barva textu */
            background-color: #4caf50; /* Zelená barva pozadí */
            transition: background-color 0.3s, color 0.3s;
            cursor: pointer;
        }

        .folder-button:hover {
            background-color: white; /* Bílé pozadí po najetí myší */
            color: #4caf50; /* Zelená barva textu po najetí myší */
        }

        .page-title {
            font-family: 'Bahnschrift SemiBold', sans-serif;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: #4caf50; /* Zelená barva textu */
        }
    </style>
</head>
<body>
    <div class="white-frame">
        <div class="page-title" id="page-title">
            TRP Scripts <?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>
        </div>
        <?php
            $directory = __DIR__; // Aktuální adresář skriptu
            $folders = array_filter(glob($directory . '/*'), 'is_dir'); // Získání seznamu složek

            foreach ($folders as $folder) {
                $folderName = basename($folder);
                echo '<a href="' . htmlspecialchars($folderName) . '" class="folder-button">' . htmlspecialchars($folderName) . '</a>';
            }
        ?>
    </div>

    <script>
        // Přidání skriptu pro změnu barvy tlačítka
        document.addEventListener('DOMContentLoaded', function() {
            var buttons = document.querySelectorAll('.folder-button');
            
            buttons.forEach(function(button) {
                button.addEventListener('mouseover', function() {
                    button.style.backgroundColor = 'white'; /* Bílá barva pozadí po najetí myší */
                    button.style.color = '#4caf50'; /* Zelená barva textu po najetí myší */
                });

                button.addEventListener('mouseout', function() {
                    button.style.backgroundColor = '#4caf50'; /* Zelená barva pozadí, když myš opustí tlačítko */
                    button.style.color = 'white'; /* Bílá barva textu, když myš opustí tlačítko */
                });
            });
        });
    </script>
</body>
</html>
