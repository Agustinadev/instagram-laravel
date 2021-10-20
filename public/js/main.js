window.addEventListener("load", function () {
    $(".like-svg").css("cursor", "pointer");
    $(".dislike-svg").css("cursor", "pointer");

    //like

    $(document).on("click", ".like-svg", function (e) {
        let target = e.target,
        idImage = target.getAttribute("data-id");
        console.log(idImage);
        fetch(`http://instagram-laravel.test/like/${idImage}`)
            .then((res) => {
                console.log(res);
                console.log("Hiciste like!");
                target.classList.add("dislike-svg");
                target.classList.remove("like-svg");
                target.setAttribute("fill", "#ed4956");

                target.querySelector("path").outerHTML =
                    '<path class="pointer-events-none" d="M34.6 3.1c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5s1.1-.2 1.6-.5c1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path>';
                return res.ok ? res.json() : Promise.reject();
            })
            .catch((err) => {
                console.log("Ocurrió algún error");
            });



    });

    //dislike
    $(document).on("click", ".dislike-svg", function (e) {
        let target = e.target,
            idImage = target.getAttribute("data-id");
        fetch(`http://instagram-laravel.test/remove/${idImage}`)
            .then((res) => {
                console.log(res);
                console.log("Hiciste dislike!");
                target.classList.add("like-svg");
                target.classList.remove("dislike-svg");
                target.setAttribute("fill", "#262626");

                target.querySelector("path").outerHTML =
                '<path class="pointer-events-none" d="M34.6 6.1c5.7 0 10.4 5.2 10.4 11.5 0 6.8-5.9 11-11.5 16S25 41.3 24 41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path>';
                return res.ok ? res.json() : Promise.reject();
            })
            .catch((err) => {
                console.log("Ocurrió algún error");
            });

    });





    //ventana modal
    const d = document;


    d.addEventListener("click", (e) => {
        if (e.target.matches("#btnModal")) {
            // let modal = e.target;
            e.target.querySelector("#tvesModal").style.display = "block";
        }

        if (e.target.matches(".close")) {
            let modal = e.target.closest("#tvesModal");
            modal.style.display = "none";
        }

        if (e.target.matches("#tvesModal")) {
            let modal = e.target;
            if (e.target == modal) {
                modal.style.display = "none";
            }
        }
    });



    //SEARCH
    let $search = d.querySelector(".search"),
        $modalSearch = d.querySelector(".modal_search"),
        $rhombus = d.querySelector(".rhombus"),
        $results = d.querySelector(".results");
    $search.addEventListener("keyup", (e)=>{
      let input = e.target.value;
      if (input.length > 0) {
      fetch(`http://instagram-laravel.test/search/${input}`)
      .then((res) => {
          return res.ok ? res.text() : Promise.reject()
        })
        .then((inner) => {
        d.querySelector(".results").innerHTML = inner;

        //toggle para el search

            $modalSearch.style.display = "block";
            $rhombus.style.display = "block";
            $results.style.display = "block";



      })
      .catch((err) => {
        console.log("No se encontraron resultados");

      })

        } else if (input.length == 0){
            $rhombus.style.display = "none";
            $results.style.display = "none";
        }
    })


    $modalSearch.addEventListener("click", (e) => {
        $modalSearch.style.display = "none";
        $rhombus.style.display = "none";
        $results.style.display = "none";
    })
});


