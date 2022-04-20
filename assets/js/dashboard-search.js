let dashboardSearchMovie = document.getElementById("dashboardSearchMovie");
dashboardSearchMovie.addEventListener("keyup", async function () {
    let dataSearch = {
        search: dashboardSearchMovie.value
    }
    if (dataSearch.search != "") {
        let response = await fetch("../Controllers/dashboard-search-ajax-controller.php?dashboardSearchMovie=" + dataSearch.search, {
            method: "GET",
            headers: {
                "Content-type": "application/json"
            }
        });
        let result = await response.json();
        if (result.length > 0) {
            let dashboardMovieResult = document.getElementById("dashboardMovieResult");
            dashboardMovieResult.innerHTML = "";
            result.forEach(movie => {
                let newSuggestion = `
                <div class="movie-result-dashboard">
                    <div class="result-movie-content">
                        <img src="../uploads/affiches/${movie["movie_picture"]}" alt="${movie["movie_title"]}">

                        <div class="d-block-result-movie">
                        <form class="update-movie-form" action="dashboard-movie.php" method="post">
                            <button class="update-movie-button" type="submit" value="${movie["movie_id"]}" name="editMovieButton"><i class="fas fa-edit"></i> Éditer</button>
                        </form>
                        
                        <p>${movie["movie_title"]} (${movie["movie_release_date"].slice(-10, -6)})</p>
                    </div>
                </div>

                </div>`;
                dashboardMovieResult.innerHTML += newSuggestion;
            });
        } else {
            let dashboardMovieResult = document.getElementById("dashboardMovieResult");
            dashboardMovieResult.innerHTML = "Aucun résultat n'a été trouvé.";
        }
    } else {
        let dashboardMovieResult = document.getElementById("dashboardMovieResult");
        dashboardMovieResult.innerHTML = "";
    }
})