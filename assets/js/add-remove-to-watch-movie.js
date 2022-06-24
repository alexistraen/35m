let removeButtonToWatch = document.querySelectorAll(".to-watch-movie-button-add");

removeButtonToWatch.forEach(button => {

    button.addEventListener("click", async function () {

        let response = await fetch("../Controllers/add-movie-to-watch-ajax.php", {
            method: "POST",
            body: "movieId=" + button.value,
            headers: {
                "Content-type": "application/x-www-form-urlencoded"
            }
        });

        let result = await response.json();

        if (result === true) {
            button.className = "to-watch-movie-button-add";
            button.innerHTML = "&#10029;";
        } else if (result === false) {
            button.className = "to-watch-movie-button-remove";
            button.innerHTML = "&#10038;";
        }
    })
});

let addButtonToWatch = document.querySelectorAll(".to-watch-movie-button-remove");

addButtonToWatch.forEach(button => {

    button.addEventListener("click", async function () {

        let response = await fetch("../Controllers/add-movie-to-watch-ajax.php", {
            method: "POST",
            body: "movieId=" + button.value,
            headers: {
                "Content-type": "application/x-www-form-urlencoded"
            }
        });

        let result = await response.json();

        if (result === false) {
            button.className = "to-watch-movie-button-remove";
            button.innerHTML = "&#10038;";
        } else if (result === true) {
            button.className = "to-watch-movie-button-add";
            button.innerHTML = "&#10029;";
        }
    })
});