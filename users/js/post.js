var blog = {};
(function () {

    blog.load_post_page = load;

    page.create_heading;
    let id = page.get_parameter();
    create_link();

    div = create_div();

    function create_div() {
        let div = document.createElement("div");
        document.body.appendChild(div);
        div.className = "content";
        return div;
    }

    function load() {

        fetch("/users/post.php?id=" + id)
            .then(response => response.json())
            .then(on_load)
    }

    function on_load(result) {
        let post = result;

        page.create_title(post.title);
        page.create_content(post.content);
        page.create_date(post.date);
        page.create_button(document.body, "Удалить", delete_post1);
    }

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

    function create_link() {
        let word = document.createElement("a");
        document.body.appendChild(word);
        let linkText = document.createTextNode("Изменить");
        word.appendChild(linkText);
        word.href = '/users/change.html?' + id;
    }
})();
window.addEventListener('DOMContentLoaded', blog.load_post_page);