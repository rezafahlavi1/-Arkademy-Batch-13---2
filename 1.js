function biodata(name,age){
    // data
    var name = name;
    var age = age;
    var address = "jl. Kedinding lor gang Tulip no 07, Kenjeran, Surabaya, Jawa Timur";
    var hobbies = ["Playing Badminton", "Playing Games", "reading"];
    var is_married = false;
    var interest_in_coding = true;
    var list_school = {
        name : "SMA Negeri 3 Surabaya",
        year_in : 2014,
               year_out : 2017,
        major : "Science"
    };
    var skill = {
        skill_name : 'Web Developer',
        level : 'begginer'
    };

    let result = {name,age,address,hobbies,is_married,list_school,skill,interest_in_coding};
    
    let json_result = JSON.stringify(result)

    
    return json_result;
} 

console.log(biodata("Muhammad Adam Canrayneldy", 18))