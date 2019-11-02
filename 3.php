<script>
    function test(limit){
        var numbrs = [];
        for(i=0;i<limit;i++){
            var rand = Math.floor((Math.random() * 10) +1);
            if(rand%2 != 0){
                numbrs.push(rand);
            } else{
                i--;
            }
        }
        console.log(numbrs);
        return numbrs.reduce((a, b) => a + b, 0);
        // var sums = numbrs.reduce((a, b) => a + b, 0);
        // console.log(sums);
    }
</script>