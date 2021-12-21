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

    fetch("change.php?id=" + id)
        .then(response => response.json())
        .then(result => {

            let post = result;

            function create_div() {
                let div = document.createElement("div");
                document.body.appendChild(div);
                div.className = "content";

                function create_form() {
                    let form = document.createElement("form");
                    div.appendChild(form);
                    form.className = "form change";

                    function create_title1() {
                        let title1 = document.createElement("input");
                        form.appendChild(title1);
                        title1.value = post.title;
                        title1.className = "box change";
                        title1.id = "title1";
                    }
                    create_title1();

                    function create_content1() {
                        let content1 = document.createElement("textarea");
                        form.appendChild(content1);
                        content1.value = post.content;
                        content1.className = "textarea";
                        content1.id = "content1";
                    }
                    create_content1();

                    function create_button() {
                        let button = document.createElement("button");
                        form.appendChild(button);
                        button.className = "button";
                        let text1 = document.createTextNode("Сохранить");
                        button.appendChild(text1);
                        button.onclick = change_post;
                    }

                    create_button();

                    function change_post(event) {
                        let data = new FormData();
                        event.preventDefault();
                        data.append("change", 1);
                        data.append("title", title1.value);
                        data.append("content", content1.value);

                        fetch("change.php?id=" + id, { method: "post", body: data })
                            .then(response => response.text())
                            .then(result => {
                                window.location.href = "posts.html";
                            })
                    }
                }
                create_form();
            }
            create_div();
        })
}