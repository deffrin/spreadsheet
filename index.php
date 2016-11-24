<!DOCTYPE link PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><title>Spreadsheet.js</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
 
<style type="text/css">

.hello{
border-color:red !important;
}

table td{
height:39px;
position:relative;
}

td.cell_error{
	background:#BEB7A4;
	
}

.contextmenu{

	z-index: 9999;
    position: absolute;
    left: 20px;
    background: #C7BFBF;
    width: 150px;
    color: #655A5A;
    padding-left: 20px;
    
}

.cell_error:focus{

}
</style>
</head>
<body>
<div class="container">
<h2>Spreadsheet.js</h2>
<table class="table table-bordered" id="spread-sheet">
	
	<tr>
		<th>Item</th>
		<th>Price</th>
		<th>Total</th>
	</tr>
	
	<tr>
		<td>keyboard</td>
		<td>1</td>
		<td>1</td>
	</tr>
	<tr>
		
		<td>Mouse</td>
		<td>1</td>
		<td>2</td>
	</tr>
	<tr>
		<td>Monitor</td>
		<td>1</td>
		<td>23</td>
		
	</tr>
	
</table>

<input type="button" onclick="" class="btn btn-primary btn-success" value="Call It" />

<input type="button" onclick="check()" class="btn btn-primary btn-success" value="Call It" />

<div id="ele">
 vinu

</div>




