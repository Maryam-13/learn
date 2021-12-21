let searchParams = new URLSearchParams(window.location.search);
let name_id = String(searchParams);
let i = name_id.slice(0,2);


function create_heading() {
    let heading = document.createElement("div");
    document.body.appendChild(heading);
    heading.appendChild(document.createTextNode("Мой блог"));
    heading.className = "text";
}
create_heading();

function create_form() {
    let form = document.createElement("form");
    document.body.appendChild(form);
    form.className = "form change";

    function create_title() {
        let title = document.createElement("input");
        form.appendChild(title);
        title.className = "box change";
        title.id = "title";
    }
    create_title();

    function create_content() {
        let content = document.createElement("textarea");
        form.appendChild(content);
        content.className = "textarea";
        content.id = "content";
    }
    create_content();

    function create_button() {
        let button = document.createElement("button");
        form.appendChild(button);
        button.className = "button";
        let text = document.createTextNode("Создать");
        button.appendChild(text);
        button.onclick = create;

        function create(event) {
            event.preventDefault();
            let data = new FormData();
            data.append("title", title.value);
            data.append("content", content.value);
            data.append("name_id", i);

            fetch("create.php", { method: "post", body: data })
                .then(response => response.text())
                .then(result => {
                    window.location.href = "posts.html";
                })
        }
    }
    create_button();
}
create_form();