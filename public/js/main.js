// var contain = document.querySelector('#app');
// contain.style.backgroundColor = 'grey';

// var nav = document.querySelector('.card');
// nav.style.backgroundColor = 'lightgreen';

// fja za menjanje bloga iz svetle u tamnu temu
// var button = document.getElementById('button').addEventListener('click', buttonClick);

// function buttonClick() {

//     // document.querySelector('#app').style.backgroundColor = 'black';
//     var all = document.getElementById('app');
//     all.style.background = 'black';

//     var oll = document.querySelectorAll('.container');
//     oll.forEach((list) => { //working this too
//     list.style.background = '#6b6b6b';
//     });

//     var card = document.querySelectorAll('.card');
//     card.forEach((list) => { //working this too
//     list.style.background = 'darkgray';
//     });
// }

// var button1 = document.getElementById('button1').addEventListener('click', buttonClick1);

// function buttonClick1() {

//     // document.querySelector('#app').style.backgroundColor = 'lightgray';
//     var all = document.getElementById('app');
//     all.style.background = '#e6e6e6';

//     var oll = document.querySelectorAll('.container');
//     oll.forEach((list) => { //working this too
//     list.style.background = '#fff';
//     });


//     var card = document.querySelectorAll('.card');
//     card.forEach((list) => { //working this too
//     list.style.background = '#fff';
//     });
// }

// var text = document.getElementById('body-text'); //ne raddi

// for( i=0; i< text; i++){
//     // console.log(i);
//     text.style.color = 'white';
// }



// end fje for theme change
// var all = document.getElementById('app');
// all.style.background = 'black';

// var oll = document.querySelectorAll('.container');
// oll.forEach((list) => { //working this too
//     list.style.background = '#6b6b6b';
// });

// var card = document.querySelectorAll('.card');
// card.forEach((list) => { //working this too
//     list.style.background = 'darkgray';
// });

// card.style.background = 'lightgreen';
// console.log(card);


// var nav = document.querySelectorAll('.navbar');
// nav.style.background = '#000';

// console.log(nav);

//Fja za automatsko brisanje alert poruka
// var nana = document.querySelectorAll('#alert');

// setTimeout(function (nana) { // this works like charm
//     this.remove();
// }, 3000); 

setTimeout(function () { // this works like charm
  
    // Closing the alert 
    // $('#alert').popover('show')
    $('#alert').fadeOut("slow"); // removes one in fade but second remains (if two msgs appaer - create post page)
    // $('#alert').alert('close'); //removes 2 errors-alerts
}, 3000); 

//Kraj Auto alert poruka

// on top button

var top = document.getElementById('onTop');

function goToTop(){
    // document.documentElement.scrollTop = 0;

    top.scrollTo({
        top: 0,
        behavior: "smooth"
      });
}