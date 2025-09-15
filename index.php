<?php ?>
<html>
    <head>
        <title>Cocktail App</title>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel = "stylesheet" integrity = "sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin = "anonymous">
    </head>
    <body class = "bg-dark">
        <div class = "container mt-5">
            <h2 style="color: white">Search a cocktail</h2> 
            <div class = "input-group mb-3">
                <input type = "text" id = "cocktail" oninput="getNames()" class = "form-control">
                <input type = "submit" class = "btn btn-secondary" onclick = "getCocktail()" value = "search">
            </div>
            <div id = "results"></div>

        </div>


        <script>
            function getCocktail() {
                var cocktail = document.getElementById("cocktail");
                if (cocktail.value === "") {
                    alert("Enter a cocktail");
                }

                var request = new XMLHttpRequest();
                request.open("GET", "server.php?cocktail=" + cocktail.value, true);
                request.send();
                request.onreadystatechange = function (e) {
                    if (this.readyState === 4 && this.status === 200) {
                        document.getElementById("results").innerHTML = "";
                        var cocktails = JSON.parse(this.responseText);

                        for (var i = 0; i < cocktails.length; i++) {
                            var drink = cocktails[i];
                            var name = drink[0];
                            var recipe = drink[1];
                            var image = drink[2];
                            var ingredients = drink[3];

                            //създаваме един див с карта в него
                            const card = document.createElement("div");
                            card.className = "card p-3 text-center m-3";

                            const title = document.createElement("h4");
                            title.innerHTML = "<u>" + name + "</u>";

                            const ingredientsTitle = document.createElement("p");
                            ingredientsTitle.innerHTML = "<strong>Ingredients:</strong>";

                            const ingredientsList = document.createElement("ul");
                            ingredientsList.className = "list-unstyled";

                            for (var j = 0; j < ingredients.length; j++) {
                                const listItem = document.createElement("li");
                                listItem.innerText = "♥︎ " + ingredients[j];
                                ingredientsList.appendChild(listItem);
                            }

                            const imageElement = document.createElement("img");
                            imageElement.src = image;
                            imageElement.alt = "Cocktail Image";
                            imageElement.style.width = "200px";
                            imageElement.style.borderRadius = "10px";
                            imageElement.style.display = "block";
                            imageElement.style.margin = "auto";


                            const recipeText = document.createElement("p");
                            recipeText.innerHTML = "<strong>Recipe: </strong>" + recipe;

                            card.appendChild(title);
                            card.appendChild(ingredientsTitle);
                            card.appendChild(ingredientsList);
                            card.appendChild(imageElement);
                            card.appendChild(document.createElement("br"));
                            card.appendChild(recipeText);

                            document.getElementById("results").appendChild(card);
                        }
                    }
                };

            }


        </script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    </body>
</html>

