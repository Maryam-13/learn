let page = {};

(function () {

    page.create_form = create_form;
    page.create_title = create_title;
    page.create_content = create_content;
    page.create_date = create_date;
    page.create_button = create_button;
    page.get_parameter = get_parameter;

    page.create_heading = $(document.body).append('<div class="text">Мой блог</div>');
    page.create_name = $("<input class='box' id='user_name'>");
    page.create_pass = $("<input class='box' id='password' type='password'>");


    function create_form(where, className) {
        let form = document.createElement("form");
        where.appendChild(form);
        form.className = className;
        return form;
    }
    function create_title(post_title) {

        let title = $("<div class='title'>" + post_title + "</div>");
        $(div).append(title);
    }
    function create_content(post_content) {

        let content1 = $("<div class='content'>" + post_content + "</div>");
        $(div).append(content1);
    }
    function create_date(post_date) {

        let date1 = $("<div class='data'>" + post_date + "</div>");
        $(div).append(date1);
    }

    function create_button(where, word, function_name) {

        let button = $("<button class='button'>" + word + "</button>");
        button.click(function_name);
        $(where).append(button);

    }
    function get_parameter() {
        let searchParams = new URLSearchParams(window.location.search);
        let params = String(searchParams);
        return params.slice(0, 2);
    }
})();