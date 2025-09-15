<?php

if (!empty($_GET["cocktail"])) {
    $cocktail = $_GET["cocktail"];
    $api = "https://www.thecocktaildb.com/api/json/v1/1/search.php?s=" . $cocktail;

    $data = json_decode(file_get_contents($api), true);

    $cocktails = [];

    foreach ($data["drinks"] as $drink) {
        $ingredients = [];
        for ($i = 0; $i < 15; $i++) { 
            if (!empty($drink["strIngredient" . $i])) {
                $ingredients[] = $drink["strIngredient" . $i];
            }
        }

        $cocktails[] = [
            $drink["strDrink"], 
            $drink["strInstructions"], 
            $drink["strDrinkThumb"], 
            $ingredients 
        ];
    }

    echo json_encode($cocktails);

}


