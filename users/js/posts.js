var blog = {};
(function () {

    blog.load_posts_page = load;


    page.create_heading;

    page.create_button(document.body, "Создать", create);

    let ob_name_id = {};

    function load() {

        fetch("/users/posts.php")
            .then(response => response.text())
            .then(on_load)
    }

    function on_load(result) {
        let a = [];
        for (let i = 0; i < result.length; i++) {
            a[i] = result.slice(result.indexOf('{'), result.indexOf('}') + 1);
            result = result.slice(result.indexOf('}') + 1);
        }

        for (let i = 0; i < a.length; i++) {

            let post = JSON.parse(a[i]);

            page.create_title(post.title);
            page.create_content(post.content);
            create_link(post.id);
            page.create_date(post.date);

            ob_name_id = post.name_id;
        }
    }

    function create_link(post_id) {
        let word = document.createElement("a");
        document.body.appendChild(word);
        let linkText = document.createTextNode("Подробнее...");
        word.appendChild(linkText);
        word.title = "Подробнее...";
        let ob_id = post_id;
        word.href = '/users/post.html?' + ob_id;
    }

    function create() {
        window.location.href = "/users/create.html?" + ob_name_id;
    }
})();
window.addEventListener('DOMContentLoaded', blog.load_posts_page);