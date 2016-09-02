function updateSerDist(task_num) {
	console.log(task_num);
	var item = document.getElementById("t" + task_num + "_serTimeDist");
	console.log(item);
	var dist = item.options[item.selectedIndex].value;
	if (dist=="E"){
		document.getElementById("t" + task_num + "_expPms").style.display='inline-block';
		document.getElementById("t" + task_num + "_logPms").style.display='none';
		document.getElementById("t" + task_num + "_uniPms").style.display='none';
	}
	else if (dist=="L") {
		document.getElementById("t" + task_num + "_expPms").style.display='none';
		document.getElementById("t" + task_num + "_logPms").style.display='inline-block';
		document.getElementById("t" + task_num + "_uniPms").style.display='none';
	}
	else{
		document.getElementById("t" + task_num + "_expPms").style.display='none';
		document.getElementById("t" + task_num + "_logPms").style.display='none';
		document.getElementById("t" + task_num + "_uniPms").style.display='inline-block';
	}
}

function addTask() {
	document.getElementById("demo").innerHTML = "Hello world.";
}

function deleteTask() {

}
