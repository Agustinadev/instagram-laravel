const d = document,
      $follow = d.getElementById("follow");


d.addEventListener("click", (e)=>{
    if (e.target.matches("#follow")) {
        console.log(e.target)
        let follow_id = e.target.getAttribute('data-id');
        fetch(`http://instagram-laravel.test/follow/${follow_id}`)
        .then((res)=>{
            e.target.setAttribute('id', 'unfollow')
            e.target.textContent = 'Unfollow';
            return res.ok ? res.json() : Promise.reject();
        })
        .catch((err)=>{
            console.log("Error en la consulta")
        });
    }


    if (e.target.matches("#unfollow")) {
        console.log(e.target)
        let follow_id = e.target.getAttribute('data-id');
        fetch(`http://instagram-laravel.test/unfollow/${follow_id}`)
        .then((res)=>{
            e.target.setAttribute('id', 'follow')
            e.target.textContent = 'Follow';
            return res.ok ? res.json() : Promise.reject();
        })
        .catch((err)=>{
            console.log("Error en la consulta")
        });
    }
})
