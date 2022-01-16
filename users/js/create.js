(function(){

let name_id = page.get_parameter();

page.create_heading;
form = page.create_form(document.body, "form change");
//create_title();
//create_content();
$(form)
.append('<input id="title" class="box change"></tinput>')

$(form)
.append('<textarea id="content" class="textarea"></textarea>')

page.create_button(form, "Создать", create);

/*function create_title() {
    let title = document.createElement("input");
    form.appendChild(title);
    title.className = "box change";
    title.id = "title";
}*/

/*function create_content() {
    let content = document.createElement("textarea");
    form.appendChild(content);
    content.className = "textarea";
    content.id = "content";
}*/

function create(event) {
    //event.cancelBubble = true;
    let data = new FormData();
    event.preventDefault();
    data.append("title", title.value);
    data.append("content", content.value);
    //data.append("name_id", name_id);

    fetch("/users/create.php?name_id=" + name_id, { method: "post", body: data })
        .then(response => response.text())
        .then(result => {
            window.location.href = "/users/posts.html";
        })
}
})();