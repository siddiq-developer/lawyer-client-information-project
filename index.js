const sidebarToggle = document.querySelector('#sidebar-toggle');
sidebarToggle.addEventListener("click", function(){
    document.querySelector("#sidebar").classList.toggle("collapsed");
});


// function onFormSubmit(form){
//  var data = {
//   "name": form.name.cnic.phone.email.description.value
//  };

//  var jsonData = JSON.stringify(data);

//  document.cookie = "my_form=" + jsonData;

//  window.location.href = form.getAttribute("action");


//   return false;
// }
