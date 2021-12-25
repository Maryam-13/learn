window.addEventListener('DOMContentLoaded', load);

let searchParams = new URLSearchParams(window.location.search);
let i = String(searchParams);
let id = i.slice(0, 2);

page.create_heading();


function load() {

    fetch("/users/change.php?id=" + id)
        .then(response => response.json())
        .then(result => {

            let post = result;
            let div = create_div();
            let form = page.create_form(div, "form change");
            create_title1();
            create_content1();
            page.create_button(form, "Сохранить", change_post);
            

           function create_div() {
                let div = document.createElement("div");
                document.body.appendChild(div);
                div.className = "content";
                return div;
            }

            
            function create_title1() {
                let title1 = document.createElement("input");
                form.appendChild(title1);
                title1.value = post.title;
                title1.className = "box change";
                title1.id = "title1";
            }
           
            function create_content1() {
                let content1 = document.createElement("textarea");
                form.appendChild(content1);
                content1.value = post.content;
                content1.className = "textarea";
                content1.id = "content1";
            }
            
            
            function change_post(event) {
                let data = new FormData();
                event.preventDefault();
                data.append("change", 1);
                data.append("title", title1.value);
                data.append("content", content1.value);

                fetch("/users/change.php?id=" + id, { method: "post", body: data })
                    .then(response => response.text())
                    .then(result => {
                        window.location.href = "/users/posts.html";
                    })
            }
        })
}