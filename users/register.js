function create_heading() {
    let heading = document.createElement("div");
    document.body.appendChild(heading);
    heading.appendChild(document.createTextNode("Мой блог"));
    heading.className = "text";
}
create_heading();

function create_form() {
    let form = document.createElement("form");
    document.body.appendChild(form);
    form.className = "form";

    this.name = function() {
        let user_name = document.createElement("input");
        form.appendChild(user_name);
        user_name.className = "box";
        user_name.id = "user_name";
    }
    //create_name();

    this.pass = function() {
        let password = document.createElement("input");
        form.appendChild(password);
        password.className = "box";
        password.id = "password";
        password.setAttribute("type", "password");
    }
    //create_pass();

    this.pass_conf = function() {
        let password_conf = document.createElement("input");
        form.appendChild(password_conf);
        password_conf.className = "box";
        password_conf.id = "password_conf";
        password_conf.setAttribute("type", "password");
    }
    //create_pass_conf();

    this.mail = function() {
        let mail = document.createElement("input");
        form.appendChild(mail);
        mail.className = "box";
        mail.id = "mail";
    }
    //create_mail();

    this.button = function() {
        let button = document.createElement("button");
        form.appendChild(button);
        button.className = "button";
        let text = document.createTextNode("Регистрация");
        button.appendChild(text);
        button.onclick = register;
    }
   
    //create_button();
    

    function register(event) {
        event.preventDefault();
        let data = new FormData();
        data.append("user_name", user_name.value);
        data.append("password", password.value);
        data.append("password_conf", password_conf.value);
        data.append("mail", mail.value);

        fetch("register.php", { method: "post", body: data })
            .then(response => response.text())
            .then(result => {
                window.location.href = "register.html";
            })
    }
    
}
//create_form();
let form = new create_form();
form.name();
form.pass();
form.pass_conf();
form.mail();
form.button();