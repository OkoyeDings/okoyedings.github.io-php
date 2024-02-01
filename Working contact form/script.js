//getting all the required elements
const form = document.querySelector("form"),
statusTxt = form.querySelector(".button-area span");

form.onsubmit = (e)=>{
    e.preventDefault();// to prevent the from from submint when its still empty
    statusTxt.style.color = "#0D6EFD"
    statusTxt.style.display = "block"; //to show the sending message when submit is clicked

    let xhr = new XMLHttpRequest(); //for creating a new XML object
    xhr.open("POST", "message.php", true);// for sending a post request to message.php file
    xhr.onload = ()=>{
        if(xhr.readyState == 4 && xhr.status == 200){//this is a if statement which if there is no error in the ajax the function should fire
            let response = xhr.response; //this will store the ajax responce in  responce variable
           if(response.indexOf("Email and password field is required") != -1 || response.indexOf("Enter a valid email") || response.indexOf("sorry, failed to send your message!")){
            statusTxt.style.color = "red";
           }else{
            form.reset();
            setTimeout(() =>{
                statusTxt.style.display = "none";
            },3000)
           }
            statusTxt.innerText = response;
        }
    }
    //we are using this code to create a new form data obj. we are going to use it to send data 
    let formData = new FormData(form);//we will be using this to send the data 
    xhr.send(formData);
}