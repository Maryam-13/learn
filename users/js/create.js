let searchParams = new URLSearchParams(window.location.search);
let name_id = String(searchParams);
let i = name_id.slice(0, 2);

page.create_heading();
let form = page.create_form(document.body, "form change");

create_title();
create_content();
page.create_button(form, "Создать", create);


function create_title() {
    let title = document.createElement("input");
    form.appendChild(title);
    title.className = "box change";
    title.id = "title";
}

function create_content() {
    let content = document.createElement("textarea");
    form.appendChild(content);
    content.className = "textarea";
    content.id = "content";
}


function create(event) {
    event.preventDefault();
    let data = new FormData();
    data.append("title", title.value);
    data.append("content", content.value);
    data.append("name_id", i);

    fetch("/users/create.php", { method: "post", body: data })
        .then(response => response.text())
        .then(result => {
            window.location.href = "/users/posts.html";
        })
}