</div>
<script type="text/javascript">

	/*
	Spread Sheet.js
	*/
	// Create an immediately invoked functional expression to wrap our code
	(function() {
	    var privateVar = "You can't access me in the console";
		console.log(this);
		// Define our constructor
		this.spreadSheet = function() {

			console.log(this);

			

			// Define option defaults
		    var defaults = {
				rows : 5,
				fields:null,  // fields are comma separated table headings . The number of table headings equal to column count
				container:null,
				className:null,
				clickType:'click',			// possible values click and dblclick
				validate:null,
				avoidable:false
			}  

		 	// Create options by extending defaults with the passed in arugments
		    if (arguments[0] && typeof arguments[0] === "object") {
		      this.options = extendDefaults(defaults, arguments[0]);
		    }

		   
		}

		 // Public Methods

		  spreadSheet.prototype.build = function() {
		    // open code goes here

			    console.log('building...');

			    building.call(this);
			    
			   // console.log(this.options);
			    
		  }

		  spreadSheet.prototype.validate = function() {

				if(this.options.avoidable)
				{
					 avoidUnnecessary();
				}
		    console.log('validating...');
		    console.log(this.options.validate);
		    validating_fields = this.options.validate;

		    table =  node.querySelector('table');
			
		    f=0;
		    
		    for (i = 0; i < validating_fields.length; i++) { 
		        // validating_fields[i] 
		       // console.log('outer');
		        for (var j = 1, row; row = table.rows[j]; j++) {
			        // j=1 means starting from second row,avoiding 1 st table header ow
			        
			        //console.log('inner');
		        	//iterate through rows
		        	tcell = table.rows[j].cells[validating_fields[i]];
		        	
		        	if(tcell.innerHTML.trim().length)
		        	{
			        	tcell.setAttribute('class','');
		        	}
		        	else
		        	{
						f++;
			        	tcell.setAttribute('class','cell_error');
		        	}
						
		        }
		    }

		    return f;
			    
		  }

		  spreadSheet.prototype.cellClicked = function(cellInfo) {
		
				//alert("hq");
					
					
			

				 
				rowIndex = cellInfo.target.parentNode.rowIndex;
				cellIndex = cellInfo.target.cellIndex;

				console.log(rowIndex);
				console.log(cellIndex);
				tr =  node.querySelector('table');
	console.log(tr);
				iHT = tr.rows[rowIndex].cells[cellIndex];
				 first_child =  iHT.getElementsByClassName('contextmenu')[0];

				 if(typeof first_child != "undefined")
				 first_child.style.display='none';
				 
//				iHT.setAttribute("class", "hello");
				if(iHT.innerHTML.trim()=="&nbsp;")
				iHT.innerHTML="";
				
				
				iHT.setAttribute("contenteditable", "true");

				iHT.focus();
				
				
				
//iHT= getTable();
				console.log(iHT);
				
		  }

		  function hideAllContextMenu(){
			    var elements = document.getElementsByClassName('contextmenu')

			    for (var i = 0; i < elements.length; i++){
			        elements[i].style.display = 'none';
			    }
			}

			
		  function contextMenu(cellInfo)
		  {
			  hideAllContextMenu();
			  
			  rowIndex = cellInfo.target.parentNode.rowIndex;
			  cellIndex = cellInfo.target.cellIndex;
			  tr =  node.querySelector('table');

			  
			  if(typeof rowIndex !== 'undefined' && typeof cellIndex !== 'undefined')
			  {
				iHT = tr.rows[rowIndex].cells[cellIndex];

				iHT.blur();
				console.log(iHT);
			  
			 

			  if(!iHT.hasChildNodes())
				  {
				  var div = document.createElement("div");        // Create a <button> element
				  div.setAttribute("class","contextmenu");
				  div.innerHTML="hello";
				  iHT.appendChild(div);          
			  }
			  else
			  {
				 first_child =  iHT.getElementsByClassName('contextmenu')[0];
				 first_child.style.display='block';
				 
			  }
			 
			                       // Append the text to <button>
		//	  document.body.appendChild(btn);      

			  }
				  
		  }
	 	  function avoidUnnecessary()
	 	  {

	 		table =  node.querySelector('table');
	 		to_be_removed=[];
	 		
 		  	for (var j = 2, row; row = table.rows[j]; j++) {
				//  j=2 means starting from third row
 		  		nonempty=0;
 		  		for (var k = 0, col; col = row.cells[k]; k++) {
			        tcell = table.rows[j].cells[k];
		        	if(tcell.innerHTML.trim().length)
		        	{
			        	nonempty++;
		        	}
		        }
		        if(!nonempty)
			        to_be_removed.push(j);
				        
	 	  }
 		 	  
 		 to_be_removed.reverse();
 		   for (l = 0; l < to_be_removed.length; l++) {

 			  	table.deleteRow(to_be_removed[l]);
 			  	
 	 	   } 
 	 		   
	 	  }
 		 	  
	 	  
		  function building()
		  {

			selectorType = this.options.container.charAt(0);
			selector = this.options.container.substring(1);

			var x;
			
			if(selectorType=='#')
			{
				node = document.getElementById(selector);
			}
			else if(selectorType='.')
			{
				x = document.getElementsByClassName(selector);
			    node = x[0];
			}

			// node is the container div
			
			
			
			var tr = node.querySelector('table');
			if(tr!=null)
			{
				// Table exists
				// Not equal to null means table exists in the container
				console.log('exists');
			}
			else
			{
				console.log('not exists');
				if(this.options.fields)
				{

				var th_fields = this.options.fields.split(",");

				i = th_fields.length;

				var table = document.createElement("table");    
				var cell;
				
				table.setAttribute("class", this.options.className);
				
				node.appendChild(table);

				row = table.insertRow(0);
				j=0;
				while(i)
				{

				// Creating Table Header
				
				header = document.createElement("th");
				cell = row.appendChild(header);

				// Add some text to the new cells:
				cell.innerHTML = th_fields[j];

				i--;
				j++;
				}
				i=this.options.rows;
				
				while(i)
				{
				row = table.insertRow(1);

				k=th_fields.length;
				l=1;
				
				m=1;
				while(k)
				{
				x = row.insertCell(-1);
				//x.innerHTML="&nbsp;";

				x.addEventListener(this.options.clickType, this.cellClicked.bind(x));
				x.addEventListener('contextmenu',contextMenu.bind(x));
				x.addEventListener("contextmenu", function(e){
				    e.preventDefault();
				}, false);
				
				
				k--;
				l++;
				}
				m++;
				i--;
				}
				
				}
				else
				{
					console.warn('Fields are missing');
				}

			}

			
			
			
		  }
		  
		
		
		// Utility method to extend defaults with user options
		  function extendDefaults(source, properties) {

		    var property;	
		    for (property in properties) {
		      if (properties.hasOwnProperty(property)) {
		        source[property] = properties[property];   
		      }  
		    }
		    return source;
		  }
		
		
	    
	}());


	spread = new spreadSheet({
		rows:3,
		container:'#ele',  // for creating new this is required
		fields:'Item,Price,Quantity,Total',  // for creating new this is required
		className:'table table-bordered',
		validate:[0,2],
		avoidable:true
	});
	
	spread.build();


	function check()
	{
		d=spread.validate();
		if(d)
			console.log('not valid');
		else
			console.log('valid');
	}

	
</script>

</body>
</html>