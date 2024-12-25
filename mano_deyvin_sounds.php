<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sound Effects</title>
</head>
<body>
    <h1>Mano Deyvin Sound Effects:</h1>
    <img  src=https://image.civitai.com/xG1nkqKTMzGDvpLrqFT7WA/d4f5d715-91d2-45b0-b397-06ee11da4277/width=450/FLUX_GGUF_Q8_00537_.jpeg>
    <form method="post">
        <button name="action" value="ai">Ai</button>
        <button name="action" value="ele_gosta">ELE GOSTA</button>
        <button name="action" value="cavalo">CAVALO 🐴</button>
    </form>

    <?php
        $sounds = [
            'ai' => 'sounds/ai.mp3',
            'ele_gosta' => 'sounds/ele_gosta.mp3',
            'cavalo' => 'sounds/cavalo.mp3',
        ];

        $action = $_POST['action'] ?? null;

        if ($action && isset($sounds[$action])) {
            $audioPath = $sounds[$action];
            echo "<script>
                const audio = new Audio('$audioPath');
                audio.play();
            </script>";
        }
    ?>
</body>
</html>
