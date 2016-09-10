var current_task = 0;

function updateSerDist(task_num) {

	var item = document.getElementById("t" + task_num + "_serTimeDist");
	var dist = item.options[item.selectedIndex].value;
	
	if (dist == "E") {
		document.getElementById("t" + task_num + "_expPms").style.display = 'inline-block';
		document.getElementById("t" + task_num + "_logPms").style.display = 'none';
		document.getElementById("t" + task_num + "_uniPms").style.display = 'none';
	} else if (dist == "L") {
		document.getElementById("t" + task_num + "_expPms").style.display = 'none';
		document.getElementById("t" + task_num + "_logPms").style.display = 'inline-block';
		document.getElementById("t" + task_num + "_uniPms").style.display = 'none';
	} else {
		document.getElementById("t" + task_num + "_expPms").style.display = 'none';
		document.getElementById("t" + task_num + "_logPms").style.display = 'none';
		document.getElementById("t" + task_num + "_uniPms").style.display = 'inline-block';
	}
}

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
}
