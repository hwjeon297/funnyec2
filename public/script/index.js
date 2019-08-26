// 메인 페이지 화면 강조 이벤트
var flag      = 1;

function testjs(id) {

    var shoesType = document.getElementById(id);

    switch (shoesType.id) {
        case "canvars":
            // shoesType.addEventListener('mouseover', function(){
            //     var layout = document.getElementById("half1_layout");
            //     layout.style.position = 'relative';
            //     layout.style.width  = '300px';
            //     layout.style.height = '300px'; 
            //     layout.style.background = '#a23';
            // }); 
            break;
        case "sport":
            alert("sport2");
            break;
        case "baby":
            alert("baby3");
            break;
        case "company":
            alert("company4");
            break;
        default:
            alert("default5");
            break;
    }

} 

$(document).ready


