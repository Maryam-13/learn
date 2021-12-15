window.addEventListener('DOMContentLoaded', load);

let heading = document.createElement("div");
document.body.appendChild(heading);

heading.appendChild(document.createTextNode("Мой блог"));
heading.className = "text";


function load() {

    fetch("posts.php")
        .then(response => response.text())
        .then(result => {

            let a = [];
            for (let i = 0; i < result.length; i++) {
                a[i] = result.slice(result.indexOf('{'), result.indexOf('}') + 1);
                result = result.slice(result.indexOf('}') + 1);
            }

            for (let i = 0; i < a.length; i++) {

                let object = JSON.parse(a[i]);

                let title1 = document.createElement("div");
                document.body.appendChild(title1);
                let text = document.createTextNode(object.title);
                title1.appendChild(text);
                title1.className = "title";

                let content1 = document.createElement("div");
                document.body.appendChild(content1);
                text = document.createTextNode(object.content);
                content1.appendChild(text);
                content1.className = "content";

                let word = document.createElement("a");
                document.body.appendChild(word);
                let linkText = document.createTextNode("Подробнее...");
                word.appendChild(linkText);
                word.title = "Подробнее...";
                word.href = "post.php?i=object.id&name_id=object.name_id";
                

                let date1 = document.createElement("div");
                document.body.appendChild(date1);
                text = document.createTextNode(object.date);
                date1.appendChild(text);
                date1.className = "data";
            }
        })
}


let button = document.createElement("button");
document.body.appendChild(button);
button.className = "button";
let text = document.createTextNode("Создать");
button.appendChild(text);
button.onclick = create;


function create() {

    window.location.href = "create.html?name_id=21";
}