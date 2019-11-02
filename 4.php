<script>
function findSame(array){
    if(typeof array == 'object'){
        let result = [];
        let map = {};
        for(var a = 0; a < array.length; a++){
            let strLower = array[a].toLowerCase();
            let arrSplit = strLower.split('');
            arrSplit.sort();
            var arrJoin = arrSplit.join('');
            
            if(map[arrJoin] == null){
                let l = [];
                l.push(a);
                map[arrJoin] = l;
            }
            else{
                map[arrJoin].push(a);
            }
        }

        for(var l in map){
            if(map[l].length > 1){
                for(var b=0;b<map[l].length;b++){
                    result.push(array[map[l][b]]);
                }
            }
        }
        return console.log(result);
    }
    else{
        console.log("parameter yang diterima bukan array.");
        return false;
    }
}

// jalankan function dan beri argument
findSame(['adma','aAdm','Closing','mada','dAni','dina','sasa']);