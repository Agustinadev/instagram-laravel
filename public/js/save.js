
 const $save = d.getElementById("save");

      d.addEventListener("click",(e)=>{
        if (e.target.matches("#save")) {
            //DEFINIR EL PARAMETRO IMAGE_ID
            const image_id = e.target.getAttribute('data-id');
            fetch(`http://instagram-laravel.test/save/${image_id}`)
            .then((res)=>{
                console.log("Guardaste la imagen");
                e.target.setAttribute('id', 'remove_save');

                e.target.innerHTML = '<svg aria-label="Eliminar" class="m-2 pointer-events-none" color="#262626" fill="#262626" height="30" role="img" viewBox="0 0 48 48" width="30"><path d="M43.5 48c-.4 0-.8-.2-1.1-.4L24 28.9 5.6 47.6c-.4.4-1.1.6-1.6.3-.6-.2-1-.8-1-1.4v-45C3 .7 3.7 0 4.5 0h39c.8 0 1.5.7 1.5 1.5v45c0 .6-.4 1.2-.9 1.4-.2.1-.4.1-.6.1z"></path></svg>';
                return res.ok ?res.json :Promise.reject();
            })
            .catch((err)=>{
                console.log(err)
            });
        }

        if (e.target.matches("#remove_save")) {
            //DEFINIR EL PARAMETRO IMAGE_ID
            const image_id = e.target.getAttribute('data-id');
            fetch(`http://instagram-laravel.test/removesave/${image_id}`)
            .then((res)=>{
                console.log("desguardaste la imagen");
                e.target.setAttribute('id', 'save');

                e.target.innerHTML = '<svg aria-label="Guardar" class="m-2 pointer-events-none" fill="#262626" height="30" role="img" viewBox="0 0 48 48" width="30"><path d="M43.5 48c-.4 0-.8-.2-1.1-.4L24 29 5.6 47.6c-.4.4-1.1.6-1.6.3-.6-.2-1-.8-1-1.4v-45C3 .7 3.7 0 4.5 0h39c.8 0 1.5.7 1.5 1.5v45c0 .6-.4 1.2-.9 1.4-.2.1-.4.1-.6.1zM24 26c.8 0 1.6.3 2.2.9l15.8 16V3H6v39.9l15.8-16c.6-.6 1.4-.9 2.2-.9z"></path></svg>'
                return res.ok ?res.json :Promise.reject();
            })
            .catch((err)=>{
                console.log(err)
            });
        }
      })
