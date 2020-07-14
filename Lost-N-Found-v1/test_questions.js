function questionSort(obj){
	$("#"+obj.id+"\\.questionIndexList").sortable();
    console.log("Question Sort Running");

    $("#"+obj.id+"\\.questionIndexList > li").mousedown(function(){
        var id = $(this).attr("id");
        var length = id.length;
        var currPos = parseInt(id.substr(length-1,1));
        var newPos;

        $("#"+obj.id+"\\.questionIndexList").on('sortupdate',function() {
            var qSet = document.getElementById(obj.id+".questionIndexList");
            var model = obj.app.viewController.model;
            var qCount = model.testQuestions.length;

            for(newPos=0; newPos < qCount; newPos++){
                var id_1 = qSet.children[newPos].getAttribute("id");

                if(id == id_1){
                    break;
                }
            }

            obj.currentQuestion = currPos;
            var diff = currPos - newPos;

            for(var j = 0; j<Math.abs(diff); j++){
                if(diff<0){
                    obj.moveDown();
                }
                else{
                    obj.moveUp();
                }
            }
        });
    });
}