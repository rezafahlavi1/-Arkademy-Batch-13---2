<script>
function is_username_valid(username){
    var uppercaser = /[a-z\g]{5,}/;
    console.log(uppercaser);
    if(name.length >= 3 && uppercaser.test(name) == true ){
        return true;
    }
        return false;
};
function is_password_valid(password){
    var Uname = /[0-9]{2}[@|&][A-Z]{4}/;

    if(password.length == 8 && Uname.test(password)){
        return true;
    }
        return false;
};

console.log(is_name_valid("rezaf")); // benar
console.log(is_password_valid("rudi_124")); // benar
</script>