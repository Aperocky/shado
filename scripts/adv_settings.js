var current_task = 0;

function updateSerDist(task_num) {
	// console.log(task_num);
	var item = document.getElementById("t" + task_num + "_serTimeDist");
	// console.log(item);
	var dist = item.options[item.selectedIndex].value;
	if (dist == "E") {
		document.getElementById("t" + task_num + "_expPms").style.display='inline-block';
		document.getElementById("t" + task_num + "_logPms").style.display='none';
		document.getElementById("t" + task_num + "_uniPms").style.display='none';
	} else if (dist == "L") {
		document.getElementById("t" + task_num + "_expPms").style.display='none';
		document.getElementById("t" + task_num + "_logPms").style.display='inline-block';
		document.getElementById("t" + task_num + "_uniPms").style.display='none';
	} else {
		document.getElementById("t" + task_num + "_expPms").style.display='none';
		document.getElementById("t" + task_num + "_logPms").style.display='none';
		document.getElementById("t" + task_num + "_uniPms").style.display='inline-block';
	}
}

// function restore() {
//
// }

function addTask(task_num) {

	// console.log("Adding task " + task_num);
	// document.getElementById("task_" + task_num).style.display = "block";
	if (current_task == 0) {
		current_task = task_num;
	} else {
		current_task++;
	}

	console.log("Adding task " + current_task);
	document.getElementById("task_" + current_task).style.display = "block";
	var current_tasks = document.getElementById('current_tasks').value; //.split(",").map(Number);
	current_tasks = JSON.parse("[" + current_tasks + "]");
	// console.log(current_tasks);
	current_tasks.push(current_task);

	document.getElementById("current_tasks").value = current_tasks;
}

function deleteTask(task_num) {
	// console.log(document.getElementById("current_tasks"));
	// console.log(current_tasks);
	// document.getElementById("current_tasks").value = current_tasks;

//	Remove task

	console.log("Removing task " + task_num);
	document.getElementById("task_" + task_num).style.display = "none";

	current_tasks = document.getElementById('current_tasks').value.split(",").map(Number);

	console.log(current_tasks);
	var index = current_tasks.indexOf(task_num);
	console.log("Index = " + index);
	if (index > -1) {
		current_tasks.splice(index, 1);
	}
	console.log(current_tasks);
	document.getElementById("current_tasks").value = current_tasks;

	// var task = document.getElementById("task_" + task_num);
	// task.parentElement.removeChild(task);

// 	Delete task's variables

	// var html_div = document.getElementById("myData");
	// var html_data = html_div.getAttribute("data-session");
	// var json = JSON.parse(decodeURIComponent(html_data));
	//
	// json.taskNames.splice(task_num, 1);
	// json.taskPrty.splice(task_num, 1);
	// json.taskArrDist.splice(task_num, 1);
	// json.taskArrPms.splice(task_num, 1);
	// json.taskSerDist.splice(task_num, 1);
	// json.taskSerPms.splice(task_num, 1);
	// json.taskExpDist.splice(task_num, 1);
	// json.taskExpPmsLo.splice(task_num, 1);
	// json.taskExpPmsHi.splice(task_num, 1);
	// json.taskAffByTraff.splice(task_num, 1);
	// json.taskAssocOps.splice(task_num, 1);

//	Update html

	// var new_html_data = JSON.stringify(json);
	// html_div.setAttribute("data-session", new_html_data);

//	Add deleted task number to input field
}
