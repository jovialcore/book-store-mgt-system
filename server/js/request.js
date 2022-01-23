$(document).ready(function($) {

    function postData(a) {
      $('#registrationForm').submit(function(event) {
        event.preventDefault();
        // console.log($(this).serialize());
        $.ajax({
          url: a,
          type:'POST',
          dataType:'json',
          data:$(this).serialize(),
        })
        .done(function (response) {
            alert(response.message);
            // window.location = "admin/index.php";
        })
        .fail(function (error) {
          console.log(error)
        })
      })
    }
    postData('server/classes/handleRequest.php?_mode=registration')

    // student login
    function sLogin(a) {
      $('#loginForm').submit(function(event) {
        event.preventDefault();
        $.ajax({
          url: a,
          type:'POST',
          dataType:'json',
          data:$(this).serialize(),
        })
        .done(function (response) {
          alert(response.message)
          window.location = "index.php";
        })
        .fail(function (error) {
          console.log(error)
        })
      })
    }
    sLogin('server/classes/handleRequest.php?_mode=login');


    // book registration
    $('#bookregistration').submit(function(event) {
      event.preventDefault();
      var formUpload = document.getElementById("bookregistration");
      $.ajax({
        url : '../server/classes/handleRequest.php?_mode=registerbook',
        type: "POST",
        cache: false,
        async: false,
        contentType: false,
        processData: false,
        data :  new FormData(formUpload),
        dataType : 'json',
        success: function (response) {
          alert(response.message)
          // window.location.reload();
        },
        error: function (response) {
          console.log(response)
        }
      })
    })

    // admin login
    function login(a) {
      $('#adminLoginForm').submit(function(event) {
        event.preventDefault();
        $.ajax({
          url: a,
          type:'POST',
          dataType:'json',
          data:$(this).serialize(),
        })
        .done(function (response) {
          alert(response.message)
          window.location = "index.php";
        })
        .fail(function (error) {
          console.log(error)
        })
      })
    }
    login('../server/classes/handleRequest.php?_mode=adminLogin');

    function addAdmin(a) {
      $('#add-admin').submit(function(event) {
        event.preventDefault();
        $.ajax({
          url: a,
          type:'POST',
          dataType:'json',
          data:$(this).serialize(),
        })
        .done(function (response) {
          alert(response.message)
          window.location.reload();
        })
        .fail(function (error) {
          console.log(error)
        })
      })
    }
    addAdmin('../server/classes/handleRequest.php?_mode=addAdmin');


    // purchase form
    function pLogin(a) {
      $('#purchaseForm').submit(function(event) {
        event.preventDefault();
        $.ajax({
          url: a,
          type:'POST',
          dataType:'json',
          data:$(this).serialize(),
        })
        .done(function (response) {
          alert(response.message)
          window.location = "index.php";
        })
        .fail(function (error) {
          console.log(error)
        })
      })
    }
    pLogin('server/classes/handleRequest.php?_mode=purchaseForm');
})

// add to cart
function addToCart(book_Id,book_name,book_price) {
	let bookId = book_Id;
	let bookName = book_name;
	let price = book_price;
	let book = {
		"book_Id" : bookId,
		"book_name" : bookName,
		"book_price" : price
	}
  // console.log(book);
	$.ajax({
		url: 'server/classes/handleRequest.php?_mode=addToCart',
		type: 'POST',
		dataType : 'json',
		data: book,
		success: function (response) {
	      alert(response.message)
	      // window.location.reload();
	    },
	    error: function (response) {
	      console.log(response)
	    }
	})
}

function myFunction() {
  alert("You are Required to Login");
}