window.addEventListener('DOMContentLoaded', load);

let searchParams = new URLSearchParams(window.location.search);
let i = String(searchParams);
let id = i.slice(0, 2);

function create_heading() {
    let heading = document.createElement("div");
    document.body.appendChild(heading);
    heading.appendChild(document.createTextNode("Мой блог"));
    heading.className = "text";

}
create_heading();

function load() {

    fetch("post.php?id=" + id)
        .then(response => response.json())
        .then(result => {

            let post = result;

            function create_form() {
                let form = document.createElement("form");
                document.body.appendChild(form);
                form.className = "content";

                function create_title1() {
                    let title1 = document.createElement("div");
                    document.body.appendChild(title1);
                    let text = document.createTextNode(post.title);
                    title1.appendChild(text);
                    title1.className = "title";
                }
                create_title1();

                function create_content1() {
                    let content1 = document.createElement("div");
                    document.body.appendChild(content1);
                    text = document.createTextNode(post.content);
                    content1.appendChild(text);
                    content1.className = "content";
                }
                create_content1();

                function create_date1() {
                    let date1 = document.createElement("div");
                    document.body.appendChild(date1);
                    text = document.createTextNode(post.date);
                    date1.appendChild(text);
                    date1.className = "data";
                }
                create_date1();
            }
            create_form();


            function create_button() {
                let button = document.createElement("button");
                document.body.appendChild(button);
                button.className = "button";
                let text1 = document.createTextNode("Удалить");
                button.appendChild(text1);
                button.id = "delete_post";
                button.onclick = delete_post1;
                
            }
            create_button();
           

            function delete_post1(event) {
                let data = new FormData();
                event.preventDefault();
                data.append("delete_post", 1);
                fetch("post.php?id=" + id, { method: "post", body: data })
                    .then(response => response.text())
                    .then(result => {
                        window.location.href = "posts.html";
                    })
            }

        })

}

function create_link() {
    let word = document.createElement("a");
    document.body.appendChild(word);
    let linkText = document.createTextNode("Изменить");
    word.appendChild(linkText);
    word.href = 'change.html?' + id;

}
create_link();