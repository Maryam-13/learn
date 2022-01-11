let page = {};

(function () {
    page.create_heading = create_heading1;
    page.create_form = create_form;
    page.create_title = create_title;
    page.create_content = create_content;
    page.create_date = create_date;
    page.create_name = create_name;
    page.create_pass = create_pass;
    page.create_button = create_button;
    page.get_id = get_id;

    function create_heading1() {
        let heading = document.createElement("div");
        document.body.appendChild(heading);
        heading.appendChild(document.createTextNode("Мой блог"));
        heading.className = "text";
    }
    function create_form(where, className) {
        let form = document.createElement("form");
        where.appendChild(form);
        form.className = className;
        return form;
    }
    function create_title(post_title) {
        let title = document.createElement("div");
        document.body.appendChild(title);
        let text = document.createTextNode(post_title);
        title.appendChild(text);
        title.className = "title";
    }
    function create_content(post_content) {
        let content1 = document.createElement("div");
        document.body.appendChild(content1);
        text = document.createTextNode(post_content);
        content1.appendChild(text);
        content1.className = "content";
    }
    function create_date(post_date) {
        let date1 = document.createElement("div");
        document.body.appendChild(date1);
        text = document.createTextNode(post_date);
        date1.appendChild(text);
        date1.className = "data";
    }
    function create_name() {
        let user_name = document.createElement("input");
        form.appendChild(user_name);
        user_name.className = "box";
        user_name.id = "user_name";
    }
    function create_pass() {
        let password = document.createElement("input");
        form.appendChild(password);
        password.className = "box";
        password.id = "password";
        password.setAttribute("type", "password");
    }
    function create_button(where, word, function_name) {
        let button = document.createElement("button");
        where.appendChild(button);
        button.className = "button";
        let text = document.createTextNode(word);
        button.appendChild(text);
        button.onclick = function_name;
    }
    function get_id() {
        let searchParams = new URLSearchParams(window.location.search);
        let i = String(searchParams);
        let id = i.slice(0, 2);
        return id;
    }
})();