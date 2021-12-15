let heading = document.createElement("div");
document.body.appendChild(heading);
heading.appendChild(document.createTextNode("Мой блог"));
heading.className = "text";

let form = document.createElement("form");
document.body.appendChild(form);
form.className = "form";

let name = document.createElement("input");
form.appendChild(name);
name.className = "box";
name.id = "name";

let password = document.createElement("input");
form.appendChild(password);
password.className = "box";
password.id = "password";
password.setAttribute("type", "password");

let password_conf = document.createElement("input");
form.appendChild(password_conf);
password_conf.className = "box";
password_conf.id = "password_conf";
password_conf.setAttribute("type", "password");

let mail = document.createElement("input");
form.appendChild(mail);
mail.className = "box";
mail.id = "mail";

let button = document.createElement("button");
form.appendChild(button);
button.className = "button";
let text = document.createTextNode("Регистрация");
button.appendChild(text);
button.onclick = register;

function register(event) {
    event.preventDefault();
    let data = new FormData();
    data.append("name", name.value);
    data.append("password", password.value);
    data.append("password_conf", password_conf.value);
    data.append("mail", mail.value);

    fetch("register.php", { method: "post", body: data })
        .then(response => response.text())
        .then(result => {
            window.location.href = "register.html";
        })
}