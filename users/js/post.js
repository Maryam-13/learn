window.addEventListener('DOMContentLoaded', load);

let searchParams = new URLSearchParams(window.location.search);
let i = String(searchParams);
let id = i.slice(0, 2);

page.create_heading();

create_link();



function load() {

    fetch("/users/post.php?id=" + id)
        .then(response => response.json())
        .then(result => {

            let post = result;
            page.create_title(post.title);
            page.create_content(post.content);
            page.create_date(post.date);
            page.create_button(document.body, "Удалить", delete_post1);
            
                 
           
            function delete_post1(event) {
                let data = new FormData();
                event.preventDefault();
                data.append("delete_post", 1);
                fetch("/users/post.php?id=" + id, { method: "post", body: data })
                    .then(response => response.text())
                    .then(result => {
                        window.location.href = "/users/posts.html";
                    })
            }

        })

}

function create_link() {
    let word = document.createElement("a");
    document.body.appendChild(word);
    let linkText = document.createTextNode("Изменить");
    word.appendChild(linkText);
    word.href = '/users/change.html?' + id;
}
