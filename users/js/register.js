(function () {
    page.create_heading;
    form = page.create_form(document.body, "form");
    $(form).append(page.create_name);
    $(form).append(page.create_pass);

    $(form).append("<input class='box' id='password_conf' type='password'>");

    $(form).append("<input class='box' id='mail'>");
    page.create_button(form, "Регистрация", register);

    function register(event) {
        event.preventDefault();
        event.cancelBubble = true;
        let data = new FormData();
        data.append("user_name", user_name.value);
        data.append("password", password.value);
        data.append("password_conf", password_conf.value);
        data.append("mail", mail.value);

        fetch("/users/register.php", { method: "post", body: data })
            .then(response => response.text())
            .then(result => {
                window.location.href = "/users/register.html";
            })
    }
})();