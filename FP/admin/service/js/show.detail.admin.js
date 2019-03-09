function showDetail(){
        usertea = $("#user_tea").html();
        console.log(usertea);
      
        var url = "../admin/service/records/show.detail.admin.php";  
      
        $.post(url,{
        usertea : usertea
        
        },function(data){
            var data = JSON.parse(data);
            console.group("show details");
            console.log(data['subject']);
            console.log(data['section']);
            console.groupEnd();
            //สร้าง tag <d></d> แล้วข้อความ "Subject "จะไปแสดงตรงส่วนนั้น
             //สร้าง tag <f></f> แล้วข้อความ "Section "จะไปแสดงตรงส่วนนั้น
            $("showsubject").html(data['subject']);
            $("showsection").html(data['section']);
           //showbutton(data['subject'],data['section']);
        });      
       }

// function showbutton(subject,section){
//     console.group("show details respone");
//     console.log(subject);
//     console.log(section);
//     console.groupEnd();
//     var url = "../admin/service/records/show.detail.admin.php";  
//     $.post(url,{
//         subject : subject,
//         section : section
        
        
//        });

// }