function updateSerDist(task_num) {
	// console.log(task_num);
	var item = document.getElementById("t" + task_num + "_serTimeDist");
	// console.log(item);
	var dist = item.options[item.selectedIndex].value;
	if (dist=="E") {
		document.getElementById("t" + task_num + "_expPms").style.display='inline-block';
		document.getElementById("t" + task_num + "_logPms").style.display='none';
		document.getElementById("t" + task_num + "_uniPms").style.display='none';
	} else if (dist=="L") {
		document.getElementById("t" + task_num + "_expPms").style.display='none';
		document.getElementById("t" + task_num + "_logPms").style.display='inline-block';
		document.getElementById("t" + task_num + "_uniPms").style.display='none';
	} else {
		document.getElementById("t" + task_num + "_expPms").style.display='none';
		document.getElementById("t" + task_num + "_logPms").style.display='none';
		document.getElementById("t" + task_num + "_uniPms").style.display='inline-block';
	}
}

function restore() {

}

function addTask() {
	document.getElementById("taskParameterTable").innerHTML += "New task here.<br>";
}

function deleteTask(task_num) {

//	Remove task

	var task = document.getElementById("task_" + task_num);
	task.parentElement.removeChild(task);

// 	Delete task's variables

	var html_div = document.getElementById("myData");
	var html_data = html_div.getAttribute("data-session");
	var json = JSON.parse(decodeURIComponent(html_data));

	json.taskNames.splice(task_num, 1);
	json.taskPrty.splice(task_num, 1);
	json.taskArrDist.splice(task_num, 1);
	json.taskArrPms.splice(task_num, 1);
	json.taskSerDist.splice(task_num, 1);
	json.taskSerPms.splice(task_num, 1);
	json.taskExpDist.splice(task_num, 1);
	json.taskExpPmsLo.splice(task_num, 1);
	json.taskExpPmsHi.splice(task_num, 1);
	json.taskAffByTraff.splice(task_num, 1);
	json.taskAssocOps.splice(task_num, 1);

//	Update html

	var new_html_data = JSON.stringify(json);
	html_div.setAttribute("data-session", new_html_data);
}
