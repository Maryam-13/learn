
page.create_heading();

let form = page.create_form(document.body, "form");
create_name();
page.create_pass();

page.create_button(form, "Войти", enter);
page.create_button(form, "Регистрация", register);






function create_name() {
    let user_name = document.createElement("input");
    form.appendChild(user_name);
    user_name.className = "box";
    user_name.id = "user_name";
    return (user_name.value);
}


function enter(event) {
    event.preventDefault();
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




