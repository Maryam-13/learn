let input1 = document.querySelector('.num.one');

let input2 = document.querySelector('.num.tow');
let button = document.querySelector('.button');

let result;

button.onclick = function(){
 
    let mark = document.getElementById("select").selectedIndex;
    var txt = document.getElementById("select").options[mark].text;
    
 if  (txt == '+') {
    result = +input1.value + +input2.value;
};

    if  (txt == '-') {
    result = +input1.value - +input2.value;
};
    if  (txt == '*') {
    result = +input1.value * +input2.value;
};
    if  (txt == '/') {
    result = +input1.value / +input2.value;
};
    
    alert(result);
}