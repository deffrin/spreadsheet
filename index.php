<!DOCTYPE link PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><title>Spreadsheet.js</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
 
<style type="text/css">

.hello{
border-color:red !important;
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
				validate:null
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

		    console.log('validating...');
		    console.log(this.options.validate);
		    validating_fields = this.options.validate;

		    table =  node.querySelector('table');
		    
		    for (i = 0; i < validating_fields.length; i++) { 
		        // validating_fields[i] 
		        for (var j = 0, row; row = table.rows[j]; j++) {
		        	//iterate through rows
		        	tcell = table.rows[j].cells[i];
		        	
		        	if(tcell.innerHTML.trim().length)
						
		        }
		    }
		    
			    
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
	
//				iHT.setAttribute("class", "hello");
					iHT.innerHTML="";
				iHT.setAttribute("contenteditable", "true");

				iHT.focus();
				
				
				
//iHT= getTable();
				console.log(iHT);
				
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
				x.innerHTML="&nbsp;";

				x.addEventListener(this.options.clickType, this.cellClicked.bind(x));
					
				
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
		validate:[0,2]
	});
	
	spread.build();


	function check()
	{
		spread.validate();
	}

	
</script>

</body>
</html>