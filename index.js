console.log('JavaScript imported successfully');

function authorize_user(){
    let username = document.getElementById('userID').value;
    let userPass = document.getElementById('password').value;

    //Check user input
    if (!username || !userPass){
        let incorrect = document.getElementById('incorrect');
        incorrect.innerHTML = `Invaild, Please try again`;
    } else { //Redirect if input is valid
        window.location.replace("main.php");
    }
}

function set_username(){
    let username = "User";
    let welcome_msg = document.getElementById('welcome');
    welcome_msg.innerHTML = `Welcome ${username},`;
}