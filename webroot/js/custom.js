'use strict';
$(document).ready(function(){
    $('#course_id').on('change', function(){
        var courseID = $(this).val();
        //alert(courseID);
        if(courseID){
            $.ajax({
                type:'POST',
                url:APP.data.url+'students/getBranches/'+courseID,
                //data:'course_id='+courseID,
                success:function(response){
                    //consol.log(response);
                    //$('#branch_id').html(html);
                    if (response.success) {
                         var $temp = "<option value=''>--- Select Branch Now---</option>";
                        $.each(response.data,function(key,branch){
                            // console.log(branch.id);
                            // console.log(branch.name);                            
                            $temp+="<option value='"+branch.id+"'>"+branch.name+"</option>";

                        });
                        // console.log($temp);
                        $('#branch_id').empty();
                        $('#branch_id').html($temp);

                    };
                },
                error:function(){
                	consol.error('error submiting');
                }
            }); 
        }
    });
    
});