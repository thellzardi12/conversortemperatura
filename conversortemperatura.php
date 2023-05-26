<!DOCTYPE html>
<html>
<head>
    <title>Conversor de Temperaturas</title>
</head>
<body>
    <h1>Conversor de Temperaturas</h1>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="temperature">Digite a temperatura:</label>
        <input type="number" step="any" name="temperature" required>
        <br><br>
        <label for="unit">Escolha a unidade:</label>
        <select name="unit" required>
            <option value="celsius">Celsius</option>
            <option value="fahrenheit">Fahrenheit</option>
            <option value="kelvin">Kelvin</option>
        </select>
        <br><br>
        <input type="submit" value="Converter">
    </form>

    <?php
    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtém a temperatura e a unidade enviadas pelo formulário
        $temperature = $_POST["temperature"];
        $unit = $_POST["unit"];

        // Função para converter de Celsius para Fahrenheit
        function celsiusToFahrenheit($celsius)
        {
            return ($celsius * 9 / 5) + 32;
        }

        // Função para converter de Celsius para Kelvin
        function celsiusToKelvin($celsius)
        {
            return $celsius + 273.15;
        }

        // Função para converter de Fahrenheit para Celsius
        function fahrenheitToCelsius($fahrenheit)
        {
            return ($fahrenheit - 32) * 5 / 9;
        }

        // Função para converter de Fahrenheit para Kelvin
        function fahrenheitToKelvin($fahrenheit)
        {
            return ($fahrenheit + 459.67) * 5 / 9;
        }

        // Função para converter de Kelvin para Celsius
        function kelvinToCelsius($kelvin)
        {
            return $kelvin - 273.15;
        }

        // Função para converter de Kelvin para Fahrenheit
        function kelvinToFahrenheit($kelvin)
        {
            return ($kelvin * 9 / 5) - 459.67;
        }

        // Converte a temperatura para a unidade desejada
        switch ($unit) {
            case "celsius":
                $fahrenheit = celsiusToFahrenheit($temperature);
                $kelvin = celsiusToKelvin($temperature);
                echo "Fahrenheit: $fahrenheit °F<br>";
                echo "Kelvin: $kelvin K";
                break;
            case "fahrenheit":
                $celsius = fahrenheitToCelsius($temperature);
                $kelvin = fahrenheitToKelvin($temperature);
                echo "Celsius: $celsius °C<br>";
                echo "Kelvin: $kelvin K";
                break;
            case "kelvin":
                $celsius = kelvinToCelsius($temperature);
                $fahrenheit = kelvinToFahrenheit($temperature);
                echo "Celsius: $celsius °C<br>";
                echo "Fahrenheit: $fahrenheit °F";
                break;
        }
    }
    ?>

</body>
</html>