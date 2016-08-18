
function check(){
	
	if(document.URL.contains("index.php")){
	<?php echo "<style> #introduction{background-color: yellow;} #runSimulation #resultAnalysis #tweakParameters #summary{background-color: rgba(255, 255, 255, 0.6);} </style>" ;?>
	} 

	if(document.URL.contains("create_txt.php")){
	<?php echo "<style> #resultAnalysis{background-color: yellow;} #introduction #runSimulation #tweakParameters #summary{background-color: rgba(255, 255, 255, 0.6);} </style>" ;?>
	} 

	if(document.URL.contains("replications.php")){
	<?php echo "<style> #tweakParameters{background-color: yellow;} #introduction #resultAnalysis #runSimulation #summary{background-color: rgba(255, 255, 255, 0.6);} </style>" ;?>
	} 
}
