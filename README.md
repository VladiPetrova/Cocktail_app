# Cocktail App

A simple web app for searching cocktails by name. It uses the public [TheCocktailDB](https://www.thecocktaildb.com/) API to fetch information about cocktails, their ingredients, recipes, and images.

---

## How it works

### 1. **index.php (Frontend)**
- The user enters a cocktail name in the search field.
- When clicking the **search** button:
  - The JavaScript function `getCocktail()` sends a request to `server.php` with the entered name.
  - The results (JSON from the API) are processed and displayed as **cards** (Bootstrap cards).
  - Each card shows:
    - **Cocktail name**
    - **Ingredients (list)**
    - **Image**
    - **Recipe**

### 2. **server.php (Backend)**
- Receives the `cocktail` parameter from the request (`GET`).
- Sends a request to TheCocktailDB API:
  ```php
  https://www.thecocktaildb.com/api/json/v1/1/search.php?s={cocktail}
  ```
- Processes the JSON response and returns a simplified array with:
  - Cocktail name
  - Recipe
  - Image URL
  - List of ingredients

### 3. **Visualization**
- Styled with **Bootstrap 5**.
- Cocktails are displayed in elegant cards with centered information and images.

---

## How to run the project

1. Clone or download the project.
2. Place the files (`index.php` and `server.php`) in your local server folder (e.g., `htdocs` if using XAMPP).
3. Start Apache.
4. Open in your browser.
5. Enter a cocktail name (e.g., *Margarita*) and click **search**.

---

## 🛠️ Technologies

- **PHP** – backend logic and API requests.
- **JavaScript (AJAX)** – dynamic data fetching and rendering without reloading.
- **Bootstrap 5** – styling and responsive design.
- **TheCocktailDB API** – data source for cocktail information.

