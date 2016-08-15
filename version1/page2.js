function calculate_time(divName)
{			
			
			var starttime=document.getElementById("start_time").value;	
			var stoptime=document.getElementById("stop_time").value;	
			
			if(! starttime)
			{
				return 0;
			}
			
			if(! stoptime)
			{
				return -1;
			}
			
			if(starttime && stoptime)
			{
				var time=document.getElementById("start_time").value;	
				ind=time.indexOf(":");
				len=time.length;
				start_hours=parseFloat(time.slice(0,ind));
				start_minutes=parseFloat(time.slice(ind+1,len));
				
				var time=document.getElementById("stop_time").value;	
				ind=time.indexOf(":");
				len=time.length;
				stop_hours=parseFloat(time.slice(0,ind));
				stop_minutes=parseFloat(time.slice(ind+1,len));
				
				total_time=60-start_minutes+stop_minutes+(stop_hours-start_hours-1)*60;
				total_time=Math.ceil(total_time/60);
				
				
				
				var divobj = document.getElementById('totalTime');
				
				divobj.innerHTML=divobj.innerHTML+"<table id='table' border='1'><tr>";
				
				var table=document.getElementById('table');
				var row=table.insertRow(0);
				
				
				for(i=0; i<total_time; i++)
				{
					var str="";
					
					if (i==0){str=str+"st ";}
					if (i==1){str=str+"nd ";}
					if (i==2){str=str+"rd ";}
					if (i>2){str=str+"th ";}
					
					var cell=row.insertCell(i);
					cell.innerHTML="Enter traffic load at "+(i+1)+str+"hour";
					
				}	
				
				var row=table.insertRow(1);
				for(i=0; i<total_time; i++)
				{
					var cell=row.insertCell(i);
					cell.innerHTML="<input type='radio' name="+i+" value='l' id='load1'>Low</input>"+"<br><input type='radio' name="+i+" value='m' id='load1'>Medium</input>"+"<br><input type='radio' name="+i+" value='h' id='load1'>High</input>";
					
				}	
				var divobj = document.getElementById('assist');
				divobj.innerHTML=divobj.innerHTML+"<h3 id='assistants'>Assistants?</h3><table id='table2' cellspacing='0' cellpadding='100'>";
				var table=document.getElementById('table2');
				var row=table.insertRow(0);
				var cell1=row.insertCell(0);
				var cell2=row.insertCell(1);
				var cell3=row.insertCell(2);
				var cell4=row.insertCell(3);
				cell1.innerHTML="Conductor<input type='radio' name='extra1' value='1' id='conductor' />";
				cell2.innerHTML="Positive Train Control<input type='radio' name='extra2' value='2' id='train_c' />";
				cell3.innerHTML="Cruise Control<input type='radio' name='extra3' value='3' id='cruise_control' />";
				cell4.innerHTML="Other<input type='radio' name='extra4' value='4' id='other'>";
				
				}
				var divobj = document.getElementById('refresh');
				divobj.innerHTML="<button onclick='window.location.href=window.location.href'>Refresh</button>";
				
				document.getElementById("start_time").readOnly=true;
				document.getElementById("stop_time").readOnly=true;
			}
			

	

		