let page = {};

(function () {
    //page.create_heading = create_heading1;
    page.create_form = create_form;
    page.create_title = create_title;
    page.create_content = create_content;
    page.create_date = create_date;
    //page.create_name = create_name;
    //page.create_pass = create_pass;
    page.create_button = create_button;
    page.get_parameter = get_parameter;

    page.create_heading = $(document.body).append('<div class="text">Мой блог</div>');
    page.create_name = $("<input class='box' id='user_name'>");
    page.create_pass = $("<input class='box' id='password' type='password'>");

    /*function create_heading1() {
        let heading = document.createElement("div");
        document.body.appendChild(heading);
        heading.appendChild(document.createTextNode("Мой блог"));
        heading.className = "text";
    }*/
    function create_form(where, className) {
        let form = document.createElement("form");
        where.appendChild(form);
        form.className = className;
        /*let form = $("<form class=' " + className +" '></form>");
        $(where).append(form);*/
        return form;
    }
    function create_title(post_title) {
        /*let title = document.createElement("div");
        document.body.appendChild(title);
        let text = document.createTextNode(post_title);
        title.appendChild(text);
        title.className = "title";*/
        let title = $("<div class='title'>" + post_title + "</div>");
        $(document.body).append(title);
    }
    function create_content(post_content) {
        /* let content1 = document.createElement("div");
         document.body.appendChild(content1);
         text = document.createTextNode(post_content);
         content1.appendChild(text);
         content1.className = "content";*/
        let content1 = $("<div class='content'>" + post_content + "</div>");
        $(document.body).append(content1);
    }
    function create_date(post_date) {
        /*let date1 = document.createElement("div");
        document.body.appendChild(date1);
        text = document.createTextNode(post_date);
        date1.appendChild(text);
        date1.className = "data";*/
        let date1 = $("<div class='data'>" + post_date + "</div>");
        $(document.body).append(date1);
    }
    /*function create_name() {
        let user_name = document.createElement("input");
        form.appendChild(user_name);
        user_name.className = "box";
        user_name.id = "user_name";
    }*/
    /*function create_pass() {
        let password = document.createElement("input");
        form.appendChild(password);
        password.className = "box";
        password.id = "password";
        password.setAttribute("type", "password");
    }*/
    function create_button(where, word, function_name) {
        /*let button = document.createElement("button");
        where.appendChild(button);
        button.className = "button";
        let text = document.createTextNode(word);
        button.appendChild(text);
        button.onclick = function_name;*/
        let button = $("<button class='button' onclick='" + function_name+ "'>" + word +"</button>");
        $(where).append(button);
    }
    function get_parameter() {
        let searchParams = new URLSearchParams(window.location.search);
        let params = String(searchParams);
        return params.slice(0, 2);
    }
})();