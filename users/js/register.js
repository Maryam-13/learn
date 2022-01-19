(function () {
    page.create_heading;
    form = page.create_form(document.body, "form");
    $(form).append(page.create_name);
    $(form).append(page.create_pass);
    //create_pass_conf();
    $(form).append("<input class='box' id='password_conf' type='password'>");
    //create_mail();
    $(form).append("<input class='box' id='mail'>");
    page.create_button(form, "Регистрация", register);

        /*function create_pass_conf() {
        let password_conf = document.createElement("input");
        form.appendChild(password_conf);
        password_conf.className = "box";
        password_conf.id = "password_conf";
        password_conf.setAttribute("type", "password");
    }*/

    /*function create_mail() {
        let mail = document.createElement("input");
        form.appendChild(mail);
        mail.className = "box";
        mail.id = "mail";
    }*/

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