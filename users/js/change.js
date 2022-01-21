var blog = {};
(function () {

    blog.load_change_page = load;

    page.create_heading;

    let div = create_div();
    let form = page.create_form(div, "form change");
    let id = page.get_parameter();

    function load() {

        fetch("/users/change.php?id=" + id)
            .then(response => response.json())
            .then(on_load)
    }

    function on_load(result) {
        let post = result;
        create_title1(post.title);
        create_content1(post.content);
        page.create_button(form, "Сохранить", change_post);

    }

    function create_div() {
        let div = document.createElement("div");
        document.body.appendChild(div);
        div.className = "content";
        return div;
    }

    function create_title1(title) {
        $(form).append("<input class='box change' id = 'title1' value = '" + title + "'>");
    }

    function create_content1(content) {
        $(form).append("<textarea class='textarea' id='content1'>" + content + "</textarea>");
    }

    function change_post(event) {
        event.preventDefault();
        let data = new FormData();
        //event.cancelBubble = true;
        data.append("change", 1);
        data.append("title", title1.value);
        data.append("content", content1.value);

        fetch("/users/change.php?id=" + id, { method: "post", body: data })
            .then(response => response.text())
            .then(result => {
                window.location.href = "/users/posts.html";
            })
    }
})();

window.addEventListener('DOMContentLoaded', blog.load_change_page);