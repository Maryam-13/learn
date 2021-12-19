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

    function create_name() {
        let user_name = document.createElement("input");
        form.appendChild(user_name);
        user_name.className = "box";
        user_name.id = "user_name";
        return(user_name.value);
    }
    create_name();

    function create_pass() {
        let password = document.createElement("input");
        form.appendChild(password);
        password.className = "box";
        password.id = "password";
        password.setAttribute("type", "password");
    }
    create_pass();

    function create_button() {
        let button = document.createElement("button");
    form.appendChild(button);
    button.className = "button";
    let text = document.createTextNode("Войти");
    button.appendChild(text);
    button.onclick = enter;

    function enter(event){
        event.preventDefault();
             let data = new FormData();
             data.append("user_name", user_name.value);
             data.append("password", password.value);
             
             fetch("authorization.php", {method: "post", body: data}) 
             .then(response => response.text())
             .then(result =>{ 
               window.location.href = "posts.html";
             })
    }
    }
    create_button();

    function create_button_register(){
    let button_register = document.createElement("button");
    form.appendChild(button_register);
    button_register.className = "button";
    let text1 = document.createTextNode("Регистрация");
    button_register.appendChild(text1);
    button_register.onclick = register;

   function register(){
        window.location.href = "register.html";
    }
}
create_button_register();
   
}
create_form();
   /* let form = document.createElement("form");
    document.body.appendChild(form);
    form.className = "form";

    let user_name = document.createElement("input");
    form.appendChild(user_name);
    user_name.className = "box";
    user_name.id = "name";

    let password = document.createElement("input");
    form.appendChild(password);
    password.className = "box";
    password.id = "password";
    password.setAttribute("type", "password");*/

   /* let button = document.createElement("button");
    form.appendChild(button);
    button.className = "button";
    let text = document.createTextNode("Войти");
    button.appendChild(text);
    button.onclick = enter;

    function enter(event){
        event.preventDefault();
             let data = new FormData();
             data.append("name", user_name.value);
             data.append("password", password.value);
             
             fetch("authorization.php", {method: "post", body: data}) 
             .then(response => response.text())
             .then(result =>{   
             window.location.href = "posts.html";
             })
    }*/

    /*let button_reg = document.createElement("button");
    form.appendChild(button_reg);
    button_reg.className = "button";
    let text1 = document.createTextNode("Регистрация");
    button_reg.appendChild(text1);
    button_reg.onclick = register;

    function register(){
        window.location.href = "register.html";
    }*/