function TogglePass(){
    const temp = document.getElementsByClassName("hide-pass");
    if (temp.type === "password") {
        temp.type = "text";
    }
    else {
        temp.type = "password";
    }
}