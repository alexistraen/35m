let removeButton = document.querySelectorAll(".add-movie-button");

removeButton.forEach(button => {
    button.addEventListener("mouseover", function () {
        if (button.textContent.indexOf("&#10084;") == -1 && button.textContent.indexOf("Supprimé") == -1) {
            button.innerHTML = "&#10006;";
            button.className = "remove-movie-button";
        } else if (button.textContent.indexOf("Supprimé") != -1) {
            button.className = "add-movie-button";
        }
    })

    button.addEventListener("mouseout", function () {
        if (button.textContent.indexOf("&#10006;") == -1 && button.textContent.indexOf("Supprimé") == -1) {
            button.innerHTML = "&#10084;";
            button.className = "add-movie-button";
        } else if (button.textContent.indexOf("Supprimé") != -1) {
            button.className = "remove-movie-button";
        }
    })
    button.addEventListener("click", async function () {

        let response = await fetch("../Controllers/add-movie-seen-list-ajax.php", {
            method: "POST",
            body: "movieId=" + button.value,
            headers: {
                "Content-type": "application/x-www-form-urlencoded"
            }
        });

        let result = await response.json();

        if (result === true) {
            button.className = "remove-movie-button";
            button.innerHTML = "Supprimé &#10006;";
        } else if (result === false) {
            button.className = "add-movie-button";
            button.innerHTML = "&#10084;";
        }
    })
});

let addButton = document.querySelectorAll(".remove-movie-button");

addButton.forEach(button => {
    button.addEventListener("mouseover", function () {
        if (button.textContent.indexOf("&#10006;") == -1 && button.textContent.indexOf("Ajouté") == -1) {
            button.innerHTML = "&#10084;";
            button.className = "add-movie-button";
        } else if (button.textContent.indexOf("Ajouté") != -1) {
            button.className = "remove-movie-button";
        }
    })

    button.addEventListener("mouseout", function () {
        if (button.textContent.indexOf("&#10084;") == -1 && button.textContent.indexOf("Ajouté") == -1) {
            button.innerHTML = "&#10006;";
            button.className = "remove-movie-button";
        } else if (button.textContent.indexOf("Ajouté") != -1) {
            button.className = "add-movie-button";
        }
    })
    button.addEventListener("click", async function () {

        let response = await fetch("../Controllers/add-movie-seen-list-ajax.php", {
            method: "POST",
            body: "movieId=" + button.value,
            headers: {
                "Content-type": "application/x-www-form-urlencoded"
            }
        });

        let result = await response.json();

        if (result === false) {
            button.className = "add-movie-button";
            button.innerHTML = "Ajouté &#10084;";
        } else if (result === true) {
            button.className = "remove-movie-button";
            button.innerHTML = "&#10006;";
        }
    })
});