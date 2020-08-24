// const mahasiswa  = {
//     nama : "adhika",
//     id   : "123",
//     email : "anjay"
// }

// console.log(JSON.stringify(mahasiswa));

// let xhr = new XMLHttpRequest();
// xhr.onreadystatechange = function () {
//     if (xhr.readyState == 4 && xhr.status == 200){
//         let mahasiswa = JSON.parse(this.responseText);
//         console.log(mahasiswa);
//     }
// }
// xhr.open('GET', 'data.json',true);
// xhr.send();

$.getJSON('data.json', function(data){
    console.log(data);
})
