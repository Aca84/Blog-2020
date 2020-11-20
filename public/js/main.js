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
    // var top = document.getElementById('onTop');

    // if(top <= 30){
        // top.display();

        top.scrollTo({ // auto scroll on top of page
            top: 0,
            behavior: "smooth"
          });
    // }
}

// CKEditor
ClassicEditor
//     .create( document.querySelector( '#editor' ) )
//     .catch( error => {
//         console.error( error );
// } );
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );