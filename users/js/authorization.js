(function(){
    page.create_heading;

    form = page.create_form(document.body, "form");
    $(form).append(page.create_name);
    $(form).append(page.create_pass);
    page.create_button(form, "Войти", enter);
    page.create_button(form, "Регистрация", register);

    function enter(event) {
        event.preventDefault();
        event.cancelBubble = true;
        let data = new FormData();
        data.append("user_name", user_name.value);
        data.append("password", password.value);

        fetch("/users/authorization.php", { method: "post", body: data })
            .then(response => response.text())
            .then(result => {
                window.location.href = "/users/posts.html";
            })
    }

    function register(event) {
        event.preventDefault();
        window.location.href = "/users/register.html";
    }
})();