(function(){
function get_name_id() {
    let searchParams = new URLSearchParams(window.location.search);
    let i = String(searchParams);
    let name_id = i.slice(0, 2);
    return name_id;
}

page.create_heading();
form = page.create_form(document.body, "form change");
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
    //event.cancelBubble = true;
    let data = new FormData();
    event.preventDefault();
    data.append("title", title.value);
    data.append("content", content.value);
    //data.append("name_id", name_id);

    fetch("/users/create.php?name_id=" + get_name_id(), { method: "post", body: data })
        .then(response => response.text())
        .then(result => {
            window.location.href = "/users/posts.html";
        })
}
})();