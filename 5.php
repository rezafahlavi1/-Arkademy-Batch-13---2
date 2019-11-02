<script>
function ganti_kata(kalimat,kata_dicari,pengganti){
    let strrng = Array.from(kalimat);


    for(var i = 0; i < strrng.length; i++){
        
        if(strrng[i] === kata_dicari){

            strrng.splice(a,1,pengganti);
        }
        strrng += arrays[a];
    }
    return console.log(strrng);
}
ganti_kata("purwakarta","a","o");
</script>