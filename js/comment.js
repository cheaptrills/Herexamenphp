const post = (taskid) => {
    console.log(taskid);
    const formInput = document.getElementById("commentbox").value;
    postComment(formInput, taskid);
    document.getElementById("commentbox").value = "";
    location.reload();
}

const postComment = async (comment, taskid) => {
    if(comment.length > 0){

    
        data = {
            taskid: taskid,
            comment, comment
        };

        const toGetParams = `taskid=${data.taskid}&comment=${data.comment}&post=js`; //query van comment aanmaken
        try{
            await axios.post("ajax/postComments.php?" + toGetParams) // stuurt query naar server 
        } catch (e){
            console.log(e);
        }
    }
    
}

let postbtn = document.getElementById("postBtn");

if(postbtn  != null){
    postbtn.onclick = ()=>post(getAllUrlParams(window.location.href).taskid);
}
 

const toggle = (taskid) => {
    markTask(taskid);
    location.reload();
}

const markTask = async (taskid) => {

        data = {
            taskid: taskid,   
        };

        const toGetParams = `taskid=${data.taskid}`; //query van comment aanmaken
        try{
            await axios.post("ajax/toggleTask.php?" + toGetParams) // stuurt query naar server 
        } catch (e){
            console.log(e);
        }
    
    
}

let markbtn = document.getElementById('markbutton');

if(markbtn != null ){

    markbtn.onclick = ()=>toggle(getAllUrlParams(window.location.href).taskid);

} else {
    let markbtns = document.querySelectorAll('.markbutton');

    markbtns.forEach((btn)=>{
        let btnid = btn.dataset.id;
        btn.onclick = ()=>toggle(btnid);

    })

}

//test.forEach((btn)=>{
//  const id = btn.dataset.id;
//  btn.onclick = ()=>post(id);
//})