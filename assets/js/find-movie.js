let findMovie = document.getElementById("findMovie");
findMovie.addEventListener("keyup", async function () {
    let dataSearch = {
        search: findMovie.value
    }
    if (dataSearch.search != "") {
        let response = await fetch("../Controllers/dashboard-search-ajax-controller.php?findMovie=" + dataSearch.search, {
            method: "GET",
            headers: {
                "Content-type": "application/json"
            }
        });
        let result = await response.json();
        if (result.length > 0) {

            let findMovieResult = document.getElementById("movie-find-result");
            findMovieResult.style.marginTop = "2rem";

            findMovieResult.innerHTML = "";
            result.forEach(movie => {
                let newSuggestion = `<div class="movie-find-box">

                <img src="../uploads/affiches/${movie["movie_picture"]}" alt="Affiche de ${movie["movie_title"]}">

                <div class="movie-find-content">

                    <a href="../movie?film=${movie["movie_id"]}">${movie["movie_title"]} (${movie["movie_release_date"].slice(-10, -6)})</a>
                    <p class="margin-top">${movie["movie_duration"]} / ${movie["movie_gender"]}</p>
                    <p>${movie["movie_nationality"]}</p>

                </div>
            </div>`;
            findMovieResult.innerHTML += newSuggestion;
            });
        } else {
            let findMovieResult = document.getElementById("movie-find-result");
            findMovieResult.innerHTML = `<div class="find-movie-no-result">Aucun résultat n'a été trouvé.</div>`;
            findMovieResult.style.marginTop = "0rem";
        }
    } else {
        let findMovieResult = document.getElementById("movie-find-result");
        findMovieResult.innerHTML = "";
        findMovieResult.style.marginTop = "0rem";
    }
})