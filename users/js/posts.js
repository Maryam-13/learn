var blog = {};
(function () {

    let press = 0;
    blog.load_posts_page = load(press);

    $(function () {
        $("#datepicker").datepicker({
            onSelect: function (date) {
                change_date = date;

                let params = String(change_date);
                month = params.slice(0, 2);
                year = params.slice(6, 10);
                number = params.slice(3, 5);

                change_date = year + '-' + month + '-' + number;
                press = 1;

                blog.load_posts_page = load(change_date, press);
            }
        })
    })

    page.create_heading;

    page.create_button(document.body, "Создать", create);
    div = create_div();

    function create_div() {
        let div = document.createElement("div");
        document.body.appendChild(div);
        div.className = "content";
        return div;
    }

    let ob_name_id = {};

    function load(change_date, press) {

        fetch("/users/posts.php?change_date=" + change_date + "&press=" + press)
            .then(response => response.text())
            .then(on_load)
    }

    function on_load(result) {
        div.innerHTML = "";
        let a = [];

        if (result.length !== 4) {
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
        else {
            alert("Постов за эту дату нет");
            let press = 0;
            blog.load_posts_page = load(press);
        }
    }

    function create_link(post_id) {
        let word = document.createElement("a");
        div.appendChild(word);
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